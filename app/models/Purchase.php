<?php


/***
 * Purchase Model
 */

 class Purchase extends Model
 {
    public function __construct()
    {   
        parent::__construct('purchases');
    }


    public function validateImported($DATA)
    {
        $this->errors = array();    

        //check input fields 
        if(empty($DATA['supplier_code']) || empty($DATA['category_ID']) || empty($DATA['product_ID']) || empty($DATA['status']))
        {
            $this->errors['fields'] = "Crosscheck the excel table with the required fields";
        }
        // if (!preg_match('/^[a-zA-Z0-9 ]+$/', $DATA['product_name'])) {
        //     $this->errors['name'] = "Only letters/numbers are allowed in product name";
        // }
        // if(!preg_match('/^[a-zA-Z0-9]+$/', $DATA['sku']))
        // {
        //     $this->errors['sku'] = "Letters followed by numbers in sku";
        // } 

        
         
 
        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }
 }
