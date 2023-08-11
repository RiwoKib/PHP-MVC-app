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