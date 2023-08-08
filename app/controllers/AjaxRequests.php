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
            $results = $search->searchProducts($searchData);
        }else{
            echo "No Products to search";
        } 

        echo json_encode($results);
    }
}