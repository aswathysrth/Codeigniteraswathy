     
 <?php $this->load->view('header');?>

       <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                    	<?php
                    		if($this->session->flashdata("sucessmessage")){
                    			?>
                    				<div class="alert alert-success" role="alert">
									 	<?php echo $this->session->flashdata("sucessmessage"); ?>
									</div>
                    			<?php
                    		}
                    	?>
                       <?php
                    		if($this->session->flashdata("failedmessage")){
                    			?>
                    				<div class="alert alert-danger" role="alert">
									 	<?php echo $this->session->flashdata("failedmessage"); ?>
									</div>
                    			<?php
                    		}
                    	?>
                    	<?php
                    		if(!$this->session->userdata('pdt_id')) { 
	                    		$pdt_id= mt_rand(11111,34334);
	                    		$this->session->set_userdata('pdt_id',$pdt_id);
	                    	}	
                    		else
                    			$pdt_id=$this->session->userdata('pdt_id');
                    	?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">

                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header border-0 align-items-center d-flex pb-0">
                                                <h4 class="card-title mb-0 flex-grow-1">Product</h4>
                                              	
                                                <div class="text-center mt-4"><a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a></div>

                                            </div>
                                            <div class="card-body">
                                               	<form action="ProductController" method="POST" enctype="multipart/form-data">
                                               		<div class="row">
                                               			<div class="col-md-6">
		                                                    <div class="form-floating mb-3">
		                                                        <input type="text" name= "pro_id" class="form-control" id="floatingctnameInput" placeholder="Enter product name" value="<?php echo $pdt_id;?>" readonly>
		                                                        <label for="floatingctnameInput">Product Id</label>
		                                                         <?php echo form_error('pro_id');?>

		                                                    </div>
		                                                </div>
                                               		</div>	
		                                            <div class="row">
		                                                <div class="col-md-6">
		                                                    <div class="form-floating mb-3">
		                                                        <select name= "category" class="form-select parent_category" id="floatingSelectGrid" aria-label="Parent Category">
		                                                            <option value="" selected>select Parent category</option>
		                                                            <?php
		                                                            	if($parentcategories){
		                                                            		foreach($parentcategories as $c){
		                                                            			?>
		                                                            				 <option value="<?php echo $c->cat_id;?>"><?php echo $c->cat_name;?></option>
		                                                            			<?php
		                                                            		}
		                                                            	}
		                                                            ?>
		                                                           
		                                                        </select>
		                                                        <label for="floatingSelectGrid">Parent Category</label>
		                                                        <?php echo form_error('category');?>
		                                                    </div>
		                                                </div>
		                                                 <div class="col-md-6">
		                                                    <div class="form-floating mb-3">
		                                                        <select name= "sub_category" class="form-select sub_cat" id="floatingSelectGrid" aria-label="Sub Category">
		                                                            <option value="" selected>select Sub category</option>
		                                                           
		                                                        </select>
		                                                        <label for="floatingSelectGrid">Sub Category</label>
		                                                        <?php echo form_error('sub_category');?>
		                                                    </div>
		                                                </div>
		                                                
		                                            </div>
		                                             <div class="row">
		                                             	<div class="col-md-6">
		                                                    <div class="form-floating mb-3">
		                                                        <input type="text" name= "pro_name" class="form-control" id="floatingctnameInput" placeholder="Enter product name">
		                                                        <label for="floatingctnameInput">Product Name</label>
		                                                         <?php echo form_error('pro_name');?>

		                                                    </div>
		                                                </div>
		                                                
		                                                 <div class="col-md-6">
		                                                    <div class="form-floating mb-3">
		                                                        <input type="text" name= "brand" class="form-control" id="floatingctnameInput" placeholder="Enter brand name">
		                                                        <label for="floatingctnameInput">Brand Name</label>
		                                                         <?php echo form_error('brand');?>

		                                                    </div>
		                                                </div>
		                                            </div>    
		                                            <div class="row">
		                                                <div class="col-md-6">
		                                                    <div class="form-floating mb-3">
		                                                        <select name= "featured" class="form-select" id="floatingSelectGrid" aria-label="Feature">
		                                                            <option value="" selected>Select Feature</option>
		                                                            <option value="1">Deal of the month</option>
		                                                            <option value="2">New arrival</option>
		                                                           
		                                                           
		                                                        </select>
		                                                        <label for="floatingSelectGrid">Feature</label>
		                                                        <?php echo form_error('featured');?>
		                                                    </div>
		                                                </div>
		                                                 <div class="col-md-6">
		                                                    <div class="form-floating mb-3">
		                                                      	<textarea name="highlights"  class="form-control" id="floatingctnameInput" ></textarea>
		                                                        <label for="floatingctnameInput">Highlights</label>
		                                                         <?php echo form_error('highlights');?>

		                                                    </div>
		                                                </div>
		                                            </div>  
		                                            <div class="row">
		                                                 <div class="col-md-6">
		                                                    <div class="form-floating mb-3">
		                                                      	<textarea name="description"  class="form-control" id="floatingctnameInput" ></textarea>
		                                                        <label for="floatingctnameInput">Description</label>
		                                                         <?php echo form_error('description');?>

		                                                    </div>
		                                                </div>
		                                                <div class="col-md-6">
		                                                    <div class="form-floating mb-3">
		                                                        <input type="text" name= "meta_title" class="form-control" id="floatingctnameInput" placeholder="Enter meta title">
		                                                        <label for="floatingctnameInput">Meta Title</label>
		                                                         <?php echo form_error('meta_title');?>

		                                                    </div>
		                                                </div>
		                                            </div>  
		                                             <div class="row">
		                                                <div class="col-md-6">
		                                                    <div class="form-floating mb-3">
		                                                        <input type="text" name= "meta_keywords" class="form-control" id="floatingctnameInput" placeholder="Enter meta keywords">
		                                                        <label for="floatingctnameInput">Meta Keywords</label>
		                                                         <?php echo form_error('meta_keywords');?>

		                                                    </div>
		                                                </div>
		                                                <div class="col-md-6">
		                                                    <div class="form-floating mb-3">
		                                                        <input type="text" name= "meta_desc" class="form-control" id="floatingctnameInput" placeholder="Enter meta keywords">
		                                                        <label for="floatingctnameInput">Meta Description</label>
		                                                         <?php echo form_error('meta_desc');?>

		                                                    </div>
		                                                </div>
		                                            </div>
		                                             <div class="row">
		                                                <div class="col-md-6">
		                                                    <div class="form-floating mb-3">
		                                                        <h4 class="card-title">Product Image</h4>
						                                        <div class="input-group">
						                                            <input type="file" name="pro_main_image" class="form-control" id="customFile">
						                                        </div>
						                                          <?php echo form_error('pro_main_image');?>
						                                           <?php if(isset($productimgerror)) echo $productimgerror;?>
		                                                    </div>
		                                                </div>
		                                                <div class="col-md-6">
		                                                    <div class="form-floating mb-3">
		                                                        <h4 class="card-title">Gallery Image</h4>
						                                        <div class="input-group">
						                                            <input type="file" name="gallery_image" class="form-control" id="customFile">
						                                        </div>
						                                          <?php echo form_error('gallery_image');?>
						                                           <?php if(isset($error)) echo $error;?>
		                                                    </div>
		                                                </div>
		                                              
		                                            </div> 
		                                            <div class="row">
		                                                <div class="col-md-6">
		                                                     <div class="form-floating mb-3">
		                                                        <input type="text" name= "stock" class="form-control" id="floatingctnameInput" placeholder="Enter Stock">
		                                                        <label for="floatingctnameInput">Stock</label>
		                                                         <?php echo form_error('stock');?>

		                                                    </div>
		                                                </div>
		                                                <div class="col-md-6">
		                                                    <div class="form-floating mb-3">
		                                                        <input type="text" name= "MRP" class="form-control" id="floatingctnameInput" placeholder="Enter MRP">
		                                                        <label for="floatingctnameInput">MRP</label>
		                                                         <?php echo form_error('MRP');?>

		                                                    </div>
		                                                </div>
		                                              
		                                            </div> 
	                                              <div class="row">
	                                              		 <div class="col-md-6">
		                                                    <div class="form-floating mb-3">
		                                                        <input type="text" name= "selling_price" class="form-control" id="floatingctnameInput" placeholder="Enter MRP">
		                                                        <label for="floatingctnameInput">Selling Price</label>
		                                                         <?php echo form_error('selling_price');?>

		                                                    </div>
		                                                </div>
	                                              		 <div class="col-md-6">
		                                                     <div class="form-floating mb-3">
		                                                        <select name= "status" class="form-select" id="floatingstatusGrid" aria-label="Status">
		                                                            <option value="" selected>select status</option>
		                                                            <option value="1">Active</option>
		                                                            <option value="2">De active</option>
		                                                        </select>
		                                                        <label for="floatingStatusGrid">Status</label>
		                                                         <?php echo form_error('status');?>
		                                                    </div>
		                                                </div>
	                                              </div>                      
		                                            <div>
		                                                <button type="submit" class="btn btn-primary w-md">Submit</button>
		                                            </div>
		                                        </form>
                                            </div>
                                        </div>
                                    </div>

                                   
                                </div>
                            </div>

                           

                      

                    </div>
                    <!-- container-fluid -->
                </div>
     
 <?php $this->load->view('footer');?>
