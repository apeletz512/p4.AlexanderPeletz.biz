<div class="span3 offset4">
	<h2>Here you can see a list of existing classes</h2>
	<div class="span6 offset2">
		<?php foreach($institutions as $institution): ?>
				<br><a href="/institutions/id/<?=$institution['institution_id']?>"><?=$institution['institution_name']?></a>
		<?php endforeach; ?>
	</div>
</div>