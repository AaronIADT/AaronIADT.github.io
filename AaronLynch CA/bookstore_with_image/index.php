<?php
require_once 'classes/Product.php';
require_once 'classes/Brand.php';

try {
    $products = product::all();
}
catch (Exception $ex) {
    die($ex->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
        <title></title>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                
            <!--HEADER-->
            <?php require 'utils/header.php'; ?>
                
            </div>
            
            
            <div class="row">
                <div class="col-md-12">
                    <h2>Welcome to the Acme Inc Website</h2>
                </div>
            </div>
            
            <div class="container">
                    <div class="row">


                        <div class="bd-example">
                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block w-200" data-src="holder.js/1110x436?auto=no&amp;bg=777&amp;fg=555&amp;text=First slide" alt="First slide [1110x436]" src="rtxImg.png" data-holder-rendered="true">
                                        <div class="carousel-caption d-none d-md-block">

                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-200" data-src="holder.js/1110x436?auto=no&amp;bg=666&amp;fg=444&amp;text=Second slide" alt="Second slide [1110x436]" src="bannerImg2.png" data-holder-rendered="true">
                                        <div class="carousel-caption d-none d-md-block">

                                            <p>Order Online Now</p>
                                        </div>
                                    </div>


                                    <div class="carousel-item">
                                        <img class="d-block w-200" data-src="holder.js/1110x436?auto=no&amp;bg=666&amp;fg=444&amp;text=Second slide" alt="Third slide [1110x436]" src="bannerImg3.png" data-holder-rendered="true">
                                        <div class="carousel-caption d-none d-md-block">

                                            <p>Corsair Peripherals 20% OFF</p>
                                        </div>
                                    </div>



                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>




                        <div class="col-12">
                            <br>
                            <br>
                        </div>

                        <div class="card-group">
                            <div class="mr-5 card">
                                <a href="products_index.php"><img class="card-img-top" src="photo/M2.png" alt="Card image cap"></a>
                                <div class="card-body">
                                    <a href="products_index.php"><h3>Top Gaming Mouse</h3></a>
                                    <br>
                                </div>
                            </div>

                            <div class="mr-5 card">
                                <a href="products_index.php"><img class="card-img-top" src="photo/K2.png" alt="Card image cap"></a>
                                <div class="card-body">
                                    <a href="products_index.php"><h3>Top Gaming Keyboard</h3></a>
                                    <br>
                                </div>
                            </div>

                            <div class="mr-5 card">
                                <a href="products_index.php"><img class="card-img-top" src="photo/H1.png" alt="Card image cap"></a>
                                <div class="card-body">
                                    <a href="products_index.php" class="a2"><h3>Top Gaming Headsets</h3></a>
                                    <br>
                                </div>
                            </div>

                        </div>






                        <div class="col-12">
                            <br>
                            <br>
                        </div>


                        <div class="card-group">
                            <div class="card">
                                <div class="card-body" style="padding-top: 35px;">
                                    <h3 class="card-title">Gaming Peripherals</h3>
                                    <p class="card-text" style="padding-top: 15px; font-size: 18px;">Our gaming accessories range has everything you need to complete your setup the right way. Get a great gaming peripheral deals here at Gameflow. We stock all the biggest brands at the best prices</p>
                                </div>
                                
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <img class="card-img-top" src="bigCardImg.png" alt="Card image cap">
                                </div>
                            </div>

                        </div>

                        <div class="col-12">
                            <br>
                            <br>
                        </div>


                        <div class="card-group">
                            <div class="card">
                                <div class="card-body">
                                    <img class="card-img-top" src="bigCardImg2.png" alt="Card image cap">
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body" style="padding-top: 35px;">
                                    <h3 class="card-title">Custom Built Gaming Keyboards</h3>
                                    <p class="card-text" style="padding-top: 15px; font-size: 18px;">If none of the major mechanical keyboard brand's fit your gaming needs. Have a custom built one made in house at Gameflow. Choose from different keyboard size profiles, custom rbg setups and your choice of switches.</p>
                                </div>
                            </div>


                        </div>


                        <div class="col-12">
                            <br>
                            <br>
                        </div>




                        <div class="col-4">
                            <h5a>Top PC Peripherals</h5a>
                        </div>

                        <div class="col-8">

                            <img src="dropImg.png" width="90%" height="60%">
                        </div>


                        <div class="col-12">
                            <br>
                            <br>
                        </div>

                        



                    </div>

                            <div class="container">
            <div class="row-fluid">




                <?php if (count($products) == 0) { ?>
                <p>There are no products</p>


                <?php } else { ?>

                <?php foreach ($products as $product) { ?>

                <div class="col-4 card test" style="float:left; height:450px;">

                    <a href="products_show.php?id=<?= $product->id ?>"><img class="card-img-top" src="<?= $product->picture ?>" alt="Card image cap"></a>
                    <div class="card-body">
                        <a href="products_show.php?id=<?= $product->id ?>" style="text-decoration:none; color:black;">
                            <h3 class="card-title"><?= $product->title ?></h3>
                        </a> <br>
                        <a href="products_show.php?id=<?= $product->id ?>">
                            <button type="button" class="btn btn-outline-secondary">€<?= $product->price ?></button>
                        </a>
                    </div>

                </div>
                <?php } ?>
                <?php } ?>

            </div>
        </div>


                </div>
            
            <div class="row">
                <div class="col-md-12">
                    <?php require 'utils/footer.php'; ?>
                </div>
            </div>
        </div>
    </body>
</html>
