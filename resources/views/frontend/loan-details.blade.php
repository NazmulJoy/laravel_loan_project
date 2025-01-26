@extends('frontend.layout') 

@section('title', 'Loan - My Laravel Website')

@section('content')
<main>
    <!-- Breadcrumb Start -->
    <section class="breadcrumb-area">
        <div class="breadcrumb-widget pt-200 pb-110" style="background-image: url('{{ asset('assetsfront/img/breadcrumb/bg-1.png') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-content pt-85">
                            <h1>Loan Details</h1>
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li>Loan Application</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <!-- Loan Details Start -->
    <section class="loan-details-area bg_disable pt-130 pb-120">
        <div class="container">
            <div class="row">
              
                <div class="col-lg-3">
                    <div class="stepper-widget mt-sm-5 px-3 px-sm-0">
                        <ul>
                            <li class="active mt-0">
                                <a href="{{ route('loan.details1') }}">
                                    <div class="number"><i class="icon_check"></i> <span>1</span></div>
                                    Loan Details
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('personal.details') }}">
                                    <div class="number"><span>2</span></div>
                                    Personal Details
                                </a>
                            </li>
                           
                        </ul>
                    </div>
                </div>

          
                <div class="col-lg-9">
                    <div class="loan-details-widget">
                        <form action="{{ route('loan.details') }}" method="POST">
                            @csrf
                     
                            <div class="row mb-35 gy-4">
                                @foreach ($loanTypes as $loanType)
                                    <div class="col-lg-3 col-md-6">
                                        <input class="select-loan-type-radio" 
                                               name="loan_type_id" 
                                               type="radio" 
                                               id="loanType_{{ $loanType->id }}" 
                                               value="{{ $loanType->id }}" 
                                               data-min="{{ $loanType->min_amount }}"
                                               data-max="{{ $loanType->max_amount }}"
                                               data-default-rate="{{ $loanType->default_interest_rate }}">
                                        <label for="loanType_{{ $loanType->id }}" class="loan-type">
                                           
                                            <span>{{ $loanType->name }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                     
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <label class="label" for="loanAmount">Your Loan Amount</label>
                                    <div class="input-field">
                                        <span>৳</span>
                                        <input type="number" 
                                               id="loanAmount" 
                                               name="loan_amount" 
                                               class="form-control" 
                                               required>
                                    </div>
                                    <small class="text-muted">
                                        Min: <span id="minAmount">0</span> | Max: <span id="maxAmount">0</span>
                                    </small>
                                </div>

                           
                                <div class="col-md-6">
                                    <label class="label" for="interestRate">Interest Rate (%)</label>
                                    <div class="input-field">
                                        <input type="number" 
                                               id="interestRate" 
                                               name="interest_rate" 
                                               class="form-control" 
                                               step="0.01" 
                                               readonly>
                                    </div>
                                    <small class="text-muted">Default: <span id="defaultRate">0%</span></small>
                                </div>
                            </div>

                          
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <label class="label" for="loanDuration">Loan Duration (Years)</label>
                                    <input type="number" 
                                           id="loanDuration" 
                                           name="loan_duration" 
                                           class="form-control" 
                                           min="1" 
                                           required>
                                </div>
                            </div>

                          
                            <div class="row mt-60">
                                <div class="col-md-12">
                                    <div class="nav-btn d-flex justify-content-end">
                                        @if(auth()->check()) 
                                      
                                        <button class="theme-btn-primary_alt theme-btn next-btn" type="submit">
                                            Next <i class="arrow_right"></i>
                                        </button>
                                    @else
                                       
                                        <button class="theme-btn-primary_alt theme-btn next-btn" type="button" disabled>
                                            Please log in to proceed <i class="arrow_right"></i>
                                        </button>
                                    @endif
                                    
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Loan Details End -->
</main>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const loanTypeRadios = document.querySelectorAll('.select-loan-type-radio');
    const minAmountSpan = document.getElementById('minAmount');
    const maxAmountSpan = document.getElementById('maxAmount');
    const defaultRateSpan = document.getElementById('defaultRate');
    const interestRateInput = document.getElementById('interestRate');
    const loanAmountInput = document.getElementById('loanAmount');
    const loanDurationInput = document.getElementById('loanDuration');

    let baseInterestRate = 0; 

    loanTypeRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            const minAmount = radio.dataset.min;
            const maxAmount = radio.dataset.max;
            baseInterestRate = parseFloat(radio.dataset.defaultRate); 

            
            minAmountSpan.textContent = minAmount;
            maxAmountSpan.textContent = maxAmount;
            defaultRateSpan.textContent = `${baseInterestRate}%`;

           
            loanAmountInput.min = minAmount;
            loanAmountInput.max = maxAmount;

         
            loanAmountInput.value = minAmount;
            loanDurationInput.value = 1; 
            updateInterestRate(); 
        });
    });

 
    function updateInterestRate() {
        const duration = parseInt(loanDurationInput.value, 10) || 1; 
        const adjustedRate = baseInterestRate + (duration - 1) * 0.50; 
        interestRateInput.value = adjustedRate.toFixed(2); 
    }

    
    loanDurationInput.addEventListener('input', () => {
        const duration = parseInt(loanDurationInput.value, 10);
        if (duration < 1) {
            loanDurationInput.setCustomValidity('Duration must be at least 1 year');
        } else {
            loanDurationInput.setCustomValidity('');
        }
        updateInterestRate(); 
    });

 
    loanAmountInput.addEventListener('input', () => {
        const amount = parseFloat(loanAmountInput.value);
        const min = parseFloat(loanAmountInput.min);
        const max = parseFloat(loanAmountInput.max);

        if (amount < min || amount > max) {
            loanAmountInput.setCustomValidity(`Amount must be between ${min} and ${max}`);
        } else {
            loanAmountInput.setCustomValidity('');
        }
    });


    const firstLoanType = document.querySelector('.select-loan-type-radio:checked');
    if (firstLoanType) {
        firstLoanType.dispatchEvent(new Event('change'));
    }
});

</script>

@endsection