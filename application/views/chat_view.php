<!--div class="container"-->
<?php
$usuario = $usuario[0];
//print_r($usuario);
//print_r($chats);
//print_r();
//die();
//print_r($usuario);
?>
<script src='https://production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo base_url();?>src/mensajes.js"></script>


<script src="https://use.typekit.net/hoy3lrg.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<style class="cp-pen-styles">div-chat {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #27ae60;
  font-family: "proxima-nova", "Source Sans Pro", sans-serif;
  font-size: 1em;
  letter-spacing: 0.1px;
  color: #32465a;
  text-rendering: optimizeLegibility;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
  -webkit-font-smoothing: antialiased;
}

#frame {
  width: 95%;
  min-width: 360px;
  max-width: 1000px;
  height: 92vh;
  min-height: 300px;
  max-height: 720px;
  background: #E6EAEA;
}
@media screen and (max-width: 360px) {
  #frame {
    width: 100%;
    height: 100vh;
  }
}
#frame #sidepanel {
  float: left;
  min-width: 280px;
  max-width: 340px;
  width: 40%;
  height: 100%;
  background: #2c3e50;
  color: #f5f5f5;
  overflow: hidden;
  position: relative;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel {
    width: 58px;
    min-width: 58px;
  }
}
#frame #sidepanel #profile {
  width: 80%;
  margin: 25px auto;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile {
    width: 100%;
    margin: 0 auto;
    padding: 5px 0 0 0;
    background: #32465a;
  }
}
#frame #sidepanel #profile.expanded .wrap {
  height: 210px;
  line-height: initial;
}
#frame #sidepanel #profile.expanded .wrap p {
  margin-top: 20px;
}
#frame #sidepanel #profile.expanded .wrap i.expand-button {
  -moz-transform: scaleY(-1);
  -o-transform: scaleY(-1);
  -webkit-transform: scaleY(-1);
  transform: scaleY(-1);
  filter: FlipH;
  -ms-filter: "FlipH";
}
#frame #sidepanel #profile .wrap {
  height: 60px;
  line-height: 60px;
  overflow: hidden;
  -moz-transition: 0.3s height ease;
  -o-transition: 0.3s height ease;
  -webkit-transition: 0.3s height ease;
  transition: 0.3s height ease;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap {
    height: 55px;
  }
}
#frame #sidepanel #profile .wrap img {
  width: 50px;
  border-radius: 50%;
  padding: 3px;
  border: 2px solid #e74c3c;
  height: auto;
  float: left;
  cursor: pointer;
  -moz-transition: 0.3s border ease;
  -o-transition: 0.3s border ease;
  -webkit-transition: 0.3s border ease;
  transition: 0.3s border ease;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap img {
    width: 40px;
    margin-left: 4px;
  }
}
#frame #sidepanel #profile .wrap img.online {
  border: 2px solid #2ecc71;
}
#frame #sidepanel #profile .wrap img.away {
  border: 2px solid #f1c40f;
}
#frame #sidepanel #profile .wrap img.busy {
  border: 2px solid #e74c3c;
}
#frame #sidepanel #profile .wrap img.offline {
  border: 2px solid #95a5a6;
}
#frame #sidepanel #profile .wrap p {
  float: left;
  margin-left: 15px;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap p {
    display: none;
  }
}
#frame #sidepanel #profile .wrap i.expand-button {
  float: right;
  margin-top: 23px;
  font-size: 0.8em;
  cursor: pointer;
  color: #435f7a;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap i.expand-button {
    display: none;
  }
}
#frame #sidepanel #profile .wrap #status-options {
  position: absolute;
  opacity: 0;
  visibility: hidden;
  width: 150px;
  margin: 70px 0 0 0;
  border-radius: 6px;
  z-index: 99;
  line-height: initial;
  background: #435f7a;
  -moz-transition: 0.3s all ease;
  -o-transition: 0.3s all ease;
  -webkit-transition: 0.3s all ease;
  transition: 0.3s all ease;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options {
    width: 58px;
    margin-top: 57px;
  }
}
#frame #sidepanel #profile .wrap #status-options.active {
  opacity: 1;
  visibility: visible;
  margin: 75px 0 0 0;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options.active {
    margin-top: 62px;
  }
}
#frame #sidepanel #profile .wrap #status-options:before {
  content: '';
  position: absolute;
  width: 0;
  height: 0;
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-bottom: 8px solid #435f7a;
  margin: -8px 0 0 24px;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options:before {
    margin-left: 23px;
  }
}
#frame #sidepanel #profile .wrap #status-options ul {
  overflow: hidden;
  border-radius: 6px;
}
#frame #sidepanel #profile .wrap #status-options ul li {
  padding: 15px 0 30px 18px;
  display: block;
  cursor: pointer;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options ul li {
    padding: 15px 0 35px 22px;
  }
}
#frame #sidepanel #profile .wrap #status-options ul li:hover {
  background: #496886;
}
#frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
  position: absolute;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  margin: 5px 0 0 0;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
    width: 14px;
    height: 14px;
  }
}
#frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
  content: '';
  position: absolute;
  width: 14px;
  height: 14px;
  margin: -3px 0 0 -3px;
  background: transparent;
  border-radius: 50%;
  z-index: 0;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
    height: 18px;
    width: 18px;
  }
}
#frame #sidepanel #profile .wrap #status-options ul li p {
  padding-left: 12px;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options ul li p {
    display: none;
  }
}
#frame #sidepanel #profile .wrap #status-options ul li#status-online span.status-circle {
  background: #2ecc71;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-online.active span.status-circle:before {
  border: 1px solid #2ecc71;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-away span.status-circle {
  background: #f1c40f;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-away.active span.status-circle:before {
  border: 1px solid #f1c40f;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-busy span.status-circle {
  background: #e74c3c;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-busy.active span.status-circle:before {
  border: 1px solid #e74c3c;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-offline span.status-circle {
  background: #95a5a6;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-offline.active span.status-circle:before {
  border: 1px solid #95a5a6;
}
#frame #sidepanel #profile .wrap #expanded {
  padding: 100px 0 0 0;
  display: block;
  line-height: initial !important;
}
#frame #sidepanel #profile .wrap #expanded label {
  float: left;
  clear: both;
  margin: 0 8px 5px 0;
  padding: 5px 0;
}
#frame #sidepanel #profile .wrap #expanded input {
  border: none;
  margin-bottom: 6px;
  background: #32465a;
  border-radius: 3px;
  color: #f5f5f5;
  padding: 7px;
  width: calc(100% - 43px);
}
#frame #sidepanel #profile .wrap #expanded input:focus {
  outline: none;
  background: #435f7a;
}
#frame #sidepanel #search {
  border-top: 1px solid #32465a;
  border-bottom: 1px solid #32465a;
  font-weight: 300;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #search {
    display: none;
  }
}
#frame #sidepanel #search label {
  position: absolute;
  margin: 10px 0 0 20px;
}
#frame #sidepanel #search input {
  font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
  padding: 10px 0 10px 46px;
  width: calc(100% - 25px);
  border: none;
  background: #32465a;
  color: #f5f5f5;
}
#frame #sidepanel #search input:focus {
  outline: none;
  background: #435f7a;
}
#frame #sidepanel #search input::-webkit-input-placeholder {
  color: #f5f5f5;
}
#frame #sidepanel #search input::-moz-placeholder {
  color: #f5f5f5;
}
#frame #sidepanel #search input:-ms-input-placeholder {
  color: #f5f5f5;
}
#frame #sidepanel #search input:-moz-placeholder {
  color: #f5f5f5;
}
#frame #sidepanel #contacts {
  height: calc(100% - 177px);
  overflow-y: scroll;
  overflow-x: hidden;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #contacts {
    height: calc(100% - 149px);
    overflow-y: scroll;
    overflow-x: hidden;
  }
  #frame #sidepanel #contacts::-webkit-scrollbar {
    display: none;
  }
}
#frame #sidepanel #contacts.expanded {
  height: calc(100% - 334px);
}
#frame #sidepanel #contacts::-webkit-scrollbar {
  width: 8px;
  background: #2c3e50;
}
#frame #sidepanel #contacts::-webkit-scrollbar-thumb {
  background-color: #243140;
}
#frame #sidepanel #contacts ul li.contact {
  position: relative;
  padding: 10px 0 15px 0;
  font-size: 0.9em;
  cursor: pointer;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #contacts ul li.contact {
    padding: 6px 0 46px 8px;
  }
}
#frame #sidepanel #contacts ul li.contact:hover {
  background: #32465a;
}
#frame #sidepanel #contacts ul li.contact.active {
  background: #32465a;
  border-right: 5px solid #435f7a;
}
#frame #sidepanel #contacts ul li.contact.active span.contact-status {
  border: 2px solid #32465a !important;
}
#frame #sidepanel #contacts ul li.contact .wrap {
  width: 88%;
  margin: 0 auto;
  position: relative;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #contacts ul li.contact .wrap {
    width: 100%;
  }
}
#frame #sidepanel #contacts ul li.contact .wrap span {
  position: absolute;
  left: 0;
  margin: -2px 0 0 -2px;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  border: 2px solid #2c3e50;
  background: #95a5a6;
}
#frame #sidepanel #contacts ul li.contact .wrap span.online {
  background: #2ecc71;
}
#frame #sidepanel #contacts ul li.contact .wrap span.away {
  background: #f1c40f;
}
#frame #sidepanel #contacts ul li.contact .wrap span.busy {
  background: #e74c3c;
}
#frame #sidepanel #contacts ul li.contact .wrap img {
  width: 40px;
  border-radius: 50%;
  float: left;
  margin-right: 10px;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #contacts ul li.contact .wrap img {
    margin-right: 0px;
  }
}
#frame #sidepanel #contacts ul li.contact .wrap .meta {
  padding: 5px 0 0 0;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #contacts ul li.contact .wrap .meta {
    display: none;
  }
}
#frame #sidepanel #contacts ul li.contact .wrap .meta .name {
  font-weight: 600;
}
#frame #sidepanel #contacts ul li.contact .wrap .meta .preview {
  margin: 5px 0 0 0;
  padding: 0 0 1px;
  font-weight: 400;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  -moz-transition: 1s all ease;
  -o-transition: 1s all ease;
  -webkit-transition: 1s all ease;
  transition: 1s all ease;
}
#frame #sidepanel #contacts ul li.contact .wrap .meta .preview span {
  position: initial;
  border-radius: initial;
  background: none;
  border: none;
  padding: 0 2px 0 0;
  margin: 0 0 0 1px;
  opacity: .5;
}
#frame #sidepanel #bottom-bar {
  position: absolute;
  width: 100%;
  bottom: 0;
}
#frame #sidepanel #bottom-bar button {
  float: left;
  border: none;
  width: 50%;
  padding: 10px 0;
  background: #32465a;
  color: #f5f5f5;
  cursor: pointer;
  font-size: 0.85em;
  font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #bottom-bar button {
    float: none;
    width: 100%;
    padding: 15px 0;
  }
}
#frame #sidepanel #bottom-bar button:focus {
  outline: none;
}
#frame #sidepanel #bottom-bar button:nth-child(1) {
  border-right: 1px solid #2c3e50;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #bottom-bar button:nth-child(1) {
    border-right: none;
    border-bottom: 1px solid #2c3e50;
  }
}
#frame #sidepanel #bottom-bar button:hover {
  background: #435f7a;
}
#frame #sidepanel #bottom-bar button i {
  margin-right: 3px;
  font-size: 1em;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #bottom-bar button i {
    font-size: 1.3em;
  }
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #bottom-bar button span {
    display: none;
  }
}
#frame .content {
  float: right;
  width: 60%;
  height: 100%;
  overflow: hidden;
  position: relative;
}
@media screen and (max-width: 735px) {
  #frame .content {
    width: calc(100% - 58px);
    min-width: 300px !important;
  }
}
@media screen and (min-width: 900px) {
  #frame .content {
    width: calc(100% - 340px);
  }
}
#frame .content .contact-profile {
  width: 100%;
  height: 60px;
  line-height: 60px;
  background: #f5f5f5;
}
#frame .content .contact-profile img {
  width: 40px;
  border-radius: 50%;
  float: left;
  margin: 9px 12px 0 9px;
}
#frame .content .contact-profile p {
  float: left;
}
#frame .content .contact-profile .social-media {
  float: right;
}
#frame .content .contact-profile .social-media i {
  margin-left: 14px;
  cursor: pointer;
}
#frame .content .contact-profile .social-media i:nth-last-child(1) {
  margin-right: 20px;
}
#frame .content .contact-profile .social-media i:hover {
  color: #435f7a;
}
#frame .content .messages {
  height: auto;
  min-height: calc(100% - 93px);
  max-height: calc(100% - 93px);
  overflow-y: scroll;
  overflow-x: hidden;
}
@media screen and (max-width: 735px) {
  #frame .content .messages {
    max-height: calc(100% - 105px);
  }
}
#frame .content .messages::-webkit-scrollbar {
  width: 8px;
  background: transparent;
}
#frame .content .messages::-webkit-scrollbar-thumb {
  background-color: rgba(0, 0, 0, 0.3);
}
#frame .content .messages ul li {
  display: inline-block;
  clear: both;
  float: left;
  margin: 15px 15px 5px 15px;
  width: calc(100% - 25px);
  font-size: 0.9em;
}
#frame .content .messages ul li:nth-last-child(1) {
  margin-bottom: 20px;
}
#frame .content .messages ul li.sent img {
  margin: 6px 8px 0 0;
}
#frame .content .messages ul li.sent p {
  background: #435f7a;
  color: #f5f5f5;
}
#frame .content .messages ul li.replies img {
  float: right;
  margin: 6px 0 0 8px;
}
#frame .content .messages ul li.replies p {
  background: #f5f5f5;
  float: right;
}
#frame .content .messages ul li img {
  width: 22px;
  border-radius: 50%;
  float: left;
}
#frame .content .messages ul li p {
  display: inline-block;
  padding: 10px 15px;
  border-radius: 20px;
  max-width: 205px;
  line-height: 130%;
}
@media screen and (min-width: 735px) {
  #frame .content .messages ul li p {
    max-width: 300px;
  }
}
#frame .content .message-input {
  position: absolute;
  bottom: 0;
  width: 100%;
  z-index: 99;
}
#frame .content .message-input .wrap {
  position: relative;
}
#frame .content .message-input .wrap input {
  font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
  float: left;
  border: none;
  width: calc(100% - 90px);
  padding: 11px 32px 10px 8px;
  font-size: 0.8em;
  color: #32465a;
}
@media screen and (max-width: 735px) {
  #frame .content .message-input .wrap input {
    padding: 15px 32px 16px 8px;
  }
}
#frame .content .message-input .wrap input:focus {
  outline: none;
}
#frame .content .message-input .wrap .attachment {
  position: absolute;
  right: 60px;
  z-index: 4;
  margin-top: 10px;
  font-size: 1.1em;
  color: #435f7a;
  opacity: .5;
  cursor: pointer;
}
@media screen and (max-width: 735px) {
  #frame .content .message-input .wrap .attachment {
    margin-top: 17px;
    right: 65px;
  }
}
#frame .content .message-input .wrap .attachment:hover {
  opacity: 1;
}
#frame .content .message-input .wrap button {
  float: right;
  border: none;
  width: 50px;
  padding: 12px 0;
  cursor: pointer;
  background: #32465a;
  color: #f5f5f5;
}
@media screen and (max-width: 735px) {
  #frame .content .message-input .wrap button {
    padding: 16px 0;
  }
}
#frame .content .message-input .wrap button:hover {
  background: #435f7a;
}
#frame .content .message-input .wrap button:focus {
  outline: none;
}
</style>
<!--/head><body-->
<!-- 

