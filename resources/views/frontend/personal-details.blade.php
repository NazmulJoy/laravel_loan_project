@extends('frontend.layout')

@section('title', 'Personal_details - My Laravel Website')

@section('content')
<main>
    <!-- Breadcrumb Start -->
    <section class="breadcrumb-area">
        <div class="breadcrumb-widget pt-200 pb-100" style="background-image: url('{{ asset('assetsfront/img/breadcrumb/bg-1.png') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-content pt-95">
                            <h1>Personal Details</h1>
                            <ul>
                                <li><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li>Personal Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    

    @if(!$loanDetails)
        <div class="alert alert-warning text-center">
            Please complete the loan details first. You cannot submit this form without loan details.
        </div>
    @endif
    
    <!-- Personal Details Start -->
    <section class="loan-deatils-area bg_disable pt-130 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="stepper-widget mt-sm-5 px-3 px-sm-0">
                        <ul>
                            <li class="complete mt-0"><a href="{{ route('loan.details1') }}">
                                    <div class="number"><i class="icon_check"></i> <span>1</span></div> Loan Details
                                </a>
                            </li>
                            <li class="active"><a href="{{ route('personal.details') }}">
                                    <div class="number"><i class="icon_check"></i> <span>2</span></div> Personal Details
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="loan-details-widget">
                        <form action="{{ route('save.personal.details') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                                <!-- Full Name -->
                                <div class="col-md-6">
                                    <label class="label" for="name">Full Name*</label>
                                    <input id="name" class="form-control" type="text" name="name" 
                                           value="{{ old('name', auth()->user()->name ?? '') }}" 
                                           {{ auth()->check() ? 'readonly' : '' }} required>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label class="label" for="email">Email*</label>
                                    <input id="email" class="form-control" type="email" name="email" 
                                           value="{{ old('email', auth()->user()->email ?? '') }}" 
                                           {{ auth()->check() ? 'readonly' : '' }} required>
                                </div>

                                <!-- Date of Birth -->
                                <div class="col-md-6">
                                    <label class="label" for="dob">Date of Birth*</label>
                                    <input id="dob" class="form-control" type="date" name="date_of_birth" 
                                           value="{{ old('date_of_birth', auth()->user()->date_of_birth ?? '') }}" required>
                                </div>

                                <!-- Marital Status -->
                                <div class="col-md-6">
                                    <label class="label mb-4">Marital Status*</label>
                                    <div class="form-check form-check-inline me-5">
                                        <input class="form-check-input" type="radio" name="marital_status" 
                                               id="single" value="single" {{ old('marital_status', auth()->user()->marital_status ?? '') == 'single' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="single">Single</label>
                                    </div>
                                    <div class="form-check form-check-inline me-5">
                                        <input class="form-check-input" type="radio" name="marital_status" 
                                               id="married" value="married" {{ old('marital_status', auth()->user()->marital_status ?? '') == 'married' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="married">Married</label>
                                    </div>
                                </div>

                                <!-- Mobile Number -->
                                <div class="col-md-6">
                                    <label class="label" for="mobile_number">Mobile Number*</label>
                                    <input id="mobile_number" class="form-control" type="text" name="mobile_number" 
                                           value="{{ old('mobile_number', auth()->user()->mobile_number ?? '') }}" placeholder="+880123456789" required>
                                </div>

                                <!-- Present Address -->
                                <div class="col-md-12">
                                    <label class="label" for="present_address">Present Address*</label>
                                    <input id="present_address" class="form-control" type="text" name="present_address" 
                                           value="{{ old('present_address', auth()->user()->present_address ?? '') }}" required>
                                </div>

                                <!-- State -->
                                <div class="col-md-4">
                                    <label class="label" for="state">State*</label>
                                    <input id="state" class="form-control" type="text" name="state" 
                                           value="{{ old('state', auth()->user()->state ?? '') }}" required>
                                </div>

                                <!-- City -->
                                <div class="col-md-4">
                                    <label class="label" for="city">City*</label>
                                    <input id="city" class="form-control" type="text" name="city" 
                                           value="{{ old('city', auth()->user()->city ?? '') }}" required>
                                </div>

                                <!-- Postal Code -->
                                <div class="col-md-4">
                                    <label class="label" for="postal_code">Postal / Zip Code*</label>
                                    <input id="postal_code" class="form-control" type="text" name="postal_code" 
                                           value="{{ old('postal_code', auth()->user()->postal_code ?? '') }}" required>
                                </div>

                                <!-- Profession -->
                                <div class="col-md-6">
                                    <label class="label" for="profession">Profession</label>
                                    <input id="profession" class="form-control" type="text" name="profession" 
                                           value="{{ old('profession', auth()->user()->profession ?? '') }}" required>
                                </div>

                                <!-- Yearly Salary -->
                                <div class="col-md-6">
                                    <label class="label" for="yearly_salary">Yearly Salary</label>
                                    <input id="yearly_salary" class="form-control" type="number" name="yearly_salary" 
                                           value="{{ old('yearly_salary', auth()->user()->yearly_salary ?? '') }}" required>
                                </div>

                                <!-- Profile Picture -->
                                <div class="col-md-12">
                                    <label class="label" for="image">Upload Profile Picture</label>
                                
                                    @if(auth()->check())
    @if(auth()->user()->image)
        <div class="mb-3">
            <label>Current Profile Picture:</label>
            <img src="{{ asset('images/' . auth()->user()->image) }}" alt="Profile Image" style="max-width: 150px; height: auto;">
        </div>
    @endif
@else
    <p>You are not logged in.</p>
@endif

                                
                                    <input id="image" class="form-control" type="file" name="image" accept="image/*">
                                </div>
                            </div>

                            <div class="row mt-60">
                                <div class="col-md-12">
                                    <div class="nav-btn d-flex flex-wrap justify-content-between">
                                        <a href="{{ route('loan.details1') }}" class="prev-btn theme-btn-primary_alt theme-btn">
                                            <i class="arrow_left"></i>Previous
                                        </a>
                                        <button type="submit" class="next-btn theme-btn-primary_alt theme-btn" 
                                        @if(!$loanDetails) disabled @endif>
                                        Submit
                                    </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
   
</main>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const user = @json(auth()->user());

        if (user) {
            document.getElementById('name').value = user.name || '';
            document.getElementById('email').value = user.email || '';
            
        }
    });
    window.addEventListener("beforeunload", function () {
    fetch("{{ route('clear.loan.session') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        }
    });
});
</script>

@endsection
