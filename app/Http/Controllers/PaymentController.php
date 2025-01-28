<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Repayment;
use App\Models\User;
use App\Models\Loan;


class PaymentController extends Controller
{
    
    public function index(Request $request)
{
    $status = $request->input('status');
    $repaymentId = $request->input('repayment_id');

    $payments = Payment::with('user')
        ->when($status, fn($query) => $query->where('status', $status))
        ->when($repaymentId, fn($query) => $query->where('repayment_id', $repaymentId))
        ->get();

    return view('admin.payments.index', compact('payments', 'status', 'repaymentId'));
}

public function updateStatus(Request $request, Payment $payment)
{
    $validatedData = $request->validate([
        'status' => 'required|in:pending,completed,failed',
    ]);

    
    $payment->status = $validatedData['status'];
    $payment->save();

  
    if ($validatedData['status'] === 'completed') {
        $repayment = $payment->repayment; 
        if ($repayment && $repayment->status === 'pending') {
            $repayment->status = 'paid';
            $repayment->save();
        }
    }

    return redirect()->back()->with('success', 'Payment status updated successfully.');
}


public function show(Payment $payment)
{
    $payment->load('user', 'repayment.loan.loanType'); 
    return response()->json($payment);
}







   
public function create(Request $request)
{
    $users = User::all();
    $loans = [];
    $repayments = [];
    $selectedRepayment = null;

    
    if ($request->user_id) {
        $loans = Loan::where('user_id', $request->user_id)->get();
    }

  
    if ($request->loan_id) {
        $repayments = Repayment::where('loan_id', $request->loan_id)
            ->where('status', 'pending')
            ->get();
    }

   
    if ($request->repayment_id) {
        $selectedRepayment = Repayment::find($request->repayment_id);
    }

    return view('admin.payments.create', compact('users', 'loans', 'repayments', 'selectedRepayment'));
}



    
public function store(Request $request)
{
    $validatedData = $request->validate([
        'repayment_id' => 'required|exists:repayments,id',
        'user_id' => 'required|exists:users,id',
        'amount' => 'required|numeric|min:1',
        'method' => 'required|string',
        'transaction_id' => 'nullable|string',
        'status' => 'required|in:pending,completed,failed',
    ]);

   
    $payment = Payment::create($validatedData);

  
    $repayment = Repayment::find($validatedData['repayment_id']);
    if ($repayment && $repayment->status === 'pending') {
        $repayment->status = 'paid';
        $repayment->save();
    }

    return redirect()->route('admin.payments.index')->with('success', 'Payment created and repayment status updated to paid.');
}



    
public function getLoans($userId)
{
    $loans = Loan::with('loanType') 
                 ->where('user_id', $userId)
                 ->get();

    return response()->json(['loans' => $loans]);
}

public function getRepayments($loanId)
{
    $repayments = Repayment::where('loan_id', $loanId)->where('status', 'pending')->get();

    return response()->json(['repayments' => $repayments]);
}

public function getRepaymentDetails($repaymentId)
{
    $repayment = Repayment::find($repaymentId);

    if (!$repayment) {
        return response()->json(['error' => 'Repayment not found'], 404);
    }

    return response()->json(['amount' => $repayment->amount]);
}



    
    public function edit(Payment $payment)
{
    $repayments = Repayment::all();
    $users = User::all();
    return view('admin.payments.edit', compact('payment', 'repayments', 'users'));
}


   
    public function update(Request $request, Payment $payment)
{
    $validatedData = $request->validate([
        'repayment_id' => 'required|exists:repayments,id',
        'user_id' => 'required|exists:users,id',
        'amount' => 'required|numeric|min:1',
        'method' => 'required|string',
        'transaction_id' => 'nullable|string',
        'status' => 'required|in:pending,completed,failed',
    ]);

    $payment->update($validatedData);

    return redirect()->route('admin.payments.index')->with('success', 'Payment updated successfully.');
}


    
    public function destroy($id)
{
    $payment = Payment::find($id);

    if (!$payment) {
        return redirect()->route('admin.payments.index')->with('error', 'Payment not found.');
    }

    $payment->delete();

    return redirect()->route('admin.payments.index')->with('success', 'Payment deleted successfully.');
}


}
