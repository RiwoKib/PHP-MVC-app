<?php


/***
 * SubCategory Model
 */

 class SubCategory extends Model
 {
    public function __construct()
    {   
        parent::__construct('subcategories');
    }


    public function validate($DATA)
    {
        $this->errors = array();    

        //check input fields

       
        if (!preg_match('/^[a-zA-Z ]+$/', $DATA['category_name'])) {
            $this->errors['name'] = "Only letters are allowed in category name";
        }
        
        if(empty($DATA['category_name']) || empty($DATA['parent_category']))
        {
            $this->errors['name'] = "Fill Both categories";
        }

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