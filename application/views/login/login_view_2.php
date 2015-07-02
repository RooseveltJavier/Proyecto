<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Registro</title>
     <!--link the bootstrap css file-->
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
     
     <style type="text/css">
     .colbox {
          margin-left: 0px;
          margin-right: 0px;
      }
     	.centrar
        {
        	position: absolute;
		top:50%;
		left:50%;
		width:400px;
		margin-left:-200px;
		height:300px;
		margin-top:-150px;
		border:0px solid #808080;
		padding:5px;

	}
     </style>
</head>
<body>
<?php   echo   Open('div',array('class'=>'centrar')); ?>
    <div class="container">
        <!--<font style=" color: red; size:2px;">INGRESO AL SISTEMA </font>-->
        <h4 style="color: blue;">INGRESO AL SISTEMA</h4>
         <div class="row">
              <div class="col-lg-4 col-sm-4 well">
              <?php 
              $attributes = array("class" => "form-horizontal", "id"=>"loginform", "name"=>"loginform" );
              echo form_open(base_url("login/verifylogin"), $attributes);
            
              ?>
              <fieldset>
                  <legend style="text-align: center">Login</legend>
                   <div class="form-group">
                   <div class="row colbox">
                   <div class="col-lg-4 col-sm-4">
                        <label for="username" class="control-label">Username</label>
                   </div>
                   <div class="col-lg-8 col-sm-8">
                        <input class="form-control" id="txt_username" name="username" placeholder="Username" type="text" value="<?php echo set_value('username'); ?>" />
                        <span class="text-danger"><?php echo form_error('username'); ?></span>
                   </div>
                   </div>
                   </div>

                   <div class="form-group">
                   <div class="row colbox">
                   <div class="col-lg-4 col-sm-4">
                   <label for="password" class="control-label">Password</label>
                   </div>
                   <div class="col-lg-8 col-sm-8">
                        <input class="form-control" id="txt_password" name="password" placeholder="Password" type="password" value="<?php echo set_value('password'); ?>" />
                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                   </div>
                   </div>
                   </div>

                   <div class="form-group">
                   <div class="col-lg-12 col-sm-12 text-center">
                        <input id="btn_login" name="btn_login" type="submit" class="btn btn-default" value="Login" />
                        <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel" />
                   </div>
                   </div>
              </fieldset>
              <?php 
              echo form_close();
              // echo  Close('form');
               ?>
              <?php echo $this->session->flashdata('msg'); ?>
              </div>
         </div>
    </div>
<?php echo Close('div');?>     
<!--load jQuery library-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--load bootstrap.js-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>