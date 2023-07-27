<?php


/***
 * Supplier Model
 */

 class Supplier extends Model
 {
    public function __construct()
    {   
        parent::__construct('suppliers');
    }

    public function validate($DATA)
    {
        $this->errors = array();    

        //check input fields 
        if(empty($DATA['supplier_name']) || empty($DATA['country']) || empty($DATA['city']) || empty($DATA['email']) || empty($DATA['phone_number']) || empty($DATA['address']) )
        {
            $this->errors['fields'] = "ALL field must be filled!!!";
        }
        if (!preg_match('/^[a-zA-Z ]+$/', $DATA['supplier_name']) || !preg_match('/^[a-zA-Z ]+$/', $DATA['country'])) {
            $this->errors['name'] = "No numbers/specialcharacters are allowed in supplier/country name";
        }   
 
        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }
}