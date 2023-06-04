<div class="checkout">
	<div class="container">
		<h3>My Shopping Bag</h3>
		<div class="col-md-8 col-sm-12 col-xs-12">
			<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub" id="tbl">
				<thead>
					<tr>
						<th>Product</th>
						<th>Quantity</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Remove</th>
					</tr>
				</thead>
				<?php foreach($cart_list as $cart) { ;?>
					<tr class="rem">
						<td class="invert hidden id_asesoris"><?php echo $cart->id_asesoris; ?></td>
						<td class="invert-image col-lg-4" ><a href="<?php echo base_url(); ?>home/single/<?php echo $cart->id_asesoris ; ?>">
							<img src="<?php echo base_url('assets/uploads/'); echo $cart->gambar ;?>" alt=" "class="img-responsive" /></a></td>
						<td class="invert jumlah"><?php echo $cart->jumlah; ?></td>
						<td class="invert"><?php echo $cart->nama_asesoris; ?></td>
						<td class="invert">$<span class="price"><?php $fp = $cart->harga; $q = $cart->jumlah; echo $price = ($fp-($fp/10))*$q; ?></span></td>
						<td class="invert-closeb">
							<div class="rem">
								<a href="<?php echo base_url() ;?>home/remove_cart/<?php echo $cart->id_cart ;?>/<?php echo $cart->id_pembeli ;?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
							</div>
						</td>
					</tr>
				<?php }; ?>
			</table>
			</div>
		</div>
		<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
					<h4>Order Total</h4>
					<ul>
						<li>Total <i>-</i> <span id="total"></span></li>
					</ul>
				</div>
				<br>
				<br>
				<div class="btn btn-block btn-lg checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="javascript:checkout()" >
						<script>
							
						</script>
					Process &nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
				</div>
				<div class="clearfix"> </div>
		</div>
	</div>
</div>	
<script>
	$total = 0;
	$(".price").each(function() {
		$value = $(this).text();
		if(!isNaN($value) && $value.length != 0) {
			$total += parseFloat($value);
		}	
	});
	$('#total').html("$"+$total);
	function checkout() {
		location.assign("<?php echo base_url() ;?>home/checkout/"+$total);
	}
</script>