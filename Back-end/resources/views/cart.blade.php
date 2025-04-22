@extends('layouts.app')

@section('title', 'Cart')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
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
                                            <div class="input-group w-50">
                                                <!-- Decrease Quantity Form -->
                                                <form action="{{ route('cart.decrease') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $id }}">
                                                    <button class="btn btn-outline-secondary" type="submit">-</button>
                                                </form>
                                                <!-- Quantity Display -->
                                                <input type="text" class="form-control text-center quantity" value="{{ $item['quantity'] }}" readonly>
                                                <!-- Increase Quantity Form -->
                                                <form action="{{ route('cart.increase') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $id }}">
                                                    <button class="btn btn-outline-secondary" type="submit">+</button>
                                                </form>
                                            </div>
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
        // Remove the previous quantity change listener since we're handling it via forms
    </script>
@endsection