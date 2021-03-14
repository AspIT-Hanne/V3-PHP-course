<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Rainbow Rose Collection - Hansel and Petal</title>
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
<link href="../styles/handp.css" rel="stylesheet" type="text/css">
</head>

<body class="no_col_2">
<div id="site">
<?php require '../includes/pagetop.php'; ?>
    <div id="content">
        <div id="breadcrumbs" class="reset menu">
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../arrangements.php">Arrangements</a></li>
                <li><a href="mixed.php">Mixed Arrangements</a></li>
                <li>Mixed Roses</li>
            </ul>
        </div>
        <div id="col_1" role="main">
            <div class="cols lg_margin">
                <div class="col swap lg_padding_l">
                    <h1>Rainbow Rose Collection</h1>
                    <p class="h2 inline_block">$29.95</p>
                    <p class="cat_num">Item # 724-5354</p>
                    <p>Thirty long stem roses in five brilliant colors make a stunning 
                        gift for that someone special. Our roses are carefully packged and 
                        shipped the same day they are cut to ensure long-lasting blooms.</p>
                    <ul class="no_ml">
                        <li>6 Peach Blush roses</li>
                        <li>6 Delicate Pink roses</li>
                        <li>6 Deep Red roses</li>
                        <li>6 Snow White roses</li>
                        <li>6 Sunny Yellow roses</li>
                    </ul>
                    <form action="#" method="get" class="basket_add">
                        <input name="miniBasket" value="true" type="hidden">
                        <input name="total" value="29.95" type="hidden">
                        <input name="shipping" value="11.95" type="hidden">
                        <input name="unitprice" value="29.95" type="hidden">
                        <fieldset>
                            <legend class="h3 shadow">Select a Vase:</legend>
                            <div class="rc">
                                <ul>
                                    <li>
                                        <input name="vase-type" id="vase-type-round" value="round" checked="checked" type="radio">
                                        <label for="vase-type-round">Round clear glass</label>
                                    </li>
                                    <li>
                                        <input name="vase-type" id="vase-type-square" value="square" type="radio">
                                        <label for="vase-type-square">Square clear glass</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="cols no_margin_b">
                                <div class="col">
                                    <div class="f_row">
                                        <label for="qty" class="auto">Quantity:</label>
                                        <input class="text small align_centre" name="qty" id="qty" value="1" type="number">
                                    </div>
                                </div>
                                <div class="col">
                                    <input class="checkout float_right" value="Add to Basket" type="submit">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <h3 class="shadow">Care Instructions</h3>
                    <p>Your fresh roses will arrive with a Chil-Pak to guarantee their 
                        freshness. As soon you open the package, use sharp scissors or a knife 
                        to cut 1 inch off the bottom of each stem, and immediately place the 
                        freshly cut rose into cool water in the included vase. Change the water 
                        daily to keep your roses fresh longer.</p>
                </div>
                <div class="col swap">
                    <div id="gallery" class="lg_margin">
                        <div id="gallery_lg"> <img src="../images/450_rose_peach_89153628.jpg" alt="Peach Rose" height="450" width="450"> </div>
                        <ul id="gallery_thumbs" class="reset menu clearfix">
                            <li><a href="http://www.ixd.hanselandpetal.com/assets/images/450_rose_peach_89153628.jpg" class="current"><img src="../images/70_rose_peach_89153628.jpg" alt="" height="70" width="70"></a></li>
                            <li><a href="http://www.ixd.hanselandpetal.com/assets/images/450_rose_pink_112277154.jpg"><img src="../images/70_rose_pink_112277154.jpg" alt="" height="70" width="70"></a></li>
                            <li><a href="http://www.ixd.hanselandpetal.com/assets/images/450_rose_red_92974998.jpg"><img src="../images/70_rose_red_92974998.jpg" alt="" height="70" width="70"></a></li>
                            <li><a href="http://www.ixd.hanselandpetal.com/assets/images/450_rose_white_100291489.jpg"><img src="../images/70_rose_white_100291489.jpg" alt="" height="70" width="70"></a></li>
                            <li><a href="http://www.ixd.hanselandpetal.com/assets/images/450_rose_yellow_187406sdc.jpg"><img src="../images/70_rose_yellow_187406sdc.jpg" alt="" height="70" width="70"></a></li>
                        </ul>
                    </div>
                    <h3 class="shadow">Designer</h3>
                    <p>These brilliant colors were selected by <a href="../designers.php">Debra Wisdom</a></p>
                </div>
            </div>
            <div class="section">
                <div class="title clearfix">
                    <h2>You Might Also Like These Other Arrangements</h2>
                </div>
                <ul class="reset tiles">
                    <li> <a href="#"> <img src="../images/200_white_rose_mix_166610678.jpg" alt="White Roses" height="200" width="200">
                        <h3 class="h4">All White Roses</h3>
                        <p class="reset">From $29.95</p>
                        </a> </li>
                    <li> <a href="#"> <img src="../images/200_pink_green_mums_160331816.jpg" alt="Pink and Green Mums" height="200" width="200">
                        <h3 class="h4">Fresh for Spring</h3>
                        <p class="reset">From $25.95</p>
                        </a> </li>
                    <li> <a href="#"> <img src="../images/200_tulips_daffodils3_153986295.jpg" alt="Assorted Tulips" height="200" width="200">
                        <h3 class="h4">Bloomin' Bulbs</h3>
                        <p class="reset">From $22.95 <b class="alert"><span>New!</span></b></p>
                        </a> </li>
                    <li> <a href="#"> <img src="../images/200_hyacinths_147970493.jpg" alt="Hyacinth" height="200" width="200">
                        <h3 class="h4">Fragrant Hyacinth</h3>
                        <p class="reset">From $19.95</p>
                        </a> </li>
                </ul>
            </div>
        </div>
    </div>
<?php include '../includes/footer.php'; ?>
</div>
<script src="../js/jquery-1.10.2.min.js"></script> 
<script src="../js/scripts.js"></script>
</body>
</html>