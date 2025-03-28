@extends('layouts.main')

@section('judul-1')
    Home
@endsection

@section('judul-2')
    Page
@endsection

@section('content')
<!--explore start -->
<section id="explore" class="explore">
    <div class="container">
        <div class="section-header">
            <h2>explore</h2>
            <p>Explore New place, food, culture around the world and many more</p>
        </div><!--/.section-header-->
        <div class="explore-content">
            <div class="row">

                @foreach ($products as $item)
                <div class=" col-md-4 col-sm-6">
                    <div class="single-explore-item">
                        <div class="single-explore-img">
                            <img src="assets/img/Product/{{ $item->foto }}" alt="explore image" style="height: 200px;">
                            <div class="single-explore-img-info">
                                <button onclick="window.location.href='#'">best rated</button>
                                <div class="single-explore-image-icon-box">
                                    <ul>
                                        <li>
                                            <div class="single-explore-image-icon">
                                                <i class="fa fa-arrows-alt"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="single-explore-image-icon">
                                                <i class="fa fa-bookmark-o"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-explore-txt bg-theme-1">
                            <h2><a href="#">{{ $item->name }}</a></h2>
                            <p class="explore-rating-price">
                                <span class="explore-rating">5.0</span>
                                <a href="#"> 10 ratings</a> 
                                <span class="explore-price-box">
                                    form
                                    <span class="explore-price">Rp.{{ $item->price }}</span>
                                </span>
                                 <a href="#">{{ $item->jenis }}</a>
                            </p>
                            <div class="explore-person">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="explore-person-img">
                                            <a href="#">
                                                <img src="assets/images/explore/person.png" alt="explore person">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <p>
                                            {{ $item->desc }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="explore-open-close-part">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="explore-map-icon">
                                            <a href="#"><i data-feather="map-pin"></i></a>
                                            <a href="#"><i data-feather="upload"></i></a>
                                            <a href="#"><i data-feather="heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                
                
                
            </div>
        </div>
    </div><!--/.container-->

    

</section><!--/.explore-->
<!--explore end -->

<!--reviews start -->
<section id="reviews" class="reviews">
    <div class="section-header">
        <h2>clients reviews</h2>
        <p>What our client say about us</p>
    </div><!--/.section-header-->
    <div class="reviews-content">
        <div class="testimonial-carousel">

            @foreach ($testimoni as $item)
                <div class="single-testimonial-box">
                    <div class="testimonial-description">
                        <div class="testimonial-info">
                            <div class="testimonial-img">
                                <img src="assets/images/clients/c1.png" alt="clients">
                            </div><!--/.testimonial-img-->
                            <div class="testimonial-person">
                                <h2>{{ $item->nama_pelanggan }}</h2>
                                <h4>london, UK</h4>
                                <div class="testimonial-person-star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                
                            </div><!--/.testimonial-person-->
                        </div><!--/.testimonial-info-->
                        <div class="testimonial-comment">
                            <p>
                                {{ $item->content_testimoni }}
                            </p>
                        </div><!--/.testimonial-comment-->
                    </div><!--/.testimonial-description-->
                </div><!--/.single-testimonial-box-->
                
            @endforeach
        </div>
    </div>

</section><!--/.reviews-->
<!--reviews end -->

<!--blog start -->
<section id="blog" class="blog" >
    <div class="container">
        <div class="section-header">
            <h2>news and articles</h2>
            <p>Always upto date with our latest News and Articles </p>
        </div><!--/.section-header-->
        <div class="blog-content">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="single-blog-item">
                        <div class="single-blog-item-img">
                            <img src="assets/images/blog/b1.jpg" alt="blog image">
                        </div>
                        <div class="single-blog-item-txt">
                            <h2><a href="#">How to find your Desired Place more quickly</a></h2>
                            <h4>posted <span>by</span> <a href="#">admin</a> march 2018</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur de adipisicing elit, sed do eiusmod tempore incididunt ut labore et dolore magna.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-blog-item">
                        <div class="single-blog-item-img">
                            <img src="assets/images/blog/b2.jpg" alt="blog image">
                        </div>
                        <div class="single-blog-item-txt">
                            <h2><a href="#">How to find your Desired Place more quickly</a></h2>
                            <h4>posted <span>by</span> <a href="#">admin</a> march 2018</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur de adipisicing elit, sed do eiusmod tempore incididunt ut labore et dolore magna.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-blog-item">
                        <div class="single-blog-item-img">
                            <img src="assets/images/blog/b3.jpg" alt="blog image">
                        </div>
                        <div class="single-blog-item-txt">
                            <h2><a href="#">How to find your Desired Place more quickly</a></h2>
                            <h4>posted <span>by</span> <a href="#">admin</a> march 2018</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur de adipisicing elit, sed do eiusmod tempore incididunt ut labore et dolore magna.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.container-->
    
</section><!--/.blog-->
<!--blog end -->
@endsection
