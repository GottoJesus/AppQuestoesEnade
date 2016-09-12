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
        <?php if(isset($_SESSION['login'])){
                		if($_SESSION['tipo_usuario'] == 'admin'){?>
	        <div class="clear"></div>
	        <nav class="box-shadow">
	            <div>
	                <ul class="menu">
	                	<li class="dropdown">
	                		<a href="#" class="dropbtn">Cadastrar</a>
		                	<div class="dropdown-content">
								<a href="cadastrarProfessores.php" style="padding:6px 13px 6px 13px;">Cadastrar Professores</a>
								<a href="cadastrarAlunos.php" style="padding:6px 13px 6px 13px;">Cadastrar Alunos</a>
								<a href="cadastrarCursos.php" style="padding:6px 13px 6px 13px;">Cadastrar Cursos</a>
								<a href="cadastrarDisciplinas.php" style="padding:6px 13px 6px 13px;">Cadastrar Disciplinas</a>
						    </div>
	                	</li>
						<li><a href="consultarAlunos.php">Consultar Alunos</a></li>
						<li><a href="resetarSenhas.php">Resetar Senhas</a></li>
					</ul>
	                <div class="social-icons">
	                </div>
	                <div class="clear"></div>
	            </div>
	        </nav>
			<?php }elseif($_SESSION['tipo_usuario'] == 'professor'){?>
			 <div class="clear"></div>
	        	<nav class="box-shadow">
	            <div>
	                <ul class="menu">
						<li><a href="cadastrarAlunos.php">Cadastrar Alunos</a></li>
						<li><a href="consultarAlunos.php">Consultar Alunos</a></li>
						<li><a href="cadastrarPerguntas.php">Cadastrar Perguntas</a></li>
					</ul>
                <div class="social-icons">
                </div>
                <div class="clear"></div>
            </div>
        </nav>
	  <?php }else{?>
	   <div class="clear"></div>
	        	<nav class="box-shadow">
	            <div>
	                <ul class="menu">
						<li><a href="verRespostas.php">Verificar Respostas</a></li>
						<li><a href="lancarRespostas.php">Responder Questões</a></li>
					</ul>
                <div class="social-icons"></div>
                <div class="clear"></div>
            </div>
        </nav>
	  <?php }?>
	 <?php }else{?>
	 	<div class="clear"></div>
        <nav class="box-shadow">
            <div>
                <ul class="menu">
					<li><a></a></li>
					</ul>
                <div class="social-icons">
                </div>
                <div class="clear"></div>
            </div>
        </nav>
	  <?php }?>

</header>    