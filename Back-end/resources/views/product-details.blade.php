@extends('layouts.app')

   @section('title', $product->name)

   @section('styles')
       <link rel="stylesheet" href="{{ asset('css/product-details.css') }}">
   @endsection

   @section('content')
       <section class="product-detail py-5">
           <div class="container">
               <div class="row">
                   <div class="col-md-6">
                       <img src="{{ asset($product->image) }}" class="img-fluid rounded shadow-sm" alt="{{ $product->name }}" width="100%">
                   </div>
                   <div class="col-md-6">
                       <h2>{{ $product->name }}</h2>
                       <p class="text-muted">Category: {{ $product->category }}</p>
                       <div class="d-flex align-items-center mb-3">
                           <span class="text-warning me-2">
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star-half-alt"></i>
                               <i class="far fa-star"></i>
                           </span>
                           <span>3.35 ★</span>
                       </div>
                       <p>{{ $product->description ?? 'No description available.' }}</p>
                       <div class="d-flex align-items-center mb-3">
                           <form action="{{ route('cart.add') }}" method="POST">
                               @csrf
                               <input type="hidden" name="product_id" value="{{ $product->id }}">
                               <div class="input-group w-25 me-3">
                                   <button class="btn btn-outline-secondary" type="button" onclick="this.nextElementSibling.value--">-</button>
                                   <input type="text" class="form-control text-center" name="quantity" value="1" readonly>
                                   <button class="btn btn-outline-secondary" type="button" onclick="this.previousElementSibling.value++">+</button>
                               </div>
                               @if (session('cart') && isset(session('cart')[$product->id]))
                                   <button type="submit" class="btn btn-danger rounded-pill add-to-cart" formaction="{{ route('cart.remove') }}"><i class="fas fa-shopping-cart me-2"></i>Remove from Cart</button>
                               @else
                                   <button type="submit" class="btn btn-warning rounded-pill add-to-cart"><i class="fas fa-shopping-cart me-2"></i>Add to Cart</button>
                               @endif
                           </form>
                       </div>
                   </div>
               </div>
               <div class="row mt-5">
                   <div class="col-12">
                       <ul class="nav nav-tabs" id="productTabs" role="tablist">
                           <li class="nav-item" role="presentation">
                               <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab">Description</button>
                           </li>
                           <li class="nav-item" role="presentation">
                               <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">Reviews</button>
                           </li>
                       </ul>
                       <div class="tab-content mt-3" id="productTabsContent">
                           <div class="tab-pane fade show active" id="description" role="tabpanel">
                               <p>{{ $product->description ?? 'No description available.' }}</p>
                               <table class="table table-bordered mt-3">
                                   <tr>
                                       <td>Weight</td>
                                       <td>1 kg</td>
                                   </tr>
                                   <tr>
                                       <td>Country of Origin</td>
                                       <td>Egypt</td>
                                   </tr>
                                   <tr>
                                       <td>Quality</td>
                                       <td>Organic</td>
                                   </tr>
                                   <tr>
                                       <td>Check</td>
                                       <td>Healthy</td>
                                   </tr>
                                   <tr>
                                       <td>Min Weight</td>
                                       <td>250 Kg</td>
                                   </tr>
                               </table>
                           </div>
                           <div class="tab-pane fade" id="reviews" role="tabpanel">
                               <p>No reviews yet. Be the first to review this product!</p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
   @endsection