<?php


/***
 * Brand Model
 */

 class Brand extends Model
 {
    public function __construct()
    {   
        parent::__construct('brands');
    }


    public function validate($DATA)
    {
        $this->errors = array();    

        //check input fields

       
        if (!preg_match('/^[a-zA-Z ]+$/', $DATA['brand_name'])) {
            $this->errors['name'] = "Only letters are allowed in brand name";
        }
        
        if(empty($DATA['brand_name']))
        {
            $this->errors['brand_name'] = "** Fill brand name **";
        } 

        if(empty($DATA['description']))
        {
            $this->errors['description'] = "** Description field must be filled **";
        }

        if(empty($DATA['image'])){
            $this->errors['image'] = "** Upload Brand Image **";
        }
 
        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }

 }