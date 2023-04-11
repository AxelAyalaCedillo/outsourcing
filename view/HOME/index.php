<?php
    require_once("../../config/conexion.php");
    if(isset($_SESSION["id"])){
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Bienvenido</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../../public/assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="../../public/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../styles/styles.css">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#">ITOUTSOURCING - <?php echo $_SESSION["nombre"]; echo " "; echo $_SESSION["apellido"];  ?> </a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#convocatoria">Convocatorias</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="../empresa/empresa.php">Empresa</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="../LOGOUT/logout.php">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <br> <br>
        
        <?php
            include 'consulta.php';
        ?>
        
        <!-- CONVOCATORIAS Section-->
        <section class="page-section portfolio" id="convocatoria">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">CONVOCATORIAS</h2>
                
                <br> <br>
                
                <!-- Portfolio Grid Items-->
                
                <div class="row justify-content-center">
                    <!-- CONVOCATORIAS -->
                    <?php
                    while($columna2 = mysqli_fetch_array($resultado2)){
                        $_SESSION["tam"] = $columna2["tam"];
                    }
                     ?>

    <?php
    while($columna = mysqli_fetch_array($resultado)){
    ?> 

                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card text-center convocatoria" style="width: 20rem;">
                                <div class="card-body">
                                    <h5 class="card-title"> <?php echo $columna["nombre"]; ?> </h5>
                                    <p class="card-text"> Fecha de Inicio: <?php echo $columna["fecha_ini"] ?> <br>
                                    Fecha de término: <?php echo $columna["fecha_fin"] ?> <br>
                                    <?php echo $columna["descripcion"] ?></p>
                                    <form action="../evaluados/evaluados.php" method="POST">
                                        <input type="hidden" name="convocatoria" id="convocatoria" value="<?php echo $columna["id"] ?>">
                                        <input type="hidden" name="empresa" id="empresa" value="<?php echo $_SESSION["tam"] ?>">
                                        <button class="btn btn-primary">Ver</button>
                                    </form>
                                </div>
                            </div>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php } ?>
   
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
        <script src="../../public/js/scripts.js"></script>
    </body>
</html>


<?php
    }else{
        header("Location:".Conectar::ruta()."index.php");
    }

?>