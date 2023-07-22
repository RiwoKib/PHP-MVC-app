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

       
        if (!preg_match('/^[a-zA-Z ]+$/', $DATA['category_name'])) {
            $this->errors['name'] = "Only letters are allowed in category name";
        }
        
        if(empty($DATA['category_name']))
        {
            $this->errors['name'] = "Fill category name";
        }
        if(!preg_match('/^[a-zA-Z0-9]+$/', $DATA['sku']))
        {
            $this->errors['sku'] = "Letters followed by numbers in sku";
        }
        if(empty($DATA['sku']))
        {
            $this->errors['sku'] = "Fill SKU (category code) e.g CT002";
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