<!DOCTYPE html>
<html>
<head>
    <title>Listar Questões</title>
<?php include 'componentes/style.php';
include 'src/dao/ToolsDAO.php';
@session_start();

if($_SESSION['tipo_usuario'] != 'aluno'){
	unset($_SESSION['arrAluno']);
	$raAluno = $_GET['ra'];
	$_SESSION['raAluno'] = $raAluno;
	$_SESSION['nomeAluno'] = $_GET['nomeAluno'];
	
	$toolsDAO = new ToolsDAO();
	$curso = $toolsDAO->findById($_SESSION['curso']);
}else{
	$curso = $_SESSION['nomeCurso'];
}


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
            <h3 class="p3" style="font-size:medium; font-family: sans-serif; color: #B63D32; font-weight: bold;">Por favor preencha o campo abaixo para consultar as Questões: </h3>
				<form method="post" action="src/listarQuestoes.php">
					<table style="width: 100%;">
						<tbody>
						
							<tr>
								<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label style="color: #B63D32;">R.A. do Aluno: </label></b></td>
								<td style="width: 75%; text-align: left;"><b><?php echo $_SESSION['raAluno'];?></b></td>
							</tr>
						
							<tr>
								<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label style="color: #B63D32;">Nome do Aluno: </label></b></td>
								<td style="width: 75%; text-align: left;"><?php echo $_SESSION['nomeAluno'];?></td>
							</tr>
							<tr>
								<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label style="color: #B63D32;">Curso: </label></b></td>
								<td style="width: 75%; text-align: left;"><?php echo $curso;?></td>
							</tr>
							<tr>
								<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label for="ano" style="color: #B63D32;">Ano: </label></b></td>
								<td style="width: 75%; text-align: left;">
									<select name="ano" style="width: 70%;">
									  <option value="default">Selecione o ano:</option>
									  <option value="2018">2018</option>
									  <option value="2017">2017</option>
									  <option value="2016">2016</option>
									  <option value="2015">2015</option>
									  <option value="2014">2014</option>
									</select>
								</td>
							</tr>
						</tbody>
					</table>

					<table style="width: 100%;">
						<tbody>
							<tr>
								<td>
									<br>
									<input type="submit" value="Clique aqui para Carregar Questões" name="loadQuestoes" style="border: 0px; border-radius:8px; font-weight:bold;
					 				height: 35px; width: 250px; background-color: #3AC74A; margin-top: 10px; color: #FFFFFF;"><br>
								</td>
								<?php if($_SESSION['tipo_usuario'] != 'aluno'){?>
								<td>
									<br>
									<input type="button" value="Clique aqui para mudar o Semestre do Aluno" name="alteraAluno" style="border: 0px; border-radius:8px; font-weight:bold;
					 				height: 35px; width: 300px; background-color: #ec1313; margin-top: 10px; color: #FFFFFF;" onclick="location.href='alterarDadosAluno.php?ra=<?php echo $_GET['ra']; ?>&nomeAluno=<?php echo $_GET['nomeAluno'];?>&curso=<?php echo $curso;?>';"><br>
								</td>
								<?php }?>
							</tr>
						</tbody>
					</table>
				</form>
             </div>
          </div>
       </div>
    </section> 
  </div>    
</body>
</html>