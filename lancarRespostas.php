<!DOCTYPE html>
<html>
<head>
    <title>Listar Alunos</title>
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
				<?php if(isset($_SESSION['$listaQuestoes'])){?>
					<h3 class="p3" style="font-size:small; font-family: sans-serif; font-weight: bold; padding-top: 5%;">Questões para <?php echo $_SESSION['nomeAluno'];?>: </h3>
				<?php include 'interfaces/questoes.php';?>
				<?php }?>
             </div>
          </div>
       </div>
    </section> 
  </div>    
</body>
</html>