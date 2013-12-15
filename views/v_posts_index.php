<div>
	<?php echo $class_id; ?>
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
