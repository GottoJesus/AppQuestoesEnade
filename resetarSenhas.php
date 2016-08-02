<!DOCTYPE html>
<html>
<head>
    <title>Alterar Senha</title>
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
            <h3 class="p3" style="font-size:medium; font-family: sans-serif; color: #B63D32; font-weight: bold;">Para resetar a senha de um usuário, favor preencher o campo abaixo:</h3>
				<form method="post" action="src/resetarSenhas.php">
					<table style="width: 100%;">
							<tbody>
								<tr>
									<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label for="codigo" style="color: #B63D32;">R.A./Código de Matrícula: </label></b></td>
									<td style="width: 75%; text-align: left;"><input type="text" name="codigo" size="15" value="" style="width: 65%;"></td>
								</tr>							
							</tbody>
						</table>
					<table style="width: 100%;">
						<tbody>
							<tr>
								<td>
									<br>
									<input type="submit" value="Resetar" name="Resetar" style="border: 0px; border-radius:8px; font-weight:bold;
					 				height: 35px; width: 170px; background-color: #ec1313; margin-top: 1%; color: #FFFFFF;"><br>
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