@extends('admin.layout.layout')
@php
    $title = 'dashboard';
    $subTitle = 'Create Payment';
@endphp

@section('content')
<h4>Create Payment</h4>

<form method="GET" action="{{ route('admin.payments.create') }}">
    @csrf

    <div class="mb-3">
        <label for="user_id" class="form-label">User</label>
        <select name="user_id" id="user_id" class="form-select" required onchange="this.form.submit()">
            <option value="">Select User</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    @if(request('user_id'))
    <div class="mb-3">
        <label for="loan_id" class="form-label">Loan</label>
        <select name="loan_id" id="loan_id" class="form-select" required onchange="this.form.submit()">
            <option value="">Select Loan</option>
            @foreach($loans as $loan)
                <option value="{{ $loan->id }}" {{ request('loan_id') == $loan->id ? 'selected' : '' }}>
                    Loan #{{ $loan->id }} - {{ $loan->loanType->name }} - Amount: {{ number_format($loan->amount, 0) }}
                </option>
            @endforeach
        </select>
    </div>
    @endif

    @if(request('loan_id'))
    <div class="mb-3">
        <label for="repayment_id" class="form-label">Repayment</label>
        <select name="repayment_id" id="repayment_id" class="form-select" required onchange="this.form.submit()">
            <option value="">Select Repayment</option>
            @foreach($repayments as $repayment)
                <option value="{{ $repayment->id }}" {{ request('repayment_id') == $repayment->id ? 'selected' : '' }}>
                    Installment #{{ $repayment->installment_number }} - Amount: {{ $repayment->amount }}
                </option>
            @endforeach
        </select>
    </div>
    @endif
</form>

@if(request('repayment_id'))
<form method="POST" action="{{ route('admin.payments.store') }}">
    @csrf

    <input type="hidden" name="user_id" value="{{ request('user_id') }}">
    <input type="hidden" name="loan_id" value="{{ request('loan_id') }}">
    <input type="hidden" name="repayment_id" value="{{ request('repayment_id') }}">

    <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input type="text" name="amount" id="amount" class="form-control" value="{{ $selectedRepayment->amount ?? '' }}" readonly>
    </div>

    <div class="mb-3">
        <label for="method" class="form-label">Payment Method</label>
        <select name="method" id="method" class="form-select" required>
            <option value="bkash">Bkash</option>
            <option value="nagad">Nagad</option>
            <option value="rocket">Rocket</option>
            <option value="bank">Bank</option>
            <option value="cash">Cash</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="transaction_id" class="form-label">Transaction ID</label>
        <input type="text" name="transaction_id" id="transaction_id" class="form-control" >
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select" required>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
            <option value="failed">Failed</option>
        </select>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Create Payment</button>
    </div>
</form>
@endif
@endsection


<script>
function fetchLoans(userId) {
    const loanSelect = document.getElementById('loan_id');
    loanSelect.innerHTML = '<option value="">Select Loan</option>';
    document.getElementById('repayment_id').innerHTML = '<option value="">Select Repayment</option>';
    document.getElementById('amount').value = '';

    if (!userId) return;

    fetch(`/admin/payments/get-loans/${userId}`)
        .then(response => response.json())
        .then(data => {
            data.loans.forEach(loan => {
                const option = document.createElement('option');
                option.value = loan.id;
                option.textContent = `Loan #${loan.id}`;
                loanSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching loans:', error));
}

function fetchRepayments(loanId) {
    const repaymentSelect = document.getElementById('repayment_id');
    repaymentSelect.innerHTML = '<option value="">Select Repayment</option>';
    document.getElementById('amount').value = '';

    if (!loanId) return;

    fetch(`/admin/payments/get-repayments/${loanId}`)
        .then(response => response.json())
        .then(data => {
            data.repayments.forEach(repayment => {
                const option = document.createElement('option');
                option.value = repayment.id;
                option.textContent = `Installment #${repayment.installment_number}`;
                repaymentSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching repayments:', error));
}

function fetchAmount(repaymentId) {
    const amountInput = document.getElementById('amount');

    if (!repaymentId) {
        amountInput.value = '';
        return;
    }

    fetch(`/admin/payments/get-repayment-details/${repaymentId}`)
        .then(response => response.json())
        .then(data => {
            amountInput.value = data.amount || '';
        })
        .catch(error => console.error('Error fetching repayment details:', error));
}
</script>
