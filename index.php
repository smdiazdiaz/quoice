<?php
require_once('controller.php');
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>QuoICE</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="header-left">
                <img src="img/quoice2.png" height="100px" width	="260px"/>
            </div>

            <div class="header-right">
					<h1 align="center" margin-bottom="0px">QuoICE: Quiosque IoT para Conscientização Eleitoral </h1>
            </div>
        </nav>
        <!-- /. lista  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
          <?php
            /* fetch associative array */
            if ($view_data_array != "")
            {
              foreach ($view_data_array as $row)
              {
                echo '<li>';

                if ($view_estado != "")
                  echo '<a href="?state='.$view_estado.'&mode='.$view_mode.'&active='.$row['id'].'"><i class="fa fa-user"></i>'.utf8_encode($row['nome']).'</a>';
                else
                  echo '<a href="?mode='.$view_mode.'&active='.$row['id'].'"><i class="fa fa-user"></i>'.utf8_encode($row['nome']).'</a>';

                 echo '</li>';
              }
                /* free result set */
              }
            ?>
            </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">


                    </div>
                </div>
                <!-- /. ROW  búsquedas -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="main-box mb-red">
                            <a href='?&mode=1'>
                                <h5>Maiores receitas</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href='?mode=2'>
                                <h5>Maiores despesas</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href='?mode=3'>
                                <h5>Bens declarados</h5>
                            </a>
                        </div>
                    </div>
                </div>

				<!-- /. ROW  estados -->
				<div class="row">
					<div class="col-md-12" margin-bottom="20px">
						<a href="?state=ac<?php echo '&mode='.$view_mode?>"><button type="button" class="btn btn-lg btn-primary">AC</button></a>
						<a href="?state=al<?php echo '&mode='.$view_mode?>"><button type="button" class="btn btn-lg btn-primary">AL</button></a>
						<a href="?state=am<?php echo '&mode='.$view_mode?>"><button type="button" class="btn btn-lg btn-primary">AM</button></a>
						<a href="?state=ba<?php echo '&mode='.$view_mode?>"><button type="button" class="btn btn-lg btn-primary">BA</button></a>
            <a href="?state=ap<?php echo '&mode='.$view_mode?>"><button type="button" class="btn btn-lg btn-primary">AP</button></a>
						<a href="?state=ce<?php echo '&mode='.$view_mode?>"><button type="button" class="btn btn-lg btn-primary">CE</button></a>
						<a href="?state=df<?php echo '&mode='.$view_mode?>"><button type="button" class="btn btn-lg btn-primary">DF</button></a>
						<a href="?state=es<?php echo '&mode='.$view_mode?>"><button type="button" class="btn btn-lg btn-primary">ES</button></a>
						<a href="?state=go<?php echo '&mode='.$view_mode?>"><button type="button" class="btn btn-lg btn-primary">GO</button></a>
						<a href="?state=ma<?php echo '&mode='.$view_mode?>"><button type="button" class="btn btn-lg btn-primary">MA</button></a>
						<a href="?state=mg<?php echo '&mode='.$view_mode?>"><button type="button" class="btn btn-lg btn-primary">MG</button></a>
						<a href="?state=mt<?php echo '&mode='.$view_mode?>"><button type="button" class="btn btn-lg btn-primary">MT</button></a>
						<a href="?state=pq<?php echo '&mode='.$view_mode?>"><button type="button" class="btn btn-lg btn-primary">PA</button></a>
						<a href="?state=pr<?php echo '&mode='.$view_mode?>"><button type="button" class="btn btn-lg btn-primary">PR</button></a>
						<a href="?state=rj<?php echo '&mode='.$view_mode?>"><button type="button" class="btn btn-lg btn-primary">RJ</button></a>
						<a href="?state=sp<?php echo '&mode='.$view_mode?>"><button type="button" class="btn btn-lg btn-primary">SP</button></a>
					</div>
				</div>

                <!-- /. ROW  carrusel -->


                        <!-- /. ROW  -->
                <hr />

				<div class="row">
					<div class="col-md-12">
              <div class="panel panel-default">

                  <div id="carousel-example" class="carousel slide" data-ride="carousel" style="border: 5px solid #e3e3e3;">

                      <div class="carousel-inner">

        <?php
        $first_item = true;
          /* fetch associative array */
          if ($view_data_array != "")
          {
            foreach ($view_data_array as $row)
            {
              if ( ( ($view_candidato_id == "") && ($first_item == true) ) || ($row['id'] == $view_candidato_id) )
                  echo '<div class="item active">';
              else
                  echo '<div class="item">';

              $first_item = false;
                ?>
                    <div class="well" >

												<img src="img/user.png" alt="" class="img-u image-responsive" />

												<p class="main-text"><h4><?php echo utf8_encode($row['nome'])?></h4></p>
												<p>PP</p>
												<p>Deputado Estadual</p>

												<hr />
												<p>
													<span class=" color-bottom-txt">
														<p>Presencia nas sessoes: </p>
														<p>Procesos jurídicos: </p>
														<p>Renda 2010:
															<a href="#" target="_blank">Bens</a> |
															<a href="#" target="_blank">Despesas</a>
														</p>
														<p>Renda 2014:
															<a href="#" target="_blank">Bens</a> |
															<a href="#" target="_blank">Despesas</a>
														</p>
													</span>
												</p>
												<hr />
												<div class="col-md-6">
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit gthn.
												   Lorem ipsum dolor sit amet, consectetur adipiscing elit gthn.</p>
												</div>
												<img src="img/graph_ex.jpg" alt=""  />

											</div>
										</div>

              <?php
                /* fetch associative array */
              }
            }
                ?>


                  </div>

                                <!--INDICATORS-->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example" data-slide-to="1"></li>
                                    <li data-target="#carousel-example" data-slide-to="2"></li>
                                </ol>
                                <!--PREVIUS-NEXT BUTTONS-->
                                <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- /. ROW  -->


                <div class="row">

                    <div class="col-md-12">
                        <div class="list-group">
                            <a href="#" class="list-group-item active">
                                <h4 class="list-group-item-heading">LIST GROUP HEADING</h4>
                                <p class="list-group-item-text" style="line-height: 30px;">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                            </a>
                        </div>
                        <br />
                        <!-- 16:9 aspect ratio -->

                    </div>

                </div>
                <!--/.Row-->
                <hr />

                </div>

                <!--/.ROW-->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="js/custom.js"></script>



</body>
</html>
