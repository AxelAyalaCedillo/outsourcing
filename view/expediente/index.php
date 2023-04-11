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
        <title>EXPEDIENTE</title>
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
    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">EXPEDIENTE</h2>
    <div class="container-md p-3 my-3 border">
    
    <div class="row d-flex justify-content-center">
    <?php
                        while($columna = mysqli_fetch_array($resultado)){
                            $foto = $columna["foto"];
                    ?> 
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem; text-align: center">
                            <?php echo '<img src="data:image/png;base64, '.base64_encode($foto).'" class="card-img-top" alt="Aspirante" style=" width: 285px; height: 200px">' ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $columna["nombre"]; echo " "; echo $columna["apellido"] ?></h5>
                                        <form action="../entrevista/index.php" method="POST">
                                        <input type="hidden" name="aspirante" id="aspirante" value="<?php echo $columna["id"] ?>">
                                        <input type="hidden" name="entrevistador" id="entrevistador" value="<?php echo $_SESSION["id"] ?>">
                                        <input type="hidden" name="conv" id="conv" value=<?php echo $conv ?>>
                                        <button class="btn btn-primary">Agendar cita</button>
                                        </form>
                                    </div>
                            </div>
                        </div>
                        <?php $aspiranteExp =  $columna["id"]; ?>
                    <?php } 
                    while($columna2 = mysqli_fetch_array($resultado2)){
                    ?>
                
       <div class="container p-2 my-3 bg-white text-dark col-6">
            <div class="row ">
                <div class="col-5 mb-3">
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#datos1" 
                role="button" aria-expanded="false" aria-controls="datos1">Datos Generales</a>
                    <div id="datos1" class="collapse">
                    <br><p class="card"><?php echo $columna2["generales"] ?></p>
                    </div>
                </div>
                <div class="col-5 mb-3">
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#datos2" 
                role="button" aria-expanded="false" aria-controls="datos1">Datos Académicos</a>
                    <br><div id="datos2" class="collapse">
                        <br><p class="card">
                            <?php echo $columna2["academicos"] ?>
                        </p>
                        </div>
                    </div>
                <div class="col-5 mb-3">
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#datos3" 
                role="button" aria-expanded="false" aria-controls="datos1">Experiencia Laboral</a>
                    <br><div id="datos3" class="collapse">
                        <br><p class="card">
                        <?php echo $columna2["laboral"] ?><br>
                        </p> 
                    </div>
                </div>
                <div class="col-5 mb-3">
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#datos4" 
                role="button" aria-expanded="false" aria-controls="datos1">Examen Psicométrico</a>
                    <div id="datos4" class="collapse">
                        <br><p class="card"><?php echo $columna2["psicometrico"] ?></p>
                        </div>
                    </div>
                <div class="col-5 mb-3">
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#datos5" }
                role="button" aria-expanded="false" aria-controls="datos1">Examen Conocimiento</a>
                    <div id="datos5" class="collapse">
                    <br><p class="card">
                    <?php echo $columna2["conocimiento"] ?>
                    </p>
                    </div>
                </div>
                <div class="col-5 mb-3">
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#datos6" 
                role="button" aria-expanded="false" aria-controls="datos1">Redes Sociales</a>
                    <div id="datos6" class="collapse">
                        <br><p class="card">
                        <?php echo $columna2["redes"] ?>
                        </p>
                    </div>
                </div>
            </div>

            
            <?php } ?>
            <br>
            <div class="text-center">
                <h5>Realizar comentario</h5>
            </div>
					
            <form method="POST" id="coment_form" style="text-align: center;">
				<div class="container p-1 my-3 bg-white text-dark row">
					
					<textarea name="coment" id="coment" cols="30" rows="5"></textarea>
					<input type="hidden" name="ing" id="ing" value=<?php echo $aspiranteExp ?>>
					<input type="hidden" name="user" id="user" value=<?php echo $_SESSION["id"]; ?>>
					<br>
				</div>
				<button type="submit" name="action" value="add" class="btn btn-primary">Guardar Comentario</button>
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
        <script src="expediente.js"></script>
    </body>
</html>


<?php
    }else{
        header("Location:".Conectar::ruta()."index.php");
    }

?>