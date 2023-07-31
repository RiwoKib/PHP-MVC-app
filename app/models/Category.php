<?php


/***
 * Category Model
 */

 class Category extends Model
 {
    public function __construct()
    {   
        parent::__construct('categories');
    }


    public function validate($DATA)
    {
        $this->errors = array();    

        //check input fields

       
        // if (!preg_match('/^[a-zA-Z0-9]+$/', $DATA['category_name'])) {
        //     $this->errors['name'] = "Only letters/numbers are allowed in category name";
        // }
        
        if(empty($DATA['category_name']))
        {
            $this->errors['name'] = "Fill category name";
        }
        // if(!preg_match('/^[a-zA-Z0-9]+$/', $DATA['category_ID']))
        // {
        //     $this->errors['category_ID'] = "Letters followed by numbers in category_ID";
        // }

        if(empty($DATA['description']))
        {
            $this->errors['desc'] = "Description field must be filled";
        }
         
 
        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }

 }