<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Clean | Ruper</title>

    <?php include_once 'link.php';  ?>

</head>

<body>


    <!-- scroll header and scroll rocket and loader  start------------------ -->
    <div class="scroll_top">
        <i class="fa-solid fa-shuttle-space"></i>
    </div>

    <!-- <div class="center-body">

        <div class="loader-square"></div>

    </div> -->
    <!-- scroll header and scroll rocket and loader  end------------------ -->



    <!-- header start-------------------- -->
    <?php
    include_once 'connection.php';
    include_once 'header.php';
    
    extract($_REQUEST);
    if (isset($btnAddToCart)) {
        $string = exec('getmac');
        $mac = substr($string, 0, 17);

        $strSel = "select * from tbl_product where product_id=" . $hdnProductID;
        $rsSel = mysqli_query($conn, $strSel) or die(mysqli_error($conn));
        $resSel = mysqli_fetch_array($rsSel);

        $strP = "select * from tbl_cart where product_id=" . $hdnProductID;
        $rsP = mysqli_query($conn, $strP) or die(mysqli_error($conn));
        $resP = mysqli_fetch_array($rsP);
        if (mysqli_num_rows($rsP) > 0) {
            $Qty = $resP["quantity"] + 1;
            $x = $Qty * $resSel["price"];
            // $y = $x * $resSel["Discount"] / 100;
            $Amount = $x;
            if (isset($_SESSION["UserID"])) {
                $strUp = "update tbl_cart set quantity=$Qty,total_amount=$Amount where user_id=" . $_SESSION["UserID"] . " and product_id=" . $hdnProductID;
            } else {
                $strUp = "update tbl_cart set quantity=$Qty,total_amount=$Amount where mac_address='$mac' and product_id=" . $hdnProductID;
            }
            mysqli_query($conn, $strUp) or die(mysqli_error($conn));
        } else {


            $strColor = "select * from tbl_product_variance where product_id=$hdnProductID limit 1";
            $rsColor = mysqli_query($conn, $strColor) or die(mysqli_error($conn));
            $resColor = mysqli_fetch_array($rsColor);

            $x = 1 * $resSel["price"];
            // $y=$x*$resSel["Discount"]/100;
            $Amount = $x;

            if (isset($_SESSION["UserID"])) {
                $strIns = "insert into tbl_cart values(null," . $_SESSION["UserID"] . ",$hdnProductID," . $resColor["product_variance_id"] . ",1," . $resSel["price"] . ",$Amount,now(),'$mac')";
            } else {
                $strIns = "insert into tbl_cart values(null,null,$hdnProductID," . $resColor["product_variance_id"] . ",1," . $resSel["price"] . ",$Amount,now(),'$mac')";
            }
            mysqli_query($conn, $strIns) or die(mysqli_error($conn));
            $url = "add_to_cart.php";
            echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
        }
    }




    ?>
    <!-- header end-------------------- -->


    <!-- ------------slider ------------------------------- -->

    <div class="container">
        <div class="row">
            <div class="col-sm-12  col-md-12 col-lg-6">
                <div class="owl-carousel owl-theme slider1">
                    <div class="box">
                        <img src="imgae/index2_1.jpg" alt="" class="responsive">
                        <div class="content wow animate__fadeIn text-light" data-wow-delay=.4s>

                            <div class="sub_title">SALE UP TO 30% OFF</div>
                            <h1 class="slider_h1">Sofa Sale</h1>
                            <a href="shop.php" class="banner_button"><span>Shop Now</span></a>




                        </div>
                    </div>
                    <div class="box">
                        <img src="imgae/index2_2.jpg" alt="" class="responsive">
                        <div class="content wow animate__fadeIn text-light" data-wow-delay=.2s>


                            <div class="sub_title">SALE UP TO 30% OFF</div>
                            <h1 class="slider_h1">Outdoor Chair</h1>
                            <a href="shop.php" class="banner_button"><span>Shop Now</span></a>




                        </div>
                    </div>

                    <div class="box">
                        <img src="imgae/index2_3.jpg" alt="" class="responsive">
                        <div class="content wow animate__fadeIn text-light" data-wow-delay=.2s>
                            <div class="sub_title">SALE UP TO 30% OFF</div>
                            <h1 class="slider_h1">Kitchen Sale</h1>
                            <a href="shop.php" class="banner_button"><span>Shop Now</span></a>



                        </div>
                    </div>


                </div>
            </div>
            <div class="col-sm-12 col-md-12  col-lg-6">
                <div class="banner_right_img">
                    <div class="banner_right_first">
                        <img src="imgae/banner-9.jpg" alt="" class="responsive">
                        <div class="banner_right_first_content">
                            <h3> <a href="#">Storage</a></h3>
                            <p>
                                Crisp, Clean Dining Room <br> Designs for Every Taste
                            </p>
                        </div>

                    </div>
                    <div class="banner_right_secound">
                        <img src="imgae/banner-10.jpg" alt="" class="responsive">
                        <div class="banner_right_secound_content">
                            <h3> <a href="#">Lighting</a></h3>
                            <p>
                                Bring some light to your life <br> with our lighting designs

                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------slider end ------------------------------- -->
    <!-- ---------------------slider secund part--------------- -->

    <div class="spacer_y">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mt-4">
                    <div class="image_banner">
                        <a href="#">
                            <img src="./imgae/cat-27.jpg" class="w-100">
                        </a>
                        <div class="image_banner_content">
                            <a href="#" class="new_arivals">new arivals.</a>
                            <a href="shop.php" class="banner_button"><span>Shop Now</span></a>
                        </div>
                    </div>





                </div>
                <div class="col-md-4 mt-4 ">
                    <div class="image_banner">
                        <a href="#">
                            <img src="./imgae/cat-28.jpg" class="w-100">
                        </a>
                        <div class="image_banner_content">
                            <a href="#" class="new_arivals">trending.
                            </a>
                            <a href="shop.php" class="banner_button"><span>Shop Now</span></a>

                        </div>
                    </div>

                </div>
                <div class="col-md-4 mt-4 ">
                    <div class="image_banner">
                        <a href="#">
                            <img src="./imgae/cat-29.jpg" class="w-100">
                        </a>
                        <div class="image_banner_content">
                            <a href="#" class="new_arivals">staffpick.</a>
                            <a href="shop.php" class="banner_button"><span>Shop Now</span></a>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- ---------------------slider secund part End--------------- -->
    <!-- ---------------------Latest Products part Start--------------- -->

    <div class="spacer_y">
        <div class="container">
            <h1 class="text-center" style="color: #868686; font-weight: 400; font-size: 45px;">Latest Products</h1>
            <div class="em-bar">
                <div class="em_bar_bg">

                </div>
            </div>
            <div class="row  product_box">

                <?php
                $strPro = "select * from tbl_product p,tbl_product_image pi where IsDefault=1 and IsActive=1 and p.product_id=pi.product_id ";
                $rsPro = mysqli_query($conn, $strPro) or die(mysqli_error($conn));
                while ($resPro = mysqli_fetch_array($rsPro)) {
                ?>


                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6  mt-4 ">
                        <div class="main_box ">
                            <div class="pro_img">

                                <?php

                                $imgName = $resPro["image_url"];
                                ?>
                                <img src="<?php echo $imgName; ?>" alt="" style="height:250px;width:320px;">
                                <!-- <img src="<?php //echo $imgName; 
                                                ?>" alt="" class="sec_img" style="height:250px;width:320px;"> -->
                                <div class="social_icon justify-content-center w-100">
                                    <!-- <i class="fa-solid fa-cart-shopping even add_to_cart"></i> -->
                                    <form action="" method="post">
                                        <input type="hidden" name="hdnProductID" value="<?php echo $resPro["product_id"]; ?>">
                                        <button type="submit" class=" add_to_cart" name="btnAddToCart">
                                            <i class="fa-solid fa-cart-shopping even"></i>
                                        </button>
                                        <!-- <button type="submit" class=" add_to_cart">
                                            <i class="fa-regular fa-heart  odd  add_like"></i>
                                        </button> -->
                                        <button type="submit" class=" add_to_cart" formaction="product_detail.php?PID=<?php echo $resPro["product_id"]; ?>">
                                            <i class="fa-solid fa-eye odd"></i>
                                        </button>
                                    </form>
                                </div>

                                <!-- <div class="hot">
                                    <p class="cool">HOT</p>
                                </div> -->

                            </div>
                            <div class="datil">

                                <h2 class="card-title">
                                    <!-- furniture -->
                                    <a href="#"><?php echo $resPro['product_name']; ?></a>
                                </h2>

                                <div class="orignal">
                                    <!-- <p class="first">$65.00</p> -->
                                    <p class="sec"><?php echo "&#8377 " . $resPro['price']; ?></p>
                                </div>

                            </div>


                        </div>

                    </div>
                <?php
                }
                ?>

            </div>

            <div class="load_more mt-5 ">
                <button class="load_btn" id="lod_less_btn"><span>Load More</span></button>
                <button class="less_btn" id="lod_less_btn"><span>Load Less</span></button>



            </div>
        </div>
    </div> 
    <!-- ---------------------Latest Products part End--------------- -->


    <!-- ---------------------RUPPER EXCLUSIVE ONLINE FURNITURE STORE Start--------------- -->
    <div class="spacer_y">
        <div class="container">

            <div class="row g-0">
                <!-- -------------------first product start---------------------- -->
                <div class="col-md-6 col-sm-12">
                    <div class="online_store_img">
                        <img src="./imgae/banner-1.jpg" alt="" style="width: 100%; height: 100%;">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12" style="background-color: #303235;">
                    <div class="online_store_content_side">
                        <div class="online_store_center">
                            <h3>Furniture</h3>
                            <p>Style any outdoor area with some careful study and sound decisions.</p>
                            <a href="shop.php" class="online_shop">SHOP NOW</a>
                        </div>
                    </div>
                </div>
                <!-- -------------------first product end---------------------- -->
                <!-- -------------------secound product start---------------------- -->

                <div class="col-md-6 col-sm-12" style="background-color: #303235;">
                    <div class="online_store_content_side">
                        <div class="online_store_center">
                            <h3>DECOR</h3>
                            <p>Style any outdoor area with some careful study and sound decisions.</p>
                            <a href="shop.php" class="online_shop">SHOP NOW</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="online_store_img">
                        <img src="./imgae/banner-26.jpg" alt="" style="width: 100%; height: 100%;">
                    </div>
                </div>

                <!-- -------------------secound product end---------------------- -->

                <!-- -------------------third product start---------------------- -->
                <div class="col-md-6 col-sm-12">
                    <div class="online_store_img">
                        <img src="./imgae/banner-27.jpg" alt="" style="width: 100%; height: 100%;">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12" style="background-color: #303235;">
                    <div class="online_store_content_side">
                        <div class="online_store_center">
                            <h3>LIGHTING</h3>
                            <p>Style any outdoor area with some careful study and sound decisions.</p>
                            <a href="shop.php" class="online_shop">SHOP NOW</a>
                        </div>
                    </div>
                </div>
                <!-- -------------------third product end---------------------- -->
                <!-- -------------------fourth product start---------------------- -->

                <div class="col-md-6 col-sm-12" style="background-color: #303235;">
                    <div class="online_store_content_side">
                        <div class="online_store_center">
                            <h3>KITCHEN & BATH</h3>
                            <p>Style any outdoor area with some careful study and sound decisions.</p>
                            <a href="shop.php" class="online_shop">SHOP NOW</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="online_store_img">
                        <img src="./imgae/banner-28.jpg" alt="" style="width: 100%; height: 100%;">
                    </div>
                </div>

                <!-- -------------------fourth product end---------------------- -->


            </div>
        </div>
    </div>

    <!-- ---------------------RUPPER EXCLUSIVE ONLINE FURNITURE STORE End--------------- -->
    <!-- ---------------------Client Part Start--------------- -->
    <div class="spacer_y">
        <div class="container">
            <div class="owl-carousel owl-theme slider2">
                <?php
                $strF = "SELECT * FROM tbl_feedback";
                $rsF = mysqli_query($conn, $strF) or mysqli_error($conn);

                while ($resF = mysqli_fetch_array($rsF)) {
                ?>
                    <div class="box2">

                        <div class="star">
                            <?php
                            $strFeed = "select avg(rating) as rating from tbl_feedback";
                            $rsFeed = mysqli_query($conn, $strFeed) or mysqli_error($conn);
                            $resFeed = mysqli_fetch_array($rsFeed);
                            $Val = $resFeed["rating"];
                            for ($i = 1; $i <= 5; $i++) {
                                if ($Val < $i) {
                            ?>
                                    <i class="fa fa-star" style="color: #353535;"></i>
                                <?php
                                } else { ?>
                                    <i class="fa fa-star" style="color: #FFC107;"></i>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="letter">
                            <h1><?php echo $resF['review']; ?></h1>
                        </div>
                        <?php
                        $userid = $resF['user_id'];

                        $str = "SELECT * FROM tbluser WHERE user_id = $userid";
                        $rs = mysqli_query($conn, $str) or mysqli_error($conn);
                        $res = mysqli_fetch_array($rs);

                        if (!is_null($res)) {
                            $imgname = $res['img_url'];
                        ?>

                            <div class="client_box">
                                <img src="<?php echo $imgname; ?>" alt="" srcset="">
                            </div>
                            <p><?php echo $resF['name']; ?></p>


                    </div>
            <?php
                        }
                    }

            ?>
            </div>
        </div>
    </div>
    <!-- ---------------------Client Part End--------------- -->
    <!-- ---------------------Icon Part Start--------------- -->
    <div class="spacer_y">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                    <div class="icon_box">
                        <div class="btn-3 hover-border-3">
                            <div class="icon_services text-center icon_animation">
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>
                            <h2>Free Shipping</h2>
                            <p class="text-center" style="color:#868686">You will love at great low prices</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                    <div class="icon_box">
                        <div class="btn-3 hover-border-3">
                            <div class="icon_services text-center icon_animation">
                                <i class="fa-solid fa-money-check-dollar"></i>
                            </div>
                            <h2>Flexible Payment</h2>
                            <p class="text-center" style="color:#868686">Pay with Multiple Credit Cards</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                    <div class="icon_box">
                        <div class="btn-3 hover-border-3">

                            <div class="icon_services text-center  icon_animation">
                                <i class="fa-solid fa-droplet"></i>

                            </div>
                            <h2>Colour Selection</h2>
                            <p class="text-center" style="color:#868686">You will select product colour.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                    <div class="icon_box">
                        <div class="btn-3 hover-border-3">

                            <div class="icon_services text-center icon_animation">
                                <i class="fa-solid fa-headset"></i>
                            </div>
                            <h2>Online Support</h2>
                            <p class="text-center" style="color:#868686">24 hours a day, 7 days a week</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ---------------------Icon Part End--------------- -->
    <!-- ---------------------Footer Part Start--------------- -->
    <!-- <div class="spacer_y"> -->
    <?php
    include_once 'footer.php';

    ?>
    <!-- ---------------------Footer Part End--------------- -->


    <script>


    </script>


    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/include-html.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/kursor.js"></script>
    <!-- <script src="js/veldation.js"></script> -->
    <script src="js/veldation.js"></script>
    <script src="js/cursor_custom.js"></script>
    <script src="js/loadmorebtn.js"></script>
    <!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->




</body>

</html>