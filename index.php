<?php 
//Realiza a instancia dos objetos.
include_once "inc/autoload.inc.php";
$servico  = new Controller_Servico();
$servidor = new Controller_Servidor();
	
?>
<!doctype html>
<html >
<head>
  <meta charset="utf-8">
  <meta lang="pt-br">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset cPanel</title>
  <link rel="stylesheet" href="view/css/foundation.css">
  <link rel="stylesheet" href="view/css/app.css">
  <link rel="stylesheet" href="view/css/style.css">
  <link rel="stylesheet" href="lib/sweetalert/dist/sweetalert.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="view/img/favicon.ico" >
</head>
<body>
  <section>
   
    <div class="row">
      <div class="large-12 medium-12 small-12 text-center div_form">
        <form id="form_reiniciar" method="POST">
        <input type="hidden" name="reset" value="reset_server" />
        <input type="hidden" name="servico" value="servico" />
          <div class="large-6 medium-6 small-6 large-offset-3 medium-offset-3 small-offset-3">
            <h4><strong><i class="fa fa-server" aria-hidden="true"></i></strong>&nbspServidores</h4>
            <input type="hidden" id="servico" name="servico">
            <select id="serv" name="serv" class="text-center" required autofocus>
             <option value="" disabled selected>Escolha um Servidor</option>
             <?php
             	// Realiza  aexibição dos options com os valores do servidor.
             	foreach ($servidor->controllerSelect() as $value){
             		echo "<option value='{$value->id}'>{$value->nome}</option>";
             	
             	}
             ?>
        
          </select>

        </div>
        <div class="large-6 medium-6 small-6 large-offset-3 medium-offset-3 small-offset-3 text-center">
        <h4><strong><i class="fa fa-cogs" aria-hidden="true"></i></strong>&nbspServiços</h4>
         
        </div>
        <div class="large-6 medium-6 small-6 large-offset-3 medium-offset-3 small-offset-3 ">
                	
           <?php 
           //Realiza  aexibição dos options com os valores do serviço.
          	foreach ($servico->controllerSelect() as $value ){
          		echo "<button class='button button click_func btn_servico' type='button' id='{$value->text_id}'  name='{$value->text_id}'>{$value->label}</button>";
           	}
           ?>  
           
           
        </div>  
      </form>
    </div>
    </div>	
  </section>

  <script src="view/js/vendor/jquery.js"></script>
  <script src="view/js/vendor/what-input.js"></script>
  <script src="view/js/vendor/foundation.js"></script>
  <script src="lib/sweetalert/dist/sweetalert.min.js"></script>
  <script src="view/js/auxiliar.js"></script>
  <script src="view/js/app.js"></script>
</body>
</html>