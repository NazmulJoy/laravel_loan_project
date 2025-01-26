<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Payment;
use App\Models\Repayment;
class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user(); 
        return view('frontend.profile', compact('user'));
    }

    public function loan()
    {
        $user = Auth::user();
        $loans = $user->loans()
            ->where('status', 'approved')
            ->with(['repayments', 'repayments.payments'])
            ->get();

            $allloans = $user->loans()->get();
        $activeLoan = $loans->first(); 
    
        $activeLoanDetails = null;
    
        if ($activeLoan) {
            $totalPayable = $activeLoan->repayments->sum('amount');
            $paidAmount = $activeLoan->repayments
                ->where('status', 'paid')
                ->sum('amount');
            $remainingAmount = $totalPayable - $paidAmount;
            $interestPaid = $paidAmount - $activeLoan->amount;
            $remainingInstallments = $activeLoan->repayments
                ->where('status', 'pending')
                ->count();
            $overdueInstallments = $activeLoan->repayments
                ->where('status', 'overdue');
    
            $activeLoanDetails = [
                'totalPayable' => $totalPayable,
                'paidAmount' => $paidAmount,
                'remainingAmount' => $remainingAmount,
                'interestPaid' => $interestPaid,
                'remainingInstallments' => $remainingInstallments,
                'overdueInstallments' => $overdueInstallments->pluck('installment_number')->toArray(),
            ];
        }
    
        return view('frontend.myloan', compact('user', 'loans', 'activeLoanDetails', 'activeLoan','allloans'));
    }
    public function makePayment(Request $request)
{
   
    $request->merge([
        'amount' => preg_replace('/[^0-9.]/', '', $request->amount), 
    ]);

    $validated = $request->validate([
        'repayment_id' => 'required|exists:repayments,id',
        'amount' => 'required|numeric|min:0',
        'method' => 'required|in:bkash,nagad,rocket,bank,cash',
        'transaction_id' => 'nullable|string',
    ]);

    Payment::create([
        'repayment_id' => $validated['repayment_id'],
        'user_id' => auth()->id(),
        'amount' => $validated['amount'],
        'method' => $validated['method'],
        'transaction_id' => $validated['transaction_id'],
        'status' => 'completed',
    ]);

    Repayment::where('id', $validated['repayment_id'])->update([
        'status' => 'paid',
        'paid_at' => now(),
    ]);

    return redirect()->back()->with('success', 'Payment successful.');
}



private function calculateActiveLoanDetails($loans)
{
    $activeLoanDetails = [];

    foreach ($loans as $loan) {
        $totalAmount = $loan->amount + ($loan->amount * ($loan->interest_rate / 100));
        $paidAmount = $loan->repayments->sum('payments.amount');
        $remainingAmount = $totalAmount - $paidAmount;
        $interestPaid = $loan->repayments->sum('payments.amount') - $loan->amount;
        $remainingInstallments = $loan->repayments->where('status', 'pending')->count();

        $overdueInstallments = $loan->repayments->where('status', 'overdue')->count();

        // Add active loan details to array
        $activeLoanDetails[] = [
            'loan' => $loan,
            'total_amount' => $totalAmount,
            'paid_amount' => $paidAmount,
            'remaining_amount' => $remainingAmount,
            'interest_paid' => $interestPaid,
            'remaining_installments' => $remainingInstallments,
            'overdue_installments' => $overdueInstallments
        ];
    }

    return $activeLoanDetails;
}

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, $id)
    {
       
        $user = Auth::user();

      
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'date_of_birth' => 'nullable|date',
            'mobile_number' => 'nullable|string|max:15',
            'present_address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'yearly_salary' => 'nullable|numeric|min:0',
            'profession' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

       
        $user->name = $request->name;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->mobile_number = $request->mobile_number;
        $user->present_address = $request->present_address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->postal_code = $request->postal_code;
        $user->yearly_salary = $request->yearly_salary;
        $user->profession = $request->profession;

        if ($request->hasFile('image')) {
            
            if ($user->image && file_exists(public_path('images/' . $user->image))) {
                unlink(public_path('images/' . $user->image));
            }
        
          
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $user->update(['image' => $imageName]);
        }
        
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
