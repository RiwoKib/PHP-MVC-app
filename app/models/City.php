<?php


/***
 * City Model
 */

 class City extends Model
 {
    public function __construct()
    {   
        parent::__construct('cities');
    }

    public function validate($DATA)
    {
        $this->errors = array();    

        //check input fields

       
        if (!preg_match('/^[a-zA-Z ]+$/', $DATA['city_name'])) {
            $this->errors['name'] = "Only letters are allowed in city name";
        }
        
        if(empty($DATA['city_name']) || empty($DATA['region_name']))
        {
            $this->errors['name'] = "All * fields must be filled";
        }  
          
 
        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }

}
