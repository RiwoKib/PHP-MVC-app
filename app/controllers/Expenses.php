<?php


/**
 * expenses controller
 */
class Expenses extends Controller
{
	
	function index()
	{	

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		$expenses = new Expense();

		$data = $expenses->findAll();

		foreach($data as $quote)
		{
			$quote->amount = number_format($quote->amount);
		}

		$this->view('expenses', ['rows' => $data]);
	}

    function add()
    {
		$errors = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}

		if(isset($_POST['addExpense']))
		{
			$data = array(
                'category_name' => $_POST['name'], 
                'start_date' => $_POST['start'],
                'expiry_date' => $_POST['end'], 
                'amount' => $_POST['amount'], 
                'description' => $_POST['desc'], 
                'status' => $_POST['status'], 
            );

			$add = new Expense();
		
			if($add->validate($data))
			{ 	
				$data['status'] = intval($_POST['status']); 
				$data['start_date'] = get_date($_POST['start']);
				$data['expiry_date'] = get_date($_POST['end']); 

				$data['reference_code'] = $add->makeReferenceCode();

				if($add->insert($data))
				{
					$this->redirect('expenses');
				}else{
					echo "Unable to add expense";
				}
			}else{
				$errors = $add->errors;
			}


		}

        $this->view('expenses.add',['errors' => $errors]);
    } 

	function edit($id= null)
	{
		$errors = array();

		if(!Authenticate::logged_in())
		{
			$this->redirect('login');
		}
		
		$expense = new Expense();	 
		$data = $expense->where('id',$id);	 
		
		if(isset($_POST['updateExpense']))
		{
			$data = array(
                'category_name' => $_POST['name'], 
                'start_date' => $_POST['start'],
                'expiry_date' => $_POST['end'], 
                'amount' => $_POST['amount'], 
                'description' => $_POST['desc'], 
                'status' => $_POST['status'], 
            ); 	 
			
			if($expense->validate($data))
			{  
				$data['status'] = intval($_POST['status']); 
				$data['start_date'] = get_date($_POST['start']);
				$data['expiry_date'] = get_date($_POST['end']); 

				
				if($expense->update($id, $data))
				{
					$this->redirect('expenses');
				}else{
					echo "Unable to update expense". $expense->getErrorMessage();
				}
				}else{
				$errors = $expense->errors;
			}

			
		} 

		$this->view('expenses.update',['errors' => $errors,
										'row' => $data]);
	}
 
}