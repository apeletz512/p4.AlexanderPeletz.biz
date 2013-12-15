<?php
class institutions_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        #echo "users_controller construct called<br><br>";
    }

    public function listall() {

    	$q = "	SELECT * 
                FROM
                institutions";
        
        $institution_list = DB::instance(DB_NAME)->select_rows($q);
        
        $this->template->content = View::instance('v_institution_list');
        $this->template->content->institutions = $institution_list;

        echo $this->template;
    
    }

    public function newinstitution() {

    	$this->template->content = View::instance('v_institution_new');

        echo $this->template;

    }


    public function p_newinstitution() {

        $institution_id = DB::instance(DB_NAME)->insert("institutions",$_POST);

        Router::redirect('/institutions/id/'.$institution_id);   


    }


    public function id($institution_id = Null) {

        $q = "  SELECT *
                FROM classes
                WHERE institution_id = '".$institution_id."'";

        $class_data = DB::instance(DB_NAME)->select_rows($q);


        $this->template->content = View::instance('v_institution_id');
        $this->template->content->classes = $class_data;

        echo $this->template;


    }
} # End of controller
