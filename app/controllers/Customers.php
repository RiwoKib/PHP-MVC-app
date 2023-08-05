<?php


/**
 * Customers controller
 */
class Customers extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$customers = new Customer();

		$data = $customers->findAll();

		$this->view('customers', ['rows' => $data]);
	}

    function add()
    {
		$errors = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		if(isset($_POST['addCustomer']))
		{
			$data = array(
                'firstname' => $_POST['fname'], 
                'lastname' => $_POST['lname'],
                'email' => $_POST['email'], 
                'phone_number' => $_POST['phone'], 
                'city' => $_POST['city'], 
                'address' => $_POST['address'], 
            );

			$add = new Customer();
		
			if($add->validate($data))
			{ 	
				// 	$data['phone_number'] = intval($_POST['phone']);  

				$data['customer_code'] = makeCode('customers'); 

				if($add->insert($data))
				{
					$this->redirect('customers');
				}else{
					echo "Unable to add customer ".$add->getErrorMessage();
				}
			}else{
				$errors = $add->errors;
			} 
		}

		$city = new City();
		$cities = $city->findAll();

        $this->view('customers.add', [	'cities' => $cities,
										'errors' => $errors]);
    }

	function edit($id = null)
	{			
		$errors = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}
		
		$customer = new Customer();	 
		$data = $customer->where('id',$id);	 
		
		if(isset($_POST['updateCustomer']))
		{
			$data = array(
                'firstname' => $_POST['fname'], 
                'lastname' => $_POST['lname'],
                'email' => $_POST['email'], 
                'phone_number' => $_POST['phone'], 
                'city' => $_POST['city'], 
                'address' => $_POST['address'], 
            );	  	 
			
			if($customer->validate($data))
			{  
				
				if($customer->update($id, $data))
				{
					$this->redirect('customers');
				}else{
					echo "Unable to update customer". $customer->getErrorMessage();
				}
				}else{
				$errors = $customer->errors;
			}

			
		} 

		$city = new City();
		$cities = $city->findAll();
		
		$this->view('customer.update', [	'cities' => $cities,
											'row' => $data, 	
											'errors' => $errors]);

	}

	function report()
	{
		$this->view('customerreport');
	}
}