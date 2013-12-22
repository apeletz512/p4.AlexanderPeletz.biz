<?php

class notes_controller extends base_controller {

	public function __construct() {
        parent::__construct();
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);
        
     }
	
    public function p_newflashcard($class_id = Null) { 

        $_POST['class_id'] = $class_id;

        
        if( ($_POST['front'] == "") || ($_POST['back'] == "") ) {
            echo "Please fill out all fields.";
        }

        else {
        $q = "  SELECT *
                FROM flash_cards
                WHERE flash_cards.class_id = '".$class_id."'
                    AND (upper(flash_cards.front) = '".strtoupper($_POST['front'])."'
                        OR upper(flash_cards.back) = '".strtoupper($_POST['back'])."')
            ";

        $flash_card = DB::instance(DB_NAME)->select_rows($q);

            if(count($flash_card) > 0) {
                echo "A flashcard already exists with either this front or back. Please enter a new flashcard.";
            }

            else {
            $flash_card_id = DB::instance(DB_NAME)->insert('flash_cards',$_POST);

            echo "The flashcard above was added successfully. Refresh the page to see it in the list of flashcards for this class.";
            } 
        }  
    }

}


