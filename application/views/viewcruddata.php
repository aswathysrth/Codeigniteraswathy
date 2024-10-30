<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
	<title>Crud View</title>
</head>
<body>
	<?php
		if($this->session->flashdata('Sucessmessage')){
	?>
	
		<div class="alert alert-success alert-dismissible">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong><?php echo $this->session->flashdata('Sucessmessage'); ?></strong>
		</div>
	<?php
		}
	?>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Full Name</th>
	      <th scope="col">Email</th>
	      <th scope="col">Phone Number</th>
	      <th scope="col">Gender</th>
	      <th scope="col">Language</th>
	      <th scope="col">Qualification</th>
	      <th scope="col">Image</th>
	      <th scope="col">Status</th>
	      <th scope="col">Added on</th>
	      <th scope="col" colspan="2" style="text-align: center;">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
	  		if($data){
	  			foreach ($data as $key => $value) {
	  				?>
	  				 <tr>
	  				 	<td><?php echo $value->Id;?></td>
	  				 	<td><?php echo $value->fullname;?></td>
	  				 	<td><?php echo $value->email;?></td>
	  				 	<td><?php echo $value->phone;?></td>
	  				 	<td><?php echo $value->gender;?></td>
	  				 	<td><?php echo $value->language;?></td>
	  				 	<td><?php echo $value->qualification;?></td>
	  				 	<td><img src="<?php echo base_url()."uploads/".$value->image;?>" width="40px" /></td>
	  				 	<td>
	  				 		<?php 
	  				 			if( $value->status==1){
	  				 				?>

	  				 					<button type="button" class="btn btn-primary">Active</button>
	  				 				<?php
	  				 			}
	  				 			else{
	  				 				?>
	  				 					<button type="button" class="btn btn-secondary">In active</button>
	  				 				<?php
	  				 			}
	  				 		?>
	  				 		
	  				 	</td>
	  				 	<td><?php echo $value->added_on;?></td>
	  				 	<td><a href="<?php echo base_url()."CrudController/updateData/$value->Id"?>"><button type="button" class="btn btn-success">Update</button></a></td>
	  				 	<td><a href="<?php echo base_url()."CrudController/deleteData/$value->Id"?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
	  				  </tr>	
	  				<?php
	  			}
	  		}
	  		else{
	  			?>
	  			 <tr>
	  				<td colspan="11" style="text-align:center;">No Records Found</td>
	  			</tr> 	

	  			<?php
	  		}
	  	?>
	
	  </tbody>
	</table>
</body>
</html>