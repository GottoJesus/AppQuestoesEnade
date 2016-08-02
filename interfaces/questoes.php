<?php @session_start();
$listaQuestoes = $_SESSION['$listaQuestoes'];
$count = 1;
foreach ($listaQuestoes as $questao) {
	$opcoes = $questao->getOpcoes();
	?>
<form method="post" action="src/lancarRespostas.php">
	<div class="questao" id="questao" style="width: 100%;">
	  <div class="textoPergunta" id="textoPergunta"></div>
	    <div class="opcoesPergunta" id="opcoesPergunta"> 
	      <table style="width:100%; background-color: #FFFFFF;">
	      	<thead>
	      		<tr class="radioRow">
			       <td class="radioColumn">
			           <p style="color:#ec1313;"><b><?php echo $count;?>-</b></p>
			        </td>
			        <td class="labelColumn">
			           <p align="left"><b><?php echo $questao->getTextoPergunta();?></b></p>
			         </td>
			        </tr>
	      	</thead>
		      <tbody>
		      <?php foreach ($opcoes as $opcao) {?>
			        <tr class="radioRow">
			          <td class="radioColumn">
			            <input type="radio" name="radioOpcoes" value="<?php echo $questao->getIdQuestao().'_'.$opcao['id_opcoes'];?>" id="radioOpcoes_1" >
			           </td>
			           <td class="labelColumn">
			            <label><?php echo $opcao['texto_opcoes'];?><br>
			            </label></td>
			        </tr>
			        <?php }?>	        
			        <tr>
						<td colspan="2" align="center" valign="middle" style="vertical-align: middle;">
							<br>
							<input type="submit" value="Responder Questão" name="responderQuestoes" style="border: 0px; border-radius:8px; font-weight:bold;
			 				height: 35px; width: 170px; background-color: #3AC74A; color: #FFFFFF;"><br>
						</td>
					</tr>
		      </tbody>
	      </table>
	    </div>
	</div>
</form>
<?php }?>