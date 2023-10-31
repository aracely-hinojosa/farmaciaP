<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.html">Sistema Tienda</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  <div class="input-group form">
	                       <input type="text" class="form-control" placeholder="Search...">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
	                       </span>
	                  </div>
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['usuario']['nombres']." ".$_SESSION['usuario']['paterno'] ?><b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="./?c=login&m=salir">Cerrar Sesion</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2"><!--Inicio de Menu-->
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="index.html"><i class="glyphicon glyphicon-home"></i> Menu</a></li>
                    <?php if($_SESSION['usuario']['nivel']==1) {?>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Producto
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="./?c=producto&m=nuevo">Nuevo Producto</a></li>
                            <li><a href="./?c=producto&m=listar">Listar Productos</a></li>
                        </ul>
                     </li>
                     <?php }?>
                        <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-shopping-cart"></i> Compra
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="./?c=compra&m=nuevo">Nuevo Compra</a></li>
                            <li><a href="./?c=compra&m=listar">Listar Compras</a></li>
                        </ul>

                    </li>

                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-user"></i> Usuario
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="./?c=usuario&m=nuevo">Nuevo Usuario</a></li>
                            <li><a href="./?c=usuario&m=listar">Listar Usuario</a></li>
                        </ul>

                    </li>

                    <?php if($_SESSION['usuario']['nivel']==1 || $_SESSION['usuario']['nivel']==2) {?>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-file"></i> Reporte
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="./?c=reporte&m=prueba">Prueba</a></li>
                            <li><a href="./?c=reporte&m=compra">Reporte Compras</a></li>
                            <li><a href="./?c=reporte&m=producto">Reporte Producto</a></li>
                            <!--<li><a href="./?c=ReporteUsuario&m=usuario">Reporte Usuarios</a></li>-->
                        </ul>
                    </li>
                    <?php }?>
                        
                        <?php if($_SESSION['usuario']['nivel']==2) {?>
                        <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-stats"></i> Estadistica
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="./?c=reporteestadistico&m=compra">Estadistica de Compras</a></li>
                            <li><a href="./?c=reporteestadistico&m=producto">Estadistica de Producto</a></li>
                            <!--<li><a href="./?c=ReporteUsuario&m=usuario">Reporte Usuarios</a></li>-->
                        </ul>

                    </li>
                    <?php }?>

                    </li>
                </ul>
             </div>
		  </div><!--Fin de Menu-->
		  <div class="col-md-10">
		  	<div class="row">
				<div class="col-md-12">
                    
                    <div class="content-box-large box-with-header"><!--Inicio del Contenido-->
                        <?php 
                            require_once $vista;
                        ?>
                    </div><!--Fin de Contenido-->
		  		</div>

		  	</div>
		  </div>
		</div>
    </div>

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2023 ITBM-SISTEMAS <a href="#">Website</a>
            </div>
            
         </div>
      </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>