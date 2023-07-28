<?php


/**
 * Cities controller
 */
class Cities extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$cities = new City();

		$data = $cities->findAll();

		$this->view('cities', ['rows' => $data]);
	}


    function add()
    {
		$errors = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		if(isset($_POST['addCity']))
		{
			$data = array(
				'city_name' => $_POST['name'],
				'region_name' => $_POST['region'],
				'status' => $_POST['status'],
				'description' => $_POST['desc']);

			$add = new City();

			if($add->validate(($data)))
			{

				$data['status'] = intval($data['status']);

				if($add->insert($data))
				{
					$this->redirect('cities');
				}else{
					echo "Unable to add city ".$add->getErrorMessage();
				}
			}else{
				$errors = $add->errors;
			}
		}

		$country = new Country();
		$countries = $country->findAll(); 

        $this->view('cities.add', ['countries' => $countries,
									'errors' => $errors]);
    }

	function edit($id= null)
    {
		$errors = array();
		$update = new City();

		$city = $update->where('id', $id);

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		if(isset($_POST['updateCity']))
		{
			$data = array(
				'city_name' => $_POST['name'],
				'region_name' => $_POST['region'],
				'status' => $_POST['status'],
				'description' => $_POST['desc']);

			

			if($update->validate(($data)))
			{

				$data['status'] = intval($data['status']);

				if($update->update($id, $data))
				{
					$this->redirect('cities');
				}else{
					echo "Unable to update city ".$update->getErrorMessage();
				}
			}else{
				$errors = $update->errors;
			}
		} 

        $this->view('cities.update', ['row' => $city,
									'errors' => $errors]);
    }
}