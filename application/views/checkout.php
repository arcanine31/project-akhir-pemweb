<div class="checkout">
	<div class="container">
		<h3><span class="glyphicon glyphicon-check"></span> Order Success!</h3>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
				<h4>Order Code : #<?php echo $transact->order_id ;?></h4>
				<p>Hi <?php echo $this->session->userdata('email') ;?>,

					Thank you for shopping at SMART SHOP.
				</p>
				<p>
					Please make a payment of <?php echo '$'. $price .' or Rp'. $prices = number_format(($price*13355.50),2,',','.');?> to BNI 8855180104101201 account in less than 24 hours.
				</p>
				<p>
					Important info: Please record your Order Code Number #<?php echo $transact->order_id ;?> to confirm your payment.
				</p>
			</div>
			<div class="btn  pull-right btn-lg checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
				<a href="#">Payment Confirmation &nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
			</div>
			
		</div>
	</div>
</div>	
