<div class="span6 offset3">
	<?php if(isset($_POST)) {
		var_dump($_POST);
		echo "Class Name: ".$_POST['class_name'];
	} ?>
	<h2>Add a new class</h2>
	<form method="POST" action="/classes/p_newclass">
		<select name="institution_id">
			<?php foreach($institutions as $institution): ?>
				<option value="<?=$institution['institution_id']?>"><?=$institution['institution_name']?></option>
			<?php endforeach; ?>
		</select>
		<input name="class_number" type="text"/>
		<input name="class_name" type="text"/>
		<input type="submit" value="Add class"/>
	</form>
</div>