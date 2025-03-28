@extends('layouts.main')  

@section('judul-halaman')
	<a class="navbar-brand" href="index.html">List<span>Tas</span></a>
@endsection

@section('content')
    
		<!--explore start -->
		<section id="explore" class="explore">
			<div class="container">
				<div class="section-header">
					<h2>Bang tas gunung bang</h2>
					<p>Cari tas gunung anda</p>
				</div><!--/.section-header-->
				<div class="explore-content">
					<div class="row">

                        @foreach ($sepatu as $item)
                        <div class=" col-md-4 col-sm-6">
							<div class="single-explore-item">
								<div class="single-explore-img">
									<img width="200" height="200" style="height: 300px;" src="assets/images/tas-gunung/{{ $item->foto_tas }}" alt="explore image">
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
									<h2><a href="#">{{ $item->nama_tas }}</a></h2>
									<p class="explore-rating-price">
										<span class="explore-rating">5.0</span>
										
										<span class="explore-price-box">
											form
											<span class="explore-price">{{ $item->harga_tas }}</span>
										</span>
										 <a href="#">Tas Gunung</a>
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
													{{ $item->deskripsi_tas }}
												</p>
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

		<!--subscription strat -->
		<section id="contact"  class="subscription">
			<div class="container">
				<div class="subscribe-title text-center">
					<h2>
						do you want to add your business listing with us?
					</h2>
					<p>
						Listrace offer you to list your business with us and we very much able to promote your Business.
					</p>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="subscription-input-group">
							<form action="#">
								<input type="email" class="subscription-input-form" placeholder="Enter your email here">
								<button class="appsLand-btn subscribe-btn" onclick="window.location.href='#'">
									creat account
								</button>
							</form>
						</div>
					</div>	
				</div>
			</div>

		</section><!--/subscription-->	
		<!--subscription end -->
@endsection