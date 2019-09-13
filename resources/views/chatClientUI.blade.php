
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
  <link rel='stylesheet' href='/css/chatCSS/styledos.css'>
  <link rel="stylesheet" type="text/css" href="/css/app.css">
  <link rel="stylesheet" type="text/css" href="/css/custom.css">
    
</head>
<body>
<div class="wrapper" id="app" style="width: 100%">
	<div id="frame">
		<div id="sidepanel">
	        
			<div id="profile">
				<div class="wrap">
					<img id="profile-img" src="/assets/img/user-profil.png" class="online" alt="" />
					<p>Name</p>
	<!--				<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>-->
					<div id="status-options">
						<ul>
							<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
							<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
							<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
							<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
						</ul>
					</div>
	<!--
					<div id="expanded">
						<label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
						<input name="twitter" type="text" value="mikeross" />
						<label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
						<input name="twitter" type="text" value="ross81" />
						<label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
						<input name="twitter" type="text" value="mike.ross" />
					</div>
	-->
				</div>
			</div>
	        
			<div id="contacts">
				<ul>
					<li class="contact active">
						<div class="wrap">
							<span class="contact-status busy"></span>
							<img src="/assets/img/contact-profil.png" alt="" />
							<div class="meta">
								<p class="name">Name</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	    
		<div class="content">
			<div class="contact-profile">
				<img src="/assets/img/contact-profil.png" alt="" />
				<p>Name</p>
          <div class="barmenu">
              <button class="barmenubutton">
                  <i class="fa fa-bars" aria-hidden="true"></i>
              </button>
          </div>
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
					<chat-client-component inline-template>
						<form @submit.prevent="sendMessage()">
							<input type="text" placeholder="Write your message..." />
							<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
							<button class="submit">
								<i class="fa fa-paper-plane " aria-hidden="true"></i>
							</button>
						</form>
					</chat-client-component>
				</div>
			</div>
		</div>
	    
    <div id="sidepanel" class="rigthpanel " >
      <div class="barmenu" style="margin-top: 20px;">
        <button class="barmenubutton2">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
      </div>
			<div id="contacts">
				<ul>
					<li class="contact active">
						<div class="wrap">
							
						</div>
					</li>
				</ul>
			</div>
		</div>
	    
	</div>
</div>
    

<script type="text/javascript" src="/js/app.js"></script>
<script src="/js/chatJS/custom.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
    
</body>
</html>