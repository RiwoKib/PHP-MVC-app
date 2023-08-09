<?php


/**
 * AjaxRequests controller
 */
class AjaxRequests extends Controller
{
	 

    function searchProducts()
    {   

        $search = new Product();

        $data = file_get_contents("php://input");
        $data = json_decode($data);
        $searchData = $data->data; 

        if($search->findAll())
        {
            $resultData = $search->searchProducts($searchData);
            $resultData['tbl_rows'] = $search->make_tableRows('searchResults',$resultData); 
        }else{
            echo "No Products to Search";
        } 

        echo json_encode($resultData);
    }

    function saveSelected()
    {
        $search = new Product();

        $data = file_get_contents("php://input");
        $data = json_decode($data); 

        if($search->findAll())
        {   
            $resultData['selected'] = $data;

            foreach($resultData['selected'] as $row)
            {
                $product_info = $search->where('product_ID', $row->product_ID);
                $subTotal = 0;
                
                $prepareSelected = array(
                    'product_ID' => $row->product_ID,
                    'product_name' => $product_info[0]->product_name,
                    'image' => $product_info[0]->image,
                    'unit'=> $product_info[0]->unit,
                    'tax' => $product_info[0]->tax,
                    'discount' => $product_info[0]->tax,
                    'total_price' => $row->price,
                    'price' => $product_info[0]->selling_price,
                    'amount' => $row->product_quantity,
                    'subtotal' => $subTotal
                );
                
                $show_selected[] = $prepareSelected;
            }

            $resultData['tbl_rows'] = $search->make_tableRows('selectedProducts',$show_selected); 
            $resultData['selected'] = $show_selected;

        }else{
            echo "No Products Available";
        } 

        echo json_encode($resultData);
    }

    function addSale()
    {
        $sale = new Sale();

        $data = file_get_contents("php://input");
        $data = json_decode($data);

        $customerInput = $data->input;
        $productsSold = $data->products;

        $orderTax = floatval($customerInput->tax) / 100;
        $discount = floatval($customerInput->discount) / 100;

        $Sale_ID = makeCode('sales');

        if(is_array($productsSold))
        {
            $soldItems = new SoldItems();
            $Grand_total_price = 0;

            foreach($productsSold as $product)
            {
                $insertProducts = array(
                    'sale_ID' => $Sale_ID,
                    'product_ID' => $product->product_ID,
                    'product_quantity' => $product->amount,
                    'price' => $product->total_price,
                );
                $Grand_total_price += $product->total_price;

                $productInsert[] = $insertProducts;
            }
        }

        $insertSale = array(
            'sale_ID' => $Sale_ID,
            'customer_code' => $customerInput->customer_code,
            'status' => $customerInput->status,
            'order_tax' => $orderTax,
            'discount' => $discount,
            'total' => $Grand_total_price,
            'shipping_cost' => $customerInput->shipping_cost
        );

        if($sale->insert($insertSale)){

            $counter = 0;
           foreach($productInsert as $product)
           {
                if($soldItems->insert($product))
                {
                    $counter += 1;
                }else{
                    echo $soldItems->getErrorMessage();
                }
           }
        }else{
            echo $sale->getErrorMessage();
        }

        if($counter > 0)
        {
            $dataInsert['insertSale'] = $insertSale;
            $dataInsert['productsInsert'] = $productInsert;
            print_r($dataInsert);
        }
       
    }
}