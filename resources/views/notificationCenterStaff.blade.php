<!DOCTYPE html>
<html class=''>

<head>
    <meta charset='UTF-8'>
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    
    <link rel='stylesheet' href='/css/NotificationCenterCSS/fonts/googleapifonts.css'  type='text/css'>
    <link rel='stylesheet prefetch' href='/css/NotificationCenterCSS/reset.min.css'>
    <link rel="stylesheet" href="css/NotificationCenterCSS/bootstrap.min.css"  id="bootstrap-css">
    <link rel='stylesheet' href='css/NotificationCenterCSS/style.css'>
  <link rel="stylesheet" type="text/css" href="/css/app.css">
    
</head>
<body>
    <div class="wrapper" id="app" style="width: 100%">
        <div id="frame">
            <div id="sidepanel">
                <div id="profile">
                    <div class="wrap">
                        <img id="profile-img" src="http://emilcarlsson.se/assets/mikeross.png" class="online" alt="" />
                        <p>Technik 1</p>
                        <button class="barmenubutton2">
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                
                <div id="contacts">
                    <ul>
                        <li class="contact ">
                            <div class="wrap">
                                <span class="contact-status online"></span>
                                <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                <div class="meta">
                                    <p class="name">Raum Name</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="content">
                <div class="contact-profile">
                    <img src="https://www.optimum-web.com/wp-content/uploads/Web-Development-icon.png" alt="" />
                    <p style="margin-bottom: 0">Concierge</p>    

                    <button class="barmenubutton">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
                
                <div class="notification"> 
                    <div class="card not-card">
                      <div class="card-header">
                        Fehler name
                      </div>
                      <staff-notification-center inline-template>
                          <div class="card-body cuerpo">
                            <div class="description">
                                <div class="res-group">
                                    <h5 class="card-title">Description</h5>
                                    <i class="fa fa-caret-down" id="action-show" aria-hidden="true"> </i>
                                </div>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <div style="display: flex;">
                                    <p class="card-text" style="margin-right: 10px">Send Message</p>
                                    <i class="fa fa-caret-down" id="action-show-2" aria-hidden="true" style="margin-top: 4px;"> </i>
                                </div>

                                <div class="card-footer card-fehler-footer" >
                                    <form @submit.prevent="sendMessage()">
                                      <select class="form-control"
                                              id="reply" 
                                              name="reply" 
                                              v-model="form.reply"
                                              style="margin-bottom: 5px">
                                              
                                        <option></option>
                                        <option>Select quickly reply:</option>
                                      </select>
                                      <div class="input-group">
                                        <input type="text" 
                                               name="message" 
                                               placeholder="Type Message ..." 
                                               class="form-control"
                                               v-model="form.message">

                                        <span class="input-group-append">
                                          <button type="submit" class="btn btn-primary">Send</button>
                                        </span>
                                      </div>
                                    </form>
                                    <p style="background-color: white; margin: 0; color: #bbbdbf">* Have you something to say or a quickly reply, fill the oben two fields or one of them.</p>
                                </div>
                            </div>
                            <div class="action hide" id="action">
                                <button v-on:click="solve" class="btn btn-primary" style="width: 160px; margin: 2px; background-color: darkseagreen">Gelöst</button>
                                <button v-on:click="process" class="btn btn-primary" style="width: 160px; margin: 2px; background-color: coral">Process</button>
                            </div>
                          </div>      
                      </staff-notification-center>                
                    </div>            
                </div>
                
                <div class="notification-log">
                    <div class="card direct-chat direct-chat-primary">
                      <div class="card-header solved-card-header">
                        <h3 class="card-title">Fehler Name - Date (Gelöste Element)</h3>
                        <button type="button" class="btn" id="collapse"><b>-</b></button>
                      </div>
                      <div class="card-body solved-card-body" id="solved-card-body">
                        <div class="solved-description">
                            <div class="res-group">
                                <h5 class="card-title">Description</h5>
                            </div>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <p class="card-text">Mensaje recibido</p>
                        </div>
                      </div>
                    </div>
                </div>
                
                <div class="log-mensajes">
                    <div class="slider-top" >
                        <i class="fas fa-angle-up" id="slider-top"></i>
                        <i class="fas fa-angle-down" id="slider-down"></i>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    
    <!-- <script src="js/jquery-2.2.4.min.js"></script> -->
    <script src="js/notificationCenterJS/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
    <script src="js/notificationCenterJS/custom.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    
    <script>
        $(document).ready(function(){
          $('ul li ').click(function(){
            $('li ').removeClass("active");
            $(this).addClass("active");
          });
        });
    </script>
    
</body>
</html>