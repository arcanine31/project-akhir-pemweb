<!DOCTYPE html>
<html>
<head>
	<title>Smart Shop | Shop Smart</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Smart Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/pignose.layerslider.css" media="all">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
	
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>

	<script src="<?php echo base_url(); ?>assets/js/bootstrap-3.1.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.easing.min.js" type="text/javascript"></script>
</head>

<body>
<div class="header-bot">
	<div class="container">
		<div class="col-md-3 header-left">
			<h1><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo3.jpg"></a></h1>
		</div>
		<div class="col-md-6 header-middle">
			<form method="post" action="<?php echo base_url() ;?>home/search/">
				<div class="search">
					<input name="search" type="search" placeholder="Search and Track Your Stuff Here ..." value="<?php if(isset($name)){echo $name ;};?>">
				</div>
				<div class="section_room">
					<select name="cat" class="frm-field required">
						<option value="">All Categories</option>
						<?php $query = $this->db->get('kat_asesoris')->result();
							foreach( $query as $option ){
								echo '<option value="'. $option->id_kat_asesoris .'" id="'. $option->id_kat_asesoris .'">
										'. $option->nama_kategori .'</option>';
							}
						?>
						<script>
							$('#<?php echo $id_cat ;?>').prop('selected',true);
						</script>
					</select>
				</div>
				<div class="sear-sub">
					<input type="submit" value=" ">
				</div>
				<div class="clearfix"></div>
			</form>
		</div>

		<div class="col-md-3 header-right footer-bottom">
			<ul>
				<?php if($this->session->userdata('loggedin') == false ) {
					echo '
						<li>
							<a href="javascript:login_open()" class="use1" data-toggle="modal" data-target="#myModal4"><span>LogIn</span></a>
						</li>
					' ;
				}else{
					echo '
						<li>
							<a href="'. base_url('home/logout') .'" class="use1" data-toggle="modal" data-target="#myModal4"><span>LogOut</span></a>
						</li>
					' ;
				} ;?>
				<li><a class="fb" href="http://www.facebook.com"></a></li>
				<li><a class="twi" href="http://www.twitter.com"></a></li>
				<li><a class="insta" href="http://www.instagram.com"></a></li>
				<li><a class="you" href="http://www.youtube.com"></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="menu__item <?php  if( $main_view == 'front'){echo 'menu__item--current' ;} ;?>"><a class="menu__link" href="<?php echo base_url();?>">Home</a></li>
					<li class="menu__item <?php  if( $main_view == 'forms' ){echo 'menu__item--current' ;} ;?>"><a class="menu__link" href="<?php echo base_url();?>forms">New Product</a></li>
					<li class="menu__item <?php  if( $main_view == 'track' ){echo 'menu__item--current' ;} ;?>"><a class="menu__link" href="#">Transaction</a></li>
					<li class="menu__item <?php // if( $main_view == '' ){echo 'menu__item--current' ;} ;?>"><a class="menu__link" href="#">About Us</a></li>
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="cart box_1">
				<a href="<?php echo base_url() ; ?>home/cart">
					<h3> <div class="total">
						<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
						<span class="simpleCart_total"></span>
							(<span id="simpleCart_quantity" class="simpleCart_quantity">
							<?php if($this->session->userdata('loggedin') == true ) {
									$id_pembeli = $this->session->userdata('id_pembeli');
									$this->db->from('cart');
									$this->db->where('id_pembeli', $id_pembeli);
									echo $this->db->count_all_results();
								}else{
									echo '0';
								} ?>
							</span> items)
						</div>
					</h3>
				</a>
				<p><a href="<?php echo base_url() ; ?>home/cart" class="simpleCart_empty">Show Cart</a></p>
			</div>	
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<?php
	if(isset($main_view)){
		$this->load->view($main_view);
	}
?>	
<div class="coupons">
	<div class="container">
		<div class="coupons-grids text-center">
			<div class="col-md-3 coupons-gd">
				<h3>Buy your product in a simple way</h3>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				<h4>LOGIN TO YOUR ACCOUNT</h4>
				<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				<h4>SELECT YOUR ITEM</h4>
				<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
				<h4>MAKE PAYMENT</h4>
				<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>

<!------------------ footer --------------------------->
<div class="footer">
	<div class="container">
		<div class="col-md-4 footer-left">
			<h2><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo3.jpg" alt=" " /></a></h2>
			<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur, adipisci velit, sed quia non 
			numquam eius modi tempora incidunt ut labore 
			et dolore magnam aliquam quaerat voluptatem.</p>
		</div>
		<div class="col-md-8 footer-right">
			<div class="sign-grds">
				<div class="col-md-5 sign-gd">
					<h4>Information</h4>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="mens.html">Men's Wear</a></li>
						<li><a href="womens.html">Women's Wear</a></li>
						<li><a href="electronics.html">Electronics</a></li>
					</ul>
				</div>
				
				<div class="col-md-7 sign-gd-two">
					<h4>Store Information</h4>
					<ul>
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Address : 1234k Avenue, 4th block, <span>Newyork City.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email : <a href="mailto:info@example.com">info@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Phone : +1234 567 567</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
		<p class="copy-right">&copy 2016 Smart Shop. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
	</div>
</div>
<!--------------------------- //footer --------------------------->




<!--------------------------- login --------------------------->
			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none;">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button onclick="login_close()" type="button" class="close" data-dismiss="modal" aria-label="Close"><span id="close_button" aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-bottom">
										<h3>Sign up for free</h3>
										<form action="<?php echo base_url() ;?>home/register">
											<div class="sign-up">
												<input type="submit" value="REGISTER NOW" >
											</div>
										</form>
									</div>
									<div class="login-right">
										<h3>Sign in with your account</h3>
										<form method="post" action="<?php echo base_url() ;?>home/login">
											<div class="sign-in">
												<h4>Email :</h4>
												<input type="text" placeholder="Type here" name="email">	
											</div>
											<div class="sign-in">
												<h4>Password :</h4>
												<input type="password" placeholder="Password" name="password">
											</div>
											<div class="sign-in">
												<input type="submit" value="SIGN IN" >
											</div>
										</form>
									</div>
									<div class="clearfix"></div>
								</div>
								<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
<!--------------------------- //login --------------------------->


</body>
</html>
<script>
	function login_open(){
		$('#myModal4').attr('style','display:block');
		$('#myModal4').addClass('in');
		$('#close_button').attr('aria-hidden','false');
	}
	
	function login_close(){
		$('#myModal4').attr('style','display:none');
		$('#myModal4').attr('class','modal fade');
		$('#close_button').attr('aria-hidden','true');
	}
	
	<?php
		$notif = $this->session->flashdata('notif');
		if(isset($notif)){
			if ($notif == 0){
				echo 'alert("Login Gagal")';
			}else if ($notif == 1){
				echo 'alert("Login Berhasil")';
			}else if ($notif == 2){
				echo 'alert("Register Berhasil")';
			}else if ($notif == 3){
				echo 'alert("Register Gagal")';
			}else if ($notif == 4){
				echo 'alert("Upload Berhasil")';
			}else if ($notif == 5){
				echo 'alert("Upload Gagal")';
			}
		}
	?>
</script>