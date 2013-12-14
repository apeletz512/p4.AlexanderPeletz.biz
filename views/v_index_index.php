<div class="container-fluid">
	<div class="row_fluid">
		<div id="home" class="span8 offset2">
			<div id="home-inner">
				<h1 id="homeHdr">Welcome to <?=APP_NAME?><?php if($user) echo ', '.$user->first_name; ?></h1>
				<p>The Social System is a place where users can share their thoughts with the universe, as well as find and follow other users in the Social System.</p>
				<p>In addition to the basics of a social media network, the Social System:</p>
				<ul>
					<li>Allows you to set your own time zone</li>
					<li>Tracks your usage statistics so you can keep track of how many times you're logging in or making posts, as well as how many users you're following or are following you</li>
					<li>Lets you customize your profile with your very own celestial body background</li>
				</ul>
				<br>
				<?php if($user): ?>
					<p>Go to your profile to start contributing, find other users to follow, or customize your settings.</p>
				<?php else: ?>
					<p>Sign up or login in now!</p>
				<?php endif; ?>
			</div>
		</div>	
	</div>
</div>