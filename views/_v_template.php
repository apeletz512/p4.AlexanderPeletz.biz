<!DOCTYPE html>
<html 
	<?php if(isset($posts)): ?>
			style="background: url(/libraries/<?=$user->background?>) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
		 	background-size: cover;" 
	<?php elseif((isset($content)) or (isset($login))): ?>
			style="background: url(/libraries/img/nebula.jpg) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
		 	background-size: cover;" 
	<?php elseif(isset($settings)): ?>
			style="background: url(/libraries/img/moon.jpg) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
		 	background-size: cover;"
	<?php elseif(isset($others)): ?>
			style="background: url(/libraries/img/light_gas.jpg) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
		 	background-size: cover;"  	
	<?php elseif((isset($signup)) or (isset($confirmation))): ?>
			style="background: url(/libraries/img/sun.jpg) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
		 	background-size: cover;" 
	<?php endif; ?>
	>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="/css/custom.css" type="text/css">
    
</head>
<body>
<br>
<div class="container-fluid">
	<div class="row-fluid">
	      <!--Topnav content-->
			<div id="left-menu" class>
				<ul class="nav nav-tabs">
					<li id="homeTab"> <!--class="active"-->
				    	<a href="/">Home</a>
				  	</li>
				  	<li class="divider-vertical"></li>
				  
				 	<!-- Menu for users who are logged in -->
					<?php if($user): ?>
						<li id="profileTab">
							<a href='/users/profile'>Profile</a>
						</li> 
						<li id="findOthersTab">
							<a href='/posts/users'>Find Others</a>
						</li>
						<li id="settingsTab">
							<a href='/users/settings'>Settings</a>
						</li>
						<li id="logoutTab" class="pull-right">
				    		<a href='/users/logout'>Logout</a>
				    	</li>
				  
				   	<?php else: ?>
				   		<li id="signupTab">
				   				<a href='/users/signup'>Sign up</a>
				        </li>
				        <li id="loginTab" class="pull-right">
				            	<a href='/users/login'>Login</a>
				        </li>
				     <?php endif; ?>
				</ul>
			</div>
	</div>

	<div class="row-fluid">
		<div class="span12">
			<?php if(isset($content)) echo $content; ?>
			<?php if(isset($profile)) echo $profile; ?>
			<?php if(isset($confirmation)) echo $confirmation; ?>
			<?php if(isset($settings)) echo $settings; ?>
			<?php if(isset($others)) echo $others; ?>
			<?php if(isset($signup)) echo $signup; ?>
			<?php if(isset($login)) echo $login; ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span3">
			<div>
				<?php if(isset($postbox)) echo $postbox; ?>
			</div>
			<div>
				<?php if(isset($stats)) echo $stats; ?>
			</div>
	 	</div>
	 	<div class="span9">
			<?php if(isset($posts)) echo $posts; ?>
		</div>

	</div>	
</div>
<script type="text/javascript" src="/js/custom.js"></script>
</body>
</html>