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
            
            
            <div class="content" style="width: 100%">
                <div class="contact-profile" style="padding-right: 30px">
                    <img src="https://www.optimum-web.com/wp-content/uploads/Web-Development-icon.png" alt="" style="float: right;" />
                    <p style="margin-bottom: 0; float: right;">Concierge</p>    
                </div>
                
                <supervisor-notification-center inline-template>
                    <div class="notification">
                        <form @submit.prevent="sendIncident({{Auth::user()->id}})">
                            <p style="margin-bottom: 0 !important; margin-left: 10px;"> Por favor seleccione el tipo de problema que tiene: </p>
                            <div class="error-select">
                                <ul style="display: flex; width: 100%; margin-bottom: 0 !important"> 
                                    <div class="cards">
                                        <div class="org-name-label"> 
                                            <fieldset class="org-name-label">Label 1</fieldset>
                                            <i class="fas fa-tools"></i>
                                        </div>
                                        <div class="error-select-li">
                                        @foreach ($incidents as $incident)
                                            @if ($incident->incidentType->name == "Technik")
                                                <li class="error-select-li">
                                                    <input type="radio" 
                                                           name="incident" 
                                                           id="{{$incident->id}}"
                                                           value="{{$incident->id}}" 
                                                           class="form-check-input"
                                                           v-model="form.incident_id"
                                                           required>

                                                    <label for="{{$incident->id}}" class="form-check-label">{{$incident->name}}</label>
                                                </li>
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>

                                    <div class="cards">
                                        <div class="org-name-label"> 
                                            <fieldset class="org-name-label">Label 2</fieldset>
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="error-select-li"> 
                                        @foreach ($incidents as $incident)
                                            @if ($incident->incidentType->name == "Protempo")
                                                <li class="error-select-li">
                                                    <input type="radio" 
                                                           name="incident" 
                                                           id="{{$incident->id}}"
                                                           value="{{$incident->id}}" 
                                                           class="form-check-input"
                                                           v-model="form.incident_id"
                                                           required>

                                                    <label for="{{$incident->id}}" class="form-check-label">{{$incident->name}}</label>
                                                </li>
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>

                                    <div class="cards">
                                        <div class="org-name-label"> 
                                            <fieldset class="org-name-label">Label 3</fieldset>
                                            <i class="fas fa-hotel" style="font-size: 0.8em !important"></i>
                                        </div>
                                        <div class="error-select-li"> 
                                        @foreach ($incidents as $incident)
                                            @if ($incident->incidentType->name == "Messe")
                                                <li class="error-select-li">
                                                    <input type="radio" 
                                                           name="incident" 
                                                           id="{{$incident->id}}"
                                                           value="{{$incident->id}}"
                                                           class="form-check-input"
                                                           v-model="form.incident_id"
                                                           required>

                                                    <label for="{{$incident->id}}" class="form-check-label">{{$incident->name}}</label>
                                                </li>
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>

                                </ul>
                            </div>

                            <div class="text-write">
                                <div>
                                    <div class="form-group">
                                        <label for="inputText" style="display: block;">Breve Descrpcion</label>
                                        <input style="width: 90%; float: left;"
                                               type="text" 
                                               name="description"
                                               id="inputText"
                                               placeholder=""
                                               aria-describedby="emailHelp"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('description') }"
                                               v-model="form.description"
                                               required>

                                        <has-error :form="form" field="description"></has-error>

                                        <button type="submit" class="btn btn-primary" style="width: 9.6%;">Senden</button>
                                        <small id="emailHelp" class="form-text text-muted" style="display: block;">* Por favor escriba una descripcion de su problema.</small>
                                    </div>
                                </div>    
                            </div>
                        </form>
                    </div>
                </supervisor-notification-center>
                
                <div class="notification-log" >

                    @foreach ($notifications as $notification)
                        @if ($notification->user_id == auth()->user()->id) 
                            <div class="card direct-chat direct-chat-primary">
                              <div class="card-header solved-card-header">
                                <h3 class="card-title">{{ ucfirst($notification->incidents->name) }}</h3>
                                <button type="button" class="btn" id="collapse"><b>-</b></button>
                              </div>
                              <div class="card-body solved-card-body" id="solved-card-body">
                                <div class="solved-description">
                                    <div class="res-group">
                                        <h5 class="card-title">Description</h5>
                                    </div>
                                    <p class="card-text">{{$notification->description}}</p>
                                    <p class="card-text">Mensaje recibido</p>
                                    <p class="card-text">Respuesta rapida</p>
                                    <p class="card-text">{{$notification->status}}</p>
                                </div>
                              </div>
                            </div>
                        @endif
                    @endforeach
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
        // var getId = (document.getElementsByTagName("INPUT")[0]);
        // var idUser = getId.id;
        $(document).ready(function(){
          $('ul li ').click(function(){
            $('li ').removeClass("active");
            $(this).addClass("active");
          });
        });
    </script>
    
</body>
</html>