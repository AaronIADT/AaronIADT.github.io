<?php
require_once 'classes/Brand.php';

try {
    $brands = Brand::all();
}
catch (Exception $ex) {
    die($ex->getMessage());
}
?><!DOCTYPE html>
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
                    <h2>Brands</h2>
                    <?php if (count($brands) == 0) { ?>
                        <p>There are no brands</p>
                    <?php } else { ?>
                        <table id="table-brands" class="table table-hover">
                            <thead>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Website</th>
                            </thead>
                            <tbody>
                                <?php foreach ($brands as $brand) { ?>
                                    <tr data-id="<?= $brand->id ?>">
                                        <td><?= $brand->name ?></td>
                                        <td><?= $brand->address ?></td>
                                        <td><?= $brand->phone ?></td>
                                        <td><?= $brand->email ?></td>
                                        <td><?= $brand->website ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
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
