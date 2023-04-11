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
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="../HOME/index.php">Convocatorias</a></li>
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
        <section class="page-section portfolio" id="convocatoria">
            <div class="container">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Mejor Evaluados</h2>
                <br> <br>
                
                
                <!-- EVALUADOS -->
                <div class="row justify-content-center">

            <?php
            while($columna = mysqli_fetch_array($resultado)){
            ?> 
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem; text-align: center">
                       <?php echo '<img src="data:image/png;base64, '.base64_encode($columna["foto"]).'" class="card-img-top" alt="Aspirante" style=" width: 285px; height: 200px">' ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $columna["nombre"]; echo " "; echo $columna["apellido"] ?></h5>
                                <p class="card-text"> Resultado: <?php echo $columna["resultado"] ?> </p>
                                <form action="../expediente/index.php" method="POST">
                                    <input type="hidden" name="asp" id="asp" value="<?php echo $columna["id"] ?>">
                                    <input type="hidden" name="conv" id="conv" value="<?php echo $convocatoria ?>">
                                    <button class="btn btn-primary">Ver</button>
                                </form>
                                
                            </div>
                    </div>
                </div>
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