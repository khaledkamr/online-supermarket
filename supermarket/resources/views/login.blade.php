@extends('layouts.app')

   @section('title', 'Login')

   @section('styles')
       <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
       <style>
           body {
               font-family: 'Poppins', sans-serif;
               background-color: #f8f9fa;
           }
           .login {
               min-height: 80vh;
               display: flex;
               align-items: center;
           }
           .login .card {
               border: none;
               border-radius: 10px;
           }
           .login .form-control {
               border-radius: 5px;
               border: 1px solid #ced4da;
           }
           .login .form-control:focus {
               border-color: #28a745;
               box-shadow: 0 0 5px rgba(40, 167, 69, 0.2);
           }
           .btn-success {
               background-color: #28a745;
               border: none;
           }
           .btn-success:hover {
               background-color: #218838;
           }
       </style>
   @endsection

   @section('content')
       <section class="login py-5">
           <div class="container">
               <div class="row justify-content-center">
                   <div class="col-md-6">
                       <div class="card shadow-sm">
                           <div class="card-body p-5">
                               <h1 class="text-success text-center mb-4 fw-bold">Login</h1>
                               @if ($errors->any())
                                   <div class="alert alert-danger">
                                       <ul>
                                           @foreach ($errors->all() as $error)
                                               <li>{{ $error }}</li>
                                           @endforeach
                                       </ul>
                                   </div>
                               @endif
                               <form id="login-form" action="{{ route('login.post') }}" method="POST">
                                   @csrf
                                   <div class="mb-3">
                                       <label for="email" class="form-label">Email</label>
                                       <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" value="{{ old('email') }}">
                                   </div>
                                   <div class="mb-3">
                                       <label for="password" class="form-label">Password</label>
                                       <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
                                   </div>
                                   <div class="mb-3 form-check">
                                       <input type="checkbox" class="form-check-input" id="remember-me" name="remember">
                                       <label class="form-check-label" for="remember-me">Remember Me</label>
                                   </div>
                                   <button type="submit" class="btn btn-success w-100 rounded-pill">Login</button>
                               </form>
                               <p class="text-center mt-3">Don't have an account? <a href="{{ route('signup') }}" class="text-success">Sign Up</a></p>
                               <p class="text-center"><a href="#" class="text-muted">Forgot Password?</a></p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
   @endsection