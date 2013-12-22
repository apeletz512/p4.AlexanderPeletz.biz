<div class="container">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1 outer">
			<div class="inner">
				<h2>Classes</h2>
				<table class="table">
				<?php $lastclass = Null; ?>
				<?php foreach($classes as $class): ?>
					<?php if($class['institution_name']!=$lastInst): ?>
						<tr><th><?=$class['institution_name']?></th></tr>
					<?php endif; ?>
					<tr><td><a href="/classes/id/<?=$class['class_id']?>"><?=$class['class_number']?> - <?=$class['class_name']?></a></td></tr>
					<?php $lastInst=$class['institution_name']; ?>
				<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>