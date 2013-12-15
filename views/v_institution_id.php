<div>
	<div>
		<?php var_dump($classes); ?>
	</div>
	<div class="span6 offset2">
		<?php foreach($classes as $class): ?>
			<h2><?=$class['class_name']?></h2>
		<?php endforeach; ?>
	</div>
</div>

