@extends('layouts.app')

@section('title', 'Sign Up')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<section class="signup py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body p-5">
                        <h1 class="text-success text-center mb-4 fw-bold">Sign Up</h1>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="signup-form" action="{{ route('signup.post') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Full Name" value="{{ old('name') }}" >
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" value="{{ old('email') }}" >
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Create a Password" >
                            </div>
                            <div class="mb-3">
                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm-password" name="password_confirmation" placeholder="Confirm Your Password" >
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="terms" name="terms" >
                                <label class="form-check-label" for="terms">I agree to the <a href="#" class="text-success">Terms & Conditions</a></label>
                            </div>
                            <button type="submit" class="btn btn-success w-100 rounded-pill">Sign Up</button>
                        </form>
                        <p class="text-center mt-3">Already have an account? <a href="{{ route('login') }}" class="text-success">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection