@extends('layouts.app')

@section('content')

<section class="pt-5 pb-5">
    <div class="container">
      <div class="row w-100">
          <div class="col-lg-12 col-md-12 col-12">
              <h3 class="display-5 mb-2 text-center">Shopping Cart</h3>
              <p class="mb-5 text-center">
                  <i class="text-info font-weight-bold">3</i> items in your cart</p>
              <table id="shoppingCart" class="table table-condensed table-responsive">
                  <thead>
                      <tr>
                          <th style="width:60%">Product</th>
                          <th style="width:12%">Price</th>
                          <th style="width:10%">Quantity</th>
                          <th style="width:16%"></th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                      <tr>
                          <td data-th="Product">
                              <div class="row">
                                  <div class="col-md-3 text-left">
                                      <img src="{{asset('images/'.$item->image)}}" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                  </div>
                                  <div class="col-md-9 text-left mt-sm-2">
                                      <h4>{{$item->description}}</h4>
                                  </div>
                              </div>
                          </td>
                          <td data-th="Price">{{$item->price}} $</td>
                          <td data-th="Quantity">
                              <input type="number" class="form-control form-control-lg text-center" value="1">
                          </td>
                          <td class="actions" data-th="">
                              <div class="text-right">
                                  <button class="btn btn-white border-secondary bg-white btn-md mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-x-fill" viewBox="0 0 16 16">
                                        <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M6.854 6.146 8 7.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 8l1.147 1.146a.5.5 0 0 1-.708.708L8 8.707 6.854 9.854a.5.5 0 0 1-.708-.708L7.293 8 6.146 6.854a.5.5 0 1 1 .708-.708"/>
                                      </svg>
                                  </button>
                              </div>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              <div class="float-right text-right">
                  <h4>Subtotal:</h4>
                    <h4>{{$total_price}} $</h4>
              </div>
          </div>
      </div>
      <div class="row mt-4 d-flex align-items-center">
          <div class="col-sm-6 order-md-2 text-right">
              <a href="catalog.html" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">Checkout</a>
          </div>
          <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
              <a href="catalog.html">
                  <i class="fas fa-arrow-left mr-2"></i> Continue Shopping</a>
          </div>
      </div>
  </div>
  </section>


@endsection
