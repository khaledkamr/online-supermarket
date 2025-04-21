@extends('layouts.app')

   @section('title', 'Contact')

   @section('styles')
       <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
       <style>
           body {
               font-family: 'Poppins', sans-serif;
               background-color: #f8f9fa;
           }
           .btn-warning {
               background-color: #ffc107;
               border: none;
           }
           .btn-warning:hover {
               background-color: #e0a800;
           }
       </style>
   @endsection

   @section('content')
       <section class="contact py-5">
           <div class="container">
               <h2 class="text-success">Get in touch</h2>
               <p class="text-muted mb-5">We value your feedback! Use the contact form below to reach out to us with any questions, suggestions, or concerns. <a href="#" class="text-success">Learn More.</a></p>
               <div class="row">
                   <div class="col-md-6 mb-4">
                       <div class="map-container">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509367!2d144.9537353153167!3d-37.81627927975166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0x5045675218ce7e0!2s123%20Street%2C%20New%20York%2C%20USA!5e0!3m2!1sen!2sau!4v1699999999999!5m2!1sen!2sau" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                       </div>
                   </div>
                   <div class="col-md-6 mb-4">
                       <form id="contact-form" action="{{ route('contact.store') }}" method="POST">
                           @csrf
                           @if ($errors->any())
                               <div class="alert alert-danger">
                                   <ul>
                                       @foreach ($errors->all() as $error)
                                           <li>{{ $error }}</li>
                                       @endforeach
                                   </ul>
                               </div>
                           @endif
                           <div class="mb-3">
                               <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}" required>
                           </div>
                           <div class="mb-3">
                               <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" value="{{ old('email') }}" required>
                           </div>
                           <div class="mb-3">
                               <textarea class="form-control" id="message" name="message" rows="5" placeholder="Your Message" required>{{ old('message') }}</textarea>
                           </div>
                           <button type="submit" class="btn btn-warning rounded-pill w-100">Submit</button>
                       </form>
                   </div>
               </div>
               <div class="row mt-4">
                   <div class="col-md-6">
                       <div class="contact-info">
                           <p><i class="fas fa-map-marker-alt text-success me-2"></i> <strong>Address:</strong> 123 Street New York, USA</p>
                           <p><i class="fas fa-envelope text-success me-2"></i> <strong>Mail Us:</strong> <a href="mailto:info@supermarket.com" class="text-dark">info@supermarket.com</a></p>
                           <p><i class="fas fa-phone text-success me-2"></i> <strong>Telephone:</strong> (+012) 3456 7890</p>
                       </div>
                   </div>
               </div>
           </div>
       </section>
   @endsection