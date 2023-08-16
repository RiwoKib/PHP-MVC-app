<?php


/**
 * transfers controller
 */
class Transfers extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$transfers = new Transfer();

		$data = $transfers->findAll();

		foreach($data as $quote)
		{
			$quote->goods_total = number_format($quote->goods_total);
		}

		$this->view('transfers', ['rows' => $data]);
	}

	function transfer_details($id=null)
	{	
		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$transfer = new Transfer();
		$transfer_data = $transfer->where('id' , $id);
		$ID = $transfer_data[0]->transfer_ID;
		$TransferItems = new TransferItems();
		$transferedProducts = $TransferItems->findAll();
		$Product = new Product();
		$grand_total = $transfer_data[0]->goods_total;
		$shipping_cost = $transfer_data[0]->shipping_cost;

		foreach($transferedProducts as $product)	
		{
			$transfer_ID = $product->transfer_ID;

			if($transfer_ID == $ID)
			{	
				$prod_ID = $product->product_ID;
				$product_info = $Product->where('product_ID', $prod_ID);

				$prepareTransferItems = array(
					'product_name' => $product_info[0]->product_name,
					'image' => $product_info[0]->image,
					'unit'=> $product_info[0]->unit,
					'quote_description' => $product_info[0]->quote_description,
					'tax' => $product_info[0]->tax * 100,
					'total_price' => $product->price,
					'price' => $product_info[0]->selling_price,
					'amount' => $product->product_quantity
				);

				$showTransferItems[] = $prepareTransferItems;
			}
		}

		$total = ($grand_total + $shipping_cost);

		$prepareSupplierInfo = array(
			'status' => $transfer_data[0]->status,
			'payment_status' => $transfer_data[0]->payment_status,
			'shipping_cost' => number_format($shipping_cost),
			'total' => number_format($grand_total),
			'grand_total' => number_format($total),
			'from' => $transfer_data[0]->from_store,
			'to' => $transfer_data[0]->to_store
		);

		$this->view('transferdetails', ['rows' => $showTransferItems, 
										'transfer_ID' => $ID,
										'transfer_info' => $prepareSupplierInfo]);
	}


    function add()
    {
		$errors = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}


        $this->view('transfers.add', ['errors' => $errors,]);
    }

    function import()
    {
        $this->view('transfers.import');
    }
}