<!DOCTYPE html>
<html>
<head>
    <title>Consultar Alunos</title>
<?php include 'componentes/style.php';
include 'src/dao/ToolsDAO.php';
@session_start();
$toolsDAO = new ToolsDAO();
$cursos = $toolsDAO->findCursos();
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
            <h3 class="p3" style="font-size:medium; font-family: sans-serif; color: #B63D32; font-weight: bold;">Por favor preencha os campos abaixo para consultar alunos: </h3>
				<form method="post" action="src/consultarAlunos.php">
					<table style="width: 100%;">
						<tbody>
							<tr>
								<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label for="curso" style="color: #B63D32;">Curso: </label></b></td>
								<td style="width: 75%; text-align: left;">
									<select name="curso" style="width: 70%;">
									  <option value="default">Selecione o curso:</option>
									  <?php foreach ($cursos as $curso) { echo $curso['idCurso']; ?>
									  <option value="<?php echo $curso['idCurso'];?>"><?php echo $curso['nome'];?></option>
									 <?php }?>
									</select>
								</td>
							</tr>							
							<tr>
								<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label for="semestre" style="color: #B63D32;">Semestre: </label></b></td>
								<td style="width: 75%; text-align: left;">
									<select name="semestre" style="width: 70%;">
									  <option value="default">Selecione o semestre:</option>
									  <option value="1">1º Semestre</option>
									  <option value="2">2º Semestre</option>
									  <option value="3">3º Semestre</option>
									  <option value="4">4º Semestre</option>
									  <option value="5">5º Semestre</option>
									  <option value="6">6º Semestre</option>
									  <option value="7">7º Semestre</option>
									  <option value="8">8º Semestre</option>
									  <option value="9">9º Semestre</option>
									  <option value="10">10º Semestre</option>
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
									<input type="submit" value="Pesquisar" name="pesquisar" style="border: 0px; border-radius:8px; font-weight:bold;
					 				height: 35px; width: 170px; background-color: #3AC74A; margin-top: 10px; color: #FFFFFF;"><br>
								</td>
							</tr>
						</tbody>
					</table>
					
					<?php if(isset($_SESSION['arrAluno'])){ 
						$arrAlunos = $_SESSION['arrAluno'];?>
					<h3 class="p3" style="font-size:small; font-family: sans-serif; font-weight: bold; padding-top: 5%;">Lista de alunos: </h3>
					<table style="width: 100%; border:#ec1313 1px solid;">
						<thead>
							<tr>
								<td style="width: 30%; text-align:center; border:#ec1313 1px solid; border:#ec1313 1px solid;
								background-color:#ec1313; color: #ffffff; font-weight: bold;">R.A.</td>
								<td style="width: 70%; text-align:center; border:#ec1313 1px solid; border:#ec1313 1px solid;
								background-color:#ec1313; color: #ffffff; font-weight: bold;">Nome do Aluno</td>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($arrAlunos as $aluno) {?>
					        <tr style="border:#ec1313 1px solid;">
					          <td style="border:#ec1313 1px solid;"><a href="listarQuestoes.php?ra=<?php echo $aluno['ra']; ?>&nomeAluno=<?php echo $aluno['nomeUsuario'];?>" style=" color: #000000;">
					          	<b><?php echo $aluno['ra']; ?></b></a>
					          </td>
					          <td style="border:#ec1313 1px solid;"><a href="listarQuestoes.php?ra=<?php echo $aluno['ra']; ?>&nomeAluno=<?php echo $aluno['nomeUsuario'];?>" style=" color: #000000;">
					          	<?php echo $aluno['nomeUsuario']; ?></a>
					          </td>
					        </tr>
					       <?php }?>
						</tbody>
					</table>
					<?php }?>
				</form>
             </div>
          </div>
       </div>
    </section> 
  </div>    
</body>
</html>