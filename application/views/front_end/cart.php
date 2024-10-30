<!doctype html>
<html class="no-js" lang="zxx">
   
<!-- Mirrored from html.weblearnbd.net/shofy-prv/shofy/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Oct 2023 08:15:35 GMT -->
<head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Shofy - Multipurpose eCommerce HTML Template</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Place favicon.ico in the root directory -->
      <link rel="shortcut icon" type="image/x-icon" href="assets_front/img/logo/favicon.png">
       <base href="<?php echo base_url(); ?>">
        <?php $this->load->view("front_end/links");?>
      
   </head>
   <body>
      <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->

         <?php $this->load->view("front_end/header");?>

      <main>
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

         <!-- breadcrumb area start -->
         <section class="breadcrumb__area include-bg pt-95 pb-50">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Shopping Cart</h3>
                        <div class="breadcrumb__list">
                           <span><a href="#">Home</a></span>
                           <span>Shopping Cart</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- breadcrumb area end -->

         <!-- cart area start -->
         <section class="tp-cart-area pb-120">
            <div class="container">
               <div class="row">
                  <div class="col-xl-9 col-lg-8">
                     <div class="tp-cart-list mb-25 mr-30">
                        <table class="table">
                             <?php 
                              if($cartdetails){
                                 ?>
                           <thead>
                             <tr>
                               <th colspan="2" class="tp-cart-header-product">Product</th>
                               <th class="tp-cart-header-price">Price</th>
                               <th class="tp-cart-header-quantity">Quantity</th>
                               <th></th>
                             </tr>
                           </thead>
                           <tbody>
                             <form id="updatecart_form" action="<?php echo base_url();?>CartController/updateCart" method="post">
                               
                                        
                                       <?php
                                       foreach($cartdetails as $cd){
                                          ?>
                                          <tr>
                                             <!-- img -->
                                             <td class="tp-cart-img"><a href="product-details.html"> <img src="<?php echo $cd->pro_image;?>" alt=""></a></td>
                                             <input type="hidden" name="product[]" value="<?php echo $cd->pro_id;?>" />
                                             <!-- title -->
                                             <td class="tp-cart-title"><a href="product-details.html"><?php echo $cd->pro_name;?></a></td>
                                             <!-- price -->
                                             <td class="tp-cart-price"><span>$<?php echo $cd->pro_price;?></span></td>
                                               <input type="hidden" name="cart_id[]" value="<?php echo $cd->cart_id;?>" />
                                             <!-- quantity -->
                                             <td class="tp-cart-quantity">
                                                <div class="tp-product-quantity mt-10 mb-10">
                                                   <span class="tp-cart-minus">
                                                      <svg width="10" height="2" viewBox="0 0 10 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                         <path d="M1 1H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                      </svg>                                                             
                                                   </span>
                                                   <input class="tp-cart-input" name= "qty[]" type="text" value="<?php echo $cd->pro_qty;?>">
                                                   <span class="tp-cart-plus">
                                                      <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                         <path d="M5 1V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                         <path d="M1 5H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                      </svg>
                                                   </span>
                                                </div>
                                             </td>
                                             <!-- action -->
                                             <td class="tp-cart-action">
                                                <a href="<?php echo base_url()."CartController/deletefromCart/".$cd->cart_id."/".$cd->pro_id;?>">
                                                   <span class="tp-cart-action-btn">
                                                      <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                         <path fill-rule="evenodd" clip-rule="evenodd" d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z" fill="currentColor"/>
                                                      </svg>
                                                      <span>Remove</span>
                                                   </span>
                                                </a>
                                             </td>
                                          </tr>
                                             <?php 

                                       }
                                       
                               ?>
                              </form>
                            
                           </tbody>
                             <?php 
                             }
                                 else{
                                    ?>
                                       <tr>
                                          <td colspan="4">
                                             <div class="alert alert-warning" role="alert">
                                                No Items In Cart
                                             </div>
                                          </td>
                                       </tr> 
                                        <tr>
                                          <td colspan="4" style="text-align: center;">
                                             <a href="<?php echo base_url();?>">
                                                <button type="button" class="btn btn-primary">Shop Now</button>
                                             </a>
                                          </td>
                                       </tr>
                                    <?php
                                 }



                           ?>
                         </table>
                     </div>
                       <?php 
                              if($cartdetails){
                                 ?>
                     <div class="tp-cart-bottom">
                        <div class="row align-items-end">
                           <div class="col-xl-6 col-md-8">
                              <div class="tp-cart-coupon">
                                 <form action="#">
                                    <div class="tp-cart-coupon-input-box">
                                       <label>Coupon Code:</label>
                                       <div class="tp-cart-coupon-input d-flex align-items-center">
                                          <input type="text" placeholder="Enter Coupon Code">
                                          <button type="submit">Apply</button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="col-xl-6 col-md-4">
                              <div class="tp-cart-update text-md-end">
                                 <button type="button" class="tp-cart-update-btn update_cart">Update Cart</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  <?php } ?>
                  </div>
                    <?php 
                              if($cartdetails){
                                 ?>
                  <div class="col-xl-3 col-lg-4 col-md-6">
                     <div class="tp-cart-checkout-wrapper">
                        <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                           <span class="tp-cart-checkout-top-title">Subtotal</span>
                           <span class="tp-cart-checkout-top-price">$<?php echo $subtotal;?></span>
                        </div>
                        <div class="tp-cart-checkout-shipping">
                           <h4 class="tp-cart-checkout-shipping-title">Shipping</h4>

                           <div class="tp-cart-checkout-shipping-option-wrapper">
                                 <label for="flat_rate">Shipping Charge: <span>$<?php echo $shipping_charge;?></span></label>
                             
                           </div>
                        </div>
                        <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                           <span>Total</span>
                           <span>$<?php echo $total;?></span>
                        </div>
                        <div class="tp-cart-checkout-proceed">
                           <a href="<?php echo base_url();?>CheckoutController" class="tp-cart-checkout-btn w-100">Proceed to Checkout</a>
                        </div>
                     </div>
                  </div>
                    <?php } ?>
               </div>
            </div>
         </section>
         <!-- cart area end -->

      </main>
      

      <!-- footer area start -->
      <footer>
         <div class="tp-footer-area tp-footer-style-2 tp-footer-style-primary tp-footer-style-6" data-bg-color="#F4F7F9">
            <div class="tp-footer-top pt-95 pb-40">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-4 col-lg-3 col-md-4 col-sm-6">
                        <div class="tp-footer-widget footer-col-1 mb-50">
                           <div class="tp-footer-widget-content">
                              <div class="tp-footer-logo">
                                 <a href="index.html">
                                    <img src="assets_front/img/logo/logo.svg" alt="logo">
                                 </a>
                              </div>
                              <p class="tp-footer-desc">We are a team of designers and developers that create high quality WordPress</p>
                              <div class="tp-footer-social">
                                 <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                 <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                 <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                 <a href="#"><i class="fa-brands fa-vimeo-v"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="tp-footer-widget footer-col-2 mb-50">
                           <h4 class="tp-footer-widget-title">My Account</h4>
                           <div class="tp-footer-widget-content">
                              <ul>
                                 <li><a href="#">Track Orders</a></li>
                                 <li><a href="#">Shipping</a></li>
                                 <li><a href="#">Wishlist</a></li>
                                 <li><a href="#">My Account</a></li>
                                 <li><a href="#">Order History</a></li>
                                 <li><a href="#">Returns</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="tp-footer-widget footer-col-3 mb-50">
                           <h4 class="tp-footer-widget-title">Infomation</h4>
                           <div class="tp-footer-widget-content">
                              <ul>
                                 <li><a href="#">Our Story</a></li>
                                 <li><a href="#">Careers</a></li>
                                 <li><a href="#">Privacy Policy</a></li>
                                 <li><a href="#">Terms & Conditions</a></li>
                                 <li><a href="#">Latest News</a></li>
                                 <li><a href="#">Contact Us</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="tp-footer-widget footer-col-4 mb-50">
                           <h4 class="tp-footer-widget-title">Talk To Us</h4>
                           <div class="tp-footer-widget-content">
                              <div class="tp-footer-talk mb-20">
                                 <span>Got Questions? Call us</span>
                                 <h4><a href="tel:670-413-90-762">+670 413 90 762</a></h4>
                              </div>
                              <div class="tp-footer-contact">
                                 <div class="tp-footer-contact-item d-flex align-items-start">
                                    <div class="tp-footer-contact-icon">
                                       <span>
                                          <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M1 5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6H5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                             <path d="M13 5.40039L10.496 7.40039C9.672 8.05639 8.32 8.05639 7.496 7.40039L5 5.40039" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                             <path d="M1 11.4004H5.8" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                             <path d="M1 8.19922H3.4" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>
                                       </span>
                                    </div>
                                    <div class="tp-footer-contact-content">
                                       <p><a href="https://html.weblearnbd.net/cdn-cgi/l/email-protection#7f0c171019063f0c0a0f0f100d0b511c1012"><span class="__cf_email__" data-cfemail="f88b90979e81b88b8d8888978a8cd69b9795">[email&#160;protected]</span></a></p>
                                    </div>
                                 </div>
                                 <div class="tp-footer-contact-item d-flex align-items-start">
                                    <div class="tp-footer-contact-icon">
                                       <span>
                                          <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M8.50001 10.9417C9.99877 10.9417 11.2138 9.72668 11.2138 8.22791C11.2138 6.72915 9.99877 5.51416 8.50001 5.51416C7.00124 5.51416 5.78625 6.72915 5.78625 8.22791C5.78625 9.72668 7.00124 10.9417 8.50001 10.9417Z" stroke="currentColor" stroke-width="1.5"/>
                                             <path d="M1.21115 6.64496C2.92464 -0.887449 14.0841 -0.878751 15.7889 6.65366C16.7891 11.0722 14.0406 14.8123 11.6313 17.126C9.88298 18.8134 7.11704 18.8134 5.36006 17.126C2.95943 14.8123 0.210885 11.0635 1.21115 6.64496Z" stroke="currentColor" stroke-width="1.5"/>
                                          </svg>
                                       </span>
                                    </div>
                                    <div class="tp-footer-contact-content">
                                       <p><a href="https://www.google.com/maps/place/Sleepy+Hollow+Rd,+Gouverneur,+NY+13642,+USA/@44.3304966,-75.4552367,17z/data=!3m1!4b1!4m6!3m5!1s0x4cccddac8972c5eb:0x56286024afff537a!8m2!3d44.3304928!4d-75.453048!16s%2Fg%2F1tdsjdj4" target="_blank">79 Sleepy Hollow St. <br> Jamaica, New York 1432</a></p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tp-footer-bottom">
               <div class="container">
                  <div class="tp-footer-bottom-wrapper">
                     <div class="row align-items-center">
                        <div class="col-md-6">
                           <div class="tp-footer-copyright">
                              <p>© 2023 All Rights Reserved  |  HTML Template by <a href="index.html">Themepure</a>.</p>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="tp-footer-payment text-md-end">
                              <p>
                                 <img src="assets_front/img/footer/footer-pay.png" alt="">
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer area end -->



      <!-- JS here -->
       <?php $this->load->view("front_end/footer");?>
   </body>

<!-- Mirrored from html.weblearnbd.net/shofy-prv/shofy/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Oct 2023 08:15:35 GMT -->
</html>
