<?php


/**
 * home controller
 */
class Purchases extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}
		$purchase = new Purchase();
		$supplier = new Supplier();

		// $supplier_name = $supplier->where('supplier_name', '')
		$data = $purchase->findAll();

		foreach($data as $quote)
		{
			$quote->total = number_format($quote->total);
		}

		$this->view('purchases', ['rows' => $data]);
	}

	function add()
    {
		$errors = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}


		$supplier = new Supplier();
		$suppliers = $supplier->findAll();

        $this->view('purchases.add', [	'errors' => $errors,
								  		'suppliers' => $suppliers,	]);
    }

	function purchase_details($id=null)
	{	
		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$purchase = new Purchase();
		$purchase_data = $purchase->where('id' , $id);
		$ID = $purchase_data[0]->purchase_code;
		$PurchaseItems = new PurchaseItems();
		$purchasedProducts = $PurchaseItems->findAll();
		$Product = new Product();
		$grand_total = $purchase_data[0]->total;
		$shipping_cost = $purchase_data[0]->shipping_cost;

		foreach($purchasedProducts as $product)	
		{
			$purchase_ID = $product->purchase_ID;

			if($purchase_ID == $ID)
			{	
				$prod_ID = $product->product_ID;
				$product_info = $Product->where('product_ID', $prod_ID);

				$preparePurchaseItems = array(
					'product_name' => $product_info[0]->product_name,
					'image' => $product_info[0]->image,
					'unit'=> $product_info[0]->unit,
					'quote_description' => $product_info[0]->quote_description,
					'tax' => $product_info[0]->tax * 100,
					'total_price' => $product->price,
					'price' => $product_info[0]->selling_price,
					'amount' => $product->product_quantity
				);

				$showPurchaseItems[] = $preparePurchaseItems;
			}
		}
		
		$discount = $purchase_data[0]->discount * $grand_total;
		$revenue_tax = $purchase_data[0]->tax * $grand_total;
		$total = ($grand_total + $shipping_cost + $revenue_tax) - $discount;

		$prepareSupplierInfo = array(
			'supplier_code' => $purchase_data[0]->supplier_code,
			'status' => $purchase_data[0]->status,
			'payment_status' => $purchase_data[0]->payment_status,
			'shipping_cost' => number_format($shipping_cost),
			'grand_total' => number_format($total),
			'discount' => number_format($discount),
			'tax'=> number_format($revenue_tax),
			'subtotal' =>number_format($grand_total)
		);

		$supplier = new Supplier();
		$supplier_info = $supplier->where('supplier_code', $prepareSupplierInfo['supplier_code']);

		$prepareSupplierInfo['supplier_name'] = $supplier_info[0]->supplier_name;
		$prepareSupplierInfo['country'] = $supplier_info[0]->country;
		$prepareSupplierInfo['city'] = $supplier_info[0]->city;
		$prepareSupplierInfo['address'] = $supplier_info[0]->address;
		$prepareSupplierInfo['phone_number'] = $supplier_info[0]->phone_number;

		$this->view('purchasedetails', ['rows' => $showPurchaseItems, 
										'purchase_ID' => $ID,
										'supplier_info' => $prepareSupplierInfo]);
	}

	function import()
	{
		$errors = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		if(isset($_POST['importPurchases']))
		{
			$file = $_FILES['purchases_import']['tmp_name'];

			$data = extractDataFromExcel($file);

			$purchase = new Purchase(); 

			foreach ($data as $row)
			{	
				$insertData = array(
				'supplier_code' => $row[0],
				'product_ID' => $row[1],
				'category_ID' => $row[2],
				'tax' => $row[3],
				'discount' => $row[5],
				'shipping' => $row[10],
				'status' => $row[4],
				'description' => $row[11],
				'total' => $row[6],
				'paid' => $row[7],
				'due' => $row[8],
				'payment_status' => $row[9], 
				);  

				// show( $insertData);

				if($purchase->validateImported($insertData))
				{ 
					$insertData['tax'] = floatval($insertData['tax']) / 100;
					$insertData['discount'] = floatval($insertData['discount']) / 100;

					$insertData['purchase_code'] = makeCode('purchases');

					if($purchase->insert($insertData))
					{
						
						echo "inserted successfully";
					}else{
						echo $purchase->getErrorMessage();
					}
				}else{
					$errors = $purchase->errors;
				}


			}

			// $this->redirect('purchases');
			
		}

		$this->view('purchases.import', ['errors' => $errors]);
	}

	function report()
	{
		$this->view('purchasereport');
	}
}