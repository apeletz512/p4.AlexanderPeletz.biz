<div class="container">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1 outer">
			<div class="inner">
				<h2><?=$classes[0]['institution_name']?></h2>
				<table class="table">
				<?php foreach($classes as $class): ?>
					<?php if(isset($class['class_id'])): ?>
						<tr>
							<td><a href="/classes/id/<?=$class['class_id']?>"><?=$class['class_number']?> - <?=$class['class_name']?></a></td>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

