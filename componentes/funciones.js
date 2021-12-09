console.log("Hola mundo js");
var scanner = new Instascan.Scanner({
  video: document.getElementById('previsualizacion'),
  scanPeriod: 5,
  mirror: false
});
////////FUNCIONES GENERALES DE TODOS LOS MODULOS/////////////////////////////
function reset_modal() {
    document.getElementById("formadd").reset();
    document.getElementById("demo").innerHTML = " ";
    btnadd.disabled=false;
    }

function ConfirmDeleteAf()
    {
      var respuesta = confirm("¿Seguro de que deseas eliminar este registro?")
      if (respuesta == true)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

///////FUNCIONES DEL MODULO "PREGUNTAS DE SANIDAD"/////////////////////////////////
function consultar_pregunta(datos)
  {
    console.log(datos);
  	d=datos.split('||');

  	$('#id_pregunta').val(d[0]);
  	$('#pregunta').val(d[1]);
  	$('#status').val(d[2]);
    $('#descripcion').val(d[3]);
  }
///////FUNCIONES DEL MODULO "USUARIOS"/////////////////////////////////
function validarcorreo()
{
  var correo1 = document.getElementById('correo').value;
  var correo2 = document.getElementById('correo2').value;

  if(correo1 !== correo2)
    {
      document.getElementById("demo").innerHTML = "El correo no coincide";
      btnadd.disabled=true;
    }
    else
    {
      document.getElementById("demo").innerHTML = " ";
      btnadd.disabled=false;
    }
}

function validarpassword()
{
  var password1 = document.getElementById('password').value;
  var password2 = document.getElementById('password2').value;
  console.log(password1);
  console.log(password2);
  if(password1 !== password2)
    {
      document.getElementById("demo").innerHTML = "Las contraseñas no coinciden";
      btnadd.disabled=true;
    }
    else
    {
      document.getElementById("demo").innerHTML = " ";
      btnadd.disabled=false;
    }
}

function agregar_user()
   {
       var nombre = document.getElementById('nombre').value;
       var telefono = document.getElementById('telefono').value;
       var correo = document.getElementById('correo').value;
       var password = document.getElementById('password').value;
       var id_rol = document.getElementById('id_rol').value;
       var observaciones = document.getElementById('observaciones').value;
       var status = document.getElementById('status').value;
       
       var datos ="nombre="+nombre+"&telefono="+telefono+"&correo="+correo+"&password="+password+"&id_rol="+id_rol+"&observaciones="+observaciones+"&status="+status;
       console.log(datos);
       console.log(observaciones);
       console.log(status);

       $.ajax({
			url:'Backend/agregar_usuario.php',
			type:'POST',
			data: datos
		})
        .done(function(res){
			$('#respuesta').html(res);
		})
		
   }

   function update_user()
   {  
       var id_usuario = document.getElementById('id_usuario').value;           
       var nombre = document.getElementById('nombre_us').value;
       var telefono = document.getElementById('telefono_us').value;
       var correo = document.getElementById('correo_us').value;
       var password = document.getElementById('password_us').value;
       var id_rol = document.getElementById('id_rol_us').value;
       var status = document.getElementById('status_us').value;
       var observaciones = document.getElementById('observaciones_us').value;
       
       var datos ="id="+id_usuario+"&nombre="+nombre+"&telefono="+telefono+"&correo="+correo+"&password="+password+"&id_rol="+id_rol+"&observaciones="+observaciones+"&status="+status;
       console.log(datos);
       
       $.ajax({
			url:'Backend/actualizar_usuario.php',
			type:'POST',
			data: datos
		})
        .done(function(res){
			$('#respuesta').html(res);
		})
		
   }

  function consultar_usuario(datos)
  {
    console.log(datos);
  	d=datos.split('||');

  	$('#id_usuario').val(d[0]);
  	$('#nombre_us').val(d[1]);
  	$('#telefono_us').val(d[2]);
    $('#correo_us').val(d[3]);
    $('#password_us').val(d[4]);
    $('#id_rol_us').val(d[5]);
    $('#status_us').val(d[6]);
    $('#observaciones_us').val(d[7]);
  }
///////FUNCIONES DEL MODULO "GESTION DE ROLES"/////////////////////////////////
function activarradio(parametro){

  var name = 'editar'+parametro.id;
  var radios = document.getElementsByName(name);
  
  console.log(parametro);
  
  if(parametro.checked==true){
  
    for (var i= 0; i < radios.length; i++){
    radios[i].disabled=false;
    }

  }
  else{
    
    for (var i= 0; i < radios.length; i++){
    radios[i].disabled=true;
    radios[i].checked=false;
    }
  }
}
///////FUNCIONES DEL MODULO "GESTION DE AFORO"/////////////////////////////////
function consultar_aforo(datos)
  {
    console.log(datos);
  	d=datos.split('||');

  	$('#id_aforo').val(d[0]);
  	$('#semaforo').val(d[1]);
  	$('#a_gral').val(d[2]);
    $('#a_admin').val(d[3]);
    $('#a_docentes').val(d[4]);
    $('#a_estudiantes').val(d[5]);
    $('#status').val(d[6]);
    $('#observaciones').val(d[7]);

  }

function myFunction() 
  {
  var a = document.getElementById("ag").value;
  var b = document.getElementById("aa").value;
  var c = document.getElementById("ad").value;
  var d = document.getElementById("ae").value;

  var suma = parseInt(b)+parseInt(c)+parseInt(d);
  console.log(a);
  console.log(suma);
    if(suma > a)
    {
      document.getElementById("demo").innerHTML = "La cantidad de personal supera el aforo permitido";
      btnadd.disabled=true;
      document.getElementById("ag").style.color='red';
    }
    else
    {
      document.getElementById("demo").innerHTML = " ";
      btnadd.disabled=false;
      document.getElementById("ag").style.color='#495057';
    }
  }

function myFunction2() 
  {
  var a = document.getElementById("a_gral").value;
  var b = document.getElementById("a_admin").value;
  var c = document.getElementById("a_docentes").value;
  var d = document.getElementById("a_estudiantes").value;

  var suma = parseInt(b)+parseInt(c)+parseInt(d);
  console.log(a);
  console.log(suma);
    if(suma > a)
    {
      document.getElementById("demo2").innerHTML = "La cantidad de personal supera el aforo permitido";
      btnupdate.disabled=true;
      document.getElementById("a_gral").style.color='red';
    }
    else
    {
      document.getElementById("demo2").innerHTML = " ";
      btnupdate.disabled=false;
      document.getElementById("a_gral").style.color='#495057';
    }
  }
  //////////////Funciones de el lector de codigos
function lector(){
    document.getElementById('qr-code').style.display='none';
    document.getElementById('previsualizacion').style.display='block';
    iniciar.disabled=true;
  
    Instascan.Camera.getCameras().then(function(cameras){
        if(cameras.length > 0 ){
            scanner.start(cameras[0]);
        }
        else{
            console.error('No se han encontrado camaras');
            alert('Camaras no encontradas');
        }
    }).catch(function(e){
        console.error(e);
        alert("ERROR:"+ e);
    });
    //setTimeout(function(){ scanner.stop(); }, 5000); 

    scanner.addListener('scan', function(respuesta){
        var temperatura = prompt("Ingresa la temperatura del usuario", "0");
        //console.log(temperatura);

        var datos="respuesta="+respuesta+"&Temp="+temperatura;
        $.ajax({
                url:'checar.php',
                type:'POST',
                data: datos
            })
        .done(function(res){
              var respuesta = res;
              console.log("Respuesta: " + respuesta);

              if (respuesta == 1) {
                  document.getElementById('audiotag1').play();

                    $(document).Toasts('create', {
                      class: 'bg-success',
                      title: 'Escaneo correcto!!',
                      body: 'Puede acceder!!.',
                      autohide: true,
                      delay: 2000
                    })

              }
              else{
                  if(respuesta == 2) {
                  document.getElementById('audiotag2').play();
                      $(document).Toasts('create', {
                        class: 'bg-danger',
                        title: 'Error!!',
                        body: 'El código QR ya fue escaneado!!.',
                        autohide: true,
                        delay: 2000
                      })
                }
                else{
                  document.getElementById('audiotag2').play();
                      $(document).Toasts('create', {
                        class: 'bg-danger',
                        title: 'Error!!',
                        body: 'Negar acceso a la universidad!!.',
                        autohide: true,
                        delay: 2000
                      })
                }
              }

            })
    });
};
function apagar(){
  iniciar.disabled=false;
  scanner.stop();
  document.getElementById('previsualizacion').style.display='none';
  document.getElementById('qr-code').style.display='block';
}
