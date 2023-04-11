<?php

require_once ("config/conexion.php");

if (isset($_POST["enviar"]) and ($_POST["enviar"] == "si")){
    require_once ("models/Usuario.php");
    $usuario = new Usuario();
    $usuario->login();
}

?>




    <!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LOGIN</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../../public/assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="public/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="view/styles/styles.css">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#">ITOUTSOURCING</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <br> <br>
        <br> <br>
        <!-- CONVOCATORIAS Section-->
        <section class="page-section portfolio">
            <div class="container">
                
                <div class="row justify-content-center">
                    <form action="" class="form-control" method="POST" id="login_form" style="text-align: center;">
                    <br>
                    <h6 class="page-section-heading text-center text-uppercase text-secondary mb-3">BIENVENIDO</h6>
                        <img src="public/1.gif" alt="" id="imgtipo" style="width: 200px">

                        <?php
                        if(isset($_GET["m"])){
                            switch($_GET["m"]){
                                case "1";
                                ?>
                                <div class="alert alert-danger alert-icon alert-close alert-dismissible fade show" role="alert">
							    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							    </button>
							    <i class="font-icon font-icon-warning"></i>
							    El usuario y/o contraseña son incorrectos
						        </div>
                                <?php
                                break;
                                case "2";
                                ?>
                                <div class="alert alert-danger alert-icon alert-close alert-dismissible fade show" role="alert">
							    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							    </button>
							    <i class="font-icon font-icon-warning"></i>
							    Los campos están vacios
						        </div>
                                <?php
                                break;
                            }
                        }
                    ?>

                        <div class="form-group">
                            <input type="text" id="usuario" name="usuario" class="" placeholder="Usuario" style=" width: 400px;"/><br><br>
                        </div>

                        <div class="form-group">
                            <input type="password" id="pass" name="pass" class="" placeholder="Contraseña" style=" width: 400px;"/><br><br>
                        </div>

                        <input type="hidden" name="enviar" value="si">

                        <button class="btn btn-info" type="submit">Acceder</button>
                                
                                
                    </form>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Ubicación</h4>
                        <p class="lead mb-0">
                            Cto. Rey Nezahualcóyotl s/n
                            <br />
                            Nezahuacóyotl, Estado de México CP 57000
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Redes Sociales</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>ITOutsourcing &copy; SOFTTEAM 2022</small></div>
        </div>
        
        <script src="public/js/scripts.js"></script>
    </body>
</html>