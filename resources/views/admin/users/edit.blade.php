@extends('admin.layout.layout')

@php
    $title = 'Dashboard';
    $subTitle = 'Update User Information';
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

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Edit User</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" 
                    value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" 
                    value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="mobile_number" class="form-label">Mobile Number</label>
                <input type="text" name="mobile_number" id="mobile_number" class="form-control" 
                    value="{{ old('mobile_number', $user->mobile_number) }}" required>
            </div>

            <div class="mb-3">
    <label for="marital_status" class="form-label">Marital Status</label>
    <select name="marital_status" id="marital_status" class="form-select" required>
        <option value="single" {{ old('marital_status', $user->marital_status) == 'single' ? 'selected' : '' }}>Single</option>
        <option value="married" {{ old('marital_status', $user->marital_status) == 'married' ? 'selected' : '' }}>Married</option>
    </select>
</div>



            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" 
                    value="{{ old('date_of_birth', $user->date_of_birth) }}" required>
            </div>

            <div class="mb-3">
                <label for="present_address" class="form-label">Present Address</label>
                <textarea name="present_address" id="present_address" class="form-control" rows="3" required>{{ old('present_address', $user->present_address) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" name="state" id="state" class="form-control" 
                    value="{{ old('state', $user->state) }}" required>
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" name="city" id="city" class="form-control" 
                    value="{{ old('city', $user->city) }}" required>
            </div>

            <div class="mb-3">
                <label for="postal_code" class="form-label">Postal Code</label>
                <input type="text" name="postal_code" id="postal_code" class="form-control" 
                    value="{{ old('postal_code', $user->postal_code) }}" required>
            </div>

            <div class="mb-3">
    <label for="profession" class="form-label">Profession</label>
    <input type="text" name="profession" id="profession" class="form-control" value="{{ old('profession', $user->profession) }}">
</div>

<div class="mb-3">
    <label for="yearly_salary" class="form-label">Yearly Salary</label>
    <input type="number" name="yearly_salary" id="yearly_salary" class="form-control" value="{{ old('yearly_salary', $user->yearly_salary) }}">
</div>



            <div class="mb-3">
                <label for="image" class="form-label">Profile Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if($user->image)
                    <div class="mt-2">
                        <img src="/images/{{ $user->image }}" alt="Current Image" width="100">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

@endsection
