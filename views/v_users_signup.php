<div class="span4 offset4"
    <div id="signup">
        <div id="signup-inner">
            <form method='POST' action='/users/p_signup'>
                <fieldset>
                    <div class="span11 offset1">
                        <br>
                        <h4>Please register to use <?=APP_NAME?></h4>
                        <br><br>
                        <label>Given Name</label>
                        <input type="text" name='first_name'>
                        <br>

                        <label>Surname</label>
                        <input type='text' name='last_name'>
                        <br>

                        <label>Email Address</label>
                        <input type='text' name='email'>
                        <br>
                        <label>Password</label>
                        <input type='password' name='password'>
                        <br>
                        <br>
                        <?php if($error==1): ?>
                            <div class="alert">
                                The email address you've entered is already in use. Please enter a new email address.
                            </div>
                        <?php elseif($error==2): ?>
                            <div class="alert">
                                Please fill out every field.
                            </div>
                        <?php endif; ?>
                        <button type="submit" id="signupBtn" class="btn btn-info">Sign Up</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
