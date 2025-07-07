<!doctype html>
<html lang="en" class="semi-dark">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/logo-icon.jpg" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/notifications/css/lobibox.min.css" rel="stylesheet"/>
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet"/>
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />
	<title>Wiegh Link</title>
</head>

<body onload="info_noti()">
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
        @include('layout.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
        @include('layout.header')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 row-cols-xxl-4">
                   <div class="col">
					 <div class="card radius-10 bg-gradient-cosmic">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div class="me-auto">
									<p class="mb-0 text-white">Truck Weight</p>
									<h4 class="my-1 text-white">48kg</h4>

								</div>
								<div id="chart1"></div>
							</div>
						</div>
					 </div>
				   </div>
				   <div class="col">
					<div class="card radius-10 bg-gradient-ibiza">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div class="me-auto">
								   <p class="mb-0 text-white">Load Weight</p>
								   <h4 class="my-1 text-white">4kg</h4>

							   </div>
							   <div id="chart2"></div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 bg-gradient-ohhappiness">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div class="me-auto">
								   <p class="mb-0 text-white">Total Weight</p>
								   <h4 class="my-1 text-white">52kg</h4>

							   </div>
							   <div id="chart3"></div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 bg-gradient-kyoto">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div class="me-auto">
								   <p class="mb-0 text-dark">Maximum Weight</p>
								   <h4 class="my-1 text-dark">70.4Kg</h4>

							   </div>
							   <div id="chart4"></div>
						   </div>
					   </div>
					</div>
				  </div>
				</div><!--end row-->

				<div class="row">
                   <div class="col-12 col-lg-12">
                      <div class="card radius-10">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Weight Overview</h6>
								</div>
								<div class="dropdown ms-auto">
									<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
									</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="javascript:;">Action</a>
										</li>
										<li><a class="dropdown-item" href="javascript:;">Another action</a>
										</li>
										<li>
											<hr class="dropdown-divider">
										</li>
										<li><a class="dropdown-item" href="javascript:;">Something else here</a>
										</li>
									</ul>
								</div>
							</div>
						  </div>
						  <div class="card-body">
							<div class="d-flex align-items-center ms-auto font-13 gap-2 mb-3">
								<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-info"></i>Users</span>
								<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-danger"></i>Customer</span>
							</div>
							<div class="chart-container-9">
								<canvas id="chart5"></canvas>
							  </div>
						  </div>
						  <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-0 row-group text-center border-top">
							<div class="col">
							  <div class="p-3">
								<h4 class="mb-0">100kg</h4>
								<small class="mb-0">Today's Load Gain <span> <i class="bx bx-up-arrow-alt align-middle"></i> 2.43%</span></small>
							  </div>
							</div>
							<div class="col">
							  <div class="p-3">
								<h4 class="mb-0">856kg</h4>
								<small class="mb-0">This Week Load Gain <span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.65%</span></small>
							  </div>
							</div>
							<div class="col">
							  <div class="p-3">
								<h4 class="mb-0">2400kg</h4>
								<small class="mb-0">This Month Load Gain <span> <i class="bx bx-up-arrow-alt align-middle"></i> 5.62%</span></small>
							  </div>
							</div>
							<div class="col">
								<div class="p-3">
								  <h4 class="mb-0">4,562kg</h4>
								  <small class="mb-0">This Year Load Gain <span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.62%</span></small>
								</div>
							  </div>
						  </div>
					  </div>
				   </div>
				</div><!--end row-->

			<!--end row-->

				 <div class="card radius-10">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<div>
								<h6 class="mb-0">Recent Orders</h6>
							</div>
							<div class="dropdown ms-auto">
								<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="javascript:;">Action</a>
									</li>
									<li><a class="dropdown-item" href="javascript:;">Another action</a>
									</li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="javascript:;">Something else here</a>
									</li>
								</ul>
							</div>
						</div>
					 </div>
                         <div class="card-body">

						 <div class="table-responsive">
						   <table class="table align-middle mb-0">
							<thead class="table-light">
							 <tr>
							   <th>Truck NO</th>
							   <th>Photo</th>
							   <th>Product ID</th>
							   <th>Truck weight</th>
							   <th>Load Gain</th>
							   <th>Maintenance date</th>
							   <th>Shipping</th>
							 </tr>
							 </thead>
							 <tbody><tr>
							  <td>52345</td>
							  <td><img src="https://tse3.mm.bing.net/th/id/OIP.AX1XFKQk-nzjmPKc6Dt9yQHaE8?rs=1&pid=ImgDetMain" class="product-img-2" alt="product img"></td>
							  <td>#9405822</td>
							  <td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">50kg</span></td>
							  <td>80.4kg</td>
							  <td>03 Feb 2026</td>
							  <td><div class="progress" style="height: 5px;">
									<div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 100%"></div>
								  </div></td>
							 </tr>

							 <tr>
								<td>52345</td>
								<td><img src="https://tse3.mm.bing.net/th/id/OIP.AX1XFKQk-nzjmPKc6Dt9yQHaE8?rs=1&pid=ImgDetMain" class="product-img-2" alt="product img"></td>
								<td>#9405822</td>
								<td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">50kg</span></td>
								<td>80.4kg</td>
								<td>03 Feb 2026</td>
							  <td><div class="progress" style="height: 5px;">
									<div class="progress-bar bg-gradient-blooker" role="progressbar" style="width: 60%"></div>
								  </div></td>
							 </tr>

							 <tr>
								<td>52345</td>
								<td><img src="https://tse3.mm.bing.net/th/id/OIP.AX1XFKQk-nzjmPKc6Dt9yQHaE8?rs=1&pid=ImgDetMain" class="product-img-2" alt="product img"></td>
								<td>#9405822</td>
								<td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">50kg</span></td>
								<td>80.4kg</td>
								<td>03 Feb 2026</td>
							  <td><div class="progress" style="height: 5px;">
									<div class="progress-bar bg-gradient-bloody" role="progressbar" style="width: 70%"></div>
								  </div></td>
							 </tr>

							 <tr>
								<td>52345</td>
								<td><img src="https://tse3.mm.bing.net/th/id/OIP.AX1XFKQk-nzjmPKc6Dt9yQHaE8?rs=1&pid=ImgDetMain" class="product-img-2" alt="product img"></td>
								<td>#9405822</td>
								<td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">50kg</span></td>
								<td>80.4kg</td>
								<td>03 Feb 2026</td>
							  <td><div class="progress" style="height: 5px;">
									<div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 100%"></div>
								  </div></td>
							 </tr>
							 <tr>
								<td>52345</td>
								<td><img src="https://tse3.mm.bing.net/th/id/OIP.AX1XFKQk-nzjmPKc6Dt9yQHaE8?rs=1&pid=ImgDetMain" class="product-img-2" alt="product img"></td>
								<td>#9405822</td>
								<td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">50kg</span></td>
								<td>80.4kg</td>
								<td>03 Feb 2026</td>
							  <td><div class="progress" style="height: 5px;">
									<div class="progress-bar bg-gradient-blooker" role="progressbar" style="width: 60%"></div>
								  </div></td>
							 </tr>
							 <tr>
								<td>52345</td>
								<td><img src="https://tse3.mm.bing.net/th/id/OIP.AX1XFKQk-nzjmPKc6Dt9yQHaE8?rs=1&pid=ImgDetMain" class="product-img-2" alt="product img"></td>
								<td>#9405822</td>
								<td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">50kg</span></td>
								<td>80.4kg</td>
								<td>03 Feb 2026</td>
							  <td><div class="progress" style="height: 5px;">
									<div class="progress-bar bg-gradient-bloody" role="progressbar" style="width: 40%"></div>
								  </div></td>
							 </tr>
						    </tbody>
						  </table>
						  </div>
						 </div>
					</div>

					<!-- <div class="row row-cols-1 row-cols-lg-3">
						<div class="col d-flex">
							<div class="card radius-10 w-100">
								<div class="card-header bg-transparent">
									<div class="d-flex align-items-center">
										<div>
											<h6 class="mb-0">Sales This Week</h6>
										</div>
										<div class="dropdown ms-auto">
											<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="javascript:;">Action</a>
												</li>
												<li><a class="dropdown-item" href="javascript:;">Another action</a>
												</li>
												<li>
													<hr class="dropdown-divider">
												</li>
												<li><a class="dropdown-item" href="javascript:;">Something else here</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="chart-container-1">
										<canvas id="chart16"></canvas>
									  </div>
								</div>
								<ul class="list-group list-group-flush">
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">Completed
										<span class="badge bg-gradient-quepal rounded-pill">25</span>
									</li>
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Apple
										<span class="badge bg-gradient-ibiza rounded-pill">10</span>
									</li>
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Nokia <span class="badge bg-gradient-deepblue rounded-pill">65</span>
									</li>
								</ul>
							</div>
						  </div>
						 <div class="col d-flex">
							<div class="card radius-10 w-100">
								<div class="card-header bg-transparent">
									<div class="d-flex align-items-center">
										<div>
											<h6 class="mb-0">Profit Ratio</h6>
										</div>
										<div class="dropdown ms-auto">
											<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="javascript:;">Action</a>
												</li>
												<li><a class="dropdown-item" href="javascript:;">Another action</a>
												</li>
												<li>
													<hr class="dropdown-divider">
												</li>
												<li><a class="dropdown-item" href="javascript:;">Something else here</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="chart-container-1">
										<canvas id="chart17"></canvas>
									  </div>
								</div>
								<ul class="list-group list-group-flush">
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">Gross Profit <span class="badge bg-gradient-quepal rounded-pill">25</span>
									</li>
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Revenue <span class="badge bg-gradient-ibiza rounded-pill">10</span>
									</li>
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Expense <span class="badge bg-gradient-deepblue rounded-pill">65</span>
									</li>
								</ul>
							</div>
						  </div>
						  <div class="col d-flex">
							<div class="card radius-10 w-100">
								<div class="card-header bg-transparent">
									<div class="d-flex align-items-center">
										<div>
											<h6 class="mb-0">Trending Products</h6>
										</div>
										<div class="dropdown ms-auto">
											<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="javascript:;">Action</a>
												</li>
												<li><a class="dropdown-item" href="javascript:;">Another action</a>
												</li>
												<li>
													<hr class="dropdown-divider">
												</li>
												<li><a class="dropdown-item" href="javascript:;">Something else here</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="chart-container-1">
										<canvas id="chart18"></canvas>
									  </div>
								</div>
								<ul class="list-group list-group-flush">
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">Jeans <span class="badge bg-gradient-quepal rounded-pill">25</span>
									</li>
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">T-Shirts <span class="badge bg-gradient-ibiza rounded-pill">10</span>
									</li>
									<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Shoes
										<span class="badge bg-gradient-deepblue rounded-pill">65</span>
									</li>
								</ul>
							</div>
						  </div>
					 </div>end row


					<div class="row">
						<div class="col-12 col-lg-7 col-xl-6 d-flex">
						  <div class="card radius-10 w-100">
							<div class="card-header bg-transparent">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0">Top Selling Country</h6>
									</div>
									<div class="dropdown ms-auto">
										<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
										</a>
										<ul class="dropdown-menu">
											<li><a class="dropdown-item" href="javascript:;">Action</a>
											</li>
											<li><a class="dropdown-item" href="javascript:;">Another action</a>
											</li>
											<li>
												<hr class="dropdown-divider">
											</li>
											<li><a class="dropdown-item" href="javascript:;">Something else here</a>
											</li>
										</ul>
									</div>
								</div>
							   </div>
							 <div class="card-body">

								<div id="dashboard-map" style="height: 210px"></div>

								<p><i class="flag-icon flag-icon-us me-1"></i> USA <span class="float-end">50%</span></p>
								<div class="progress" style="height: 5px;">
										<div class="progress-bar bg-gradient-moonlit" role="progressbar" style="width: 50%"></div>
									</div>

									<p class="mt-3"><i class="flag-icon flag-icon-ca me-1"></i> Canada <span class="float-end">65%</span></p>
									<div class="progress" style="height: 5px;">
										<div class="progress-bar bg-gradient-ibiza" role="progressbar" style="width: 65%"></div>
									</div>

									<p class="mt-3"><i class="flag-icon flag-icon-gb me-1"></i> England <span class="float-end">85%</span></p>
									<div class="progress" style="height: 5px;">
										<div class="progress-bar bg-gradient-deepblue" role="progressbar" style="width: 85%"></div>
									</div>

									<p class="mt-3"><i class="flag-icon flag-icon-au me-1"></i> Australia <span class="float-end">75%</span></p>
									<div class="progress" style="height: 5px;">
										<div class="progress-bar bg-gradient-orange" role="progressbar" style="width: 75%"></div>
									</div>

									<p class="mt-3"><i class="flag-icon flag-icon-in me-1"></i> India <span class="float-end">45%</span></p>
									<div class="progress" style="height: 5px;">
										<div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 55%"></div>
									</div>
							 </div>
						   </div>
						</div>

						<div class="col-12 col-lg-5 col-xl-6 d-flex">
							<div class="card w-100 radius-10">
							 <div class="card-header bg-transparent">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0">Traffic Resources</h6>
									</div>
									<div class="dropdown ms-auto">
										<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
										</a>
										<ul class="dropdown-menu">
											<li><a class="dropdown-item" href="javascript:;">Action</a>
											</li>
											<li><a class="dropdown-item" href="javascript:;">Another action</a>
											</li>
											<li>
												<hr class="dropdown-divider">
											</li>
											<li><a class="dropdown-item" href="javascript:;">Something else here</a>
											</li>
										</ul>
									</div>
								</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table align-items-center table-flush align-middle">
										 <thead>
										  <tr>
											<th>Source</th>
											<th>Path</th>
											<th>Visits</th>
											<th>Trends</th>
										  </tr>
										  </thead>
										  <tr>
											<td><i class='bx bxl-google'></i> Google</td>
											<td>google.com</td>
											<td>268</td>
											<td><span class="" id="chart8"></span></td>
										  </tr>
										  <tr>
											<td><i class='bx bxl-facebook'></i> Facebook</td>
											<td>facebook.com</td>
											<td>278</td>
											<td><span class="" id="chart9"></span></td>
										  </tr>
										  <tr>
											<td><i class='bx bxl-twitter'></i> Twitter</td>
											<td>twitter.com</td>
											<td>456</td>
											<td><span class="" id="chart10"></span></td>
										  </tr>
										  <tr>
											<td><i class='bx bxl-linkedin'></i> Linkedin</td>
											<td>linkedin.com</td>
											<td>352</td>
											<td><span class="" id="chart11"></span></td>
										  </tr>
										  <tr>
											<td><i class='bx bxl-behance'></i> Behance</td>
											<td>behance.com</td>
											<td>785</td>
											<td><span class="" id="chart12"></span></td>
										  </tr>
										  <tr>
											<td><i class='bx bxl-dribbble'></i> Dribble</td>
											<td>dribble.com</td>
											<td>124</td>
											<td><span class="" id="chart13"></span></td>
										  </tr>
										  <tr>
											<td><i class='bx bxl-github'></i> Github</td>
											<td>github.com</td>
											<td>560</td>
											<td><span class="" id="chart14"></span></td>
										  </tr>
										</table>
									 </div>

								</div>
							</div>

						</div>
					 </div>end row -->
			<!-- </div>
		</div> -->
		<!--end page wrapper -->
		<!--start overlay-->
		<!-- <div class="overlay toggle-icon"></div> -->
		<!--end overlay-->
		<!-- Start Back To Top Button <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a> -->
		<!--End Back To Top Button-->
		<!-- <footer class="page-footer">
			<p class="mb-0">Copyright © 2023. All right reserved.</p>
		</footer>
	</div> -->
	<!--end wrapper-->

	<!-- search modal -->
    <!-- <div class="modal" id="SearchModal" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
		  <div class="modal-content">
			<div class="modal-header gap-2">
			  <div class="position-relative popup-search w-100">
				<input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search" placeholder="Search">
				<span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i class='bx bx-search'></i></span>
			  </div>
			  <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="search-list">
				   <p class="mb-1">Html Templates</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action active align-items-center d-flex gap-2 py-1"><i class='bx bxl-angular fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vuejs fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-magento fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-shopify fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Web Designe Company</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-windows fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-dropbox fs-4' ></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-opera fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-wordpress fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Software Development</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-mailchimp fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-zoom fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-sass fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vk fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Online Shoping Portals</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-slack fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-skype fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-twitter fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vimeo fs-4'></i>eCommerce Html Templates</a>
				   </div>
				</div>
			</div>
		  </div>
		</div>
	  </div> -->
    <!-- end search modal -->



	<!--start switcher-->
	<!-- <div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">Sidebar Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/chartjs/js/chart.js"></script>
	<script src="assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
	<!--notification js -->
	<script src="assets/plugins/notifications/js/lobibox.min.js"></script>
	<script src="assets/plugins/notifications/js/notifications.min.js"></script>
	<script src="assets/js/index3.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>


</html>
