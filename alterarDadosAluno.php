<!DOCTYPE html>
<html>
<head>
    <title>Listar Alunos</title>
<?php include 'componentes/style.php';
include 'src/dao/ToolsDAO.php';
@session_start();

$raAluno = $_GET['ra'];
$_SESSION['raAluno'] = $raAluno;
$_SESSION['nomeAluno'] = $_GET['nomeAluno'];

$toolsDAO = new ToolsDAO();

$semestre = $toolsDAO->findSemestre($_GET['ra']);
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
            <h3 class="p3" style="font-size:medium; font-family: sans-serif; color: #B63D32; font-weight: bold;">Por favor preencha o campo abaixo para alterar o Semestre do Aluno: </h3>
				<form method="post" action="src/alterarDadosAluno.php">
					<table style="width: 100%;">
						<tbody>
						
							<tr>
								<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label style="color: #B63D32;">R.A. do Aluno: </label></b></td>
								<td style="width: 75%; text-align: left;"><b><?php echo $_GET['ra'];?></b></td>
							</tr>
						
							<tr>
								<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label style="color: #B63D32;">Nome do Aluno: </label></b></td>
								<td style="width: 75%; text-align: left;"><?php echo $_GET['nomeAluno'];?></td>
							</tr>
							<tr>
								<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label style="color: #B63D32;">Curso: </label></b></td>
								<td style="width: 75%; text-align: left;"><?php echo $_GET['curso'];?></td>
							</tr>
							<tr>
								<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label style="color: #B63D32;">Semestre Atual: </label></b></td>
								<td style="width: 75%; text-align: left;"><?php echo $semestre."º Semestre";?></td>
							</tr>
							<tr>
								<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label for="novoSemestre" style="color: #B63D32;">Novo Semestre: </label></b></td>
								<td style="width: 75%; text-align: left;">
									<select name="novoSemestre" style="width: 65.5%;">
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
									<input type="submit" value="Alterar" name="alterar" style="border: 0px; border-radius:8px; font-weight:bold;
					 				height: 35px; width: 250px; background-color: #3AC74A; margin-top: 10px; color: #FFFFFF;"><br>
								</td>
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