<?php


/**
 * AjaxRequests controller
 */
class AjaxRequests extends Controller
{
	 

    function searchProducts($table)
    {   

        $search = new Product();

        $data = file_get_contents("php://input");
        $data = json_decode($data);
        $searchData = $data->data; 

        if($search->findAll())
        {
            switch($table)
            {
                case 'regular':
                    $resultData = $search->searchProducts($searchData);
                    $resultData['tbl_rows'] = $search->make_tableRows('searchResults',$resultData);
                    break;
                case 'purchase':
                    $resultData = $search->searchProducts($searchData);
                    $resultData['tbl_rows'] = $search->make_tableRows('purchaseTable',$resultData);
                    break;
                default;
                    return false;
            } 
        }else{
            echo "No Products to Search";
        } 

        echo json_encode($resultData);
    }

    function saveSelected($table)
    {
        $search = new Product();

        $data = file_get_contents("php://input");
        $data = json_decode($data); 

        if($search->findAll())
        {   
            $resultData['selected'] = $data;

            switch($table)
            {
                case 'sales':
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
                    break;
                
                case 'quote':

                    foreach($resultData['selected'] as $row)
                    {
                        $product_info = $search->where('product_ID', $row->product_ID);
                        
                        $prepareSelected = array(
                            'product_ID' => $row->product_ID,
                            'product_name' => $product_info[0]->product_name,
                            'image' => $product_info[0]->image,
                            'unit'=> $product_info[0]->unit,
                            'quote_description' => $product_info[0]->quote_description,
                            'tax' => $product_info[0]->tax * 100,
                            'total_price' => $row->price,
                            'price' => $product_info[0]->selling_price,
                            'amount' => $row->product_quantity
                        );

                        $show_selected[] = $prepareSelected;
                    }

                    $resultData['tbl_rows'] = $search->make_tableRows('quoteSelected',$show_selected); 
                    $resultData['selected'] = $show_selected;
                    break;
                
                case 'purchase':
                    foreach($resultData['selected'] as $row)
                    {
                        $product_info = $search->where('product_ID', $row->product_ID);
                        
                        $prepareSelected = array(
                            'product_ID' => $row->product_ID,
                            'product_name' => $product_info[0]->product_name,
                            'image' => $product_info[0]->image,
                            'unit'=> $product_info[0]->unit,
                            'quote_description' => $product_info[0]->quote_description,
                            'total_price' => $row->total_price,
                            'price' => $row->buying_price,
                            'amount' => $row->product_quantity
                        );

                        $show_selected[] = $prepareSelected;
                    }
                    $resultData['tbl_rows'] = $search->make_tableRows('purchaseSelected',$show_selected); 
                    $resultData['selected'] = $show_selected;

                    break;

                default:
                    return false;
            
            }

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

        if($customerInput->discount != "none")
        {
            $discount = floatval($customerInput->discount) / 100;
        }else{
            $discount = 0;
        }

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

            echo json_encode($dataInsert);
            
        }
       
    }

    function addQuote()
    {   
        $quote = new Quotation();

        $data = file_get_contents("php://input");
        $data = json_decode($data);

        $quoteInput = $data->input;
        $productsQuote = $data->products;

        $date = get_date($quoteInput->date);
        $expiryDate = get_expiryDate($date);

        $quote_ID = makeCode('quotation');

        if(is_array($productsQuote))
        {
            $quoteItems = new QuoteItems();
            $Grand_total_price = 0;

            foreach($productsQuote as $product)
            {
                $insertProducts = array(
                    'quote_ID' => $quote_ID,
                    'product_ID' => $product->product_ID,
                    'product_quantity' => $product->amount,
                    'price' => $product->total_price,
                );

                $Grand_total_price += $product->total_price;

                $productInsert[] = $insertProducts;
            }
        }

        $insertQuote = array(
            'quote_ID' => $quote_ID,
            'company_name' => $quoteInput->company_name,
            'status' => $quoteInput->status,
            'total' => $Grand_total_price,
            'shipping_cost' => $quoteInput->shipping_cost,
            'firstname' => $quoteInput->firstname,
            'lastname' => $quoteInput->lastname,
            'email' => $quoteInput->email,
            'phone_number' => $quoteInput->phone_number,
            'city' => $quoteInput->city,
            'address' => $quoteInput->address,
            'zipcode' => $quoteInput->zipcode,
            'created_on' => $date,
            'expiry_date' => $expiryDate
        );

        if($quote->insert($insertQuote)){

            $counter = 0;
           foreach($productInsert as $product)
           {
                if($quoteItems->insert($product))
                {
                    $counter += 1;
                }else{
                    echo $quoteItems->getErrorMessage();
                }
           }
        }else{
            echo $quote->getErrorMessage();
        }
        
        if($counter > 0)
        {
            $dataInsert['insertQuote'] = $insertQuote;
            $dataInsert['productsInsert'] = $productInsert;

            echo json_encode($dataInsert);
            
        }

        // print_r($productsQuote);
    }

