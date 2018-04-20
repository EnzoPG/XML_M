<html>
 <head>
  <title>XMLM</title>

      <meta charset="UTF-8">
     
  <!-- Ajax Import -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
  <!-- Just an Ajust -->     
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Bootstrap Import -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <!-- Google Imports -->   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <!-- Bootstrap Components Imports -->   
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     
  <!-- Js Imports -->      
  <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>                            
 
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

     
     <style>
         .btn-file {
             position: relative;
             overflow: hidden;
         }
         .btn-file input[type=file] {
             position: absolute;
             top: 0;
             right: 0;
             min-width: 100%;
             min-height: 100%;                                                                                      /** Definindo Estilo dos botões utilizados **/
             font-size: 100px;
             text-align: center;
             filter: alpha(opacity=0);
             opacity: 0;
             outline: none;
             background: white;
             cursor: inherit;
             display: block;
         }
     </style>
     
     
    </head>
    <body>
        <div class="container-contact100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-contact100">
                <form method="post" id="import_form" enctype="multipart/form-data">
                    <center>
                        <h1>Importar documento XML para Banco MySQL</h1>
                    <br>
                    <h2>Selecione o Arquivo a ser importado</h2>
                    </center>
                <br>
                
                <center> 
                    <input type="file" class="btn btn-default btn-file" name="file" id="file"/>

                    <p>
                    <br>
                        
                    <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Importar"/>
                        
                    </center>
                
                <br>
                <span id="message"></span>
             </form>
            </div>
        </div>
    </body>
</html>

<!-- Script de Funcionamento do sistema de Importação de documento -->
<script>
$(document).ready(function(){
 $('#import_form').on('submit', function(event){
  event.preventDefault();

  $.ajax({
   url:"import.php",
   method:"POST",
   data: new FormData(this),
   contentType:false,
   cache:false,
   processData:false,
   beforeSend:function(){
    $('#submit').attr('disabled','disabled'),
    $('#submit').val('Imporando Arquivo...');
   },
   success:function(data)
   {
    $('#message').html(data);
    $('#import_form')[0].reset();
    $('#submit').attr('disabled', false);
    $('#submit').val('Importar');
   }
  })

  setInterval(function(){
   $('#message').html('');
  }, 5000);

 });
});
</script>
