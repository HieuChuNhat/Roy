@extends('layouts.app')

@section('content')

<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});" >
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <h1 class="mb-3 mt-5 bread">My Orders</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="index.html"></a>Home</span> <span>My Orders</span></p>
          </div>

        </div>
      </div>
    </div>
  </section>



  <section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
        <div class="col-md-12 ftco-animate">
            <div class="cart-list">
                <table class="table-dark" style="width: 100%">
                    <thead style="background-color: #c49b68;height :60px">
                      <tr class="text-center">
                        <th>First_name</th>
                        <th>Last_name</th>
                        <th>City</th>
                        <th>Email</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Write review</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($orders ->count()> 0)
                      @foreach ($orders as $order)
                      <tr class="text-center" style="height: 140px;">
                          <td class="">{{ $order->first_name }}</td>

                          <td class="">{{ $order->last_name }}</td>
                          
                          <td class="">{{ $order->city }}</td>

                          <td class="">{{ $order->email }}</td>

                          <td class="price">${{  $order->price}}</td>

                          <td class="">{{ $order->status }}</td>

                          <td class="">
                            @if ($order->status == "Devered")
                                <a class="btn btn-primary" href="{{ route('write.review') }}">Write review</a>
                            @else
                                <p>not avaibale just yet</p>
                            @endif
                          </td>
                      </tr>
                      @endforeach
                      @else

                          <p class="alert alert-success">you have no orders just yet</p>
                      @endif
                      
                    </tbody>
                  </table>
              </div>
        </div>
    </div>
    </div>
</section>



@endsection