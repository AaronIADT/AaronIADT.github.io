<?php
require_once 'classes/Product.php';
require_once 'classes/brand.php';
require_once 'classes/Gump.php';
require_once 'utils/functions.php';

try {
    $validator = new GUMP();

    $_POST = $validator->sanitize($_POST);

    $validation_rules = array(
        'id' => 'required|integer|min_numeric,1',
        'title' => 'required|min_len,1|max_len,100',
        'description' => 'required|min_len,1|max_len,50',
        'serial' => 'required|numeric|exact_len,13|min_numeric,0',
        'rating' => 'required|numeric|exact_len,4|min_numeric,1900',
        'price' => 'required|float|min_numeric,0',
        'brand_id' => 'required|integer|min_numeric,1'
    );
    $filter_rules = array(
    	'id' => 'trim|sanitize_numbers',
        'title' => 'trim|sanitize_string',
        'description' => 'trim|sanitize_string',
        'serial' => 'trim|sanitize_numbers',
        'rating' => 'trim|sanitize_numbers',
        'price' => 'trim|sanitize_floats',
        'brand_id' => 'trim|sanitize_numbers'
    );

    $validator->validation_rules($validation_rules);
    $validator->filter_rules($filter_rules);

    $validated_data = $validator->run($_POST);

    if($validated_data === false) {
        $errors = $validator->get_errors_array();
    }
    else {
        $errors = array();

        $brand_id = $validated_data['brand_id'];
        $brand = Brand::find($brand_id);
        if ($brand === false) {
            $errors['brand_id'] = "Invalid brand";
        }

        //dd($_FILES);

        try {
            $pictureImageFile = imageFileUpload('picture', false, 1000000, array('jpg', 'jpeg', 'png', 'gif'));
        }
        catch (Exception $e) {
            $errors['picture'] = $e->getMessage();
        }
    }

    if (!empty($errors)) {
        throw new Exception("There were errors. Please fix them.");
    }

    $id = $validated_data['id'];
    $product = Product::find($id);
    $product->title = $validated_data['title'];
    $product->description = $validated_data['description'];
    $product->serial = $validated_data['serial'];
    $product->rating = $validated_data['rating'];
    $product->price = $validated_data['price'];
    $product->brand_id = $validated_data['brand_id'];
    if ($pictureImageFile != null) {
        if ($product->picture != null && $product->picture != 'uploads/product_default.png' && file_exists($product->picture)) {
            unlink($product->picture);
        }
        $product->picture = $pictureImageFile;
    }
    $product->save();

    header("Location: products_index.php");
}
catch (Exception $ex) {
    require 'products_edit.php';
}
?>
