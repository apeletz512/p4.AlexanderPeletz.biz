<?php if(isset($user)): ?>
<div id="profile">
	<div id="profile-inner">
		<h2 id="profileHdr"><?=$user->first_name?>'s Profile</h2>
	</div>
</div>
<?php else: ?>
    <h1>No user specified</h1>
<?php endif; ?>