A concept for a chat interface. 

Try writing a new message! :)


Follow me here:
Twitter: https://twitter.com/thatguyemil
Codepen: https://codepen.io/emilcarlsson/
Website: http://emilcarlsson.se/

-->

<div id="frame">
	<div id="sidepanel">
		<div id="profile">
			<div class="wrap">
				<img id="profile-img" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxASEBAQEBIPDw8PEA8PDw8PEA8PDw0PFREWFhURFRUYHSggGBolGxUVITEhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OFRAQGCsdFR0rLS0rLS0rLS0rLSsrLS0tLS0tLTctLS0tKzctNy0rLTctNys3KystKysrKysrKy0rK//AABEIAPEA0QMBIgACEQEDEQH/xAAbAAABBQEBAAAAAAAAAAAAAAAAAQIDBAUGB//EAD8QAAIBAwIEAwYCBwUJAAAAAAABAgMEEQUhEjFBUQZhkRMicYGhsTJSM0JicsHR8BUWQ1XxFCMkJZKy0tPh/8QAGQEAAwEBAQAAAAAAAAAAAAAAAAECAwQF/8QAIREBAQEAAgIDAQEBAQAAAAAAAAECAxESIRMxQVEiFAT/2gAMAwEAAhEDEQA/APDwAAAAAAFiKCRNToNhSQ4HRps0KVg2XqNglzIu5AyIW7Jo2rNynaItUrJdiLyKme2BGyZHUtWjsKNh5D6ukp9BfK1nG4WcWhsKmDqbvRH0Ri3OlyXQublZ3FU41RPajnaSJaFjJ9CrYnxROTZDUiblHSpPoQXGntE+ULxsYTQhcuLZroU2i5ezAogoAIURCgAACACgAADQABkBUITU6eWhBPa2zkbltZpITTqGEjTpwMd6JXVNIfGBM6ZNTpGfasw2jSL9CmR0qZeoQItdGMpaFIuRpDaMS3BIi10zKFWqYyppUJdPoX44JoYHNI1hz1TwzDOVgWGhRj0R0mSOaK8mfgxFp8V0MrULFb7HUziZt/TFKNY9OJu7RdjCvbHGWjsb6kY9an0Nsa6c2p1XKNCFzU6PDL4lM6IRQEFQAYDAomQAwAoADQAAIsTR0yjmXkjPR0OjUvdyLd6hVp0YbF23p5IKaL1qjltL7OdEdCmieSEjAjt04yWESzSQ2nTLNOmybXTnKWmTRIuQsZibLCySJsrxqksaghU3ExspsT2g2VQE9GykVbh5RYlURBVkik6Yd9Ax7iludBdwMytAuVyck7ctrtL3U+0vuYh1et0M05fDPpucozqxe4xKAAiwUQUQAUBAAEAAGCo6PQJ+60+nI52McnQ6PHCI5PpNbMUXbMq01sWLLmctGa1Y0ienQJLaGxcjBGddmPpWhSLEaJLFIVsl05npC6Iz2JPKRFKoCiRpE0KXmV/aEtObGE/siOdIkUyOcw6JXqU2V5wZYlUGcYM9qdansZdzSN94KNxR5jlcu65y/j7vyZw6PQ7+j7rXXDPPZxw2uqbT+KOvhvqsOyIUQU1MCCiAAAoADQABhesKaay+eX9kb9pFJGFpu6fk8+pu2dN7N/Iy2i/bSpPYntpKO8nheZTuLunTjxSeF07vywc7f67KbxGPDBcl1fmZzF0Mu0nr8IvCZo2mtQkua+x5XK9k+n3HRvZ9M/Uq8PbfG/F6w9Vj0aGPUV3PMaepVV0b9Sda5VX6v3F/z1tP/R/Xoj1Ab/tx5+vENT8v1Y5eI5fl+ovhsV/0R36vEWaV4ee0vEveLXzNm01eEltL12I1x2LzySuxV0htS6Rz0bzzI62oxit5JfMjxXbG3UuUMVyjk63iOknjL9CJ+Iqfd+jL+O1jrcdkrpCuqmcatfp/m+jFfiKK5PJPxVz61K6S6gmmup5ldfjn+/P/ALmdFU8QNyTXTmjnLiWZzl3lJ+rydHFi577YxGLkANTAiFADAo3AACAADC7p8sZ7bZ+pfr6vhcNNZfLPT5dzIt4OT4U8Lmzp9HtKccYWZdZPd/LsRqyfaNdRl0NIuKz45txT/WnzfwRQvbKdKTjNcuvRroz0alHYz9Zt1OD5ZxtlGeeX2M6tcdb0o4T5v7GhaVMP/Qy6kZU3gmo1W9zaf1o9B0HUoxSyo/NJm7dalScfwU84/LH+R5jbXMl1NGnczknvyO/j1LPbm5O4n124pyz7sV8EkclcwWXg07ptsoVaZz8tacai4ixm1yeCXAtrbupNRXUw79Nuv4arup0nL1Y2dxN822ei6d4Joyt3xZ9pJZUuqOC1WwdGo4Poyc7zb6XrOpPaokXLO2Ums8iKEMlq3i0zXPusNXp1mjeG7Kql7RTT7xmXtQ8E6fCOYzr5/ei19jBtbudPHNImutZk1hs6r4de4yzq1hahplODfDKT7ZwZU4Y5bpbGrd1c5ZknJb7bQIUEgwSAAAkAAC4AAYIKAzXNLiuN57HUWLXTvscrp0vewu250Onz5GXIiz26Km9iKrTyOt3lZHzRzFn7Yt9ocZ5a5mBcabUpPlJryR3KTQjflk1zyWOnOO44VVsc04/FMsU7nszqLvT6dT8UVnuY1x4aWfdm4/LJ0Y5Ub4mbOqV6jNaPhmT/AMV+hKvCU3/i7fuj1uFnjv452XZbs6nwjpb/AEk44T5Not6F4ejCeZe+115L0OsnTxjBy8vL+R2cPD77q1ZTxHBxPj/T8/72MemW10wdhbSGahBPGcNeZhjXje2vJmWWPHqTLlKZva94fUp8VJqDfNPODNfh2uv1ofU78ck+3n7x+I5XDaw+hDUkurJnolf80fqXLXQUnmb4vIrfIzzjphzk5e7Hcryi1lPmn6Hb0bGnH8MV8TmfENDgrPbCmlJfZ/Yzzvu9KZgo0VFkViZFEAFyAmBQBgAAzWdP/SJd8o3qNPhMHTv0sPi/szqFHMTLkRpf024WcPkzSqUuq5HPUXg2bS62wzCl117S8IcJNGaY7YntvjVQKI72WSdRRJGA++nTJ2io0CerDCwXLO3yyC7XvNdmTdNc5FlAt1YlWjJ9Cb2j6mdbQ2CwLWTwLR3ZZq09gLTFu4JkNKOVgmuJNNp8iK3e/wAS5XHv9V69AhcDUvaeDNnIvytc5sYnNeL+HipY/Fwyb/dzt/E6OVZHHa9dOpXl2j7kd87L/U04p/pH6zQQoh0AogogQFAAAGAADNJbv34/vL7nXWz2OPpPEk+zT+p1VtIz5EbTVVhlihMSUOJEdPKMaWa06UyzCRQoMuUzOxtmrcCxSiV6SLtJE1vnbQp1FFLGzwZld5b8ySrUGUlxMnp0Z0dp7WcMtXMYpZyc5W1L2cpb9WU7vxBlYyVMWq85HSWd3Fzxk16txT4ea9UeV/2u1LKyTVtdk0t2afGy1y9uqvK0ZcTXRlelLqYFtqixh9Tab92L7rJGs9MNaXLitmJl15FhTyUrgJGHand3HDGUuyb9Ecg22231znzZu63VxDH5mvRb/wAjCOrjnUAQACNCKIKxEIFAAAIwACjCOmtJ5jF9Wk/htyObija0ytmPmnj5EbnpOm9ayJ7qhspIo28zSVTMfkYVl+oLeRpUUZVF7mpbsitpV+ki1xbFWmwlVIbZPluzTtqSUdueDKpzL1KvsJ0RzWs6BOUnKOd+xz1bRpQe+X8WejTq5M+9oKXYvO+lXj7cNCxbTeOQ2Fg5bI7G3owSlFpboipW0c9C/NHxMC18PvKbz6nRTpcNNR7LBaxhFO6qEXXbDkz0rRILgdxkN3LYcY1zOt1czUekV9X9jNyS3VTinOXdvGO3T6EJ1z1AUMAAwXhYnC/MmjF4T3x3wAdBDwvzAmz/AFkACsKhBUMzlyz8i7pk8Nrvv80U+yLFhFuW3SLk/ghX6S3qUzQoVNjJpMt0pmFiLFxLc0bYzKbNG0fIiql6Xak8IqzuBbqZlXNQUjfDVp3RbjdJLLeEcdX1CUeRSq385fik8FTj7a+fTr7/AMQ04bReWYNxrlebzGM2v2YtmbSqUlzy/qbulaza08cSlt2iy5xyF8lqt/xr3VOe/wC1BfxIat5cU2uOE4+j+3I6KfjC0XKE35KP8zN1HxNQqcqc1juo/wAx+M/hXVSWGuqWFJkl5cLozmbm6py3jDHnyf0ChcSe2W0ReP8AU61bPbbhVyRatV4aUn+zheTexFbsqeIq3uwj3eceSHnP+mNYGQyIwOgy5FTGghB7B4Z02hOytpToUKj9nSy+JRqS97fOeppf2Fp7S/5dW/SNe7O3e3E9l755zpfjCrSo06XsqU401FRbWJbdGzQ/v4ts2VntJyyqcFnLz2GTuf7uad/lt1/1W/8A7AOL/v7T/wAvtPRf+ID7HTz0cieFFLmQ53EO0i/gyxpabm0njMZL6ogp9fgixp1RRqJvbbHzygv0TUodV1TJYS3IpLEuNbp8+6HOWd0YVK/QkaNtIx6EzSt5bE2BNcTM6ss7FqtIiorLF02ypVNObRl3VlOHNPB1U6uBzcKixJL49R+XTaTtw3F/TDJu6pouN4rYxZW810foazUpXNhmRCRW0/ysloWU5NJpofcLqmWlvKb2Wxtw09JFqjaqlDL2b9QpzymzG6tTpVpmJrVbNXHSKS8s83/D0NirUUcyfJbs52pLibb5tt+prxz9ZVCAsojqcTQGATcAcAAkeSHcQ3AggfxMBoAFlIpS5v5lxsqTW5VTk6lLG3cSD3YwfSBXS1bXjg8c0aKkmuKG66rsYs0SW9aUHlcu3RkXKemvCsaFtcGPGalvHn1iOo1sMzsNuyqDqDM6FbJZpVSelSrNeZVhXaY6dUp1WKRtmty31KOMTSaH1NQt1ypxXzZy9SbInkPFp8jo5anTztGIq1aC/Vjn4HM4Y9RYeKbu1o3V45yJoSwjOpR3Ev7pxjhc39F3KkZaqrqldt8K5Ld+b/kZ6LNH3l5r6kE44ZvJ0y7SRWQpx2fxY2LJqH4fX7jK+iYFwOdMa4MQmkE3uxuQqc38RuQUdkBuQEEk6hLcU8pPyRDTpNsuU91jsUi+mcKPrwwxiF0v7OzkVDUSIZFi2t1sy1CspbPaXomVkiOYrA0qVXDwy3TqmTSr5WJfKXVFiFTGz/8AjM7lUafGRyZFTqEhHTSGcA9UcjgyCiewQ1wJExwk2oJzUU2+hlVKrllvr0JdQr8TwuSfqymjbE6Za9prWfDJfUlv4b5XJlZvky/P3qeS4zvqs/i2JKVTbBAy7C1TimnvjkCr0FMeqhXlCUeaJKaythpsSuEZENS17MR5Q5VGIe4h9g/6QFri+AAPJI5RituZVpVN/mV51Mi02Ps5n0tXEclJrBfW6KtSAUZqJD4SwMBiWsojqDqEvoOrIOiQxHxEUR6QBLCqXaVddTNlEIzZOsqlabrob/tKM7LF4WT4DyaKuENuLzEXjm1hGcmx8obDmBajQrgIPTNEocl6znlOPoVZoLeeJR+IFqdwyvH3gpVGmTX8ff8A67lVPcRz3GvNZplW2XNE1nLMWiGmsSGyn6WcRkee5alHcglEBL2dwoBvCIBqLHxABNatUOoyoKA2c+1eY1gAmia15v4ElYAGX6ah0RQACpyIogAU4liLIACEhiTIAAVHPmIgAAdPkRw5oQAH4sX34o/ulJAAqM/TSsuRGvxfMQBs/wCrrK9XmAAnJAAAU//Z" class="online" alt="" />
				<p><?php echo $usuario->nombre;?></p>
				<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
				<div id="status-options">
					<ul>
						<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
						<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
						<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
						<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
					</ul>
				</div>
				<div id="expanded">
					<label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="mikeross" />
					<label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="ross81" />
					<label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="mike.ross" />
				</div>
			</div>
		</div>
		<div id="search">
			<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
			<input type="text" placeholder="Buscar contactos..." />
		</div>
		<div id="contacts">
			<ul>
        <?php foreach ($chats as $chat){ ?>
				<li class="contact" id=<?php echo $chat->id?>>
					<div class="wrap">
						<span class="contact-status online"></span>
						<img src="https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/styles/480/public/media/image/2020/09/mandalorian-baby-yoda-2074407.jpeg" alt="" />
						<div class="meta">
							<p class="name"><?php echo $chat->usuario_entrante->nombre?></p>
							<p class="preview">Haga click aqui para visualizar los mensajes.</p>
						</div>
					</div>
        </li>
        <?php }?>
			</ul>
		</div>
		<div id="bottom-bar">
			<button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
			<button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
		</div>
	</div>
	<div class="content">
		<div class="contact-profile">
			<img src="https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/styles/480/public/media/image/2020/09/mandalorian-baby-yoda-2074407.jpeg" alt="" />
			<p>Patito</p>
			<div class="social-media">
				<i class="fa fa-facebook" aria-hidden="true"></i>
				<i class="fa fa-twitter" aria-hidden="true"></i>
				 <i class="fa fa-instagram" aria-hidden="true"></i>
			</div>
		</div>
		<div class="messages">
			<ul>
				<li class="sent">
					<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
					<p>Hola karencita</p>
				</li>
				<li class="replies">
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
					<p>No me jodas.</p>
				</li>
				<li class="sent">
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
					<p>Malvada.</p>
				</li>
				<li class="replies">
					<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
					<p>Oh si 8)</p>
				</li>
			</ul>
		</div>
		<div class="message-input">
			<div class="wrap">
			<input type="text" placeholder="Write your message..." />
			<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
			<button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</div>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script >$(".messages").animate({ scrollTop: $(document).height() }, "fast");

