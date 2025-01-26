<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\LoanType;
use App\Models\Repayment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoanController extends Controller
{
    public function index(Request $request)
{
    $status = $request->input('status');

    $loans = Loan::with(['user', 'loanType'])
        ->when($status, fn($query) => $query->where('status', $status))
        ->get();

    return view('admin.loans.index', compact('loans', 'status'));
}

    public function create()
    {
        $loanTypes = LoanType::all();
        $users = User::where('role', 'borrower')->get();
        return view('admin.loans.create', compact('loanTypes', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'loan_type_id' => 'required|exists:loan_types,id',
            'amount' => 'required|numeric|min:1000',
            'interest_rate' => 'required|numeric',
            'duration' => 'required|integer|min:1',
        ]);

        Loan::create($request->all());

        return redirect()->route('admin.loans.index')->with('success', 'Loan application submitted successfully');
    }
   public function show($id)
{
    $user = User::findOrFail($id);

    return response()->json([
        'name' => $user->name,
        'email' => $user->email,
        'mobile_number' => $user->mobile_number,
        'marital_status' => $user->marital_status,
        'date_of_birth' => $user->date_of_birth,
        'present_address' => $user->present_address,
        'state' => $user->state,
        'city' => $user->city,
        'postal_code' => $user->postal_code,
        'yearly_salary' => $user->yearly_salary,
        'profession' => $user->profession,
        'image' => $user->image,
    ]);
}

    
    public function edit($id)
    {
        $loan = Loan::findOrFail($id);
        $loanTypes = LoanType::all();
        $users = User::where('role', 'borrower')->get();
        return view('admin.loans.edit', compact('loan', 'loanTypes', 'users'));
    }
    public function updateStatus(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);
    
        
        if ($request->status === 'approved') {
            
            $repaymentCount = Repayment::where('loan_id', $loan->id)->count();
            
          
            if ($repaymentCount === 0) {
                $this->generateRepayments($loan);
            }
        }
    
        
        $loan->status = $request->status;
        $loan->save();
    
        return redirect()->route('admin.loans.index')->with('success', 'Loan status updated successfully!');
    }
    

    private function generateRepayments($loan)
    {
  
        if (!$loan->duration || !$loan->amount || !$loan->interest_rate || $loan->duration <= 0 || $loan->amount <= 0) {
            throw new \Exception('Invalid loan duration, loan amount, or interest rate.');
        }
    
       
        $totalInstallments = $loan->duration * 12;
    
        
        $totalInterest = ($loan->amount * $loan->interest_rate * $loan->duration) / 100;
    
      
        $totalPayable = $loan->amount + $totalInterest;
    
        
        $repaymentAmount = $totalPayable / $totalInstallments;
    
       
        $repayments = [];
        $currentDate = now();
        for ($i = 1; $i <= $totalInstallments; $i++) {
            $repayments[] = [
                'loan_id' => $loan->id,
                'installment_number' => $i,
                'due_date' => $currentDate->addMonth()->format('Y-m-d'),
                'amount' => round($repaymentAmount, 2),
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
    
       
        Repayment::insert($repayments);
    }
    
    




    

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'loan_type_id' => 'required|exists:loan_types,id',
            'amount' => 'required|numeric|min:1000',
            'interest_rate' => 'required|numeric',
            'duration' => 'required|integer|min:1',
        ]);

        $loan = Loan::findOrFail($id);
        $loan->update($request->all());

        return redirect()->route('admin.loans.index')->with('success', 'Loan application updated successfully');
    }

    public function destroy($id)
{
    try {
        $loan = Loan::findOrFail($id);  
        $loan->delete();  

        return redirect()->route('admin.loans.index')->with('success', 'Loan application deleted successfully');
    } catch (\Exception $e) {
        \Log::error('Error deleting loan: ' . $e->getMessage());
        return redirect()->route('admin.loans.index')->with('error', 'An error occurred while deleting the loan.');
    }
}


}
