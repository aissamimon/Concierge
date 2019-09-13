<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name') }}</title>
  
  <link rel='stylesheet' href='/css/chatCSS/fonts/googleapifonts.css'  type='text/css'>
  <link rel='stylesheet prefetch' href='/css/chatCSS/reset.min.css'>
  <link rel='stylesheet' href='/css/chatCSS/style.css'>
  <link rel="stylesheet" type="text/css" href="/css/app.css">
  <link rel="stylesheet" type="text/css" href="/css/custom.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app" style="width: 100%">
		<div id="frame">
		    <div id="sidepanel">
		        <div id="profile">
		            <div class="wrap">
		                <img id="profile-img" src="/assets/img/user-profil.png" class="online" alt="" />
		                <p>{{ Auth::user()->username }}</p>
		            </div>
		        </div>
		        <div id="contacts">
		            <ul>
		                @foreach ($users as $user)
		                @if (auth()->user()->id != $user->id)
		                <li class="contact active">
		                    <div class="wrap">
		                        <span class="contact-status busy"></span>
		                        <img src="/assets/img/contact-profil.png" alt="" />
		                        <div class="meta">
		                            <p class="name">{{$user->name}}</p>
		                        </div>
		                    </div>
		                </li>
		                @endif
		                @endforeach
		            </ul>       
		        </div>
		    </div>
		    <!-- End Side Panel -->
		    <div class="content">
		        <div class="contact-profile">
		            <img src="/assets/img/contact-profil.png" alt="" />
		            <p>Contact Name</p>         
		        </div>

		        <div class="messages" style="width: 100%;">
		            <ul>         
		                <li class="sent">
		                    <img src="/assets/img/user-profil.png" alt="" />
		                    <p>Sent | Sent | Sent | Sent | Sent | Sent | Sent | Sent | Sent | Sent | Sent | Sent | Sent | Sent | Sent | Sent | Sent | Sent | Sent | Sent | Sent |</p>
		                </li>
		                <li class="replies">
		                    <img src="/assets/img/contact-profil.png" alt="" />
		                    <p>Repli | Repli | Repli | Repli | Repli | Repli | Repli | Repli | Repli | Repli | Repli | Repli | Repli | Repli | Repli | Repli | Repli | Repli |</p>
		                </li>
		            </ul>
		        </div>

		        <div class="message-input">
		            <div class="wrap">
		            	<chat-component inline-template>
		            	<form @submit.prevent="sendMessage()">
		            		<input type="text" placeholder="Write your message..." />
		            		<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
		            		<button class="submit">
		            		    <i class="fa fa-paper-plane" aria-hidden="true"></i>
		            		</button>
		            	</form>
		            	</chat-component>
		            </div>
		        </div>
		    </div>
		</div>
</div>

<!-- <script src='/js/chatJS/console_runner.js'></script>
<script src='/js/chatJS/events_runner.js'></script>
<script src='/js/chatJS/css_live_reload_init.js'></script>
<script src="/js/chatJS/hoy3lrg.js"></script>
<script src="/js/chatJS/stopExecutionOnTimeout.js"></script> -->
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<script type="text/javascript" src="/js/app.js"></script>
<script src="/js/chatJS/custom.js"></script>
@include('sweetalert::alert')
</body>
</html>