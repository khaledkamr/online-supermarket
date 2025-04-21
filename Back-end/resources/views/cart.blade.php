@extends('layouts.app')

   @section('title', 'Cart')

   @section('styles')
       <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
       <style>
           body {
               font-family: 'Poppins', sans-serif;
               background-color: #f8f9fa;
           }
           .cart img {
               width: 50px;
               height: 50px;
               object-fit: cover;
           }
           .cart .table th {
               background-color: #f8f9fa;
               color: #343a40;
           }
           .cart .table td {
               vertical-align: middle;
           }
           .cart .input-group {
               width: 120px !important;
           }
           .cart .btn-danger {
               background-color: #dc3545;
               border: none;
           }
           .cart .btn-danger:hover {
               background-color: #c82333;
           }
           .cart .card {
               background-color: #fff;
           }
           .btn-warning {
               background-color: #ffc107;
               border: none;
               color: #343a40;
           }
           .btn-warning:hover {
               background-color: #e0a800;
               color: #343a40;
           }
       </style>
   @endsection

   @section('content')
       <section class="cart py-5">
           <div class="container">
               <div class="row">
                   <div class="col-md-12">
                       <table class="table table-bordered">
                           <thead>
                               <tr>
                                   <th>Products</th>
                                   <th>Name</th>
                                   <th>Price</th>
                                   <th>Quantity</th>
                                   <th>Total</th>
                                   <th>Handle</th>
                               </tr>
                           </thead>
                           <tbody id="cart-items">
                               @if (empty($cart))
                                   <tr>
                                       <td colspan="6" class="text-center">Your cart is empty.</td>
                                   </tr>
                               @else
                                   @foreach ($cart as $id => $item)
                                       <tr>
                                           <td><img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="img-fluid"></td>
                                           <td>{{ $item['name'] }}</td>
                                           <td>${{ number_format($item['price'], 2) }}</td>
                                           <td>
                                               <form action="{{ route('cart.update') }}" method="POST">
                                                   @csrf
                                                   <input type="hidden" name="product_id" value="{{ $id }}">
                                                   <div class="input-group w-50">
                                                       <button class="btn btn-outline-secondary decrease-quantity" type="button" onclick="this.nextElementSibling.value--">-</button>
                                                       <input type="text" class="form-control text-center quantity" name="quantity" value="{{ $item['quantity'] }}" readonly>
                                                       <button class="btn btn-outline-secondary increase-quantity" type="button" onclick="this.previousElementSibling.value++">+</button>
                                                   </div>
                                                   <button type="submit" class="d-none">Update</button>
                                               </form>
                                           </td>
                                           <td class="item-total">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                           <td>
                                               <form action="{{ route('cart.remove') }}" method="POST">
                                                   @csrf
                                                   <input type="hidden" name="product_id" value="{{ $id }}">
                                                   <button class="btn btn-danger btn-sm remove-item"><i class="fas fa-times"></i></button>
                                               </form>
                                           </td>
                                       </tr>
                                   @endforeach
                               @endif
                           </tbody>
                       </table>
                   </div>
               </div>
               <div class="row mt-4">
                   <div class="col-md-8">
                       <div class="d-flex align-items-center">
                           <input type="text" class="form-control w-25 me-3" placeholder="Coupon Code">
                           <button class="btn btn-warning rounded-pill fw-bold" id="apply-coupon">Apply Coupon</button>
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="card shadow-sm">
                           <div class="card-body">
                               <h5>Cart Total</h5>
                               <hr>
                               <p>Subtotal: <span id="subtotal">${{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)), 2) }}</span></p>
                               <p>Shipping: Flat rate: $3.00 <br> Shipping to Cairo.</p>
                               <hr>
                               <h6>Total: <span id="total">${{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)) + 3, 2) }}</span></h6>
                               <a href="{{ route('checkout') }}" class="btn btn-warning w-100 rounded-pill mt-3 fw-bold" id="proceed-checkout">Proceed to Checkout</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
   @endsection

   @section('scripts')
       <script>
           document.querySelectorAll('.quantity').forEach(input => {
               input.addEventListener('change', () => {
                   input.closest('form').submit();
               });
           });
       </script>
   @endsection