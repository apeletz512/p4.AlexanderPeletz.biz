
<div id="stats">
	<div id="stats-inner">
		<h4>Your usage stats</h4>
		<ul class="nav nav-tabs nav-stacked">
			<?php if(isset($loginCount)): ?>
				<li>Logins: <?php echo $loginCount ?></li>
			<?php endif; ?>
			<?php if(isset($postCount)): ?>
				<li>Posts: <?php echo $postCount ?></li>
			<?php endif; ?>
			<?php if(isset($followingCount)): ?>
				<li>Following: <?php echo $followingCount ?></li>
			<?php endif; ?>
			<?php if(isset($followedCount)): ?>
				<li>Followed by: <?php echo $followedCount ?></li>
			<?php endif; ?>
		</ul>
	</div>
</div>
