@extends('layouts.app')

   @section('title', 'Shop')

   @section('styles')
       <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
       <style>
           body {
               font-family: 'Poppins', sans-serif;
               background-color: #f8f9fa;
           }
           .shop h2 {
               color: #343a40;
           }
           .shop h5 {
               color: #343a40;
               margin-bottom: 15px;
           }
           .shop .list-unstyled li {
               margin-bottom: 10px;
           }
           .shop .badge {
               background-color: #28a745;
           }
           .shop .form-range {
               accent-color: #ffc107;
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
           .product-card .badge {
               background-color: #ffc107;
               color: #343a40;
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
       <section class="shop py-5">
           <div class="container">
               <div class="row">
                   <div class="col-md-3">
                       <h2>SuperMarket</h2>
                       <div class="mt-4">
                           <form action="{{ route('shop') }}" method="GET">
                               <div class="input-group mb-3">
                                   <input type="text" name="search" class="form-control" placeholder="Search products" value="{{ request('search') }}">
                                   <span class="input-group-text"><i class="fas fa-search"></i></span>
                               </div>
                               <h5>Product Categories</h5>
                               <ul class="list-unstyled">
                                   @foreach ($allCategories as $category)
                                       <li class="d-flex justify-content-between align-items-center">
                                           <label>
                                               <input type="checkbox" name="categories[]" value="{{ $category }}" class="category-filter" {{ in_array($category, request('categories', [])) ? 'checked' : '' }}>
                                               {{ $category }}
                                           </label>
                                           <span class="badge bg-success rounded-pill">{{ $products->where('category', $category)->count() }}</span>
                                       </li>
                                   @endforeach
                               </ul>
                               {{-- <button type="submit" class="btn btn-warning rounded-pill w-100">Filter</button> --}}
                           </form>
                       </div>
                   </div>
                   <div class="col-md-9">
                       <div class="d-flex justify-content-end mb-4">
                           <div class="dropdown">
                               <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                   Sort By: Default
                               </button>
                               <ul class="dropdown-menu">
                                   <li><a class="dropdown-item sort-option" href="#" data-sort="price-asc">Price: Low to High</a></li>
                                   <li><a class="dropdown-item sort-option" href="#" data-sort="price-desc">Price: High to Low</a></li>
                                   <li><a class="dropdown-item sort-option" href="#" data-sort="name-asc">Name: A to Z</a></li>
                                   <li><a class="dropdown-item sort-option" href="#" data-sort="name-desc">Name: Z to A</a></li>
                               </ul>
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
               </div>
           </div>
       </section>
   @endsection

   @section('scripts')
       <script>
           document.querySelectorAll('.category-filter').forEach(checkbox => {
               checkbox.addEventListener('change', () => {
                   checkbox.closest('form').submit();
               });
           });
       </script>
   @endsection