<!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>SuperMarket - @yield('title')</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
       <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
       @yield('styles')
   </head>
   <body>
       <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
           <div class="container">
               <a class="navbar-brand" href="{{ route('home') }}">
                   <span class="text-success fw-bold">SuperMarket</span>
               </a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                   <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                   <ul class="navbar-nav mx-auto">
                       <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                       <li class="nav-item"><a class="nav-link {{ request()->routeIs('shop') ? 'active' : '' }}" href="{{ route('shop') }}">Shop</a></li>
                       <li class="nav-item"><a class="nav-link {{ request()->routeIs('cart') ? 'active' : '' }}" href="{{ route('cart') }}">Cart</a></li>
                       <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                   </ul>
                   <div class="d-flex align-items-center">
                       <a href="#" class="text-dark me-3"><i class="fas fa-search"></i></a>
                       <a href="{{ route('cart') }}" class="text-dark me-3 position-relative">
                           <i class="fas fa-shopping-cart"></i>
                           <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                               {{ count(session('cart', [])) }}
                           </span>
                       </a>
                       @auth
                           <div class="dropdown">
                               <a href="#" class="text-dark dropdown-toggle" data-bs-toggle="dropdown">
                                   <i class="fas fa-user"></i>
                               </a>
                               <ul class="dropdown-menu">
                                   <li>
                                       <form action="{{ route('logout') }}" method="POST">
                                           @csrf
                                           <button type="submit" class="dropdown-item">Logout</button>
                                       </form>
                                   </li>
                               </ul>
                           </div>
                       @else
                           <a href="{{ route('login') }}" class="text-dark"><i class="fas fa-user"></i></a>
                       @endauth
                   </div>
               </div>
           </div>
       </nav>

       @if (session('success'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
               {{ session('success') }}
               <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
           </div>
       @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

       @yield('content')

       <footer class="footer py-5 bg-dark text-white mt-5">
           <div class="container">
               <div class="row">
                   <div class="col-md-3">
                       <h5 class="text-success">SuperMarket</h5>
                       <h6>Freshness Delivered</h6>
                       <img src="{{ asset('imgs/logo.png') }}" alt="SuperMarket Logo" class="img-fluid">
                   </div>
                   <div class="col-md-3">
                       <h4><strong class="text-warning">Why People Like us!</strong></h4>
                       <p style="line-height: 1.8;">typesetting,p remaining essentially unchanged. It was popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>
                       <button class="btn btn-outline-warning rounded-pill">Read More</button>
                   </div>
                   <div class="col-md-2">
                       <h5><strong class="text-warning">Shop Info</strong></h5>
                       <ul class="list-unstyled">
                           <li class="pb-3"><a href="#" class="text-white">About Us</a></li>
                           <li class="pb-3"><a href="#" class="text-white">Contact Us</a></li>
                           <li class="pb-3"><a href="#" class="text-white">Privacy Policy</a></li>
                           <li class="pb-3"><a href="#" class="text-white">Terms & Condition</a></li>
                           <li class="pb-3"><a href="#" class="text-white">Return Policy</a></li>
                           <li class="pb-3"><a href="#" class="text-white">FAQs & Help</a></li>
                       </ul>
                   </div>
                   <div class="col-md-2">
                       <h5><strong class="text-warning">Account</strong></h5>
                       <ul class="list-unstyled">
                           <li class="pb-3"><a href="#" class="text-white">My Account</a></li>
                           <li class="pb-3"><a href="#" class="text-white">Shop details</a></li>
                           <li class="pb-3"><a href="#" class="text-white">Shopping Cart</a></li>
                           <li class="pb-3"><a href="#" class="text-white">Wishlist</a></li>
                           <li class="pb-3"><a href="#" class="text-white">Order History</a></li>
                           <li class="pb-3"><a href="#" class="text-white">International Orders</a></li>
                       </ul>
                   </div>
                   <div class="col-md-2">
                       <h5><strong class="text-warning">Contact</strong></h5>
                       <p>Address: 1429 Netus Rd, NY 48247</p>
                       <p>Email: <a href="mailto:info@supermarket.com" class="text-white">info@supermarket.com</a></p>
                       <p>Phone: +0123 4567 8910</p>
                       <h6>Payment Accepted</h6>
                       <div class="d-flex gap-2">
                           <img src="{{ asset('imgs/visa.png') }}" alt="Visa" class="img-fluid" style="width: 40px;">
                           <img src="{{ asset('imgs/mastercard.png') }}" alt="MasterCard" class="img-fluid" style="width: 40px;">
                       </div>
                   </div>
               </div>
               <hr class="bg-white">
               <div class="text-center py-3">
                   <p class="mb-0">© 2023 SuperMarket. All rights reserved.</p>
                   <div class="social-icons mt-2">
                       <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                       <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                       <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                       <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                   </div>
               </div>
           </div>
       </footer>

       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
       @yield('scripts')
   </body>
   </html>