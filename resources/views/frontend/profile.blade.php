@extends('frontend.layout') 

@section('title', 'Profile - My Laravel Website')

@section('content')
<main>
<section class="app-showcase-area">
    <img class="shape_img" src="{{ asset('assetsfront/img/saas-app/grid-two.png') }}" alt="">
    <div class="container">
        <div class="saas-section-title text-center mb-60 wow fadeInUp" data-wow-delay="0.2s">
            <h2>Manage your <span>Profile</span> </h2>
        </div>
    </div>

    <!-- Profile Section -->
    <div class="container">
         <!-- Edit Profile Button -->
         <div class="d-flex justify-content-between border-top pt-40 mt-4">
            <button class="theme-btn theme-btn-primary_alt theme-btn-lg" data-bs-toggle="modal"
                data-bs-target="#editProfileModal"><i class="icon_ribbon_alt t"></i> Edit Profile</button>
        </div>
        <div class="row align-items-center">
           
            <div class="col-lg-3">
                <div class="round wow floatingBubbles" data-wow-delay="0.5s"></div>
                <div class="app-showcase-item bg-light p-4 rounded shadow-sm text-center" style="max-width: 300px; margin: 0 auto;">
                    <h4>Photo</h4>
                    <img class="img-fluid rounded" 
     src="{{ asset($user->image ? 'images/' . $user->image : 'images/user-6380868_1280 (1).jpg') }}" 
     alt="{{ $user->name }}" 
     style="max-width: 100%; height: auto; border-radius: 10px;">

                </div>
            </div>

            <!-- User Information -->
            <div class="col-lg-9">
                <div class="app-showcase-item" style="padding-bottom: 30px;">
                    <div class="round wow floatingBubbles" data-wow-delay="0.3s"></div>
                    <h4 class="wow fadeInUp mb-4" data-wow-delay="0.5s" style="font-size: 1.5rem;">Profile Information</h4>
                    <ul class="wow fadeInUp list-unstyled" data-wow-delay="0.6s" style="font-size: 1.25rem; line-height: 1.8;">
                        <li><strong>Name:</strong> {{ $user->name }}</li>
                        <li><strong>Email:</strong> {{ $user->email }}</li>
                        <li><strong>Date of Birth:</strong> {{ $user->date_of_birth }}</li>
                        <li><strong>Marital Status:</strong> {{ $user->marital_status }}</li>
                        <li><strong>Mobile Number:</strong> {{ $user->mobile_number }}</li>
                        <li><strong>Address:</strong> {{ $user->present_address }}</li>
                        <li><strong>City:</strong> {{ $user->city }}</li>
                        <li><strong>State:</strong> {{ $user->state }}</li>
                        <li><strong>Postal Code:</strong> {{ $user->postal_code }}</li>
                        <li><strong>Yearly Salary:</strong> {{ $user->yearly_salary ? 'BDT ' . number_format($user->yearly_salary, 2) : 'N/A' }}</li>
                        <li><strong>Profession:</strong> {{ $user->profession ?? 'N/A' }}</li>
                    </ul>
                </div>
            </div>
        </div>

       
    </div>
</section>

<!-- Edit Profile Modal -->
<div class="modal job-application-modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div>
                    <h4 class="job-title">Edit Profile</h4>
                </div>

                <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row gy-4 mt-4">
                        <div class="col-md-6">
                            <label class="label" for="modalName">Name<span>*</span></label>
                            <input id="modalName" name="name" class="form-control" type="text" value="{{ $user->name }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="label" for="modalEmail">Email<span>*</span></label>
                            <input id="modalEmail" name="email" class="form-control" type="email" value="{{ $user->email }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="label" for="modalDOB">Date of Birth</label>
                            <input id="modalDOB" name="date_of_birth" class="form-control" type="date" value="{{ $user->date_of_birth }}">
                        </div>

                        <div class="col-md-6">
                            <label class="label" for="modalPhone">Mobile Number</label>
                            <input id="modalPhone" name="mobile_number" class="form-control" type="tel" value="{{ $user->mobile_number }}">
                        </div>

                        <div class="col-md-12">
                            <label class="label" for="modalAddress">Address</label>
                            <textarea id="modalAddress" name="present_address" class="form-control" rows="2">{{ $user->present_address }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="label" for="modalCity">City</label>
                            <input id="modalCity" name="city" class="form-control" type="text" value="{{ $user->city }}">
                        </div>

                        <div class="col-md-6">
                            <label class="label" for="modalState">State</label>
                            <input id="modalState" name="state" class="form-control" type="text" value="{{ $user->state }}">
                        </div>

                        <div class="col-md-6">
                            <label class="label" for="modalPostalCode">Postal Code</label>
                            <input id="modalPostalCode" name="postal_code" class="form-control" type="text" value="{{ $user->postal_code }}">
                        </div>

                        <div class="col-md-6">
                            <label class="label" for="modalSalary">Yearly Salary</label>
                            <input id="modalSalary" name="yearly_salary" class="form-control" type="number" step="0.01" value="{{ $user->yearly_salary }}">
                        </div>

                        <div class="col-md-6">
                            <label class="label" for="modalProfession">Profession</label>
                            <input id="modalProfession" name="profession" class="form-control" type="text" value="{{ $user->profession }}">
                        </div>

                        <div class="col-md-6">
                            <label class="label" for="modalImage">Profile Picture</label>
                            <input id="modalImage" name="image" class="form-control" type="file">
                        </div>

                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <button type="button" class="theme-btn theme-btn-primary_alt" data-bs-dismiss="modal">
                                    <i class="arrow_left"></i> Cancel
                                </button>
                                <button type="submit" class="theme-btn theme-btn-primary_alt">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
