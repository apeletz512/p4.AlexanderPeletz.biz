<div id="settings" class="span3 offset4">
	<div id="settings-inner">
		<fieldset>
			<form method="POST" action="/users/p_settings">
				<label>Select your timezone:</label>
				<select name="timezone">
					
					<?php if(isset($user->timezone)): ?>
					<option><?=$user->timezone?></option>
					<?php endif; ?>

					<option>America/New_York</option>
					<option>America/Chicago</option>
					<option>America/Denver</option>
					<option>America/Los_Angeles</option>
					<option>America/Anchorage</option>
					<option>Pacific/Honolulu</option>
					<option>Pacific/Pago_Pago</option>
					<option>Pacific/Auckland</option>
					<option>Pacific/Noumea</option>
					<option>Australia/Sydney</option>
					<option>Asia/Tokyo</option>
					<option>Asia/Hong_Kong</option>
					<option>Asia/Bangkok</option>
					<option>Asia/Dhaka</option>
					<option>Asia/Dushanbe</option>
					<option>Asia/Dubai</option>
					<option>Asia/Aden</option>
					<option>Asia/Istanbul</option>
					<option>Africa/Kinshasa</option>
					<option>Europe/London</option>
					<option>Atlantic/Azores</option>
					<option>America/Sao_Paulo</option>
					<option>America/Santiago</option>
					<option>America/Noronha</option>
				</select>
				<br>
				<label>Select a background:</label>
				<select name="background">
					
					<?php if(isset($user->background)): ?>
					<option value="<?=$user->background?>"><?=ucfirst(substr($user->background, 5, -4))?></option>
					<?php endif; ?>

					<option value="/img/mercury.jpg">Mercury</option>
					<option value="/img/venus.jpg">Venus</option>
					<option value="/img/earth.jpg">Earth</option>
					<option value="/img/mars.jpg">Mars</option>
					<option value="/img/jupiter.jpg">Jupiter</option>
					<option value="/img/saturn.jpg">Saturn</option>
					<option value="/img/uranus.jpg">Uranus</option>
					<option value="/img/neptune.jpg">Neptune</option>
				</select>
				<br><br>
				<input type="submit" id="saveBtn" class="btn btn-info" value="Save">
			</form>
		</fieldset>
	</div>
</div>