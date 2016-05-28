<?php
require_once ('db_connection.php');
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
                    <li>
                        <a class="active-menu" href="index.html"><i class="fa fa-user"></i>Juan M. Santos</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user"></i>Alvaro Uribe</a>
					          </li>

          <?php
          if (!isset($connection))
          {
            echo '<li>';
            echo '<a href="#"><i class="fa fa-user"></i>Alvaro Uribe</a>';
            echo '</li>';
          }
          else
          {
            echo '<li>';
            echo '<a href="#"><i class="fa fa-user"></i>bla</a>';
            echo '</li>';
            # code...
            $query = "select candidato.nome from  candidato order by candidato.qdeProcessos LIMIT 5";

            if ($result = $connection->query($query))
            {
                /* fetch associative array */
                while ($row = $result->fetch_assoc())
                {
                  echo '<li>';
                 echo '<a href="#"><i class="fa fa-user"></i>'.utf8_encode($row['nome']).'</a>';
                   echo '</li>';
                }

                /* free result set */
                $result->close();

                }
                else {
                  # code...
                  echo '<li>';
                 echo '<a href="#"><i class="fa fa-user"></i>empty</a>';
                   echo '</li>';
                }

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
                            <a href="#">
                                <h5>Maiores doadores de campanha</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="#">
                                <h5>Receitas e despesas dos partidos</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="#">
                                <h5>Comparativo de renda dos políticos</h5>
                            </a>
                        </div>
                    </div>

                </div>

				<!-- /. ROW  estados -->
				<div class="row">
					<div class="col-md-12" margin-bottom="20px">
						<button type="button" class="btn btn-lg btn-primary">AC</button>
						<button type="button" class="btn btn-lg btn-primary">AL</button>
						<button type="button" class="btn btn-lg btn-primary">AM</button>
						<button type="button" class="btn btn-lg btn-primary">AP</button>
						<button type="button" class="btn btn-lg btn-primary">BA</button>
						<button type="button" class="btn btn-lg btn-primary">CE</button>
						<button type="button" class="btn btn-lg btn-primary">DF</button>
						<button type="button" class="btn btn-lg btn-primary">ES</button>
						<button type="button" class="btn btn-lg btn-primary">GO</button>
						<button type="button" class="btn btn-lg btn-primary">MA</button>
						<button type="button" class="btn btn-lg btn-primary">MG</button>
						<button type="button" class="btn btn-lg btn-primary">MT</button>
						<button type="button" class="btn btn-lg btn-primary">PA</button>
						<button type="button" class="btn btn-lg btn-primary">PR</button>
						<button type="button" class="btn btn-lg btn-primary">RJ</button>
						<button type="button" class="btn btn-lg btn-primary">SP</button>
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

										<div class="item active">
											<div class="well" >

												<img src="img/user.png" alt="" class="img-u image-responsive" />

												<p class="main-text"><h4>Paulo Maluf</h4></p>
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


                                    <div class="item">
                                        <div class="well" >

												<img src="img/user.png" alt="" class="img-u image-responsive" />

												<p class="main-text"><h4>Juan M. Santos</h4></p>
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
                                    <div class="item">
                                        <div class="well" >

												<img src="img/user.png" alt="" class="img-u image-responsive" />

												<p class="main-text"><h4>Isabel II</h4></p>
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
