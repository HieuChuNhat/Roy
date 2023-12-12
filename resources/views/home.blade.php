@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-8 col-sm-12 text-center ftco-animate">
              <span class="subheading">Welcome</span>
            <h1 class="mb-4">Trải nghiệm cà phê tốt nhất'</h1>
            <p class="mb-4 mb-md-5">Khám phá trải nghiệm cà phê tốt nhất mà bạn từng biết đến, từ hương vị độc đáo đến sự thư giãn tuyệt vời.</p>
            <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Đặt ngay</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Thực đơn</a></p>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_2.jpg') }});">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-8 col-sm-12 text-center ftco-animate">
              <span class="subheading">Welcome</span>
            <h1 class="mb-4">Hương vị tuyệt vời &amp; Địa điểm đẹp</h1>
            <p class="mb-4 mb-md-5">Thực sự, không gì có thể so sánh với hương vị tuyệt vời và địa điểm đẹp tại đây!</p>
            <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Đặt ngay</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Thực đơn</a></p>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-8 col-sm-12 text-center ftco-animate">
              <span class="subheading">Welcome</span>
            <h1 class="mb-4">Sẵn sàng phục vụ</h1>
            <p class="mb-4 mb-md-5">Chúng tôi luôn ở đây để đáp ứng mọi nhu cầu của bạn!</p>
            <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Đặt ngay</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Thực đơn</a></p>
          </div>

        </div>
      </div>
    </div>
  </section>

  <div class="container">
    @if( Session::has('date'))
        <p class="alert {{ Session::get('alert-class','alert-info') }}">{{ Session::get('date') }}</p>
    @endif
  </div>

  <div class="container">
    @if( Session::has('booking'))
        <p class="alert {{ Session::get('alert-class','alert-info') }}">{{ Session::get('booking') }}</p>
    @endif
  </div>

  <section class="ftco-intro">
    <div class="container-wrap">
        <div class="wrap d-md-flex align-items-xl-end">
            <div class="info">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-phone"></span></div>
                        <div class="text">
                            <h3>0799305477</h3>
                            <p>liên hệ ngay</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-my_location"></span></div>
                        <div class="text">
                            <h3>QL 1A</h3>
                            <p>	Hoa Phuoc, Hoa Vang, Da Nang, Viet Nam</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-clock-o"></span></div>
                        <div class="text">
                            <h3>Mở của cả tuần</h3>
                            <p>8:00 - 21:00</p>
                        </div>
                    </div>
                </div>
            </div>


            

            <div class="book p-4">
                <h3>Đặt bàn</h3>
                <form action="{{ route('booking.tables') }}" method="POST" class="appointment-form">
                  @csrf
                    <div class="d-md-flex">
                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control" placeholder="Họ">
                            
                        </div>
                        @if($errors->has('first_name'))
                            <p class="alert alert-success">{{ $errors->first('first_name') }}</p>
                        @endif 
                        <div class="form-group ml-md-4">
                            <input type="text" name="last_name" class="form-control" placeholder="Tên">
                        </div>
                        @if($errors->has('last_name'))
                            <p class="alert alert-success">{{ $errors->first('last_name') }}</p>
                        @endif 
                    </div>
                    <div class="d-md-flex">
                        <div class="form-group">
                            <div class="input-wrap">
                        <div class="icon"><span class="ion-md-calendar"></span></div>
                        <input type="text" name="date" class="form-control appointment_date" placeholder="Ngày">
                    </div>
                        @if($errors->has('date'))
                            <p class="alert alert-success">{{ $errors->first('date') }}</p>
                        @endif 
                        </div>
                        
                          <input name="user_id" type="hidden" class="form-control" value="{{ Auth::user()->id}}" placeholder="">                        

                        <div class="form-group ml-md-4">
                          <div class="input-wrap">
                            <div class="icon"><span class="ion-ios-clock"></span></div>
                            <input type="text" name="time" class="form-control appointment_time" placeholder="Giờ">
                          </div>
                          @if($errors->has('time'))
                            <p class="alert alert-success">{{ $errors->first('time') }}</p>
                          @endif 
                        </div>

                        <div class="form-group ml-md-4">
                            <input type="text" name="phone" class="form-control" placeholder="Sđt">
                        </div>
                        @if($errors->has('phone'))
                            <p class="alert alert-success">{{ $errors->first('phone') }}</p>
                        @endif 
                    </div>
                    <div class="d-md-flex">
                        <div class="form-group">
                        <textarea name="message" id="" cols="30" rows="2" class="form-control" placeholder="Ghi chú"></textarea>
                        </div>
                        @if($errors->has('message'))
                            <p class="alert alert-success">{{ $errors->first('message') }}</p>
                        @endif 
                        <div class="form-group ml-md-4">
                        <input type="submit" name="sunmit" value="Đặt" class="btn btn-white py-3 px-4">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="ftco-about d-md-flex">
    <div class="one-half img" style="background-image: url({{ asset('assets/images/about.jpg') }});"></div>
    <div class="one-half ftco-animate">
        <div class="overlap">
        <div class="heading-section ftco-animate ">
            <span class="subheading">Khám phá</span>
          <h2 class="mb-4">câu chuyện của chúng tôi</h2>
        </div>
        <div>
                  <p><br>RoyCoffee không chỉ là một quán cà phê đơn thuần mà còn là một phần của hành trình đầy chông gai của gia đình Roy từ khi bắt đầu vào năm 1985. Tên gọi "Roy" được lấy từ tên của ông bà người sáng lập, Robert và Yvonne, người đã dành cả cuộc đời để tạo dựng một không gian đặc biệt cho người yêu cà phê.

                    <br>Bắt đầu từ một góc nhỏ trên phố nhỏ, RoyCoffee đã trải qua nhiều giai đoạn phát triển. Ban đầu, quán chỉ có một vài bàn ghế gỗ đơn giản và một máy pha cà phê cổ điển. Nhưng với tâm huyết và sự nỗ lực không ngừng, họ đã mở rộng quán và cung cấp thêm các loại đồ uống mới, đa dạng và đặc biệt là cà phê chất lượng cao từ những hạt cà phê chọn lọc.
                    
                    <br>Quán café không chỉ thu hút khách hàng bởi hương vị tuyệt vời của cà phê mà còn bởi không gian ấm cúng, tràn ngập sự ấm áp và hạnh phúc. Không gian được thiết kế với những tông màu ấm cúng, những chiếc đèn nhẹ nhàng và những bức tranh nghệ thuật tạo nên một không gian thư giãn lý tưởng cho mọi người.
                    
                    <br>Nhân viên tại RoyCoffee không chỉ là những người pha chế chuyên nghiệp mà còn là những người bạn đồng hành, luôn sẵn sàng tạo ra những trải nghiệm tốt nhất cho khách hàng. Họ không ngừng nỗ lực để mang đến những dịch vụ hoàn hảo nhất, từ việc pha chế cà phê đến việc tư vấn cho khách hàng về loại cà phê phù hợp với hương vị riêng của họ.
                    
                    <br>Qua mỗi cốc cà phê được phục vụ, RoyCoffee không chỉ đơn thuần là một quán cà phê, mà còn là một câu chuyện về sự đam mê, nỗ lực và tình yêu dành cho hạt cà phê và cộng đồng của họ.</p>
              </div>
          </div>
    </div>
