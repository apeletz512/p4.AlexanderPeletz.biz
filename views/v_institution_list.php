<div class="container">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1 outer">
			<div class="inner">
				<h2>Institutions</h2>
				<table class="table">
				<?php foreach($institutions as $institution): ?>
						<tr><td><a href="/institutions/id/<?=$institution['institution_id']?>"><?=$institution['institution_name']?></a></td></tr>
				<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>