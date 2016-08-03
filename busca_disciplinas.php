<?php include_once 'src/dao/ToolsDAO.php';
$curso = $_GET['curso'];
$toolsDAO = new ToolsDAO();
$disciplinas = $toolsDAO->findDisciplinas($curso);?>

<td style="width: 25%; text-align: right; padding-right: 5px;"><b><label for="disciplinas" style="color: #B63D32;">Disciplinas: </label></b></td>
<td style="width: 75%; text-align: left;">
	<select name="disciplinas" style="width: 65.5%;" id="disciplinas">
	  <option value="default">Selecione a disciplina:</option>
	  <?php if($disciplinas != false){
	  foreach ($disciplinas as $disciplina) {?>
	   <option value="<?php echo $disciplina['id_disciplina'];?>"><?php echo $disciplina['codigo_disciplina']." - ".$disciplina['nome_disciplina'];?></option>
	   <?php }
	  }?>
	</select>
</td>