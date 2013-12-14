<div id="others" class="span4 offset4">
    <div id="others-inner">
        <?php foreach($users as $user): ?>

            <!-- Print this user's name -->
            <div class="userrow">
                    <div class="username">
                        <?=$user['first_name']?> <?=$user['last_name']?>
                    </div>
                <!-- If there exists a connection with this user, show a unfollow link -->
                 <?php if(isset($connections[$user['user_id']])): ?>
                    <div class="unfollow">
                        <a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a>
                    </div>
                    <!-- Otherwise, show the follow link -->
                <?php else: ?>
                <div class="follow">
                    <a href='/posts/follow/<?=$user['user_id']?>'>Follow</a>
                </div>
                <?php endif; ?>
            <br>
            </div>

        <?php endforeach; ?>
    </div>
</div>