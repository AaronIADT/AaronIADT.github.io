<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
    </head>
    <body>
        <div class="container-fluid">

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
            <br>
            <br>
            <br>
            <br>
          
        </div>

            <div class="row">
                <div class="col-6 col-md-offset-3">
                    <form action="register.php" method="POST" role="form" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <h3>Register Form</h3>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-md-3 control-label">Username: </label>
                            <div class="col-md-6">
                                <input type="text"
                                       id="username"
                                       class="form-control"
                                       name="username"
                                       value="<?php old('username'); ?>"
                                       />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('username'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Password: </label>
                            <div class="col-md-6">
                                <input type="password"
                                       id="password"
                                       class="form-control"
                                       name="password"
                                       value=""
                                       />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('password'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="col-md-3 control-label">Confirm Password: </label>
                            <div class="col-md-6">
                                <input type="password"
                                       id="password_confirmation"
                                       class="form-control"
                                       name="password_confirmation"
                                       value=""
                                       />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('password_confirmation'); ?>
                            </div>
                        </div>
						<div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <input type="submit"
                                       class="btn btn-default"
                                       value="Register"
                                       />
                            </div>
                        </div>
                    </form>
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
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
            
            
                <div class="col-md-12">
                    <?php require 'utils/footer.php'; ?>
                </div>
            
        </div>
    </body>
</html>
