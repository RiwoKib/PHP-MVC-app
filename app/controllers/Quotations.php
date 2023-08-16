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

		$quote = new Quotation();
		$quote_data = $quote->where('id' , $id);
		$ID = $quote_data[0]->quote_ID;
		$QuoteItems = new QuoteItems();
		$quoteProducts = $QuoteItems->findAll();
		$Product = new Product();

		foreach($quoteProducts as $product)
		{
			$quote_ID = $product->quote_ID;

			if($quote_ID == $quote_data[0]->quote_ID)
			{	
				$prod_ID = $product->product_ID;
				$product_info = $Product->where('product_ID', $prod_ID);

				$prepareQuoteItems = array(
					'product_name' => $product_info[0]->product_name,
					'image' => $product_info[0]->image,
					'unit'=> $product_info[0]->unit,
					'quote_description' => $product_info[0]->quote_description,
					'tax' => $product_info[0]->tax * 100,
					'total_price' => $product->price,
					'price' => $product_info[0]->selling_price,
					'amount' => $product->product_quantity
				);

				$showQuoteItems[] = $prepareQuoteItems;
			}
		} 

		$prepareCompanyInfo = array(
			'company_name' => $quote_data[0]->company_name,
			'address' => $quote_data[0]->address,
			'city' => $quote_data[0]->city,
			'zipcode' =>  $quote_data[0]->zipcode,
		);

		$prepareCustomerInfo = array(
			'firstname' => $quote_data[0]->firstname,
			'lastname' => $quote_data[0]->lastname,
			'phone_number' => $quote_data[0]->phone_number,
			'status' => $quote_data[0]->status,
			'payment_status' => $quote_data[0]->payment_status
		);

		$this->view('quotedetails', [	'rows' => $showQuoteItems, 
										'quote_ID' => $ID,
										'company_info' => $prepareCompanyInfo,
										'customer_info' => $prepareCustomerInfo]);
	}

}