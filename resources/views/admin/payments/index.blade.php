@extends('admin.layout.layout')

@php
$title = 'dashboard';
$subTitle = 'Payment Details';
$script = '<script>
let table = new DataTable("#dataTable");
</script>';
@endphp

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('error') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="d-flex">
        <div class="me-3" style="width: 30%; max-width: 300px;">
            <label for="statusFilter" class="form-label">Filter by Status:</label>
            <select id="statusFilter" class="form-select" onchange="filterStatus()">
                <option value="">Select Status</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Failed</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            </select>
        </div>

        <div class="me-3" style="width: 30%; max-width: 300px;">
    <label for="repaymentFilter" class="form-label">Filter by Repayment ID:</label>
    <input type="text" class="form-control" id="repaymentFilter" placeholder="Enter Repayment ID" value="{{ request('repayment_id') }}" oninput="filterRepaymentId()">
</div>

    </div>

    <div>
        <a href="{{ route('admin.payments.create') }}" class="btn btn-primary d-inline-flex align-items-center">
            <iconify-icon icon="mdi:plus-circle-outline"></iconify-icon>
            <span class="ms-1">Create Payment</span>
        </a>
    </div>
</div>

<div class="card basic-data-table">
    <div class="card-header">
        <h5 class="card-title mb-0">Payment Details</h5>
    </div>
    <div class="card-body">
        <table class="table bordered-table mb-0" id="dataTable" data-page-length="10">
            <thead>
                <tr>
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;">Repayment ID</th>
                    <th style="text-align: center;">User</th>
                    <th style="text-align: center;">Amount</th>
                    <th style="text-align: center;">Method</th>
                    <th style="text-align: center;">Transaction ID</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $index => $payment)
                <tr>
                    <td style="text-align: center;">{{ $index + 1 }}</td>
                    <td style="text-align: center;">{{ $payment->repayment_id }}</td>
                    <td style="text-align: center;">{{ $payment->user->name ?? 'N/A' }}</td>
                    <td style="text-align: center;">{{ number_format($payment->amount, 2) }}</td>
                    <td style="text-align: center;">{{ $payment->method }}</td>
                    <td style="text-align: center;">{{ $payment->transaction_id ?? 'N/A' }}</td>
                    <td style="text-align: center;">
                        <form action="{{ route('admin.payments.updateStatus', $payment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-select" onchange="this.form.submit()">
                                <option value="completed" {{ $payment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="failed" {{ $payment->status == 'failed' ? 'selected' : '' }}>Failed</option>
                                <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            </select>
                        </form>
                    </td>
                    <td style="text-align: center;">
                        
                        
                        <button type="button" 
    class="w-32-px h-32-px bg-info-focus text-info-main rounded-circle d-inline-flex align-items-center justify-content-center" 
    data-bs-toggle="modal" 
    data-bs-target="#viewModal" 
    data-payment-user="{{ $payment->user->name ?? 'N/A' }}" 
    data-installment-number="{{ $payment->repayment->installment_number ?? 'N/A' }}" 
    data-repayment-amount="{{ $payment->repayment->amount ?? 0 }}" 
    data-repayment-status="{{ $payment->repayment->status ?? 'N/A' }}" 
    data-loan-type="{{ $payment->repayment->loan->loanType->name ?? 'N/A' }}" 
    data-loan-amount="{{ $payment->repayment->loan->amount ?? 0 }}" 
    data-loan-interest-rate="{{ $payment->repayment->loan->interest_rate ?? 'N/A' }}" 
    data-loan-duration="{{ $payment->repayment->loan->duration ?? 'N/A' }}" 
    data-payment-status="{{ $payment->status ?? 'N/A' }}">
    👁️
</button>


                        <!-- Edit Button -->
                        <a href="{{ route('admin.payments.edit', $payment->id) }}" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="lucide:edit"></iconify-icon>
                        </a>
                        <!-- Delete Button -->
                        <button type="button" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $payment->id }}">
                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Payment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>User:</strong> <span id="paymentUser"></span></p>
                <p><strong>Installment Number:</strong> <span id="installmentNumber"></span></p>
                <p><strong>Repayment Amount:</strong> <span id="repaymentAmount"></span></p>
                <p><strong>Repayment Status:</strong> <span id="repaymentStatus"></span></p>
                <hr>
                <p><strong>Loan Type:</strong> <span id="loanType"></span></p>
                <p><strong>Loan Amount:</strong> <span id="loanAmount"></span></p>
                <p><strong>Interest Rate:</strong> <span id="interestRate"></span></p>
                <p><strong>Loan Duration:</strong> <span id="loanDuration"></span></p>
                <hr>
                <p><strong>Payment Status:</strong> <span id="paymentStatus"></span></p>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this payment?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

<script>
    function filterStatus() {
        const status = document.getElementById("statusFilter").value;
        const repaymentId = document.getElementById("repaymentFilter").value;
        let url = `?status=${status}`;
        if (repaymentId) url += `&repayment_id=${repaymentId}`;
        window.location.href = url;
    }

    let debounceTimer;

function filterRepaymentId() {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(() => {
        const status = document.getElementById("statusFilter").value;
        const repaymentId = document.getElementById("repaymentFilter").value;
        let url = `?repayment_id=${repaymentId}`;
        if (status) url += `&status=${status}`;
        window.location.href = url;
    }, 300); // 300 milliseconds delay
}

    document.addEventListener('DOMContentLoaded', () => {
    // Attach event listener to all buttons opening the Payment Details modal
    document.querySelectorAll('[data-bs-target="#viewModal"]').forEach(button => {
        button.addEventListener('click', function () {
            // Retrieve data attributes from the button
            const paymentUser = this.getAttribute('data-payment-user');
            const installmentNumber = this.getAttribute('data-installment-number');
            const repaymentAmount = this.getAttribute('data-repayment-amount');
            const repaymentStatus = this.getAttribute('data-repayment-status');
            const loanType = this.getAttribute('data-loan-type');
            const loanAmount = this.getAttribute('data-loan-amount');
            const loanInterestRate = this.getAttribute('data-loan-interest-rate');
            const loanDuration = this.getAttribute('data-loan-duration');
            const paymentStatus = this.getAttribute('data-payment-status');

            // Populate the modal with these values
            document.getElementById('paymentUser').textContent = paymentUser;
            document.getElementById('installmentNumber').textContent = installmentNumber;
            document.getElementById('repaymentAmount').textContent = `${repaymentAmount} BDT`;
            document.getElementById('repaymentStatus').textContent = repaymentStatus;
            document.getElementById('loanType').textContent = loanType;
            document.getElementById('loanAmount').textContent = `${loanAmount} BDT`;
            document.getElementById('interestRate').textContent = `${loanInterestRate}%`;
            document.getElementById('loanDuration').textContent = `${loanDuration} Years`;
            document.getElementById('paymentStatus').textContent = paymentStatus;
        });
    });
});



</script>
