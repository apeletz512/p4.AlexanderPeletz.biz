<?php
class classes_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        #echo "users_controller construct called<br><br>";
    } 

    public function listall() {
        
        $q = "  SELECT * 
                FROM classes
                LEFT OUTER JOIN institutions
                    ON classes.institution_id = institutions.institution_id
                ORDER BY institution_name, class_number";
        
        $class_list = DB::instance(DB_NAME)->select_rows($q);
        
        $this->template->content = View::instance('v_class_list');
        $this->template->content->classes = $class_list;

        echo $this->template;

    }


    public function newclass() {

        $q = "  SELECT * 
                FROM institutions
                ORDER BY institutions.institution_name";

        $institution_list = DB::instance(DB_NAME)->select_rows($q);



        $this->template->content = View::instance('v_class_new');
        $this->template->content->institutions = $institution_list;
        

        echo $this->template;


    }


    public function p_newclass() {

        $class_id = DB::instance(DB_NAME)->insert("classes",$_POST);

        echo $class_id;
        //Router::redirect('/classes/id/'.$class_id);   


    }


    public function id($class_id = Null) {
        $q = "  SELECT *
                FROM classes
                LEFT OUTER JOIN institutions
                    ON classes.institution_id = institutions.institution_id
                WHERE class_id = '".$class_id."'";

        $class_data = DB::instance(DB_NAME)->select_rows($q);

        $q = "  SELECT * 
                FROM flash_cards
                WHERE class_id = '".$class_id."'";

        $flash_cards = DB::instance(DB_NAME)->select_rows($q);

        $this->template->content = View::instance('v_class_id');
        $this->template->content->class = $class_data;
        $this->template->content->flashcards = $flash_cards;
        echo $this->template;
    }


    public function signup($error = Null) {

        # Setup view
            $this->template->signup = View::instance('v_users_signup');
            $this->template->signup->error = $error;
            $this->template->title   = "Sign Up";

        # Render template
            echo $this->template;

    }

    public function p_signup() {

        # Ensure unique email
            $q = "SELECT 
                    users.email
                FROM users";
            
            $emails = DB::instance(DB_NAME)->select_rows($q);

            foreach($emails as $email) {
                if($_POST['email'] == $email['email']) {
                    Router::redirect("/users/signup/1");
                }
            }

        # Ensure all fields are populated
            foreach($_POST as $posts => $value) {
                if($value == Null) {
                    Router::redirect("/users/signup/2");
            }
        }



    # More data we want stored with the user
    $_POST['created']  = Time::now();
    $_POST['modified'] = Time::now();

    # Encrypt the password  
    $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);            

    # Create an encrypted token via their email address and a random string
    $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string()); 

    # Insert this user into the database 
    $user_id = DB::instance(DB_NAME)->insert("users", $_POST);

    # Route to confirmation page

    Router::redirect("/users/confirmation");

    }      

    
    public function confirmation($message = NULL) {

    # Show signup confirmation
    $this->template->confirmation = View::instance('v_users_confirmation');
    $this->template->title = "Confirmation";
    
    echo $this->template;

    }


    public function login($error = NULL) {
    
    # Setup view
    $this->template->login = View::instance('v_users_login');
    $this->template->login->error = $error;
    $this->template->title   = "Login";

    # Render template
        echo $this->template;

    }


    public function p_login() {

    # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
    $_POST = DB::instance(DB_NAME)->sanitize($_POST);

    # Hash submitted password so we can compare it against one in the db
    $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

    # Search the db for this email and password
    # Retrieve the token if it's available
    $q = "SELECT token 
        FROM users 
        WHERE email = '".$_POST['email']."' 
        AND password = '".$_POST['password']."'";

    $token = DB::instance(DB_NAME)->select_field($q);

    # If we didn't find a matching token in the database, it means login failed
    if(!$token) {

        # Send them back to the login page
        Router::redirect("/users/login/error");

    # But if we did, login succeeded! 
    } else {

        /* 
        Store this token in a cookie using setcookie()
        Important Note: *Nothing* else can echo to the page before setcookie is called
        Not even one single white space.
        param 1 = name of the cookie
        param 2 = the value of the cookie
        param 3 = when to expire
        param 4 = the path of the cooke (a single forward slash sets it for the entire domain)
        */
        setcookie("token", $token, strtotime('+1 year'), '/');

        
        $q = "SELECT user_id 
        FROM users 
        WHERE email = '".$_POST['email']."' 
        AND password = '".$_POST['password']."'";

        $userID = DB::instance(DB_NAME)->select_field($q);
        $login_data['user_id'] = $userID;
        $login_data['logged_in'] = Time::now();
        $logged_in = DB::instance(DB_NAME)->insert("users_login", $login_data);

        
        # Reroute to profile page after signing in

        Router::redirect("/users/profile");

        }

    }


    public function logout() {
    # Generate and save a new token for next login
    $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

    # Create the data array we'll use with the update method
    # In this case, we're only updating one field, so our array only has one entry
    $data = Array("token" => $new_token);

    # Do the update
    DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

    # Delete their token cookie by setting it to a date in the past - effectively logging them out
    setcookie("token", "", strtotime('-1 year'), '/');

    # Send them back to the main index.
    Router::redirect("/");
    }


    public function profile($user_name = NULL) {

        # If user is blank, they're not logged in; redirect them to the login page
        if(!$this->user) {
            Router::redirect("/users/login");
        }


    # Get all of the current user's posts from the database
    $q = "SELECT 
            distinct(posts.post_id),
            posts.content,
            posts.created,
            posts.user_id AS post_user_id,
            users_users.user_id AS follower_id,
            users.first_name,
            users.last_name
        FROM posts
        LEFT OUTER JOIN users_users 
            ON posts.user_id = users_users.user_id_followed and users_users.user_id = ".$this->user->user_id."
        INNER JOIN users 
            ON posts.user_id = users.user_id
        WHERE users_users.user_id = ".$this->user->user_id."
        OR posts.user_id = ".$this->user->user_id."
        ORDER BY posts.created DESC";
    
    $posts = DB::instance(DB_NAME)->select_rows($q);

    # Get all the user statistics from our tables

    $q = "SELECT login.user_id user_id, IFNULL(COUNT( logged_in ),0) login, IFNULL(posts,0) posts, IFNULL(following,0) following, IFNULL(followed,0) followed
            FROM users_login login
            
            LEFT OUTER JOIN (
                SELECT user_id, COUNT( post_id ) posts
                FROM posts
                WHERE user_id =  '".$this->user->user_id."'
            ) posts ON login.user_id = posts.user_id
            
            LEFT OUTER JOIN (
                SELECT user_id, COUNT( user_user_id ) following
                FROM users_users
                WHERE user_id =  '".$this->user->user_id."'
            )following ON login.user_id = following.user_id
            
            LEFT OUTER JOIN (
                SELECT user_id_followed, COUNT( user_user_id ) followed
                FROM users_users
                WHERE user_id_followed =  '".$this->user->user_id."'
            )followed ON login.user_id = followed.user_id_followed
            
            WHERE login.user_id =  '".$this->user->user_id."'";
    
    $userStats = DB::instance(DB_NAME)->select_row($q);
    

    # Now echo out all of our views onto the profile page and pass in relevant data
    # Since we built it piece-meal, pass it in piece-meal and the template will handle layout
    
    $this->template->profile = View::instance('v_users_profile');
    $this->template->title = "Profile";
    $this->template->profile->user_name = $user_name;

    $this->template->stats = View::instance('v_users_statistics');
    $this->template->stats->loginCount = $userStats['login'];
    $this->template->stats->postCount = $userStats['posts'];
    $this->template->stats->followingCount = $userStats['following'];
    $this->template->stats->followedCount = $userStats['followed'];
   
    $this->template->postbox = View::instance('v_posts_add');

    $this->template->posts = View::instance('v_posts_index');
    $this->template->posts->posts = $posts;
    
    echo $this->template; 

    }   

    public function settings() {

        # If user is blank, they're not logged in; redirect them to the login page
        if(!$this->user) {
            Router::redirect("/users/login");
        }

    # Setup view
    $this->template->settings = View::instance('v_users_settings');
    $this->template->title   = "Settings";

    # Render template
        echo $this->template;

    }

    public function p_settings() {
    
        # If user is blank, they're not logged in; redirect them to the login page
        if(!$this->user) {
            Router::redirect("/users/login");
        }

    $user_timezone = DB::instance(DB_NAME)->update("users", $_POST, "WHERE user_id = '".$this->user->user_id."'");

    # After saving settings, return to profile page
    Router::redirect("/users/profile");


    }


} # end of the class