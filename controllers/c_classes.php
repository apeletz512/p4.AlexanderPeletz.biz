<?php
class classes_controller extends base_controller {

    public function __construct() {
        parent::__construct();
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

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

        if( ($_POST['institution_id'] == "") || ($_POST['class_number'] == "") || ($_POST['class_name'] == "") ) {
            echo "Please fill out all fields.";
        }

        else {
            $q = "  SELECT * FROM classes
                    WHERE classes.institution_id = '".$_POST['institution_id']."'
                        AND (upper(classes.class_number) = '".strtoupper($_POST['class_number'])."'
                        or upper(classes.class_name) = '".strtoupper($_POST['class_name'])."')
                ";

            $class = DB::instance(DB_NAME)->select_rows($q);

                if(count($class)>0) {
                
                echo "A class already exists with the same name or number for this institution. Please enter a new name or number.";

                }

                else {
                    $class_id = DB::instance(DB_NAME)->insert("classes",$_POST);

                    echo "You've successfully added the class above. <a href='/classes/id/".$class_id."'>Go there now.</a>";
                }  
        }
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
}
