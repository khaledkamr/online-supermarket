@extends('layouts.app')

   @section('title', 'Home')

   @section('styles')
       <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
       <style>
           body {
               font-family: 'Poppins', sans-serif;
               background-color: #f8f9fa;
           }
           .hero {
               background: url('https://via.placeholder.com/1200x600?text=Hero+Background') center/cover no-repeat;
               min-height: 500px;
           }
           .hero h1 {
               color: #343a40;
           }
           .hero h1 span {
               color: #28a745;
           }
           .feature-box {
               background: white;
               transition: transform 0.3s;
           }
           .feature-box:hover {
               transform: translateY(-10px);
           }
           .icon-box {
               width: 60px;
               height: 60px;
               display: flex;
               align-items: center;
               justify-content: center;
           }
           .product-card {
               background: white;
               border-radius: 10px;
               overflow: hidden;
               transition: transform 0.3s;
           }
           .product-card:hover {
               transform: translateY(-10px);
               box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
           }
           .product-card img {
               height: 200px;
               object-fit: cover;
           }
           .btn-success {
               background-color: #28a745;
               border: none;
           }
           .btn-success:hover {
               background-color: #218838;
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
       <section class="hero py-5">
           <div class="container">
               <div class="row align-items-center">
                   <div class="col-md-6">
                       <p class="text-warning mb-2">Your One-Stop Shop</p>
                       <h1 class="display-4 fw-bold">Fresh Groceries Delivered to Your Doorstep</h1>
                       <div class="input-group mt-4 w-75">
                           <input type="text" class="form-control rounded-pill rounded-end-0 border-warning" placeholder="Search">
                           <button class="btn btn-success rounded-pill rounded-start-0">Submit Now</button>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
                           <div class="carousel-inner">
                               <div class="carousel-item active">
                                   <img src="{{ asset('imgs/vegetables.jpg') }}" class="d-block w-100 rounded" alt="Organic Foods">
                               </div>
                               <div class="carousel-item">
                                   <img src="{{ asset('imgs/energy-drinks.jpg') }}" class="d-block w-100 rounded" alt="Organic Foods">
                               </div>
                               <div class="carousel-item">
                                   <img src="{{ asset('imgs/ships.jpg') }}" class="d-block w-100 rounded" alt="Organic Foods">
                               </div>
                           </div>
                           <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                               <span class="visually-hidden">Previous</span>
                           </button>
                           <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                               <span class="carousel-control-next-icon" aria-hidden="true"></span>
                               <span class="visually-hidden">Next</span>
                           </button>
                       </div>
                   </div>
               </div>
           </div>
       </section>

       <section class="features py-5 bg-light">
           <div class="container">
               <div class="row text-center">
                   <div class="col-md-3">
                       <div class="feature-box p-4 rounded shadow-sm">
                           <div class="icon-box bg-warning rounded-circle mx-auto mb-3">
                               <i class="fas fa-truck fa-2x text-white"></i>
                           </div>
                           <h5>Free Shipping</h5>
                           <p>Free on order over $100</p>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="feature-box p-4 rounded shadow-sm">
                           <div class="icon-box bg-warning rounded-circle mx-auto mb-3">
                               <i class="fas fa-shield-alt fa-2x text-white"></i>
                           </div>
                           <h5>Security Payment</h5>
                           <p>100% security payment</p>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="feature-box p-4 rounded shadow-sm">
                           <div class="icon-box bg-warning rounded-circle mx-auto mb-3">
                               <i class="fas fa-exchange-alt fa-2x text-white"></i>
                           </div>
                           <h5>7 Day Return</h5>
                           <p>7 day money guarantee</p>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="feature-box p-4 rounded shadow-sm">
                           <div class="icon-box bg-warning rounded-circle mx-auto mb-3">
                               <i class="fas fa-headset fa-2x text-white"></i>
                           </div>
                           <h5>24/7 Support</h5>
                           <p>Support every time fast</p>
                       </div>
                   </div>
               </div>
           </div>
       </section>

       <section class="products py-5">
           <div class="container">
               <div class="d-flex justify-content-between align-items-center mb-4">
                   <h2>Our Organic Products</h2>
                   <div>
                       <a href="{{ route('shop') }}" class="btn btn-warning rounded-pill me-2">All Products <i class="fas fa-arrow-right"></i></a>
                       <button class="btn btn-outline-secondary rounded-pill me-2">Vegetables</button>
                       <button class="btn btn-outline-secondary rounded-pill me-2">Fruits</button>
                       <button class="btn btn-outline-secondary rounded-pill me-2">Bread</button>
                       <button class="btn btn-outline-secondary rounded-pill">Meat</button>
                   </div>
               </div>
               <div class="row" id="product-list">
                   @foreach ($products as $product)
                       <div class="col-md-3 mb-4">
                           <div class="card product-card">
                               <a href="{{ route('product.show', $product->id) }}">
                                   <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                               </a>
                               <div class="card-body text-center">
                                   <h5 class="card-title">
                                       <a href="{{ route('product.show', $product->id) }}" class="text-decoration-none text-dark">{{ $product->name }}</a>
                                   </h5>
                                   <p class="card-text text-success fw-bold">${{ number_format($product->price, 2) }}</p>
                                   <form action="{{ route('cart.add') }}" method="POST">
                                       @csrf
                                       <input type="hidden" name="product_id" value="{{ $product->id }}">
                                       <input type="hidden" name="quantity" value="1">
                                       @if (session('cart') && isset(session('cart')[$product->id]))
                                           <button type="submit" class="btn btn-danger rounded-pill" formaction="{{ route('cart.remove') }}">Remove from Cart</button>
                                       @else
                                           <button type="submit" class="btn btn-warning rounded-pill">Add to Cart</button>
                                       @endif
                                   </form>
                               </div>
                           </div>
                       </div>
                   @endforeach
               </div>
           </div>
       </section>
   @endsection