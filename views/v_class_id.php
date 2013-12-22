<div class="container">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1 outer">
			<div class="inner">
				<h3><?=$class[0]['class_number']?> - <?=$class[0]['class_name']?></h3>
				<h4><a href="/institutions/id/<?=$class[0]['institution_id']?>"><?=$class[0]['institution_name']?></a></h4>
				<br>
		<?php if(count($flashcards)>0): ?>
			<h4>Flashcard Deck</h4><h5>(Click on the visible card to reveal its other side)</h5>
			<?php foreach($flashcards as $flashcard): ?>
				<br>
				<div class="row">
					<div class="flashcard-front col-lg-4 col-lg-offset-1" ><div class="front" name="<?=$flashcard['flash_card_id']?>"><?=$flashcard['front']?></div></div>
					<div class="flashcard-back col-lg-5 col-lg-offset-1" ><div class="back" name="<?=$flashcard['flash_card_id']?>"><?=$flashcard['back']?></div></div>
				</div>
			<?php endforeach; ?>
		<?php else: ?>
			<h4>No flashcards have been posted for this class.</h4>
		<?php endif; ?>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1 outer">
			<div class="inner">
				<form id="newFlashcard">
					<div class="row">
					<div class="col-lg-6 col-lg-offset-2">
					<h4>Add a new flashcard to this class's deck: </h4>
					<table class="table">
						<tr>
							<td>Flashcard Front</td>
							<td><input name="front" type="text"/></td>
						</tr>
						<tr>
							<td>Flaschard Back</td>
							<td><input name="back" type="text"/></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" class="btn btn-danger" value="Create new flashcard"/></td>
						</tr>
					</table>
					<div id="answerDiv">
					</div>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<div id="classID" name="<?=$class[0]['class_id']?>">
	</div>
</div>
