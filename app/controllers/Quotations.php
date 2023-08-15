<?php


/**
 * quotations controller
 */
class Quotations extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$quotes = new Quotation();
		$quote_items = new QuoteItems();
		$Product = new Product();

		// $quoteProducts = $quote_items->findAll();
		$data = $quotes->findAll();

		foreach($data as $quote)
		{
			$quote->total = number_format($quote->total);
		}

		// foreach($quoteProducts as $product)
		// {
		// 	$quote_ID = $product->quote_ID;
		// 	foreach($data as $quote)
		// 	{
		// 		if($quote_ID == $quote->quote_ID)
		// 		{
		// 			$prod_ID = $product->product_ID;
		// 			$productInfo = $Product->where('product_ID', $prod_ID);

		// 			$prepareQuoteItems = array(
		// 				'product_name' => $productInfo[0]->product_name,
		// 				'image' => $productInfo[0]->image,
		// 				'quote_ID' => $product->quote_ID,
		// 				'total' => $quote->total,
		// 				'company_name' => $quote->company_name,
		// 				'status' => $quote->status,
		// 			);

		// 			$showQuoteItems[] = $prepareQuoteItems;
		// 		}
		// 	}
		// }

		// print_r($showQuoteItems);

		$this->view('quotations', ['rows' => $data]);
	}

    function add()
    {
		$errors = array();
		$results = false;

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}
		

		$city = new City();
		$cities = $city->findAll();
		$customer = new Customer();
		$customers = $customer->findAll();

        $this->view('quotations.add', [	'errors' => $errors,
									   	'customers' => $customers,
										'cities' => $cities
											]);
    }

	function quote_details($id = null)
	{
		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$data = new Quotation();


		$this->view('quotedetails', ['rows' => $data]);
	}

}