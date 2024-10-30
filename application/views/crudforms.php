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
	<title>Crud Insert</title>
</head>
<body>
	<div class="container">
		<?php 
			if(!empty($data) && !empty($data->Id)){
				?>
				<form action="<?php echo base_url()."CrudController/updateData/".$data->Id; ?>" enctype="multipart/form-data" method="POST">
				<?php
			}
			else{
				?>
				<form action="<?php echo base_url()."CrudController/addData" ?>" enctype="multipart/form-data" method="POST">
				<?php
			}
		?>	
		

			<div class="row">
				<div class="col-md-6 col-lg-6 mb-3">
					<label>Full Name:</label>
					<input type="text" name="fullname" class="form-control" value="<?php if(!empty($data)){ echo $data->fullname; }?>" />
					<div class="error text-danger"><?php echo form_error('fullname'); ?></div>
				</div>	
				<div class="col-md-6 col-lg-6 mb-3">
					<label>Email:</label>
					<input type="text" name="email" class="form-control" value="<?php if(!empty($data)){ echo $data->email; }?>" />
					<div class="error text-danger"><?php echo form_error('email'); ?></div>
				</div>	
				<div class="col-md-6 col-lg-6 mb-3">
					<label>Phone Number:</label>
					<input type="text" name="phone" class="form-control" value="<?php if(!empty($data)){ echo $data->phone; }?>" />
					<div class="error text-danger"><?php echo form_error('phone'); ?></div>
				</div>	
				<div class="col-md-6 col-lg-6 mb-3">
					<label>Language:</label>
					<select name="language" class="form-control">
						<option value="">Select</option>
						<option value="Malayalm" <?php if(!empty($data) &&  $data->language=="Malayalm"){ echo "selected"; }?>>Malayalm</option>
						<option value="English" <?php if(!empty($data) &&  $data->language=="English"){ echo "selected"; }?>>English</option>
						<option value="Hindi" <?php if(!empty($data) &&  $data->language=="Hindi"){ echo "selected"; }?>>Hindi</option>
					</select>
					<div class="error text-danger"><?php echo form_error('language'); ?></div>
				</div>	
				<div class="col-md-6 col-lg-6 mb-3">
					<label>Gender:</label>
					<div class="form-group">
						<input type="radio" value="male" name="gender" <?php if(!empty($data) &&  $data->gender=="male"){ echo "checked"; }?>>Male
						<input type="radio" value="female" name="gender" <?php if(!empty($data) &&  $data->gender=="female"){ echo "checked"; }?>>Female
					</div>
					<div class="error text-danger"><?php echo form_error('gender'); ?></div>
				</div>	
				<div class="col-md-6 col-lg-6 mb-3">
					<?php 
						if(isset($data) && !empty($data) &&  !empty($data->qualification) &&  !is_array($data->qualification)){
							$qarray=explode(",", $data->qualification);

						} 
						else if(isset($data) && is_array($data->qualification)){
							$qarray=$data->qualification;
						}
					?>
					<label>Qualification:</label>
					<div class="form-group">
						<input type="checkbox" value="bca" name="qualification[]" <?php if(isset($qarray) && in_array("bca", $qarray)){ echo "checked"; }?>>BCA
						<input type="checkbox" value="mca" name="qualification[]"  <?php if(isset($qarray) && in_array("mca", $qarray)){ echo "checked"; }?>>MCA
						<input type="checkbox" value="btech" name="qualification[]"  <?php if(isset($qarray) && in_array("btech", $qarray)){ echo "checked"; }?>>BTech
					</div>
					<div class="error text-danger"><?php echo form_error('qualification'); ?></div>
				</div>	
				<div class="col-md-6 col-lg-6 mb-3">
					<label>Image:</label>
					<div class="form-group">
						<img src="<?php if(!empty($data) &&  !empty($data->image)){ echo base_url()."uploads/".$data->image;} ?>" width="40px" />
						<input type="file" name="image" class="form-control" />
					</div>
					<div class="error text-danger">
						<?php echo form_error('image'); ?>
						<?php if(isset( $error)){ echo $error; } ?>
					</div>
				</div>
				<div class="col-md-6 col-lg-6 mb-3">
					<label>Status:</label>
					<select name="status" class="form-control">
						<option value="">Select</option>
						<option value='1' <?php if(!empty($data) &&  $data->status=='1'){ echo "selected"; }?>>Active</option>
						<option value='0' <?php if(!empty($data) &&  $data->status=='0'){ echo "selected"; }?>>De Active</option>
					</select>
					<div class="error text-danger"><?php echo form_error('status'); ?></div>
				</div>	
			</div>	
			<div class="row">
				<input type="submit" name="" class="btn-info" />	
			</div>
		</form>
		
	</div>	
</body>
</html>