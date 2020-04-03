<?php
require_once 'utils/functions.php';
require_once 'classes/Brand.php';

try {
    $brands = Brand::all();
}
catch (Exception $ex) {
    die($e->getMessage());
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
            <div class="row">
                <div class="col-md-12">
                    <?php require 'utils/header.php'; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php require 'utils/toolbar.php'; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form method="POST"
                          action="products_store.php"
                          role="form"
                          class="form-horizontal"
                          enctype="multipart/form-data"
                          >
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <h2>Create product form</h2>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-md-3 control-label">Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="title" name="title" value="<?= old('title') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('title'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-3 control-label">Description</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="description" name="description" value="<?= old('description') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('description'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="serial" class="col-md-3 control-label">serial</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="serial" name="serial" value="<?= old('serial') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('serial'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="rating" class="col-md-3 control-label">Rating</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="rating" name="rating" value="<?= old('rating') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('rating'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-md-3 control-label">Price</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="price" name="price" value="<?= old('price') ?>" />
                            </div>

                            <div class="col-md-3 error">
                                <?php error('price'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brand" class="col-md-3 control-label">brand</label>
                            <div class="col-md-6">
                                <select class="form-control" id="brand_id" name="brand_id">
                                    <?php foreach ($brands as $brand) { ?>
                                        <option value="<?= $brand->id ?>"><?= $brand->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-3 error">
                                <?php error('brand_id'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="picture" class="col-md-3 control-label">Image</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" id="picture" name="picture" value="" />
                            </div>

                            <div class="col-md-3 error">
                                <?php error('picture'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="products_index.php" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </div>
                    </form>
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
