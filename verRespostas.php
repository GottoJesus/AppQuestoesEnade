<!DOCTYPE html>
<html>
<head>
    <title>Verificar Respostas</title>
<?php include 'componentes/style.php';
@session_start();
?>
</head>
<body>
  <div class="main">
<?php include 'componentes/header.php';?>
  <!--==============================content================================-->
    <section id="content">
        <div class="container_12">	
          <div class="grid_12">
            <div class="wrap pad-3" style="border:4px solid; border-bottom-right-radius: 12px; border-bottom-left-radius: 12px; 
            background-color: #EDECEB; text-align: center;">
					<h3 style="font-size:medium; font-family: sans-serif; color: #B63D32; font-weight: bold;"><?php echo $_SESSION['nomeAluno'];?></h3>
					<h3 class="p3" style="font-size:small; font-family: sans-serif; font-weight: bold; padding-top: 0.5%;">Resultado do Questionário.</h3>
				<?php include 'interfaces/questoesVista.php';?>
             </div>
          </div>
       </div>
    </section> 
  </div>    
</body>
</html>