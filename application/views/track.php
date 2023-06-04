<div class="checkout">
<div class="container">
	<h3>
		Data For : #<?php if(isset($name)){echo $name ;};?>
	</h3>
	<div>
		<table class="table table-hover">
			<thead>
			<tr>
				<th>ID Pembeli</th>
				<th>ID Barang</th>
				<th>Status</th>
				<th>Jumlah Barang</th>
				<th>Total Harga</th>
			</tr>
			</thead>
			<tbody>
			<?php
				foreach($track as $track){
					echo "<tr>";
					echo "<td> ". $track->id_pembeli ."</td>";
					echo "<td> ". $track->id_asesoris ."</td>";
					echo "<td> ". $track->status_pembelian ."</td>";
					echo "<td> ". $track->jumlah_barang ."</td>";
					echo "<td> $". $track->total_harga ."</td>";
					echo "</tr>";
			};?>
			</tbody>
		</table>
	</div>
	<div class="btn  pull-right btn-lg checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
		<a href="#">Payment Confirmation &nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
	</div>
</div>
</div>
</div>