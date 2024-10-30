     
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

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">

                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header border-0 align-items-center d-flex pb-0">
                                                <h4 class="card-title mb-0 flex-grow-1">Banner</h4>
                                              	
                                                <div class="text-center mt-4"><a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a></div>

                                            </div>
                                            <div class="card-body">
                                               	<form action="SettingsController/banner" method="POST" enctype="multipart/form-data">
		                                            <div class="row">
		                                                <div class="col-md-6">
		                                                    <div class="form-floating mb-3">
		                                                        <h4 class="card-title">Banner Image</h4>
						                                        <div class="input-group">
						                                            <input type="file" name="bannerimage" class="form-control" id="customFile">
						                                        </div>
						                                          <?php echo form_error('bannerimage');?>
						                                           <?php if(isset($error)) echo $error;?>
		                                                    </div>
		                                                </div>
		                                                <div class="col-md-6">
		                                                     <div class="form-floating mb-3">
		                                                        <select name= "ban_status" class="form-select" id="floatingstatusGrid" aria-label="Status">
		                                                            <option value=""selected>select status</option>
		                                                            <option value="1">Active</option>
		                                                            <option value="2">De active</option>
		                                                        </select>
		                                                        <label for="floatingStatusGrid">Status</label>
		                                                         <?php echo form_error('ban_status');?>
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