</section>

<section class="ftco-section ftco-services">
    <div class="container">
        <div class="row">
      <div class="col-md-4 ftco-animate">
        <div class="media d-block text-center block-6 services">
          <div class="icon d-flex justify-content-center align-items-center mb-5">
              <span class="flaticon-choices"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Giao hàng dễ dàng</h3>
            <p>Tiện lợi và nhanh chóng, mang đến trải nghiệm mua sắm tuyệt vời cho bạn!</p>
          </div>
        </div>      
      </div>
      <div class="col-md-4 ftco-animate">
        <div class="media d-block text-center block-6 services">
          <div class="icon d-flex justify-content-center align-items-center mb-5">
              <span class="flaticon-delivery-truck"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Giao hàng nhanh nhất</h3>
            <p> Sự tin cậy và tốc độ để đáp ứng nhanh chóng mọi nhu cầu của bạn!</p>
          </div>
        </div>      
      </div>
      <div class="col-md-4 ftco-animate">
        <div class="media d-block text-center block-6 services">
          <div class="icon d-flex justify-content-center align-items-center mb-5">
              <span class="flaticon-coffee-bean"></span></div>
          <div class="media-body">
            <h3 class="heading">Cà phê chất lượng</h3>
            <p>Mỗi giọt hương vị đậm đà, mỗi hơi thở thư giãn, một trải nghiệm cà phê tuyệt vời cho mọi ngày.</p>
          </div>
        </div>    
      </div>
    </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 pr-md-5">
                <div class="heading-section text-md-right ftco-animate">
              <span class="subheading">Khám phá</span>
            <h2 class="mb-4">Menu của chúng tôi</h2>
            <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p><a href="http://127.0.0.1:8000/products/menu" class="btn btn-primary btn-outline-primary px-4 py-3">Xem thêm</a></p>
          </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="menu-entry">
                            <a href="#" class="img" style="background-image: url({{ asset('assets/images/menu-1.jpg') }});"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="menu-entry mt-lg-4">
                            <a href="#" class="img" style="background-image: url({{ asset('assets/images/menu-2.jpg') }});"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="menu-entry">
                            <a href="#" class="img" style="background-image: url({{ asset('assets/images/menu-3.jpg') }});"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="menu-entry mt-lg-4">
                            <a href="#" class="img" style="background-image: url({{ asset('assets/images/menu-4.jpg') }});"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
          <span class="subheading">Discover</span>
        <h2 class="mb-4">Best Coffee Sellers</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
      </div>
    </div>
    <div class="row">

        @foreach ($products as $product)
        <div class="col-md-3">
            <div class="menu-entry">
                    <a href="{{ route('product.single', $product->id) }}" class="img" style="background-image: url({{ asset('assets/images/'.$product->image.'') }});"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="{{ route('product.single', $product->id) }}">{{ $product->name }}</a></h3>
                        <p>{{ $product->description }}</p>
                        <p class="price"><span>${{ $product->price }}</span></p>
                        <p><a href="{{ route('product.single', $product->id) }}" class="btn btn-primary btn-outline-primary">Show</a></p>
                    </div>
                </div>
        </div>
        @endforeach  

        
    </div>
    </div>
