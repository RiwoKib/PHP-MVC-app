<?php


/***
 * Product Model
 */

 class Product extends Model
 {
    public function __construct()
    {   
        parent::__construct('products');
    }



    public function validate($DATA)
    {
        $this->errors = array();    

        //check input fields 
        if(empty($DATA['tax']) || empty($DATA['status']) || empty($DATA['sub_category']) || empty($DATA['unit']) || empty($DATA['brand']) || empty($DATA['product_name']) || empty($DATA['category_ID']) || empty($DATA['product_quantity']) || empty($DATA['discount']) || empty($DATA['selling_price']) || empty($DATA['buying_price'])  || empty($DATA['description']))
        {
            $this->errors['fields'] = "ALL field must be filled!!!";
        }
        if (!preg_match('/^[a-zA-Z0-9 ]+$/', $DATA['product_name'])) {
            $this->errors['name'] = "Only letters/numbers are allowed in product name";
        }
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