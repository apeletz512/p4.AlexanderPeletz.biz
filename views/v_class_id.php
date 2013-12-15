<div>
	<div>
		<?php var_dump($class); 
			var_dump($flashcards);
			var_dump($classnotes); ?>
	</div>
	<div class="span6 offset2">
		<h2><?=$class[0]['institution_name']?>: <?=$class[0]['class_number']?> - <?=$class[0]['class_name']?></h2>
		<form method="POST" action="/notes/p_new_flaschard/<?=$class[0]['class_id']?>">
			Create a new flash card.
			<label>Flashcard Front</label>
			<input name="front" type="text"/>
			<label>Flaschard Back</label>
			<input name="back" type="text"/>
			<br>
			<input type="submit" value="Create new flashcard"/>
		</form>
	</div>
</div>



<?php foreach($posts as $post): ?>

<div class="post">
		<article>
		    <div>
			    <time>
			        <?=Time::display($post['created'],"",$user->timezone)?>
			    </time>
		    </div>
		    <div>
		    	<h4><?=$post['first_name']?> <?=$post['last_name']?> posted:</h4>
		    </div>
		    <div class="post-inner">
		    	<h2><?=$post['content']?></h2>
			</div>
		</article>
</div>

<?php endforeach; ?>
