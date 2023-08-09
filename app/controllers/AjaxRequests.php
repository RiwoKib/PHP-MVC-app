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

        }else{
            echo "No Products Available";
        } 

        echo json_encode($resultData);
    }
}