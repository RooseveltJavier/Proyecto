<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../../dist/css/timeline.css" rel="stylesheet">
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../../bower_components/morrisjs/morris.css" rel="stylesheet">
    <link href="../../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
//    $res ['user']= $name;
//$this->load->view('dasboard/navigation_lte',$res);
//print_r($name);
//print_r($pass);
?>

        <?php 
  
        echo lineBreak(4);
            if(!empty($dat)):
                foreach ($dat as $value) {
                $val= $value->icon;
                $url_base =$value->url;
                $id=$value->id;
                 echo '<div class="col-lg-3 col-md-6">';
                    echo '<div class="panel panel-info">';
                        echo '<div class="panel-heading">';
                            echo '<div class="row">';
                               echo '<div class="col-xs-3">';
                                   echo '<i class="fa '.$val.' fa-5x"></i>';
                                   echo '</div>';
                                echo '<div class="col-xs-9 text-right">';
                                    echo '<div class="huge">'.$value->datalle.'</div>';
                                    echo '<div>Modulo</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                       
                        echo '<a href="'.$url_base.'">';
                            echo ' <div class="panel-footer">';
                                    echo input(array('type'=>'hidden','name'=>'id_persona','value'=>$id));
                                echo '<span class="pull-left">'.$value->modulos.'</span>';
                                echo '<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>';
                                echo '<div class="clearfix"></div>';
                                
                            echo '</div>';
                       echo ' </a>';
                   
                       echo '</div>';
                echo '</div>';
                   }
            endif;
        
            ?>
             <!-- jQuery -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="../../bower_components/raphael/raphael-min.js"></script>
    <script src="../../bower_components/morrisjs/morris.min.js"></script>
    <script src="../../js/morris-data.js"></script>
    <script src="../../dist/js/sb-admin-2.js"></script>
</body>

</html>
