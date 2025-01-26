<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LoanType;
use App\Models\Loan;
use App\Models\User;

class LoanApplicationController extends Controller
{
    
    public function loanDetails()
    {
        $loanTypes = LoanType::all();
        return view('frontend.loan-details', compact('loanTypes'));
    }


    public function processLoanDetails(Request $request)
    {

        $loanType = LoanType::findOrFail($request->loan_type_id);
    
      
        $request->validate([
            'loan_type_id' => 'required|exists:loan_types,id',
            'loan_amount' => 'required|numeric|min:0',
            'interest_rate' => 'required|numeric',
            'loan_duration' => 'required|numeric|min:1',
        ]);
    
     
        session(['loanDetails' => $request->only('loan_type_id', 'loan_amount', 'interest_rate', 'loan_duration')]);
    

        return redirect()->route('personal.details');
    }
    

public function showPersonalDetails()
{
    $user = Auth::user();
    $loanDetails = session('loanDetails');

    return view('frontend.personal-details', [
        'user' => $user,
        'loanDetails' => $loanDetails, 
    ]);
}

public function storeLoanDetails(Request $request)
{
    $request->validate([
        'loan_type_id' => 'required|integer',
        'loan_amount' => 'required|numeric',
        'loan_duration' => 'required|integer',
        'interest_rate' => 'required|numeric',
    ]);


    session([
        'loanDetails' => [
            'loan_type_id' => $request->loan_type_id,
            'loan_amount' => $request->loan_amount,
            'loan_duration' => $request->loan_duration,
            'interest_rate' => $request->interest_rate,
        ],
    ]);

    return redirect()->route('personal.details'); 
}
public function clearLoanSession()
{
    
    session()->forget('loanDetails');

    
    return response()->noContent();
}


    
    public function savePersonalDetails(Request $request)
    {
        $request->validate([
            'mobile_number' => 'required|numeric',
            'present_address' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|numeric',
            'marital_status' => 'required|in:single,married',
            'date_of_birth' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'yearly_salary' => 'required|numeric|min:0',  
            'profession' => 'nullable|string|max:255',  
        ]);
    
        $user = Auth::user();
    
       
        $user->update($request->only([
            'mobile_number', 
            'present_address', 
            'state', 
            'city', 
            'postal_code', 
            'marital_status', 
            'date_of_birth',
            'yearly_salary',  
            'profession',     
        ]));

       
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $user->update(['image' => $imageName]);
        }

        $loanDetails = session('loanDetails');


        Loan::create([
            'loan_type_id' => $loanDetails['loan_type_id'],
            'user_id' => $user->id,
            'amount' => $loanDetails['loan_amount'],
            'interest_rate' => $loanDetails['interest_rate'],
            'duration' => $loanDetails['loan_duration'],
            'status' => 'pending', 
        ]);

      
        session()->forget(['loanDetails']);

        return redirect()->route('loan.details1')->with('success', 'Loan application submitted successfully!');
    }
}