    function addPurchase()
    {

		$addP = new Purchase();

        $data = file_get_contents("php://input");
        $data = json_decode($data);

        $purchaseInput = $data->input;
        $prodPurchased = $data->products;

        $purchaseTax = floatval($purchaseInput->tax) / 100;
        $discount = floatval($purchaseInput->discount) / 100;

        $date = get_date($purchaseInput->date);

        $P_ID = makeCode('purchases');

        if(is_array($prodPurchased))
        {
            $Pitems = new PurchaseItems();
            $Grand_total_price = 0;

            foreach($prodPurchased as $product)
            {
                $insertProducts = array(
                    'Purchase_ID' => $P_ID,
                    'product_ID' => $product->product_ID,
                    'product_quantity' => $product->amount,
                    'price' => $product->total_price,
                );
                $Grand_total_price += $product->total_price;

                $productInsert[] = $insertProducts;
            }
        }

        $insertPurchase = array(
            'purchase_code' => $P_ID,
            'supplier_code' => $purchaseInput->supplier_code,
            'status' => $purchaseInput->status,
            'tax' => $purchaseTax,
            'discount' => $discount,
            'total' => $Grand_total_price,
            'shipping_cost' => $purchaseInput->shipping_cost,
            'created_on' => $date
        );

        if($addP->insert($insertPurchase)){

        	$counter = 0;
            foreach($productInsert as $product)
            {
                    if($Pitems->insert($product))
                    {
                        $counter += 1;
                    }else{
                        echo $Pitems->getErrorMessage();
                    }
            }
        }else{
        	echo $addP->getErrorMessage();
        }

        if($counter > 0)
        {
            $dataInsert['insertPurchase'] = $insertPurchase;
            $dataInsert['productsInsert'] = $productInsert;

            echo json_encode($dataInsert);
            
        }
    }

    function addTransfer()
    {
        $data = file_get_contents("php://input");
        $data = json_decode($data);

        $transferInput = $data->input;
        $prodTransfered = $data->products;

        $addT = new Transfer();


        $date = get_date($transferInput->date);

        $Transfer_ID = makeCode('transfers');

        if(is_array($prodTransfered))
        {
            $Transferitems = new TransferItems();
            $Grand_total_price = 0;

            foreach($prodTransfered as $product)
            {
                $insertProducts = array(
                    'transfer_ID' => $Transfer_ID,
                    'product_ID' => $product->product_ID,
                    'product_quantity' => $product->amount,
                    'price' => $product->total_price,
                );
                $Grand_total_price += $product->total_price;

                $productInsert[] = $insertProducts;
            }
        }

        $insertTransfer = array(
            'transfer_ID' => $Transfer_ID,
            'from_store' => $transferInput->from_store,
            'status' => $transferInput->status,
            'shipping_cost' => $transferInput->shipping_cost,
            'to_store' => $transferInput->to_store,
            'goods_total'=> $Grand_total_price,
            'created_on' => $date
        );

        if($addT->insert($insertTransfer)){

        	$counter = 0;
            foreach($productInsert as $product)
            {
                if($Transferitems->insert($product))
                {
                    $counter += 1;
                }else{
                    echo "something went wrong";
                }
            }
        }else{
        	echo "something went wrong";
        }

        if($counter > 0)
        {
            $dataInsert['insertTransfer'] = $insertTransfer;
            $dataInsert['productsInsert'] = $productInsert;

            echo json_encode($dataInsert);
        }        
    }

