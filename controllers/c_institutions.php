<?php
class institutions_controller extends base_controller {

    public function __construct() {
        parent::__construct();
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);
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

        if ($_POST['institution_name'] == "") {
            echo "Please fill out all fields.";
        }
        

        else {
            $q = "  SELECT * 
                    FROM institutions
                    WHERE upper(institutions.institution_name) = '".strtoupper($_POST['institution_name'])."'
                    ";

            $institution = DB::instance(DB_NAME)->select_rows($q);

                if(count($institution)>0) {
                    echo "An institution with that name already exists. Please enter a new institution name.";
                }

                else {

                $institution_id = DB::instance(DB_NAME)->insert("institutions",$_POST);

                echo "The institution above was added successfully. <a href='/institutions/id/".$institution_id."'>Go there now. </a>"; 
                }
            }
    }


    public function id($institution_id = Null) {

        $q = "  SELECT *
                FROM institutions
                LEFT OUTER JOIN classes
                	ON institutions.institution_id = classes.institution_id
                WHERE institutions.institution_id = '".$institution_id."'";

        $class_data = DB::instance(DB_NAME)->select_rows($q);

        $this->template->content = View::instance('v_institution_id');
        $this->template->content->classes = $class_data;

        echo $this->template;


    }
} # End of controller
