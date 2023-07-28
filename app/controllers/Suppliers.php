<?php


/**
 * Suppliers controller
 */
class Suppliers extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$supplier = new Supplier();

		$data = $supplier->findAll();

		$this->view('suppliers', ['rows' => $data]);
	}

	function add()
    {
		$errors = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		if(isset($_POST['addSupplier']))
		{
			$data = array(
                'supplier_name' => $_POST['name'], 
                'country' => $_POST['country'],
                'email' => $_POST['email'], 
                'phone_number' => $_POST['phone'], 
                'city' => $_POST['city'], 
                'address' => $_POST['address'],  
                'description' => $_POST['desc'], 
            );

			$add = new Supplier();
		
			if($add->validate($data))
			{ 	
				// 	$data['phone_number'] = intval($_POST['phone']);  

				$data['supplier_code'] = makeCode('suppliers'); 

				if($add->insert($data))
				{
					$this->redirect('suppliers');
				}else{
					echo "Unable to add supplier ".$add->getErrorMessage();
				}
			}else{
				$errors = $add->errors;
			} 
		}

		$city = new City();
		$country = new Country();
		$cities = $city->findAll();
		$countries = $country->findAll();

        $this->view('suppliers.add', [	'countries' => $countries,
										'cities' => $cities,
										'errors' => $errors]);
    }

	function edit($id=null)
    {
		$errors = array();
		

		$update = new Supplier();
		$data = $update->where('id', $id);

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		if(isset($_POST['updateSupplier']))
		{
			$data = array(
                'supplier_name' => $_POST['name'], 
                'country' => $_POST['country'],
                'email' => $_POST['email'], 
                'phone_number' => $_POST['phone'], 
                'city' => $_POST['city'], 
                'address' => $_POST['address'],  
                'description' => $_POST['desc'], 
            );
		
			if($update->validate($data))
			{ 	
				// 	$data['phone_number'] = intval($_POST['phone']);  

				if($update->update($id, $data))
				{
					$this->redirect('suppliers');
				}else{
					echo "Unable to update supplier ".$update->getErrorMessage();
				}
			}else{
				$errors = $update->errors;
			} 
		}

		$city = new City();
		$country = new Country();
		$cities = $city->findAll();
		$countries = $country->findAll();

        $this->view('supplier.update', ['row' => $data,
										'countries' => $countries,
										'cities' => $cities,
										'errors' => $errors]);
    }

	function report()
	{
		$this->view('supplierreport');
	}
}