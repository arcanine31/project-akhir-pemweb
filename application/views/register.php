<div class="checkout">
	<div class="container">
		<div class="col-md-8 col-sm-12 col-xs-12">
			<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
				<h4>Register</h4>
				<br>
				<form action="<?php echo base_url() ;?>home/register_process" method="post">
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-envelope"></span></span>
					  <input type="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1" name="email">
					</div>
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
					  <input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" name="password">
					</div>
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
					  <input type="text" class="form-control" placeholder="Full Name" aria-describedby="basic-addon1" name="name">
					</div>
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list"></span></span>
					  <textarea class="form-control" placeholder="Address" aria-describedby="basic-addon1" name="address"></textarea>
					</div>
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
					  <input type="text" class="form-control" placeholder="Province" aria-describedby="basic-addon1" name="province">
					</div>
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
					  <input type="text" class="form-control" placeholder="City" aria-describedby="basic-addon1" name="city">
					</div>
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-phone"></span></span>
					  <input type="text" class="form-control" placeholder="Telephone" aria-describedby="basic-addon1" name="phone">
					</div>
					<div class="sign-up input-group">
						<input type="submit" value="Submit" >
					</div>
				</form>
			</div>
		</div>
	</div>
</div>	