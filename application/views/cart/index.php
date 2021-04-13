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
        <?php include('include/css.php') ?>
</head>
<body>
    <!--================Main Header Area =================-->
    <header class="main_header_area">
        <!-- header-top start -->
        <?php include('include/header-top.php') ?>
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
                <h3>Cart</h3>
                <ul>
                    <li><a href="<?php echo base_url('') ?>">Trang chủ</a></li>
                    <li><a href="<?php echo base_url('cart/index') ?>">Giỏ hàng</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->
        
    <!--================Cart Table Area =================-->

    <script>
    // Update item quantity
    function updateCartItem(obj, rowid){
        $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
            if(resp == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
    </script>
    <section class="cart_table_area p_100">
        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){    ?>
                    <tr>
                        <td>
                            <?php $imageURL = !empty($item["image"])?base_url('image/'.$item["image"]):base_url('assets/images/pro-demo-img.jpeg'); ?>
                            <img src="<?php echo $imageURL; ?>" width="50"/>
                        </td>
                        <td><?php echo $item["name"]; ?></td>
                        <td><?php echo $item["price"].' VNĐ'; ?></td>
                        <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                        <td class="text-right"><?php echo $item["subtotal"].' VNĐ'; ?></td>
                        <td class="text-right"><button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có muốn xóa sản phẩm?')?window.location.href='<?php echo base_url('cart/removeItem/'.$item["rowid"]); ?>':false;"><i class="itrash"></i>Xóa</button> </td>
                    </tr>
                    <?php } }else{ ?>
                    <tr><td colspan="6"><p>Giỏ hàng trống.....</p></td>
                    <?php } ?>
                    <?php if($this->cart->total_items() > 0){ ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>Tổng tiền</strong></td>
                        <td class="text-right"><strong><?php echo $this->cart->total().' VNĐ'; ?></strong></td>
                        <td></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td>
                            <form class="form-inline"> 
                                <div class="form-group"> 
                                    <input type="text" class="form-control" placeholder="Khuyến mãi">
                                </div>
                                <button type="submit" class="btn">Nhập khuyến mãi</button>
                            </form>
                        </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a class="pest_btn" onclick="confirm('Sẽ xóa giỏ hàng')" href="<?php echo base_url('cart/del'); ?>">Xóa giỏ hàng</a>
                                </td>
                                <td>
                                    <a class="pest_btn" href="<?php echo base_url('home/shop'); ?>">Mua tiếp</a>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
            <div class="row cart_total_inner">
                <div class="col-lg-7"></div>
                <div class="col-lg-5">
                    <div class="cart_total_text">
                        <div class="cart_head">
                            Tổng tiền giỏ hàng
                        </div>
                        <?php if($this->cart->total_items() > 0){ ?>
                            <div class="sub_total">
                                <h5>Giỏ hàng <span><?php echo $this->cart->total().' VNĐ'; ?></span></h5>
                            </div>
                            <div class="total">
                                <h4>Tổng cộng <span><?php echo $this->cart->total().' VNĐ'; ?></span></h4>
                            </div>
                            <div class="cart_footer">
                                <a class="pest_btn" href="<?php echo base_url('checkout') ?>">Thanh Toán</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Table Area =================-->
        
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
