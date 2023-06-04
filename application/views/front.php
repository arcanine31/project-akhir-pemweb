<div class="product-easy">
	<div class="container">
		
		<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		<script type="text/javascript">
							$(document).ready(function () {
								$('#horizontalTab').easyResponsiveTabs({
									type: 'default', //Types: default, vertical, accordion           
									width: 'auto', //auto or any width like 600px
									fit: true   // 100% fit in a container
								});
							});
							
		</script>
		<div class="sap_tabs">
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
			<?php foreach($product as $data){ ?>
				<div class="col-md-3 product-men">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item">
							<img src="<?php echo base_url(); ?>assets/uploads/<?php echo $data->gambar; ?>" alt="" class="pro-image-front">
							<img src="<?php echo base_url(); ?>assets/uploads/<?php echo $data->gambar; ?>" alt="" class="pro-image-back">
							<div class="men-cart-pro">
								<div class="inner-men-cart-pro">
									<a href="<?php echo base_url(); ?>home/single/<?php echo $data->id_asesoris ; ?>" class="link-product-add-cart">Quick View</a>
								</div>
							</div>
						</div>
						
						<div class="item-info-product ">
							<h4><a href="<?php echo base_url(); ?>home/single/<?php echo $data->id_asesoris ; ?>"><?php echo $data->nama_asesoris ;?></a></h4>
							<div class="info-product-price">
								<span class="item_price">$<?php $fp = $data->harga; echo $price = $fp-($fp/10); ?></span>
								<del>$<?php echo $data->harga ;?></del>
							</div>
							<a href="<?php echo base_url(); ?>home/single/<?php echo $data->id_asesoris ; ?>" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
						</div>
					</div>
				</div>
			<?php } ;?>
			</div>
		</div>
	</div>
</div>