    function QuotePDF($id=null, $table)
    {    
        $quote = new Quotation();
		$quote_data = $quote->where('quote_ID' , $id);
		$ID = $quote_data[0]->quote_ID;
		$QuoteItems = new QuoteItems();
		$quoteProducts = $QuoteItems->findAll();
		$Product = new Product();
		$grand_total = $quote_data[0]->total;
		$shipping_cost = $quote_data[0]->shipping_cost;

		foreach($quoteProducts as $product)
		{
			$quote_ID = $product->quote_ID;

			if($quote_ID == $ID)
			{	
				$prod_ID = $product->product_ID;
				$product_info = $Product->where('product_ID', $prod_ID);

				$prepareQuoteItems = array(
					$product_info[0]->product_name,
					$product_info[0]->quote_description,
					$product->product_quantity,
					number_format($product_info[0]->selling_price),
					number_format($product->price),
				);

				$showQuoteItems[] = $prepareQuoteItems;
			}
		} 

        $prepareCompanyInfo = array(
            'quote_ID' => $ID,
            'invoice_ID' => $quote_data[0]->invoice_ID,
            'entry' =>$quote_data[0]->created_on,
            'expiry' =>$quote_data[0]->expiry_date,
			'company_name' => $quote_data[0]->company_name,
			'address' => $quote_data[0]->address,
			'city' => $quote_data[0]->city,
			'zipcode' =>  $quote_data[0]->zipcode,
			'shipping_cost' => number_format($shipping_cost),
			'total' => number_format($grand_total)
		);

        $prepareServies = [
            'title' =>'Services',
            'desc' =>'Installation, configuration and training',
            'quantity' => 1,
            'unit_price' => number_format(20000),
            'total_price' => 20000
        ];


        $grand_total += $shipping_cost + $prepareServies['total_price'];

		$prepareCustomerInfo = array(
			'firstname' => $quote_data[0]->firstname,
			'lastname' => $quote_data[0]->lastname,
            'email' =>$quote_data[0]->email,
			'phone_number' => $quote_data[0]->phone_number,
			'status' => $quote_data[0]->status,
            'due' => number_format($quote_data[0]->due),
            'paid' => number_format($quote_data[0]->paid),
			'payment_status' => $quote_data[0]->payment_status,
			'grand_total' => number_format($grand_total)
		);


        $data[] = $showQuoteItems;
        $data[] = $prepareCompanyInfo;
        $data[] = $prepareCustomerInfo;
        $prepareServies['total_price'] = number_format($prepareServies['total_price']);
        $data[] = $prepareServies;

        generatePdf($data, $table);

        print_r($prepareServies);

    }

    function importProducts()
    {
        $file = $_FILES['excelFile']['tmp_name'];

        $data = extractDataFromExcel($file);

        $product = new Product(); 
        $errors = array();
        $totalRows = count($data);
        $successCount = 0;
        $file = 'progress.txt';
        // print_r( $data);

        foreach ($data as $row)
        {	
            $insertData = array(
            'product_name' => $row[0],
            'image' => $row[1],
            'category_ID' => $row[2],
            'product_quantity' => $row[3],
            'quote_description' => $row[8],
            'buying_price' => $row[4],
            'selling_price' => $row[5],
            'brand' => $row[6],
            'unit' => $row[7],
            'sub_category' => $row[12],
            'tax' => $row[9],
            'discount' => $row[10],
            'status' => $row[11],
            ); 
            

            if($product->validateImported($insertData))
            {	
                $insertData['product_quantity'] = intval($insertData['product_quantity']);
                $insertData['selling_price'] = intval($insertData['selling_price']);
                $insertData['status'] = intval($insertData['status']);
                $insertData['buying_price'] = intval($insertData['buying_price']);
                $insertData['tax'] = floatval($insertData['tax']) / 100;
                $insertData['discount'] = floatval($insertData['discount']) / 100;

                $insertData['product_ID'] = makeCode('products');
                
                if($product->insert($insertData)){
                    $successCount ++;
                    $progressPercentage = round(($successCount / $totalRows) * 100);

                    sleep(1);
                    // echo json_encode(array('success' => true, 'progress' => $progressPercentage));

                    file_put_contents($file, $progressPercentage);
                }else{
                    echo $product->getErrorMessage();
                }
            }else{
                $errors = $product->errors;
                echo json_encode(array('errors' => $errors));
            }
        } 
        
        echo json_encode(array('success' => true, 'message' => 'Products imported'));
        file_put_contents($file, 0);
    }


    function checkProgress()
    {
        $file = 'progress.txt';
        $data = file_get_contents($file);
        echo $data;
    }
}