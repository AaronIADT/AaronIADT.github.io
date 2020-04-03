<?php
require_once 'classes/Product.php';
require_once 'classes/Brand.php';
require_once 'utils/functions.php';
require_once 'classes/User.php';

try {
    $products = product::all();
}
catch (Exception $ex) {
    die($ex->getMessage());
}

if (!is_logged_in()) {
    header("Location: login_form.php");
}

$user = $_SESSION['user'];

if ($user->role_id != 3) {
    header("Location: logout.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <?php require 'utils/styles.php'; ?>
    <?php require 'utils/scripts.php'; ?>
</head>

<body>
    <div class="container-fluid">



        <div class="col-md-12">
            <?php require 'utils/header.php'; ?>
        </div>



        <div class="col-12">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>

        <div class="container-fluid">
            <!--COLLAPSE ADMIN ADD MENU-->
            <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                Admin Access
            </button>


            <div class="collapse" id="collapse2">
                <br>

                <div class="col-12">

                    <h2>products <a href="products_create.php" class="btn btn-primary pull-right">Add</a></h2>
                    <?php if (count($products) == 0) { ?>
                    <p>There are no products</p>
                    <?php } else { ?>
                    <table id="table-products" class="table table-hover">
                        <thead>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Serial Number</th>
                            <th>Year</th>
                            <th>Price</th>
                            <th>Brand</th>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product) { ?>
                            <tr data-id="<?= $product->id ?>">
                                <td><a href="products_show.php?id=<?= $product->id ?>" class="btn-link"><?= $product->title ?></a></td>
                                <td><?= $product->description ?></td>
                                <td><?= $product->serial ?></td>
                                <td><?= $product->rating ?></td>
                                <td><?= $product->price ?></td>
                                <td><?= Brand::find($product->brand_id)->name ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>

            </div>






        </div>







        <div class="container">
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
        </div>


        <div class="col-12">
            <br>
        </div>




        <div class="container">
            <div class="row-fluid">




                <?php if (count($products) == 0) { ?>
                <p>There are no products</p>


                <?php } else { ?>

                <?php foreach ($products as $product) { ?>

                <div class="col-2 card test" style="float:left; height:350px;">

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


        <div class="col-md-12">
            <br>
            <br>
            <br>
            <br>
        </div>


<div class="container">
        <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
            See more
        </button>


        <div class="collapse" id="collapse3">
            <br>
            <div class="card-group">

                <div class="container">
            <div class="row-fluid">




                <?php if (count($products) == 0) { ?>
                <p>There are no products</p>


                <?php } else { ?>

                <?php foreach ($products as $product) { ?>

                <div class="col-2 card test" style="float:left; height:350px;">

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
        </div>
        </div>






        <div class="col-md-12">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>


        <!--COLLAPSE ADMIN ADD MENU-->
        <div class="container-fluid">
            <!--COLLAPSE ADMIN ADD MENU-->
            <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                Admin Access
            </button>


            <div class="collapse" id="collapse2">
                <br>

                <div class="col-12">

                    <h2>products <a href="products_create.php" class="btn btn-primary pull-right">Add</a></h2>
                    <?php if (count($products) == 0) { ?>
                    <p>There are no products</p>
                    <?php } else { ?>
                    <table id="table-products" class="table table-hover">
                        <thead>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Serial Number</th>
                            <th>Year</th>
                            <th>Price</th>
                            <th>Brand</th>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product) { ?>
                            <tr data-id="<?= $product->id ?>">
                                <td><a href="products_show.php?id=<?= $product->id ?>" class="btn-link"><?= $product->title ?></a></td>
                                <td><?= $product->description ?></td>
                                <td><?= $product->serial ?></td>
                                <td><?= $product->rating ?></td>
                                <td><?= $product->price ?></td>
                                <td><?= Brand::find($product->brand_id)->name ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>

            </div>






        </div>


        <div class="col-md-12">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>









        <div class="row">
            <div class="container-fluid">
                <?php require 'utils/footer.php'; ?>
            </div>
        </div>
    </div>
</body>

</html>
