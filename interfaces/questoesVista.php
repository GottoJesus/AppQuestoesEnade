<?php @session_start();
include_once 'src/dao/AlunoDAO.php';
$alunoDAO = new AlunoDAO();
$questoesResp = $alunoDAO->getQuestoesResp($_SESSION['raAluno'], date("Y"), $_SESSION['semestre']);
if($questoesResp){
$count	= 1;
foreach ($questoesResp as $resp) {?>
<div class="questao" id="questao" style="width: 100%;">
  <div class="textoPergunta" id="textoPergunta"></div>
    <div class="opcoesPergunta" id="opcoesPergunta"> 
      <table style="width:100%; background-color: #FFFFFF; border: 1px #babfc7 solid;">
      	<thead>
      		<tr class="radioRow">
		       <td style="width: 20%;" >
		           <p style="color:#ec1313;"><b><?php echo $count;?>-</b></p>
		        </td>
		        <td style="width: 80%;">
		           <p align="left"><b><?php echo $resp['texto_questao'];?></b></p>
		         </td>
		        </tr>
      	</thead>
	      <tbody>
	      <?php if($resp['opcao_eh_correta'] == 1) {?>
		        <tr>
					<td colspan="2" align="center" valign="middle" style="vertical-align: middle;">
						<h3 style="font-size:medium; font-family: sans-serif; color: #3AC74A; font-weight: bold;">Você Acertou!!!</h3>
					</td>
				</tr>
				
				<tr>
					<td class="radioColumn">
		            	<label style="color: #B63D32;">Sua Resposta: <br></label>
		            </td>
		            <td class="labelColumn">
		            	<label><?php echo $resp['opcaoResp'];?><br></label>
		            </td>
				</tr>
		        <?php }else {?>	 
		         <tr>
					<td colspan="2" align="center" valign="middle" style="vertical-align: middle;">
						<h3 style="font-size:medium; font-family: sans-serif; color: #B63D32; font-weight: bold;">Você Errou!!!</h3>
					</td>
				</tr>
				<tr>
					<td class="radioColumn">
		            	<label style="color: #B63D32;">Sua Resposta: <br></label>
		            </td>
		            <td class="labelColumn">
		            	<label><?php echo $resp['opcaoResp'];?><br></label>
		            </td>
				</tr>
				<tr>
					<td class="radioColumn">
		            	<label style="color: #B63D32;">Resposta Correta<br></label>
		            </td>
		            <td class="labelColumn">
		            	<label><?php echo $resp['opcaoCorreta'];?><br></label>
		            </td>
				</tr>
				<?php }
$count++;}?>      
	      </tbody>
      </table>
    </div>
</div>


<?php }else{
	echo '<script type="text/javascript" lang="javascript"> window.alert("É necessário responder ao menos uma questão para acessar esta tela.");</script>';
	//header("Location: http://localhost/AppQuestoesEnade/lancarRespostas.php");
}?>