<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro PDC</title>
    <link href="dist/css/login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<div class="container">
	<div class="row">
		        <div class="col-sm-6 col-md-4 col-md-offset-4" style="margin-top: 80px;">
		            <div  class="mensaje-error">
		            		<span>

             				</span>
		            </div>
		            <div class="account-wall">
		            	<h1 class="text-center login-title" id=msj>Ingresa tus datos de acceso</h1>
						<h5 class="text-center" id="respuesta" style="color: red;"></h5>
		            	<hr style="width: 90%; color: gray">
		                <img class="image-profile" src="https://t3.ftcdn.net/jpg/01/00/47/36/160_F_100473618_FVj5mQT2nxDb2Ysa2p2HNxrOuenvT2lY.jpg">
		                <form class="form-signin" id="form-signin">
		                	<div class="form-group">
		                		<input type="text" class="form-control" placeholder="&#xF007; Matrícula o Correo" style="font-family:Arial, FontAwesome"  id="user" required/>
		                	</div>
			                <div class="form-group">
			                	<input type="password" class="form-control" placeholder="&#xF023; Contraseña" style="font-family:Arial, FontAwesome" id="password" required pattern="[A-Za-z0-9_-]{1,15}" />
			                </div>	
							<button class="btn btn-lg btn-success btn-block" type="button" id="Enviar" onclick="Login();">Iniciar sesión</button><br>
		                </form>
						<a style="margin-left: 50px;" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">¿Olvidaste tu contraseña?</a>
		            </div>
		        </div>
		        <div class="col-md-8 second">
                    <h1 class="page-header">Sistema de Registro y Pre diagnóstico de Covid-19</h1>
                    <p class="text-univer">Universidad Tecnológica de Sur del Estado de Morelos</p>
                </div>
	</div>
</div>
<!---SECCION DE MODALES--->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AVISO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Ponte en contacto con la plataforma de SICA-A para poder restablecer tu contraseña
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <a href="http://mi-escuelamx.com:8888/utsem/acceso.asp" target="_blank"><button type="button" class="btn btn-success">Ir a SICA-A</button></a>
      </div>
    </div>
  </div>
</div>
<script>
	function Login(){
		var username = document.getElementById('user').value;
		var password = document.getElementById('password').value;
		
		var datos ="User="+username+"&Pass="+password;
		$.ajax({
			url:'login_validar.php',
			type:'POST',
			data: datos
		})
		.done(function(res){
			$('#respuesta').html(res);
		})
		
	}
</script>
</body>
</html>