<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Professores</title>
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
            <h3 class="p3" style="font-size:medium; font-family: sans-serif; color: #B63D32; font-weight: bold;">Por favor preencha os campos abaixo para cadastrar professores: </h3>
				<form method="post" action="src/cadastrarProfessores.php">
					<table style="width: 100%;">
							<tbody>
								<tr>
									<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label for="nomeProf" style="color: #B63D32;">Nome do Professor: </label></b></td>
									<td style="width: 75%; text-align: left;"><input type="text" name="nomeProf" size="15" value="" style="width: 65%;"></td>
								</tr>
								<tr>
									<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label for="matrProf" style="color: #B63D32;">Código de Matrícula: </label></b></td>
									<td style="width: 75%; text-align: left;"><input type="text" name="matrProf" size="15" value="" style="width: 25%;"></td>
								</tr>
								<tr>
									<td colspan="2">
										<h3 style="font-size:small; font-family: sans-serif; font-weight: bold; margin-top: 3%; text-align: left;">
										A senha, será o código de matrícula do professor.<br>
										Senha esta que deverá ser modificada no primeiro acesso.
										Caso o professor esqueça sua senha, ele deverá entrar em contato com o Administrador do sistema, seguindo as intruções
										da tela "Esqueci minha senha", que pode ser acessada pela tela de login.
										</h3>
									</td>
								</tr>
							</tbody>
						</table>
					<table style="width: 100%;">
						<tbody>
							<tr>
								<td>
									<br>
									<input type="submit" value="Cadastrar" name="cadastrar" style="border: 0px; border-radius:8px; font-weight:bold;
					 				height: 35px; width: 170px; background-color: #3AC74A; margin-top: 1%; color: #FFFFFF;"><br>
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