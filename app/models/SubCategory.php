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
        if(empty($DATA['category_name'])){
            $this->errors['category_name'] = "** Fill Category Name **";
        }else if (!preg_match('/^[a-zA-Z ]+$/', $DATA['category_name'])) {
            $this->errors['category_name'] = "** No Special Characters allowed in category name **";
        }

        if(empty($DATA['parent_category'])){
            $this->errors['parent_category'] = "** Select Parent Category **";
        }

        if(empty($DATA['description']))
        {
            $this->errors['description'] = "** Description field must be filled **";
        }
         
 
        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }

 }