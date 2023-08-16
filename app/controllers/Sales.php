<?php

/**
 * sales controller
 */
class Sales extends Controller
{

	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$sales = new Sale();

		$data = $sales->findAll();

		foreach($data as $quote)
		{
			$quote->total = number_format($quote->total);
		}

		$this->view('sales', ['rows' => $data]);
	}

    function add()
    {	
		$errors = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}  		

		$customer = new Customer();
		$customers = $customer->findAll();

        $this->view('sales.add', [	'errors' => $errors,
								  	'customers' => $customers]);
    }

	function sale_details($id = null)
	{
		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$sale = new Sale();
		$sale_data = $sale->where('id' , $id);
		$ID = $sale_data[0]->sale_ID;
		$SoldItems = new SoldItems();
		$soldProducts = $SoldItems->findAll();
		$Product = new Product();
		$grand_total = $sale_data[0]->total;
		$shipping_cost = $sale_data[0]->shipping_cost;

		foreach($soldProducts as $product)
		{
			$sale_ID = $product->sale_ID;

			if($sale_ID == $sale_data[0]->sale_ID)
			{	
				$prod_ID = $product->product_ID;
				$product_info = $Product->where('product_ID', $prod_ID);
				$subtotal = 0;

				$prepareSoldItems = array(
					'product_name' => $product_info[0]->product_name,
					'image' => $product_info[0]->image,
					'unit'=> $product_info[0]->unit,
					'discount' =>$product_info[0]->discount,
					'tax' => $product_info[0]->tax * 100,
					'total_price' => $product->price,
					'price' => $product_info[0]->selling_price,
					'amount' => $product->product_quantity,
					'subtotal' => $subtotal
				);

				$showSoldItems[] = $prepareSoldItems;
			}
		}
		
		$discount = $sale_data[0]->discount * $grand_total;
		$total = ($grand_total + $shipping_cost) - $discount;

		$prepareCustomerInfo = array(
			'customer_code' => $sale_data[0]->customer_code,
			'status' => $sale_data[0]->status,
			'payment_status' => $sale_data[0]->payment_status,
			'shipping_cost' => number_format($shipping_cost),
			'grand_total' => number_format($total),
			'discount' => number_format($discount),
		);

		$customer = new Customer();
		$customer_info = $customer->where('customer_code', $prepareCustomerInfo['customer_code']);

		if($customer_info && $customer_info[0]->customer_code == $prepareCustomerInfo['customer_code'])
		{
			$prepareCustomerInfo['firstname'] = $customer_info[0]->firstname;
			$prepareCustomerInfo['lastname'] = $customer_info[0]->lastname;
			$prepareCustomerInfo['city'] = $customer_info[0]->city;
			$prepareCustomerInfo['address'] = $customer_info[0]->address;
			$prepareCustomerInfo['phone_number'] = $customer_info[0]->phone_number;
		}else{
			$prepareCustomerInfo = array(
				'customer_code' => $sale_data[0]->customer_code,
				'status' => $sale_data[0]->status,
				'payment_status' => $sale_data[0]->payment_status,
				'shipping_cost' => number_format($shipping_cost),
				'grand_total' => number_format($total),
				'discount' => number_format($discount),
			);
			
		}

		$this->view('saledetails', ['rows' => $showSoldItems, 
									'sale_ID' => $ID,
									'customer_info' => $prepareCustomerInfo]);

	}

	function report()
	{
		$this->view('salesreport');
	}

	function invoice()
	{
		$this->view('invoicereport');
	}
}