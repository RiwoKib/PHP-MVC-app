<?php


/***
 * Customer Model
 */

 class Customer extends Model
 {
    public function __construct()
    {   
        parent::__construct('customers');
    }
 

    public function validate($DATA)
    {
        $this->errors = array();    

        //check input fields 
        if(empty($DATA['firstname']) || empty($DATA['lastname']) || empty($DATA['city']) || empty($DATA['email']) || empty($DATA['phone_number']) || empty($DATA['address']) )
        {
            $this->errors['fields'] = "ALL field must be filled!!!";
        }
        if (!preg_match('/^[a-zA-Z ]+$/', $DATA['firstname']) || !preg_match('/^[a-zA-Z ]+$/', $DATA['lastname'])) {
            $this->errors['name'] = "No numbers/spaces/specialcharacters are allowed in name";
        }   
 
        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }
}