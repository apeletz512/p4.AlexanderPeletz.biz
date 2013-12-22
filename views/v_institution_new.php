<div class="container">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1 outer">
			<div class="inner">
				<div class="row">
					<div class="col-lg-6 col-lg-offset-2">
						<h2>Add a new institution</h2>
						<br>
						<form method="POST" action="/institutions/p_newinstitution">
							<table class="table">
							<tr>
								<td>Institution name: </td>
								<td><input name="institution_name" type="text"/></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" class="btn btn-danger" value="Add institution"/></td>
							</tr>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>