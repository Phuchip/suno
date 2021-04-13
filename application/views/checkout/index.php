<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Cake - Bakery</title>

        <!-- Icon css link -->
        <?php include('include/css1.php') ?>
    </head>
    <body>
        
        <!--================Main Header Area =================-->
        <header class="main_header_area">
            <!-- header-top start -->
            <?php include('include/header-top1.php') ?>
            <!-- header-top End -->
            <!-- navbar start -->
            <?php include('include/navbar5.php') ?>
            <!-- navbar end -->
        </header>
        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
            <div class="container">
                <div class="banner_text">
                    <h3>Thanh toán</h3>
                    <ul>
                        <li><a href="index.html">Trang chủ</a></li>
                        <li><a href="checkout.html">Thanh toán</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Billing Details Area =================-->
        <section class="billing_details_area p_100">
            <div class="container">
                <div class="return_option">
                    <h4>Bạn đã có tài khoản ? <a href="#">Ấn vào đây để đăng nhập</a></h4>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="main_title">
                            <h2>Đơn thanh toán</h2>
                        </div>    
                        <div class="billing_form_area">
                        <form method="post">
                            <div class="form-group col-md-12">
                                <label for="name">Tên Của Bạn *</label>
                                <input type="text" class="form-control" name="name" value="<?php echo !empty($custData['name'])?$custData['name']:''; ?>" placeholder="Nhập tên của bạn..." required>
                                <?php echo form_error('name','<p class="help-block error">','</p>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="email">Địa chỉ email *</label>
                                <input type="email" class="form-control" name="email" value="<?php echo !empty($custData['email'])?$custData['email']:''; ?>" placeholder="Nhập địa chỉ email..." required>
                                <?php echo form_error('email','<p class="help-block error">','</p>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="phone">Số điện thoại *</label>
                                <input type="text" class="form-control" name="phone" value="<?php echo !empty($custData['phone'])?$custData['phone']:''; ?>" placeholder="Nhập số điện thoại..." required>
                                <?php echo form_error('phone','<p class="help-block error">','</p>'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="address">Địa chỉ giao hàng</label>
                                <input type="text" class="form-control" name="address" value="<?php echo !empty($custData['address'])?$custData['address']:''; ?>" placeholder="Địa chỉ giao hàng..." required>
                                <?php echo form_error('address','<p class="help-block error">','</p>'); ?>
                            </div>
                            <input class="btn btn-success btn-lg btn-block" type="submit" name="placeOrder" value="Đặt hàng">
                        </form>
                        </div>
                    </div>
                    <?php if(!empty($error_msg)){ ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
                    </div>
                    <?php } ?>
                    
                    <div class="col-lg-5">
                    <div class="order_box_price">
                        <div class="main_title">
                            <h2>Đơn hàng của bạn</h2>
                        </div>
                            <span class="badge badge-secondary badge-pill"><?php echo $this->cart->total_items(); ?></span>
                        </h4>
                        <div class="payment_list">
                                <div class="price_single_cost">
                                    <h5>Sản phẩm <span>Tổng tiền</span></h5>
                                    <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){ ?>
                                    <h5><?php echo $item["name"]; ?> X <?php echo $item["qty"]; ?> <span><?php echo $item["subtotal"]. 'VNĐ'; ?></span></h5>
                                    <?php  } ?>
                                    <h4>Tổng tiền <span><?php echo $this->cart->total(). 'VNĐ'; ?></span></h4>
                                    <h5>Phí giao hàng<span class="text_f">Free</span></h5>
                                    <h3>Tổng đơn hàng <span><?php echo $this->cart->total(). 'VNĐ'; ?></span></h3>
                                </div>

                                    
                                    <!-- <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <p>Không có sản phẩm nào trong giỏ hàng...</p>
                                    </li>
                                    <?php } ?> -->
                        <a href="<?php echo base_url(''); ?>" class="btn btn-block btn-info">Mua thêm</a>
                    </div>
                    </div>
                </div>
                </div>
        </section>
        <!--================End Billing Details Area =================-->   
        
        <!--================Newsletter Area =================-->
        <!--================Newsletter Area =================-->
        <?php include('include/newsletter.php') ?>
        <!--================End Newsletter Area =================-->
        
        <!--================Footer Area =================-->
        <?php include('include/footer.php') ?>
        <!--================End Footer Area =================-->
        
        
        <!--================Search Box Area =================-->
        <?php include('include/Search.php') ?>
    </body>

</html>
            