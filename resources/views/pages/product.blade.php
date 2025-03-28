@extends('layouts.main')

@section('judul-1')
    Our
@endsection

@section('judul-2')
    Product
@endsection

@section('content')
    <!-- statistics strat -->
<section id="statistics"  class="statistics">
    <div class="container">
        <div class="statistics-counter"> 
            <div class="col-md-3 col-sm-6">
                <div class="single-ststistics-box">
                    <div class="statistics-content">
                        <div class="counter">90 </div> <span>K+</span>
                    </div><!--/.statistics-content-->
                    <h3>listings</h3>
                </div><!--/.single-ststistics-box-->
            </div><!--/.col-->
            <div class="col-md-3 col-sm-6">
                <div class="single-ststistics-box">
                    <div class="statistics-content">
                        <div class="counter">40</div> <span>k+</span>
                    </div><!--/.statistics-content-->
                    <h3>listing categories</h3>
                </div><!--/.single-ststistics-box-->
            </div><!--/.col-->
            <div class="col-md-3 col-sm-6">
                <div class="single-ststistics-box">
                    <div class="statistics-content">
                        <div class="counter">65</div> <span>k+</span>
                    </div><!--/.statistics-content-->
                    <h3>visitors</h3>
                </div><!--/.single-ststistics-box-->
            </div><!--/.col-->
            <div class="col-md-3 col-sm-6">
                <div class="single-ststistics-box">
                    <div class="statistics-content">
                        <div class="counter">50</div> <span>k+</span>
                    </div><!--/.statistics-content-->
                    <h3>happy clients</h3>
                </div><!--/.single-ststistics-box-->
            </div><!--/.col-->
        </div><!--/.statistics-counter-->	
    </div><!--/.container-->

</section><!--/.counter-->	
<!-- statistics end -->

<!-- Inline button start -->
@auth
    @if(auth()->user()->is_admin)
    <div style="text-align: center; margin: 20px 0;">
        <a href="{{ route('product.create') }}" style="display: inline-block; padding: 10px 20px; font-size: 16px; color: #fff; background-color: #2c2d2f; border: none; border-radius: 5px; text-decoration: none;">Tambah barang woi</a>
    </div>
    @endif
@endauth
<!-- Inline button end -->


<!--explore start -->
<section id="explore" class="explore">
    <div class="container">
        <div class="section-header">
            <h2>explore our shoes</h2>
            <p>Explore New place, food, culture around the world and many more</p>
        </div><!--/.section-header-->
        <div class="explore-content">
            <div class="row">

                @foreach ($sepatu as $item)
                <div class=" col-md-4 col-sm-6">
                    <div class="single-explore-item">
                        <div class="single-explore-img">
                            <img src="assets/img/Product/{{ $item->foto }}" alt="explore image">
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
                            <h2><a href="{{ route('product.show',$item->id) }}">{{ $item->name }}</a></h2>
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
                                    <div class="col-sm-5">
                                        <button  class="close-btn" onclick="window.location.href='{{ route('product.show', $item->id) }}'">rental now</button>
                                    </div>
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


<!--blog start -->
<section id="blog" class="blog" >
    <div class="container">
        <div class="section-header">
            <h2>Explore Our Bag</h2>
            <p>Always upto date with our latest News and Articles </p>
        </div><!--/.section-header-->
        <div class="blog-content">
            <div class="row">

                @foreach ($tas as $item)

                    <div class="col-md-4 col-sm-6">
                        <div class="single-blog-item">
                            <div class="single-blog-item-img">
                                <img src="assets/img/Product/{{ $item->foto }}" alt="blog image">
                            </div>
                            <div class="single-blog-item-txt">
                                <h2><a href="{{ route('product.show',$item->id) }}">{{ $item->name }}</a></h2>
                                <h4>Brand <span>by</span> <a href="#">{{ $item->merek }}</a> march 2018</h4>
                                <p>
                                    {{ $item->desc }}
                                </p>
                            </div>
                        </div>
                    </div>

                @endforeach

                
            </div>
        </div>
    </div><!--/.container-->
    
</section><!--/.blog-->
<!--blog end -->


@endsection