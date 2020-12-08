<!--div class="container"-->
<?php
$usuario = $usuario[0];
//print_r($usuario);
//print_r($chats);
//print_r();
//die();
//print_r($usuario);
?>
<div class="container">
  <div class="row no-gutters">
    <div class="col-md-4 border-right">
      <div class="settings-tray">
        <img class="profile-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJIAeK2Nmrz0H5cdFmanZ4KzJjZHaMS9lkhg&usqp=CAU" alt="Profile img">
        <span class="settings-tray--right">
          <i class="material-icons">cached</i>
          <i class="material-icons">message</i>
          <i class="material-icons">menu</i>
        </span>
      </div>
      <div class="search-box">
        <div class="input-wrapper">
          <i class="material-icons">search</i>
          <input placeholder="Search here" type="text">
        </div>
      </div>
      <!--div id="chat-completo"-->
      <?php foreach($chats as $chat) {?>
      <div class="friend-drawer friend-drawer--onhover" id=<?php echo $chat->id?>>
        <img class="profile-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJIAeK2Nmrz0H5cdFmanZ4KzJjZHaMS9lkhg&usqp=CAU" alt="">
        <div class="text">
          <h6 id=<?php echo 'usuario-nombre'.$chat->id ?>><?php echo $chat->usuario_entrante->nombre?></h6>
          <p class="text-muted">Haga click aqui para abrir el mensaje.</p>
        </div>
        <span class="time text-muted small">13:21</span>
      </div>
      <hr>
      <?php }?>
      <!--/div-->
      <div class="friend-drawer friend-drawer--onhover" id=2>
        <img class="profile-image" src="data:image/jpeg;base64,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" alt="">
        <div class="text">
          <h6>JC Denton</h6>
          <p class="text-muted">Wanna grab a beer?</p>
        </div>
        <span class="time text-muted small">00:32</span>
      </div>
      <hr>
      <div class="friend-drawer friend-drawer--onhover" id=3>
        <img class="profile-image" src="data:image/jpeg;base64,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" alt="">
        <div class="text">
          <h6>Helios</h6>
          <p class="text-muted">Seen that canned piece of s?</p>
        </div>
        <span class="time text-muted small">13:21</span>
      </div>
      <hr>
      <div class="friend-drawer friend-drawer--onhover" id=4>
        <img class="profile-image" src="https://i.pinimg.com/originals/79/41/e1/7941e1cc3a024774693e39dd74d3ae50.jpg" alt="">
        <div class="text">
          <h6>Papa nurgle</h6>
          <p class="text-muted">Im studying spanish...</p>
        </div>
        <span class="time text-muted small">13:21</span>
      </div>
      <hr>
      <div class="friend-drawer friend-drawer--onhover" id=5>
        <img class="profile-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJIAeK2Nmrz0H5cdFmanZ4KzJjZHaMS9lkhg&usqp=CAU" alt="">
        <div class="text">
          <h6>Slaanesh</h6>
          <p class="text-muted">I'm not sure...</p>
        </div>
        <span class="time text-muted small">13:21</span>
      </div>
      <hr>
      <div class="friend-drawer friend-drawer--onhover" id=6>
        <img class="profile-image" src="https://i.pinimg.com/originals/56/e8/55/56e8550821d523873d0510cdfe90f47f.jpg" alt="">
        <div class="text">
          <h6>Rex</h6>
          <p class="text-muted">Hi, wanna see something?</p>
        </div>
        <span class="time text-muted small">13:21</span>
      </div>
    </div>
    <div class="col-md-8">
      <div class="settings-tray">
        <div class="friend-drawer no-gutters friend-drawer--grey">
          <img class="profile-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJIAeK2Nmrz0H5cdFmanZ4KzJjZHaMS9lkhg&usqp=CAU" alt="">
          <div class="text">
            <h6 id="usuario-seleccionado">Hola usuario!</h6>
            <!--p class="text-muted">Layin' down the law since like before Christ...</p-->
          </div>
          <span class="settings-tray--right">
            <i class="material-icons">cached</i>
            <i class="material-icons">message</i>
            <i class="material-icons">menu</i>
          </span>
        </div>
      </div>
      <div class="chat-panel">
        
       
      </div>
      <div class="row">
          <div class="col-12" id="caja-chat">
            <div class="chat-box-tray">
              <i class="material-icons">sentiment_very_satisfied</i>
              <input type="text" placeholder="Escriba su mensaje acá..." id="mensaje">
              <i class="material-icons">mic</i>
              <i class="material-icons" id="enviar">send</i>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>