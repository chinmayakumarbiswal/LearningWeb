<?php
    require('includes/database.php');
    require('includes/function.php');
	if(isset($_SESSION['usrid']))
	{
		?>
		<!-- <script>
			alert("Welcome <?= $_SESSION['usrid'] ?>");
		</script> -->
		<?php
	}
	else
	{
		header('location:index.php');
	}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<!-- Favicon -->
	<link rel="shortcut icon" href="img/fav.png" />
	<!-- Author Meta -->
	<meta name="author" content="colorlib" />
	<!-- Meta Description -->
	<meta name="description" content="" />
	<!-- Meta Keyword -->
	<meta name="keywords" content="" />
	<!-- meta character set -->
	<meta charset="UTF-8" />
	<!-- Site Title -->
	<title>Blog Home</title>

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:900|Roboto:400,400i,500,700" rel="stylesheet" />
	<!--
      CSS
      =============================================
    -->
	<link rel="stylesheet" href="css/linearicons.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/magnific-popup.css" />
	<link rel="stylesheet" href="css/owl.carousel.css" />
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/hexagons.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css" />
	<link rel="stylesheet" href="css/main.css" />
</head>

<body>
	<!-- ================ Start Header Area ================= -->
	<?php
		include_once('includes/header.php')
	?>
	<!-- ================ End Header Area ================= -->

	<!-- ================ start banner Area ================= -->
	<section class="banner-area">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-12 banner-right">
					<h1 class="text-white">
							Welcome
					</h1>
					<p class="mx-auto text-white  mt-20 mb-40">
						<?= $_SESSION['usrid'] ?>
					</p>
					<div class="link-nav">
						<span class="box">
							<a href="index.php">Home </a>
							<i class="lnr lnr-arrow-right"></i>
							<a href="logout.php">LogOut</a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ================ End banner Area ================= -->
	
	

	<!-- Start top-category-widget Area -->
	<section class="top-category-widget-area pt-90 pb-90 ">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="single-cat-widget">
						<div class="content relative">
							<div class="overlay overlay-bg"></div>
							<a href="#" target="_blank" data-toggle="modal" data-target=".exam">
								<div class="thumb">
									<img class="content-image img-fluid d-block mx-auto" src="img/blog/cat-widget1.jpg" alt="">
								</div>
								<div class="content-details">
									<h4 class="content-title mx-auto text-uppercase">Question Bank</h4>
									<span></span>
									<p>Find Your all question.</p>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-cat-widget">
						<div class="content relative">
							<div class="overlay overlay-bg"></div>
							<a href="#" target="_blank" data-toggle="modal" data-target=".book">
								<div class="thumb">
									<img class="content-image img-fluid d-block mx-auto" src="img/blog/cat-widget2.jpg" alt="">
								</div>
								<div class="content-details">
									<h4 class="content-title mx-auto text-uppercase">Book</h4>
									<span></span>
									<p>Get all Your Book</p>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-cat-widget">
						<div class="content relative">
							<div class="overlay overlay-bg"></div>
							<a href="#" target="_blank" data-toggle="modal" data-target=".note">
								<div class="thumb">
									<img class="content-image img-fluid d-block mx-auto" src="img/blog/cat-widget3.jpg" alt="">
								</div>
								<div class="content-details">
									<h4 class="content-title mx-auto text-uppercase">Notes</h4>
									<span></span>
									<p>Finds Notes</p>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End top-category-widget Area -->





	<!-- start model-->
	<div class="modal fade exam" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

				<?php             
					$postQuery="SELECT * FROM post WHERE category_id=1";
					$runPQ=mysqli_query($db,$postQuery);                                        
					while($post=mysqli_fetch_assoc($runPQ)){	
						$post_pdf=getPdfByPost($db,$post['id']);
				?>
				<div class="jumbotron">
					
					<h1><?=$post['title']?></h1>
					<p class="lead"><?=$post['content']?></p>
					<a class="btn btn-lg btn-primary" href="pdf/<?=$post_pdf ?>" role="button">View navbar docs &raquo;</a>
				</div>
				<?php
					}
				?>

			</div>
		</div>
	</div>
	<div class="modal fade book" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<?php             
					$postQuery="SELECT * FROM post WHERE category_id=2";
					$runPQ=mysqli_query($db,$postQuery);                                        
					while($post=mysqli_fetch_assoc($runPQ)){	
						$post_pdf=getPdfByPost($db,$post['id']);				
				?>
				<div class="jumbotron">
					
					<h1><?=$post['title']?></h1>
					<p class="lead"><?=$post['content']?></p>
					<a class="btn btn-lg btn-primary" href="pdf/<?=$post_pdf ?>" role="button">View navbar docs &raquo;</a>
				</div>
				<?php


					}
				?>
			</div>
		</div>
	</div>
	<div class="modal fade note" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<?php             
					$postQuery="SELECT * FROM post WHERE category_id=3";
					$runPQ=mysqli_query($db,$postQuery);                                        
					while($post=mysqli_fetch_assoc($runPQ)){
						$post_pdf=getPdfByPost($db,$post['id']);					
				?>
				<div class="jumbotron">
					
					<h1><?=$post['title']?></h1>
					<p class="lead"><?=$post['content']?></p>
					<a class="btn btn-lg btn-primary" href="pdf/<?=$post_pdf ?>" role="button">View navbar docs &raquo;</a>
				</div>
				<?php


					}
				?>
			</div>
		</div>
	</div>
	<!-- End model -->


	<!-- ================ start footer Area ================= -->
	<?php
		include_once('includes/footer.php')
	?>
	<!-- ================ End footer Area ================= -->

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/hexagons.min.js"></script>
	<script src="js/jquery.counterup.min.js"></script>
	<script src="js/waypoints.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>