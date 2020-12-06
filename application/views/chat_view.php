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
        <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/filip.jpg" alt="Profile img">
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
      <?php foreach($chats as $chat) {?>
      <div class="friend-drawer friend-drawer--onhover" id=<?php echo $chat->id?>>
        <img class="profile-image" src="https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/styles/480/public/media/image/2020/09/mandalorian-baby-yoda-2074407.jpeg" alt="">
        <div class="text">
          <h6 id="usuario-nombre"><?php echo $chat->usuario_entrante->nombre?></h6>
          <p class="text-muted">Haga click aqui para abrir el mensaje.</p>
        </div>
        <span class="time text-muted small">13:21</span>
      </div>
      <hr>
      <?php }?>
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
        <img class="profile-image" src="data:image/jpeg;base64,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" alt="">
        <div class="text">
          <h6>Slaneshh</h6>
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
          <img class="profile-image" src="https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/styles/480/public/media/image/2020/09/mandalorian-baby-yoda-2074407.jpeg" alt="">
          <div class="text">
            <h6 id="usuario-seleccionado">Robo Cop</h6>
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
        <div class="row no-gutters">
          <div class="col-md-3">
            <div class="chat-bubble chat-bubble--left">
              Hello dude!
            </div>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-md-3 offset-md-9">
            <div class="chat-bubble chat-bubble--right">
              Hello dude!
            </div>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-md-3 offset-md-9">
            <div class="chat-bubble chat-bubble--right">
              Hello dude!
            </div>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-md-3">
            <div class="chat-bubble chat-bubble--left">
              Hello dude!
            </div>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-md-3">
            <div class="chat-bubble chat-bubble--left">
              Hello dude!
            </div>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-md-3">
            <div class="chat-bubble chat-bubble--left">
              Hello dude!
            </div>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-md-3 offset-md-9">
            <div class="chat-bubble chat-bubble--right">
              Hello dude!
            </div>
          </div>
        </div>
       
      </div>
      <div class="row">
          <div class="col-12">
            <div class="chat-box-tray">
              <i class="material-icons">sentiment_very_satisfied</i>
              <input type="text" placeholder="Escriba su mensaje acá...">
              <i class="material-icons">mic</i>
              <i class="material-icons">send</i>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>