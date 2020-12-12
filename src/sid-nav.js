function actualizarDatos(){
    $id=$('#idpersona').val();
    $nombre= $('#nom').val();
    $apellido=$('#ape').val();
    $dni=$('#dni').val();
    $fecNac=$('#fecnac').val();
    $email=$('#ema').val();
  
  

     $cadena= "id=" + $id +
    "&nombre=" + $nombre + 
    "&apellido=" + $apellido +
    "&dni=" + $dni +
    "&fechaNacimiento=" + $fecNac +
    "&email=" + $email ;
$.ajax({
  type:"POST",
  url: window.location.origin +'/hoteles/usuario/modificarUsuario',
  data: $cadena,
  
  success:function(r){
    console.log("se modifico usuario");
    //actualizarTabla();
    console.log("reload");
    location.reload();
  }, error:function(response){
    alert("Hubo un error, intentelo nuevamente");
  }
});
  }