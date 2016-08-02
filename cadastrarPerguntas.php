<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Perguntas</title>
<?php include 'componentes/style.php';
include 'src/dao/ToolsDAO.php';
@session_start();
// $_SESSION['login'] = "Gustavo";
// $_SESSION['senha'] = "TESTE";
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
            background-color: #EDECEB;">
            <h3 class="p3" style="font-size:medium; font-family: sans-serif; color: #B63D32; font-weight: bold;">Por favor preencha os dados abaixo para cadastrar uma questão: </h3>
				<form method="post" action="src/cadastrarPerguntas.php">
					<table style="width: 100%;">
						<tbody>							
								<tr>
									<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label for="curso" style="color: #B63D32;">Curso: </label></b></td>
									<td style="width: 75%; text-align: left;">
										<select name="curso" style="width: 65.5%;">
										  <option value="default">Selecione o curso:</option>
										  <?php foreach ($cursos as $curso) {?>
										  <option value="<?php echo $curso['idCurso'];?>"><?php echo $curso['nome'];?></option>
										 <?php }?>
										</select>
									</td>
								</tr>
							
							<tr>
								<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label for="ano" style="color: #B63D32;">Ano: </label></b></td>
								<td style="width: 75%; text-align: left;">
									<select name="ano" style="width: 70%;">
									  <option value="default">Selecione o ano:</option>
									  <option value="2016">2018</option>
									  <option value="2015">2017</option>
									  <option value="2014">2016</option>
									  <option value="2013">2015</option>
									  <option value="2012">2014</option>
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
							<tr>
								<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label for="textoquestao" style="color: #B63D32;">Digite o Texto da Pergunta: </label></b></td>
								<td style="width: 75%; text-align: left;">
									<textarea name="textoquestao" rows="6" cols="55"></textarea>
								</td>
							</tr>
						</tbody>
					</table>
					<h3 class="p3" style="font-size:small; font-family: sans-serif; font-weight: bold; padding-top: 2%;">Preencha as opções de resposta e selecione qual a opção que será a correta: </h3>
					<table style="width: 100%;">
						<tbody>
					        <tr class="radioRow">
					          <td class="radioColumn">
					            <input type="radio" name="radioOpcoes" value="1" id="radioOpcoes_1" >
					           </td>
					           <td class="labelColumn">
					            	<textarea rows="4" cols="80" name="opcao1"></textarea>
					            </td>
					        </tr>
					        <tr class="radioRow">
					          <td class="radioColumn">
					            <input type="radio" name="radioOpcoes" value="2" id="radioOpcoes_2" >
					           </td>
					           <td class="labelColumn">
					            	<textarea rows="4" cols="80" name="opcao2"></textarea>
					            </td>
					        </tr>
					        <tr class="radioRow">
					          <td class="radioColumn">
					            <input type="radio" name="radioOpcoes" value="3" id="radioOpcoes_3" >
					           </td>
					           <td class="labelColumn">
					            	<textarea rows="4" cols="80" name="opcao3"></textarea>
					            </td>
					        </tr>
					        <tr class="radioRow">
					          <td class="radioColumn">
					            <input type="radio" name="radioOpcoes" value="4" id="radioOpcoes_4" >
					           </td>
					           <td class="labelColumn">
					            	<textarea rows="4" cols="80" name="opcao4"></textarea>
					            </td>
					        </tr>
					        <tr class="radioRow">
					          <td class="radioColumn">
					            <input type="radio" name="radioOpcoes" value="5" id="radioOpcoes_5" >
					           </td>
					           <td class="labelColumn">
					            	<textarea rows="4" cols="80" name="opcao5"></textarea>
					            </td>
					        </tr>
						</tbody>
					</table>
					
					<table style="width: 100%;">
						<tbody>
							<tr>
								<td>
									<br>
									<input type="submit" value="Cadastrar Questão" name="cadastrarQuestao" style="border: 0px; border-radius:8px; font-weight:bold;
					 				height: 35px; width: 170px; background-color: #3AC74A; margin-top: 10px; color: #FFFFFF;"><br>
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