</section>

<section class="ftco-gallery">
    <div class="container-wrap">
        <div class="row no-gutters">
                <div class="col-md-3 ftco-animate">
                    <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url({{ asset('assets/images/gallery-1.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 ftco-animate">
                    <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url({{ asset('assets/images/gallery-3.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 ftco-animate">
                    <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url({{ asset('assets/images/gallery-3.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 ftco-animate">
                    <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url({{ asset('assets/images/gallery-4.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                    </a>
                </div>
    </div>
    </div>
</section>



<section class="ftco-section img" id="ftco-testimony" style="background-image: url(images/bg_1.jpg);"  data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Testimony</span>
          <h2 class="mb-4">Customers Says</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
    </div>
    <div class="container-wrap">
      <div class="row d-flex no-gutters">
        @foreach ($reviews as $review )
        <div class="col-md align-self-sm-end ftco-animate">
          <div class="testimony">
             <blockquote>
                <p>&ldquo;
                  {{ $review->review }}.&rdquo;</p>
              </blockquote>
              <div class="author d-flex mt-4">
                {{-- <div class="image mr-3 align-self-center">
                  <img src="{{ asset('assets/images/person_1.jpg') }}" alt="">
                </div> --}}
                <div class="name align-self-center">{{ $review->name }}</div>
              </div>
          </div>
        </div>
        @endforeach
        
      </div>
    </div>
  </section>
@endsection
