<header>
	<div style="width: 100%; display: flex;">
		<div style="width: 70%;">
			<h1><a href="index.php"><img src="images/logo-fmu-fiamfaam.png" alt=""></a></h1>
		   <!--   <div class="form-search">
		            <form id="form-search" method="post">
		              <input type="text" value="Encontre..." onBlur="if(this.value=='') this.value='Encontre...'" onFocus="if(this.value =='Type here...' ) this.value=''"  />
		              <a href="#" onClick="document.getElementById('form-search').submit()" class="search_button"></a>
		            </form>
		        </div>   -->
		</div>
		 
  		<?php
        @session_start();
//         $_SESSION['nome'] = "GustavoProf";
//         $_SESSION['login'] = "GustavoProf";
        
        if(isset($_SESSION['login'])){?>        
        <div style="width: 30%; display: flex; margin-top: 3%;margin-bottom: 1%; font-family: sans-serif;">
			<img src="images/usuario.png" alt="" width="20%" height="20%">
        	<div style="margin-top: 2%;margin-bottom: 2%;margin-left: 3%;">Ol&aacute;, <?php echo $_SESSION['nome'];?><br>
        		<a href="http://localhost/AppQuestoesEnade/src/logout.php">Sair do Sistema</a>
        	</div>
        </div>
        <?php }?>
	</div>
       
        <div class="clear"></div>
        <nav class="box-shadow">
            <div>
                <ul class="menu">
                <?php if(isset($_SESSION['login'])){
                		if($_SESSION['tipo_usuario'] == 'admin'){?>
                		<li><a href="cadastrarProfessores.php">Cadastrar Professores</a></li>
                		<li><a href="cadastrarAlunos.php">Cadastrar Alunos</a></li>
						<li><a href="cadastrarPerguntas.php">Cadastrar Perguntas</a></li>
						<li><a href="cadastrarCursos.php">Cadastrar Cursos</a></li>
<!-- 						<li><a href="cadastrarDisciplinas.php">Cadastrar Disciplinas</a></li> -->
						<li><a href="consultarAlunos.php">Consultar Alunos</a></li>
						<li><a href="resetarSenhas.php">Resetar Senhas</a></li>
                		<?php }elseif($_SESSION['tipo_usuario'] == 'professor'){?>
                		<li><a href="cadastrarAlunos.php">Cadastrar Alunos</a></li>
                    	<li><a href="consultarAlunos.php">Consultar Alunos</a></li>
						<li><a href="cadastrarPerguntas.php">Cadastrar Perguntas</a></li>
                  <?php }else{?>
                 	<li><a href="verRespostas.php">Verificar Respostas</a></li>
                    <li><a href="lancarRespostas.php">Responder Questões</a></li>
                  <?php }?>
                 <?php }else{?>
                 	<li><a></a></li>
                  <?php }?>
                </ul>
                <div class="social-icons">
                </div>
                <div class="clear"></div>
            </div>
        </nav>
</header>    