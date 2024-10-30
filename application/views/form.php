<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<div class="container">
		<?php// echo validation_errors(); ?>
		<?php //echo form_open() ;?>
		<?php echo form_open_multipart();?>
			<div class="row">
				<div class="col-md-6">
					<label>Username</label>
					<input type="text"name="username" value=""/>
					<?php echo form_error('username','<div class="error text-danger">', '</div>'); ?>
				</div>
				<div class="col-md-6">
					<?php 
						echo form_label('Password', 'password');
						$data = array(
						        'name'          => 'password',
						        'id'            => 'password',
						        'type'=>'password',
						        'placeholder'         => 'Enter password',
						        'maxlength'     => '100',
						        'size'          => '50',
						        'style'         => 'width:50%'
						);

						echo form_input($data);
						echo form_error('password','<div class="error text-danger">', '</div>');
					?>
				</div>
				
			</div>
			<div class="row">
			    <div class="col-md-6">
					<label>Email</label>
					<input type="text"name="email" value=""/>
					<?php echo form_error('email','<div class="error text-danger">', '</div>'); ?>
				</div>
				 <div class="col-md-6">
				 	<label>Photo</label>
					<input type="file" name="userfile" size="20" />
					<div class="error text-danger">
						<?php echo form_error('userfile','<div class="error text-danger">', '</div>'); ?>
						<?php if(isset( $error)){ echo $error; } ?>
					</div>
				 </div>
			</div>	
			<?php echo form_submit('mysubmit', 'Submit');?>
		<?php echo form_close() ;?>
	</div>
	
</body>
</html>