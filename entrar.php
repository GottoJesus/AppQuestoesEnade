<!DOCTYPE html>
<html>
<head>
    <title>Entrar no Sistema</title>
<?php include 'componentes/style.php';?>
</head>
<body>
  <div class="main">
<?php include 'componentes/header.php';?>
  <!--==============================content================================-->
    <section id="content">
        <div class="container_12">	
          <div class="grid_12">
            <div class="wrap pad-3" style="border:4px solid; border-bottom-right-radius: 12px; border-bottom-left-radius: 12px; 
            background-color: #EDECEB;">
                <h3 class="p0" style="font-size:400%; font-family: sans-serif; color: #717070; font-weight: bold;">Questões Enade</h3>
                <p class="p6" style="font-size:85%;">Acesso Restrito ao Corpo Docente do <b>Complexo Educacional FMU</b>, <b>FIAM</b> e <b>FAAM</b>.</p>
                <div class="block-6" style="border:#ec1313 4px solid; border-radius:12px; width: 40%; margin-left: 230px; background-color: #FFE9D1;">
					<h3 class="p3" style="font-size:small; font-family: sans-serif; color: #B63D32; font-weight: bold;">Por favor informe seu Login e Senha</h3>
					<form method="post" action="src/login.php">
						<table style="width: 100%;">
							<tbody>
								<tr>
									<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label for="login" style="color: #B63D32;">Login: </label></b></td>
									<td style="width: 75%; text-align: left;"><input type="text" name="login" size="15" value="" style="width: 85%;"></td>
								</tr>
								<tr>
									<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label for="senha" style="color: #B63D32;">Senha: </label></b></td>
									<td style="width: 75%; text-align: left;"><input type="password" name="senha" size="15" value="" style="width: 85%;"></td>
								</tr>
							</tbody>
						</table>
						<table style="width: 100%;">
							<tbody>
								<tr>
 									<td>
 										<br>
											<div style="display: flex;">
											<div style="flex: 1; padding-right: 9px;">
												<input type="submit" value="Entrar" name="entrar" style="border: 0px; border-radius:8px; font-weight:bold;
						 						height: 35px; width: 120px; background-color: #3AC74A; margin-top: 10px; color: #FFFFFF;"><br>
											</div>
											<div style="flex: 1; padding-left: 9px;">
												<input type="button" value="Esqueci minha Senha" name="recuSenha" style="border: 0px; border-radius:8px; font-weight:bold;
 							 					height: 35px; width: 170px; background-color: #ec1313; margin-top: 10px; color: #FFFFFF;" onclick="location.href = 'esqueciSenha.php';"><br>
 											</div>
 										</div>
 									</td>
 								</tr>
							</tbody>
						</table>
					</form>
                  </div>
                </div>
            </div>
          </div>
    </section> 
  </div>    
</body>
</html>