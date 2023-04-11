<?php
    require_once("../../config/conexion.php");
    require_once ("../../models/Usuario.php");
    if(isset($_SESSION["id"])){
        include 'consulta.php';
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
        <link rel="stylesheet" href="../../public/sweet/css/lib/bootstrap-sweetalert/sweetalert.css">
        <link href="../../public/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../styles/styles.css">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="../HOME/index.php">ITOUTSOURCING - <?php echo $_SESSION["nombre"]; echo " "; echo $_SESSION["apellido"];  ?></a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="../HOME/index.php">Convocatorias</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#empresa">Empresa</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="../LOGOUT/logout.php">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <br> <br>
<section class="page-section">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">AGENDAR CITA</h2>
    <div class="container p-3 my-3 border">    
        <div class="row justify-content-center">
            <?php 
                $aspirante = $_POST["aspirante"];
                $entrevistador = $_POST["entrevistador"];
                include "consulta.php";
                while($columna = mysqli_fetch_array($resultado)){
                    $foto = $columna["foto"];
                    $_SESSION["aspirante_cita"] = $columna["id"];
                ?> 
                <div class="col-3 mb-5">
                    <div class="card" style="width: 18rem; text-align: center; width: 200px; height: 250px">
                        <?php echo '<img src="data:image/png;base64, '.base64_encode($foto).'" class="card-img-top" alt="Aspirante" style=" width: 197px; height: 125px">' ?>
                            <div class="card-body">
                                <br><h5 class="card-title"><?php echo $columna["nombre"]; echo " "; echo $columna["apellido"] ?></h5>
                                <form action="" method="POST">
                            <?php $aspirante = $columna["id"]; ?>
                                </form>
                            </div>
                    </div>
                </div>
        </div>
    
                        <?php } ?>
            
                    <div class="container mb-3" style="padding-left: 17%">
                            <div class="row">
                                    <div class="col-6 mb-3">
                                        <h6>
                                        Empresa:
                                        <small class="text-muted"><?php while($columna2 = mysqli_fetch_array($resultado2)){ echo $columna2["razon_social"]; ?></small>
                                            <?php $razon_social = $columna2["razon_social"]; ?>
                                        </h6>
                                    </div>
                                    <div class="col-6 mb-5">
                                        <h6>
                                        Puesto:
                                        <small class="text-muted"><?php echo $columna2["nombre"]; }?></small>
                                        <?php $nombre_convocatoria = $columna2["nombre"]; ?>
                                        </h6>
                                    </div>
                                    <form method="POST" id="agendar_form" class="col-6 mb-3">
                                                    <div class="col-6 mb-5">
                                                            <input type="date" min="2022-12-01" name="fecha" id="fecha" value="">
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                            <input type="time" min="09:00" max="16:00" name="hora" id="hora" value="">
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <input type="hidden" name="entrevistador" id="conv" value=<?php echo $_SESSION["id"] ?>>
                                                        <input type="hidden" name="aspirante_cita" id="aspirante_cita" value=<?php echo $_SESSION["aspirante_cita"] ?>>
                                                        <input type="hidden" name="conv" id="conv" value=<?php echo $conv ?>>
                                                    </div>
                                                    <div class="col-6">
                                                    <button type="submit" name="action" value="add" class="btn btn-primary">Agendar</button>
                                                    </div>
                                    </form>
                            </div>
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
        
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script src="../../public/sweet/js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
        <script src="../../public/js/scripts.js"></script>
        <script src="entrevista.js"></script>
    </body>
</html>


<?php
    }else{
        header("Location:".Conectar::ruta()."index.php");
    }

?>