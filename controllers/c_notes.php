<?php

class notes_controller extends base_controller {

	public function __construct() {
        parent::__construct();
        
     }
	
    public function p_newflashcard($class_id = Null) { 

        $_POST['class_id'] = $class_id;

        $flash_card_id = DB::instance(DB_NAME)->insert('flash_cards',$_POST);

        Router::redirect('/classes/id/'.$class_id);
    }









    public function p_add() {

        # Prevent null posts
    	if ($_POST['content'] == Null) {
    		Router::redirect("/users/profile");
    	}

        # Associate this post with this user
        $_POST['user_id']  = $this->user->user_id;

        # Unix timestamp of when this post was created / modified
        $_POST['created']  = Time::now();
        $_POST['modified'] = Time::now();

        # Insert
        # Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
        DB::instance(DB_NAME)->insert('posts', $_POST);

        #Return to profile page after making a post
        Router::redirect("/users/profile");
    }


    public function users() {
	    # If user is blank, they're not logged in; redirect them to the login page
        if(!$this->user) {
            Router::redirect("/users/login");
        }

    # Set up the View
    $this->template->others = View::instance("v_posts_users");
    $this->template->title   = "Users";

    # Build the query to get all the users
    $q = "SELECT *
        FROM users
        WHERE users.user_id != '".$this->user->user_id."'";

    # Execute the query to get all the users. 
    # Store the result array in the variable $users
    $users = DB::instance(DB_NAME)->select_rows($q);

    # Build the query to figure out what connections does this user already have? 
    # I.e. who are they following
    $q = "SELECT * 
        FROM users_users
        WHERE user_id = ".$this->user->user_id;

    # Execute this query with the select_array method
    # select_array will return our results in an array and use the "user_id_followed" field as the index.
    # This will come in handy when we get to the view
    # Store our results (an array) in the variable $connections
    $connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');

    # Pass data (users and connections) to the view
    $this->template->others->users       = $users;
    $this->template->others->connections = $connections;

    # Render the view
    echo $this->template;
	}

public function follow($user_id_followed) {

        # If user is blank, they're not logged in; redirect them to the login page
        if(!$this->user) {
            Router::redirect("/users/login");
        }

        elseif($user_id_followed == $this->user->user_id) {
        	Router::redirect("/posts/users");
        }
        

    # Prepare the data array to be inserted
    $data = Array(
        "created" => Time::now(),
        "user_id" => $this->user->user_id,
        "user_id_followed" => $user_id_followed
        );

    # Do the insert
    DB::instance(DB_NAME)->insert('users_users', $data);

    # Send them back
    Router::redirect("/posts/users");

	}

public function unfollow($user_id_followed) {

        # If user is blank, they're not logged in; redirect them to the login page
        if(!$this->user) {
            Router::redirect("/users/login");
        }
        elseif(!$user_id_followed) {
        	Router::redirect("/posts/users") ;
        }


    # Delete this connection
    $user_id_followed = DB::instance(DB_NAME)->sanitize($user_id_followed);

    $where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
    DB::instance(DB_NAME)->delete('users_users', $where_condition);

    # Send them back
    Router::redirect("/posts/users");

	}

}