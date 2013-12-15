<div class="span3 offset4">
	<h2>Here you can see a list of existing classes</h2>
	<div class="span6 offset2">
		<?php foreach($classes as $class): ?>
			<br><a href="/classes/id/<?=$class['class_id']?>"><?=$class['class_name']?></a>
		<?php endforeach; ?>
	</div>
</div>