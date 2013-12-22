<div class="container">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1 outer">
			<div class="inner">
				<div class="row">
					<div class="col-lg-6 col-lg-offset-2">
						<h2>Add a new class</h2>
						<form id="newClass">
							<table class="table">
							<tr>
								<td>Institution: </td>
								<td>
									<select name="institution_id">
										<option></option>
									<?php foreach($institutions as $institution): ?>
										<option value="<?=$institution['institution_id']?>"><?=$institution['institution_name']?></option>
									<?php endforeach; ?>
									</select>
								</td>
							</tr>
							<tr>
								<td>Course number: </td>
								<td><input name="class_number" type="text"/></td>
							</tr>
							<tr>
								<td>Course name: </td>
								<td><input name="class_name" type="text"/></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" class="btn btn-danger" value="Add class"/></td>
							</tr>
							</table>
						</form>
						<div id="answerDiv">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>