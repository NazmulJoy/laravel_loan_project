@extends('admin.layout.layout')

@php
$title = 'dashboard';
$subTitle = 'Repayment Details';
$script = '<script>
let table = new DataTable("#dataTable");
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
';
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

<div class="mb-3" style="width: 30%; max-width: 300px;">
    <label for="loanFilter" class="form-label">Filter by Loan ID:</label>
    <input type="text" class="form-control" id="loanFilter" placeholder="Enter Loan ID" value="{{ request('loan_id') }}" oninput="filterLoanId()">
</div>

<div class="mb-3" style="width: 30%; max-width: 300px;">
    <label for="statusFilter" class="form-label">Filter by Status:</label>
    <select id="statusFilter" class="form-select" onchange="filterStatus()">
        <option value="">Select Status</option>
        <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="overdue" {{ request('status') == 'overdue' ? 'selected' : '' }}>Overdue</option>
    </select>
</div>


<div class="card basic-data-table">
    <div class="card-header">
        <h5 class="card-title mb-0">Repayment Details</h5>
    </div>
    <div class="card-body">
        <table class="table bordered-table mb-0" id="dataTable" data-page-length="10">
    <thead>
        <tr>
            <th scope="col" style="text-align: center;">R.I</th>
            <th scope="col" style="text-align: center;">Loan ID</th>
            <th scope="col" style="text-align: center;">Borrower Name</th>
            <th scope="col" style="text-align: center;">Installment #</th>
            <th scope="col" style="text-align: center;">Due Date</th>
            <th scope="col" style="text-align: center;">Status</th>
            <th scope="col" style="text-align: center;">Installment Amount</th>
            <th scope="col" style="text-align: center;">Total Paid Amount</th>
            <th scope="col" style="text-align: center;">Remaining Loan Amount</th>
            <th scope="col" style="text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>
       
            @php
                
                $loan = $repayments->first()->loan ?? null;
                $loanAmount = $loan->amount ?? 0;
                $interestRate = $loan->interest_rate ?? 0;
                $duration = $loan->duration ?? 0;
                $totalInterest = ($loanAmount * $interestRate * $duration) / 100;
                $totalPayableAmount = $loanAmount + $totalInterest;
                $cumulativePaidAmount = 0; 
            @endphp

            @foreach($repayments as $index => $repayment)
    <tr>
        <td style="text-align: center;">{{ $repayment->id }}</td>
        <td style="text-align: center;">{{ $repayment->loan_id }}</td>
        <td style="text-align: center;">{{ $repayment->loan->user->name ?? 'N/A' }}</td>
        <td style="text-align: center;">{{ $repayment->installment_number }}</td>
        <td style="text-align: center;">{{ \Carbon\Carbon::parse($repayment->due_date)->format('d M Y') }}</td>
        <td style="text-align: center;">
            <form action="{{ route('admin.repayments.updateStatus', $repayment->id) }}" method="POST" class="d-inline">
                @csrf
                @method('PUT')
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="paid" {{ $repayment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="pending" {{ $repayment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="overdue" {{ $repayment->status == 'overdue' ? 'selected' : '' }}>Overdue</option>
                </select>
            </form>
        </td>
        <td style="text-align: center;">{{ number_format($repayment->amount) }}</td>
        <td style="text-align: center;">
            @php
                if ($repayment->status === 'paid') {
                    $cumulativePaidAmount += $repayment->amount;
                }
            @endphp
            {{ number_format($cumulativePaidAmount) }}
        </td>
        <td style="text-align: center;">
            @php
                $remainingAmount = $totalPayableAmount - $cumulativePaidAmount;
            @endphp
            {{ number_format($remainingAmount) }}
        </td>
        <td style="text-align: center;">
            <!-- Delete Button for Repayments -->
<button type="button" 
        class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center" 
        onclick="confirmDelete(this)" 
        data-id="{{ $repayment->id }}">
    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
</button>

        </td>
    </tr>
@endforeach

      
    </tbody>
</table>

        
        
    </div>
</div>




@endsection

<script>
    let debounceTimer;

$(document).ready(function() { 
    $('#dataTable').DataTable({ 
        "language": { 
            "emptyTable": "No records found for the selected status." 
        }, 
        "drawCallback": function(settings) { 
            if (settings.aoData.length === 0) { 
                $('#dataTable tbody').html('<tr><td colspan="10" style="text-align: center;">No records found for the selected status.</td></tr>'); 
            } 
        } 
    });
});

function filterStatus() {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(() => {
        const status = document.getElementById("statusFilter").value;
        const loanId = document.getElementById("loanFilter").value;
        let url = `?status=${status}`;
        if (loanId) url += `&loan_id=${loanId}`;
        window.location.href = url;
    }, 300); 
}

function filterLoanId() {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(() => {
        const status = document.getElementById("statusFilter").value;
        const loanId = document.getElementById("loanFilter").value;
        let url = `?loan_id=${loanId}`;
        if (status) url += `&status=${status}`;
        window.location.href = url;
    }, 300); 
}

  function confirmDelete(button) {
    const repaymentId = button.getAttribute('data-id');
    const deleteUrl = `/laravel_loan/admin/repayments/${repaymentId}`; 

    Swal.fire({
        text: "Are you sure you want to delete this?", 
        icon: null, 
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel',
        position: 'top', 
        width: '400px',
        padding: '0.5rem', 
        customClass: {
            popup: 'compact-popup', 
        },
    }).then((result) => {
        if (result.isConfirmed) {
            
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = deleteUrl;

           
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = '{{ csrf_token() }}';

            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';

     
            form.appendChild(csrfInput);
            form.appendChild(methodInput);

           
            document.body.appendChild(form);
            form.submit();
        }
    });
}

</script>