$("#profile-img").click(function() {
	$("#status-options").toggleClass("active");
});

$(".expand-button").click(function() {
  $("#profile").toggleClass("expanded");
	$("#contacts").toggleClass("expanded");
});

$("#status-options ul li").click(function() {
	$("#profile-img").removeClass();
	$("#status-online").removeClass("active");
	$("#status-away").removeClass("active");
	$("#status-busy").removeClass("active");
	$("#status-offline").removeClass("active");
	$(this).addClass("active");
	
	if($("#status-online").hasClass("active")) {
		$("#profile-img").addClass("online");
	} else if ($("#status-away").hasClass("active")) {
		$("#profile-img").addClass("away");
	} else if ($("#status-busy").hasClass("active")) {
		$("#profile-img").addClass("busy");
	} else if ($("#status-offline").hasClass("active")) {
		$("#profile-img").addClass("offline");
	} else {
		$("#profile-img").removeClass();
	};
	
	$("#status-options").removeClass("active");
});

function newMessage() {
	message = $(".message-input input").val();
	if($.trim(message) == '') {
		return false;
	}
	$('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
	$('.message-input input').val(null);
	$('.contact.active .preview').html('<span>You: </span>' + message);
	$(".messages").animate({ scrollTop: $(document).height() }, "fast");
};

$('.submit').click(function() {
  newMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    newMessage();
    return false;
  }
});
//# sourceURL=pen.js
</script>
<!--/div-->