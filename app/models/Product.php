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

    public function validateImported($DATA)
    {
        $this->errors = array();    

        //check input fields 
        if(empty($DATA['product_name']) || empty($DATA['category_ID']) || empty($DATA['selling_price']) || empty($DATA['buying_price']))
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

    public function make_tableRows($rowType, $DATA)
    {
        $result = "";

        if(is_array($DATA))
        {
            // echo"hello";
            // print_r($searchResults);
            switch($rowType)
            {
                case "searchResults":
                    foreach ($DATA as $product)
                    {
                        $result .= "<tr>";

                        $result .= '
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox" name="selected[]" class="product-checkbox" value="'.$product->product_ID.'">
                                <span class="checkmarks"></span>
                            </label>
                        </td>   
                        <td class="productimgname">
                            <a class="product-img">
                                <img src="'.UPLOADED.'/'.$product->image.'" alt="product">
                            </a>
                            <a href="javascript:void(0);">'.$product->product_name.'</a>
                        </td>
                        <td class="product_data">
                            <div class="input-group form-group mb-0">
                                <a class="scanner-set incrementBtn input-group-text">
                                    <img src="'.ASSETS.'/img/icons/plus1.svg" alt="img">
                                </a>
                                <input disabled type="text" value="1" class="calc-no input-qty">
                                <a class="scanner-set decrementBtn input-group-text">
                                    <img src="'.ASSETS.'/img/icons/minus.svg" alt="img">
                                </a>
                            </div>
                        </td>
                        <td><input type="number" class="price" disabled style="margin-right: -150px; border:none; background: none;" value="'.$product->selling_price.'"></td>
                        <td class="text-center">'.($product->discount * 100).'</td>
                        <td class="text-center">'.($product->tax * 100).'</td> 
                        <td>
                            <a href="javascript:void(0);" class="delete-set"><img src="'.ASSETS.'/img/icons/delete.svg" alt="svg"></a>
                        </td>            
                        ';

                        $result .= "</tr>";
                    }
                    break;
                case "selectedProducts":
                    foreach ($DATA as $product)
                    {
                        $result .= "<tr>";

                        $result .= ' 
                        <td class="productimgname">
                            <a class="product-img">
                                <img src="'.UPLOADED.'/'.$product['image'].'" alt="product">
                            </a>
                            <a href="javascript:void(0);">'.$product['product_name'].'</a>
                        </td>
                        <td class="text-center">'.($product['amount']).'</td>
                        <td class="text-center">'.($product['unit']).'</td>
                        <td class="text-center">'.($product['price']).'</td>
                        <td class="text-center">'.($product['total_price']).'</td>
                        <td class="text-center">'.$product['tax'].'</td>
                        <td class="text-center">'.($product['discount'] * 100).'</td>
                        <td class="text-center">'.($product['subtotal']).'</td> 
                        <td>
                            <a href="javascript:void(0);" class="delete-set"><img src="'.ASSETS.'/img/icons/delete.svg" alt="svg"></a>
                        </td>            
                        ';

                        $result .= "</tr>";
                    }
                    break;
                case "quoteSelected":
                    foreach ($DATA as $product)
                    {
                        $result .= "<tr>";

                        $result .= ' 
                        <td class="productimgname">
                            <a class="product-img">
                                <img src="'.UPLOADED.'/'.$product['image'].'" alt="product">
                            </a>
                            <a href="javascript:void(0);">'.$product['product_name'].'</a>
                        </td>
                        <td class="text-center">'.($product['amount']).'</td>
                        <td class="text-center">'.($product['quote_description']).'</td>
                        <td class="text-center">'.($product['tax']).'</td>
                        <td class="text-center">'.($product['unit']).'</td>
                        <td class="text-center">'.($product['price']).'</td>
                        <td class="text-center">'.$product['total_price'].'</td>
                        <td>
                            <a href="javascript:void(0);" class="delete-set"><img src="'.ASSETS.'/img/icons/delete.svg" alt="svg"></a>
                        </td>            
                        ';

                        $result .= "</tr>";
                    }
                    break;

                default:
                    return false;
            }
        }

        return $result;
    }
 }