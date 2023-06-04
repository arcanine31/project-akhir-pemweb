<div class="container" style="padding: 50px;">

<div class="modal-header">
	<h3>Add Product</h3>
</div>

<div class="container">
	<form method="post" class="col-lg-5" action="<?php echo base_url();?>forms/upload" enctype="multipart/form-data" >
		<div class="input-group">
			<span class="input-group-addon" id="acc_name">Name</span>
			<input type="text" class="form-control" placeholder="Product Name" aria-describedby="acc_name" name="name">
		</div>
		
		<div class="input-group">
			<span class="input-group-addon" id="desc">Description</span>
			<textarea class="form-control" placeholder="Product Description" aria-describedby="desc" name="desc"></textarea>
		</div>
		
		<div class="input-group">
			<span class="input-group-addon" id="price">Price, $</span>
			<input type="text" class="form-control" placeholder="Product Price" aria-describedby="price" name="price">
		</div>
		
		<div class="input-group " >
		<span class="input-group-addon" id="desc">Category</span>
			<select class="form-control" name="id_cat">
				<option value="" disabled selected> -- Select Category -- </option>
				<?php $query = $this->db->get('kat_asesoris')->result();
					foreach( $query as $option ){
						echo '<option value="'. $option->id_kat_asesoris .'" id="'. $option->id_kat_asesoris .'">
								'. $option->nama_kategori .'</option>';
					}
				?>
			</select>
		</div>
		
		<div class="input-group">
			<span class="input-group-addon" id="brand">Brand</span>
			<input type="text" class="form-control" placeholder="Product Brand" aria-describedby="brand" name="brand">
		</div>
		
		<div class="input-group">
			<span class="input-group-addon" id="stock">Stock</span>
			<input type="text" class="form-control" placeholder="Product Stock" aria-describedby="stock" name="stock">
		</div>
		
		<div class="input-group" >
			<span class="input-group-addon" id="pict">Picture</span>
			<input type="file" class="form-control" placeholer="Product Picture" aria-describedby="pict" name="pict">
		</div>
		
		<div class="input-group">
			<input type="submit" value="Submit" >
		</div>
		
	</form>
</div>

<div class="modal-header">
	<h3>Add Category</h3>
</div>

<div class="container">
	<form method="post" class="col-lg-5" action="<?php echo base_url() ;?>forms/add_cat" enctype="multipart/form-data">
		<div class="input-group">
			<span class="input-group-addon" id="cat_name">Category Name</span>
			<input type="text" class="form-control" placeholder="Category Name" aria-describedby="cat_name" name="cat_name">
		</div>
		<div class="input-group">
			<input type="submit" value="Submit" >
		</div>
	</form>
</div>
</div>