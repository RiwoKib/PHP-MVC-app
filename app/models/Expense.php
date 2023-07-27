<?php


/***
 * expense Model
 */

 class Expense extends Model
 {
    public function __construct()
    {   
        parent::__construct('expenses');
    }
    
    public static function makeReferenceCode()
    {
        $refCode = "EXP".rand(001,999);
        return $refCode;
    }

    public function validate($DATA)
    {
        $this->errors = array();    

        //check input fields 
        if(empty($DATA['category_name']) || empty($DATA['amount']) || empty($DATA['start_date']) || empty($DATA['expiry_date']) || empty($DATA['description']) )
        {
            $this->errors['fields'] = "ALL field must be filled!!!";
        }
        if (!preg_match('/^[a-zA-Z ]+$/', $DATA['category_name'])) {
            $this->errors['name'] = "Only letters are allowed in product name";
        }   
 
        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }
}