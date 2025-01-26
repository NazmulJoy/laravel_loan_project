@extends('frontend.layout') 

@section('title', 'My Loan - My Laravel Website')

@section('content')
<section class="banner-area-4 pt-145" id="banner_animation">
    <div class="container">
        <div class="row align-items-center pt-75 pb-60">
            <div class="col-lg-6 ">
                <div class="banner-content mb-5 mb-sm-0">

                    <h1 class="wow fadeInUp mb-0">Get your loan effortlessly</h1>

                    <p class="wow fadeInUp  mt-20" data-wow-delay="0.2s">No hidden charges—get the financial support you
                        need, when you need it.</p>
                    <a href="{{ route('loan.details1') }}" class="wow fadeInUp theme-btn theme-btn-outlined_alt mt-50"
                        data-wow-delay="0.4s">Visit loan types</a>
                </div>
            </div>
            <div class="col-md-6 mx-auto text-center text-sm-end">
                <div class="hero-img wow fadeInRight">
                    <div class="shape" data-parallax='{"x": -120, "y": 90, "rotateZ":0}'>
                        <img data-depth="-0.06" class="layer " src="{{asset('assetsfront/img/card/hero-img-2.png')}}"
                            alt="img">
                    </div>
                    <div class="shape" data-parallax='{"x": -70, "y": 0, "rotateZ":190}'>
                        <img src="{{asset('assetsfront/img/card/hero-img-3.png')}}" alt="img">
                    </div>
                    <div class="shape" data-parallax='{"x": -70, "y": 0, "rotateX":190}'>
                        <img src="{{asset('assetsfront/img/card/hero-img-4.png')}}" alt="img">
                    </div>
                    <div class="shape" data-parallax='{"x": -90, "y": 20, "rotateZ":0}'>
                        <img data-depth="-0.05" class="layer " src="{{asset('assetsfront/img/card/hero-img-5.png')}}"
                            alt="img">
                    </div>
                    <div class="shape" data-parallax='{"x": -250, "y": 100, "rotateY":360}'>
                        <img data-depth="0.05" class="layer " src="{{asset('assetsfront/img/card/hero-img-6.png')}}"
                            alt="img">
                    </div>
                    <div class="shape" data-parallax='{"x": 0, "y": 150, "rotateZ":0}'>
                        <img data-depth="-0.09" class="layer " src="{{asset('assetsfront/img/card/hero-img-7.png')}}"
                            alt="img">
                    </div>
                    <div class="shape" data-parallax='{"x": 0, "y": -90, "rotateZ":0}'>
                        <img src="{{asset('assetsfront/img/card/hero-img-8.png')}}" alt="img">
                    </div>
                    <div class="shape" data-parallax='{"x": 75, "y": -20, "rotateZ":0}'>
                        <img data-depth="0.04" class="layer " src="{{asset('assetsfront/img/card/hero-card.png')}}"
                            alt="img">
                    </div>
                    <img data-parallax='{"x": 50, "y": -50, "rotateZ":0}' class="person-img "
                        src="{{asset('assetsfront/img/card/hero-img.png')}}" alt="card">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="manage-c-finance pt-125 pb-140">
    <div class="container">
        <h1 class="text-center wow fadeInUp mb-5">My Loans</h1>
        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade text-center show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Active Loan Details -->
        @if ($activeLoan)
            <div class="card shadow-lg section-title bg-light mb-5">
                <div class="card-body">
                    <h2 class="wow fadeInUp">Active Loan Overview</h2>
                    <p><strong>Loan Type:</strong> {{ $activeLoan->loanType->name }}</p>
                    <p><strong>Amount:</strong> BDT {{ number_format($activeLoan->amount) }}</p>
                    <p><strong>Total Payable Amount:</strong> BDT {{ number_format($activeLoanDetails['totalPayable']) }}
                    </p>
                    <p><strong>Paid Amount:</strong> BDT {{ number_format($activeLoanDetails['paidAmount']) }}</p>
                    <p><strong>Remaining Amount:</strong> BDT {{ number_format($activeLoanDetails['remainingAmount']) }}</p>
                    <p><strong>Remaining Installments:</strong> {{ $activeLoanDetails['remainingInstallments'] }}</p>
                    <p>
                        <strong>Overdue Installments:</strong>
                        @if (count($activeLoanDetails['overdueInstallments']))
                            {{ implode(', ', $activeLoanDetails['overdueInstallments']) }}
                        @else
                            None
                        @endif
                    </p>
                </div>
            </div>
        @endif

        <!-- Loan Tabs -->
        <ul class="nav nav-tabs" id="loanTabs" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" id="loan-details-tab" data-bs-toggle="tab"
                    data-bs-target="#loan-details" role="tab" aria-controls="loan-details" aria-selected="true">
                    Loan Details
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="repayments-tab" data-bs-toggle="tab" data-bs-target="#repayments"
                    role="tab" aria-controls="repayments" aria-selected="false">
                    Repayment Schedule
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="payment-history-tab" data-bs-toggle="tab" data-bs-target="#payment-history"
                    role="tab" aria-controls="payment-history" aria-selected="false">
                    Payment History
                </button>
            </li>
        </ul>

        <div class="tab-content" id="loanTabsContent">
            <!-- Loan Details Tab -->
            <div class="tab-pane fade section-title show active" id="loan-details" role="tabpanel"
                aria-labelledby="loan-details-tab">
                @foreach ($allloans as $loan)
                    <div class="card mt-4 shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title wow fadeInUp">Loan Type: {{ $loan->loanType->name }}</h4>
                            <p><strong>Amount:</strong> BDT {{ number_format($loan->amount, 2) }}</p>
                            <p><strong>Interest Rate:</strong> {{ $loan->interest_rate }}%</p>
                            <p><strong>Duration:</strong> {{ $loan->duration }} months</p>
                            <p><strong>Status:</strong> {{ $loan->status }}</p>
                            <p><strong>Approved At:</strong> {{ $loan->approved_at }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Repayment Schedule Tab -->
            <div class="tab-pane fade section-title bg-light" id="repayments" role="tabpanel"
                aria-labelledby="repayments-tab">
                @foreach ($loans as $loan)
                    <h4 class="mt-4">Loan: {{ $loan->loanType->name }}</h4>
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>Installment #</th>
                                <th>Due Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Paid At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loan->repayments as $repayment)
                                <tr class="{{ $repayment->status === 'overdue' ? 'table-danger' : '' }}">
                                    <td>{{ $repayment->installment_number }}</td>
                                    <td>{{ $repayment->due_date }}</td>
                                    <td>BDT {{ number_format($repayment->amount, 2) }}</td>
                                    <td>{{ ucfirst($repayment->status) }}</td>
                                    <td>{{ $repayment->paid_at ?? 'N/A' }}</td>
                                    <td>
                                        @if ($repayment->status === 'pending')
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#payModal"
                                                data-id="{{ $repayment->id }}" data-amount="{{ $repayment->amount }}">
                                                Pay
                                            </button>

                                        @else
                                            <span>Paid</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
            </div>

            <!-- Payment History Tab -->
            <div class="tab-pane fade section-title bg-light" id="payment-history" role="tabpanel"
                aria-labelledby="payment-history-tab">
                @foreach ($loans as $loan)
                    <h4 class="mt-4">Loan: {{ $loan->loanType->name }}</h4>
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th>Repayment #</th>
                                <th>Payment Amount</th>
                                <th>Method</th>
                                <th>Transaction ID</th>
                                <th>Status</th>
                                <th>Paid At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loan->repayments as $repayment)
                                @foreach ($repayment->payments as $payment)
                                    <tr>
                                        <td>{{ $repayment->installment_number }}</td>
                                        <td>BDT {{ number_format($payment->amount, 2) }}</td>
                                        <td>{{ ucfirst($payment->method) }}</td>
                                        <td>{{ $payment->transaction_id }}</td>
                                        <td>{{ ucfirst($payment->status) }}</td>
                                        <td>{{ $payment->created_at }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="security-area">
    <div class="security-priority pt-90 pb-95 text-center">
        <div class="shapes">
            <img src="{{asset('assetsfront/img/security-tips/shape-1.png')}}" alt="shape">
            <img src="{{asset('assetsfront/img/security-tips/shape-2.png')}}" alt="shape">
            <img src="{{asset('assetsfront/img/security-tips/shape-3.png')}}" alt="shape">
            <img src="{{asset('assetsfront/img/security-tips/shape-4.png')}}" alt="shape">
            <img src="{{asset('assetsfront/img/security-tips/shape-5.png')}}" alt="shape">
            <img src="{{asset('assetsfront/img/security-tips/shape-6.png')}}" alt="shape">
            <img src="{{asset('assetsfront/img/security-tips/shape-1.png')}}" alt="shape">
            <img data-parallax='{"x": -60, "y": 150, "rotateZ":-15}'
                src="{{asset('assetsfront/img/security-tips/shape-7.png')}}" alt="shape">
            <img data-parallax='{"x": 0, "y": -150, "rotateZ":0}'
                src="{{asset('assetsfront/img/security-tips/shape-8.png')}}" alt="shape">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 mx-auto">
                    <img src="{{asset('assetsfront/img/security-tips/security-priority.png')}}" alt="icon">
                    <h2 class="mt-4 mb-3">Your security. Our priority.</h2>
                    <p>We always have your security in mind. Rest easy knowing your data is protected with
                        128-bit encryption.
                </div>
            </div>
        </div>
    </div>
</section>
<section class="manage-c-finance pt-125 pb-140">
    <div class="container">
        <div class="row">
            <div class="col-md-12 position-relative">
                <div class="cta-4 cta-bg-primary">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="cta-content wow fadeInRight">
                                <h2 class="mb-10">Start your journey!</h2>
                                <p>Check our loan plans</p>
                                <div class="d-flex flex-column flex-sm-row mt-40">
                                    <input type="email" class="form-control" placeholder="Enter Email address">
                                    <a href="#" class="input-append theme-btn theme-btn-lg ms-sm-3">Subscribe</a>
                                </div>
                                <ul class="list-unstyled feature-list">
                                    <li><i class="fas fa-check-circle"></i> Get loan in 21 day</li>
                                    <li><i class="fas fa-check-circle"></i> No Spamming</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <img class="cta-img wow fadeInUp img-fluid"
                                src="{{asset('assetsfront/img/home-4/cta-Img.png')}}" alt="">
                            <img class="shape img-fluid" src="{{asset('assetsfront/img/home-4/cta-shape.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal job-application-modal fade" id="payModal" tabindex="-1" aria-labelledby="payModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div>
                    <h4 class="job-title">Make Payment</h4>
                </div>
                <form id="paymentForm" method="POST" action="{{ route('profile.makePayment') }}">
                    @csrf
                    <input type="hidden" id="repaymentId" name="repayment_id">
                    <div class="mb-3">
                        <label class="label">Amount (BDT)<span>*</span></label>
                        <input id="repaymentAmount" name="amount" class="form-control" type="text" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="label">Payment Method<span>*</span></label>
                        <select name="method" class="form-control" required>
                            <option value="" disabled selected>Select a method</option>
                            <option value="bkash">bKash</option>
                            <option value="nagad">Nagad</option>
                            <option value="rocket">Rocket</option>
                            <option value="bank">Bank</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="label">Transaction ID<span>*</span></label>
                        <input name="transaction_id" class="form-control" type="text" placeholder="Enter transaction ID"
                            required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="theme-btn theme-btn-primary_alt" data-bs-dismiss="modal">
                            <i class="arrow_left"></i> Cancel
                        </button>
                        <button type="submit" class="theme-btn theme-btn-primary_alt">Make Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const payModal = document.getElementById('payModal');
        payModal.addEventListener('show.bs.modal', (event) => {
            const button = event.relatedTarget;
            const repaymentId = button.getAttribute('data-id');
            const amount = button.getAttribute('data-amount');


            document.getElementById('repaymentId').value = repaymentId;
            document.getElementById('repaymentAmount').value = `BDT ${parseFloat(amount).toFixed(2)}`;
        });
    });
</script>
@endsection