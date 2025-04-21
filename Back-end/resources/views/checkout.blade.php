@extends('layouts.app')

   @section('title', 'Checkout')

   @section('styles')
       <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
       <style>
           body {
               font-family: 'Poppins', sans-serif;
               background-color: #f8f9fa;
           }
           .checkout h2 {
               color: #343a40;
           }
           .checkout .form-control {
               border-radius: 5px;
               border: 1px solid #ced4da;
           }
           .checkout .form-control:focus {
               border-color: #28a745;
               box-shadow: 0 0 5px rgba(40, 167, 69, 0.2);
           }
           .checkout .table th {
               background-color: #f8f9fa;
               color: #343a40;
           }
           .checkout .table td {
               vertical-align: middle;
           }
           .checkout img {
               width: 50px;
               height: 50px;
               object-fit: cover;
           }
           .checkout .form-check {
               margin-bottom: 10px;
           }
           .checkout .form-check-input:checked {
               background-color: #28a745;
               border-color: #28a745;
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
       <section class="checkout py-5">
           <div class="container">
               <div class="row">
                   <div class="col-md-6">
                       <h2 class="fw-bold">Billing Details</h2>
                       <form id="billing-form" action="{{ route('checkout.store') }}" method="POST">
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
                           <div class="row">
                               <div class="col-md-6 mb-3">
                                   <label for="first-name" class="form-label">First Name <span class="text-danger">*</span></label>
                                @php
                                    $firstName = explode(' ', Auth::user()->name)[0];
                                    $lastName = explode(' ', Auth::user()->name)[1] ?? '';
                                @endphp
                                   <input type="text" class="form-control" id="first-name" name="first_name" placeholder="First Name" value="{{ $firstName }}" readonly>
                               </div>
                               <div class="col-md-6 mb-3">
                                   <label for="last-name" class="form-label">Last Name <span class="text-danger">*</span></label>
                                   <input type="text" class="form-control" id="last-name" name="last_name" placeholder="Last Name" value="{{ $lastName }}" >
                               </div>
                           </div>
                           <div class="mb-3">
                               <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                               <input type="text" class="form-control" id="address" name="address" placeholder="House Number Street Name" value="{{ old('address') }}" >
                           </div>
                           <div class="mb-3">
                               <label for="town-city" class="form-label">Town/City <span class="text-danger">*</span></label>
                               <input type="text" class="form-control" id="town-city" name="city" placeholder="Town/City" value="{{ old('city') }}" >
                           </div>
                           <div class="mb-3">
                               <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                               <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{ old('country') }}" >
                           </div>
                           <div class="mb-3">
                               <label for="postcode" class="form-label">Postcode/ZIP <span class="text-danger">*</span></label>
                               <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode/ZIP" value="{{ old('postcode') }}" >
                           </div>
                           <div class="mb-3">
                               <label for="mobile" class="form-label">Mobile <span class="text-danger">*</span></label>
                               <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="{{ old('mobile') }}" >
                           </div>
                           <div class="mb-3">
                               <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                               <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ Auth::user()->email }}" >
                           </div>
                           <div class="mb-3">
                               <label for="order-notes" class="form-label">Order Note (Optional)</label>
                               <textarea class="form-control" id="order-notes" name="order_notes" rows="3" placeholder="Order Note (Optional)">{{ old('order_notes') }}</textarea>
                           </div>
                   </div>
                   <div class="col-md-6">
                       <table class="table table-bordered">
                           <thead>
                               <tr>
                                   <th>Products</th>
                                   <th>Name</th>
                                   <th>Price</th>
                                   <th>Quantity</th>
                                   <th>Total</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($cart as $id => $item)
                                   <tr>
                                       <td><img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="img-fluid"></td>
                                       <td>{{ $item['name'] }}</td>
                                       <td>${{ number_format($item['price'], 2) }}</td>
                                       <td>{{ $item['quantity'] }}</td>
                                       <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                   </tr>
                               @endforeach
                           </tbody>
                       </table>
                       <hr>
                       <div class="d-flex justify-content-between mb-3">
                           <h6 class="fw-bold">Subtotal</h6>
                           <h6>${{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)), 2) }}</h6>
                       </div>
                       <hr>
                       <div class="mb-3">
                           <h6 class="fw-bold">Shipping</h6>
                           <div class="form-check">
                               <input class="form-check-input shipping-option" type="radio" name="shipping" id="free-shipping" value="free" checked>
                               <label class="form-check-label" for="free-shipping">Free Shipping: $0.00</label>
                           </div>
                           <div class="form-check">
                               <input class="form-check-input shipping-option" type="radio" name="shipping" id="flat-rate" value="flat">
                               <label class="form-check-label" for="flat-rate">Flat rate: $15.00</label>
                           </div>
                           <div class="form-check">
                               <input class="form-check-input shipping-option" type="radio" name="shipping" id="local-pickup" value="pickup">
                               <label class="form-check-label" for="local-pickup">Local Pickup: $8.00</label>
                           </div>
                       </div>
                       <hr>
                       <div class="d-flex justify-content-between mb-3">
                           <h5 class="fw-bold">Total</h5>
                           <h5 id="total">${{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)), 2) }}</h5>
                       </div>
                       <hr>
                       <div class="mb-3">
                           <h6 class="fw-bold">Payment Methods</h6>
                           <div class="form-check">
                               <input class="form-check-input payment-option" type="radio" name="payment" id="bank-transfer" value="bank-transfer" checked>
                               <label class="form-check-label" for="bank-transfer">Direct Bank Transfer</label>
                               <p class="text-muted small">Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                           </div>
                           <div class="form-check">
                               <input class="form-check-input payment-option" type="radio" name="payment" id="check-payments" value="check-payments">
                               <label class="form-check-label" for="check-payments">Check Payments</label>
                           </div>
                           <div class="form-check">
                               <input class="form-check-input payment-option" type="radio" name="payment" id="cash-on-delivery" value="cash-on-delivery">
                               <label class="form-check-label" for="cash-on-delivery">Cash On Delivery</label>
                           </div>
                           <div class="form-check">
                               <input class="form-check-input payment-option" type="radio" name="payment" id="paypal" value="paypal">
                               <label class="form-check-label" for="paypal">Paypal</label>
                           </div>
                       </div>
                       <hr>
                       <button type="submit" class="btn btn-warning w-100 rounded-pill fw-bold" id="place-order">Place Order</button>
                       </form>
                   </div>
               </div>
           </div>
       </section>
   @endsection

   @section('scripts')
       <script>
           document.querySelectorAll('.shipping-option').forEach(option => {
               option.addEventListener('change', () => {
                   let total = {{ array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)) }};
                   if (option.value === 'flat') total += 15;
                   if (option.value === 'pickup') total += 8;
                   document.getElementById('total').textContent = `$${total.toFixed(2)}`;
               });
           });
       </script>
   @endsection