<?php

require '../vendor/autoload.php';


function get_val($key,$default = "")
{

	if(isset($_POST[$key]))
	{
		return $_POST[$key];
	}

	return $default;
}

function get_selected($key,$value)
{
	if(isset($_POST[$key]))
	{
		if($_POST[$key] == $value)
		{
			return "selected";
		}
	}

	return "";
}

function esc($var)
{
	return htmlspecialchars($var);
}

function show($data)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

function get_date($date)
{

	return date("Y-m-d", strtotime($date));
}

function makeCode($table)
    {	
		switch($table)
		{
			case 'suppliers':
				return "SUPL_".rand(0001,9999);
				break;
			case 'customers':
				return "CTM_".rand(001,999);
				break;
			case 'expenses':
				return "EXP_".rand(0001,9999);
				break;
			case 'products':
				return "PD_".rand(0001,9999);
				break;
			case 'categories':
				return "CT_".rand(001,555);
				break;
			case 'purchases':
				return "PT_".rand(001,555);
				break;
			case 'sales':
				return "SLE_".rand(0001,4444);
				break;
			default:
				return false;
		} 	
    }

function handleImageUpload()
    {
        $uploadDir = UPLOADS . "/";
        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');

		if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
			$tmpName = $_FILES['image']['tmp_name'];
			$originalName = $_FILES['image']['name'];
			$extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
	
			// Check if the uploaded file has an allowed extension
			if (!in_array($extension, $allowedExtensions)) {
				echo "Error: Unsupported file type.";
				return null;
			}
	
			// Generate a unique filename to avoid overwriting existing files
			$uniqueName = uniqid('image_', true) . '.' . $extension;
			$destination = $uploadDir . $uniqueName;
	
			// Move the uploaded file to the desired location
			if (move_uploaded_file($tmpName, $destination)) {
				echo "Uploaded image destination: " . $destination . "<br>";
				return basename($destination);
			} else {
				echo "Error: Unable to move uploaded file.";
				return null;
			}
		} else {
			echo "Error uploading the image.";
			return null;
		}
    }


function extractDataFromExcel($file)
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($file);
       	// Get the active sheet
		$worksheet = $spreadsheet->getActiveSheet();

		// Get the highest row number with data
		$highestRow = $worksheet->getHighestRow();

		// Assuming the header is in the first row (row 1)
		$data = [];
		for ($row = 2; $row <= $highestRow; ++$row) {
			$rowData = $worksheet->rangeToArray('A' . $row . ':' . $worksheet->getHighestColumn() . $row, null, true, false);
			$data[] = $rowData[0];
		} 

        return $data;
    }


	