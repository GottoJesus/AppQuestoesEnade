<?php @session_start();
$listaQuestoes = $_SESSION['listaQuestoes'];
$count = 1;?>

<form method="post" action="src/lancarRespostas.php">	
<?php foreach ($listaQuestoes as $questao) {
	$opcoes = $questao['opcoes'];?>	
	<div class="questao" id="questao" style="width: 100%; margin-bottom: 5%;">
	    <div class="opcoesPergunta" id="opcoesPergunta"> 
	      <table style="width:100%; background-color: #FFFFFF; border: 1px #babfc7 solid;">
	      	<thead>
	      		<tr class="radioRow">
			       <td class="radioColumn">
			           <p style="color:#ec1313;"><b><?php echo $count;?>-</b></p>
			        </td>
			        <td class="labelColumn">
			           <p align="left"><b><?php echo $questao['texto_questao'];?></b></p>
			         </td>
			        </tr>
	      	</thead>
		      <tbody>
		      <?php foreach ($opcoes as $opcao) {?>
			        <tr class="radioRow">
			          <td class="radioColumn">
			            <input type="radio" name="radioOpcoes[<?php echo $questao['id_questoes'];?>]" value="<?php echo $questao['id_questoes'].'_'.$opcao['id_opcoes'];?>" id="radioOpcoes_1" >
			           </td>
			           <td class="labelColumn">
			            <label><?php echo $opcao['texto_opcoes'];?><br>
			            </label></td>
			        </tr>
			        <?php }?>	        
		      </tbody>
	      </table>
	    </div>
	</div>
	<?php 
$count++;
}?>	
<table style="width: 100%;">
	<tbody>
		 <tr>
			<td colspan="2" align="center" valign="middle" style="vertical-align: middle;">
				<br>
				<input type="submit" value="Responder Questões" name="responderQuestoes" style="border: 0px; border-radius:8px; font-weight:bold;
				height: 35px; width: 170px; background-color: #3AC74A; color: #FFFFFF;"><br>
			</td>
		</tr>
	</tbody>
</table>
</form>
