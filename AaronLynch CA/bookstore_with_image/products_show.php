<?php
require_once 'classes/Product.php';
require_once 'classes/Brand.php';
require_once 'classes/Gump.php';
require_once 'utils/functions.php';
require_once 'classes/User.php';

try {
    $validator = new GUMP();

    $_GET = $validator->sanitize($_GET);

    $validation_rules = array(
        'id' => 'required|integer|min_numeric,1'
    );
    $filter_rules = array(
    	'id' => 'trim|sanitize_numbers'
    );

    $validator->validation_rules($validation_rules);
    $validator->filter_rules($filter_rules);

    $validated_data = $validator->run($_GET);

    if($validated_data === false) {
        $errors = $validator->get_errors_array();
        throw new Exception("Invalid product id: " . $errors['id']);
    }

    $id = $validated_data['id'];
    $product = Product::find($id);
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
    <div class="container">
        
            <div class="col-md-12">
                <?php require 'utils/header.php'; ?>
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


        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">

                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="<?= $product->picture ?>" /></div>
                            <div class="tab-pane" id="pic-2"><img src="photo/M4-2.jpg" /></div>
                            <div class="tab-pane" id="pic-3"><img src="photo/M4-3.jpg" /></div>
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="<?= $product->picture ?>" /></a></li>
                            <li><a data-target="#pic-2" data-toggle="tab"><img src="photo/M4-2.jpg" /></a></li>
                            <li><a data-target="#pic-3" data-toggle="tab"><img src="photo/M4-3.jpg" /></a></li>

                        </ul>

                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title"><?= $product->title ?></h3>

                        <p class="product-description">
                            <?= $product->description ?>
                            <br>
                            <br>
                            This mouse is perfect for MOBA or MMO gaming - the programmable buttons mean you can customise your mouse to suit the game you're playing
                            <br>
                            <br>
                            -17 programmable buttons<br>
                            -Up to 16000 DPI<br>
                            -Programmable LED lighting<br>

                        </p>
                        <h4>€<?= $product->price ?></h4>
                        <p class="vote"><strong>91%</strong> positive <strong>(87 votes)</strong></p>

                        <div class="action">
                            <button class="btn btn-outline-secondary" type="button">Add to cart</button>
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
        <div class="container">
            <!--COLLAPSE ADMIN ADD MENU-->
            <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                Admin Access
            </button>


            <div class="collapse" id="collapse4">
                
            <div class="row">
            <div class="container">
                <h2>product details</h2>
                <table id="table-product" class="table table-hover">
                    <tbody>
                        <tr>
                            <td>Title</td>
                            <td><?= $product->title ?></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td><?= $product->description ?></td>
                        </tr>
                        <tr>
                            <td>Serial Number</td>
                            <td><?= $product->serial ?></td>
                        </tr>
                        <tr>
                            <td>Rating</td>
                            <td><?= $product->rating ?></td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td><?= $product->price ?></td>
                        </tr>
                        <tr>
                            <td>Brand</td>
                            <td><?= Brand::find($product->brand_id)->name ?></td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td><img src="<?= $product->picture ?>" height="100px" /></td>
                        </tr>
                    </tbody>
                </table>
                <p>
                    <a href="products_index.php" class="btn btn-default">Cancel</a>
                    <a href="products_edit.php?id=<?= $product->id ?>" class="btn btn-warning">Edit</a>
                    <a href="products_delete.php?id=<?= $product->id ?>" class="btn btn-danger">Delete</a>
                </p>
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
    
    
    
    
    
    
    <div class="container-fluid">
                <?php require 'utils/footer.php'; ?>
            </div>
</body>

</html>
