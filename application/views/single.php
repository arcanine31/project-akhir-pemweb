<div class="single">
	<div class="container">
		<div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
			<div class="grid images_3_of_2">
				<div class="thumb-image"> <img src="<?php echo base_url();?>assets/uploads/<?php echo $single->gambar; ?>" data-imagezoom="true" class="img-responsive"> </div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
			<h3><?php echo $single->nama_asesoris; ?></h3>
			<p><span class="item_price">$<?php $fp = $single->harga; echo $price = $fp-($fp/10); ?><del>$<?php echo $single->harga; ?></del></span></p>

			<div class="desc_product">
				<small>
					<?php echo $single->diskripsi; ?>
				</small>
			</div>
			<br>
			<div class="color-quality">
				<div class="color-quality-right">
					<h5>Quantity :</h5>
					<input id="quantity" type="number" value="1" min="1" class="form-control" width="20px">
				</div>
			</div>
			<br>
			<div class="occasion-cart">
				<a onclick="submit()" class="hvr-outline-out btn-block btn-lg text-center">Add to cart</a>
			</div>
		</div>
				<div class="clearfix"> </div>
	</div>
</div>
<script>
	function submit() {
		var quantity = $('#quantity').val();
		if(quantity != ""){
			window.location = "<?php echo base_url(); ?>home/add_to_cart/<?php echo $single->id_asesoris ; ?>/" + quantity;
		}
	}
</script>