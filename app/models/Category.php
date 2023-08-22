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

        if(empty($DATA['category_name']))
        {
            $this->errors['category_name'] = "** Fill category name **";
        }elseif(!preg_match('/^[a-zA-Z0-9 ]+$/', $DATA['category_name'])) {
            $this->errors['category_name'] = "** No Special Characters allowed in category name **";
        }

        if(empty($DATA['description']))
        {
            $this->errors['description'] = "** Description field must be filled **";
        }

        if(empty($DATA['image']))
        {
            $this->errors['image'] = "** Upload Category Image*";
        }
         
 
        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }

 }