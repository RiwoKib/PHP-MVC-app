<?php

require '../vendor/autoload.php';
require "../app/core/quotr.php";


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

function get_expiryDate($date)
{
	
	$initialDate = new DateTime($date);

	// Add 30 days
	$initialDate->add(new DateInterval('P30D'));

	$formattedDate = $initialDate->format('Y-m-d');

	return $formattedDate; 

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
			case 'quotation':
				return "QT_".rand(0001,4444);
				break;
			case 'transfers':
				return "TR_".rand(0001,4444);
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

function generatePdf($DATA)
{
	// (B) SET QUOTATION DATA
	
	// (J) "START" QUOTR
	$quotr = new Quotr();

	// (B2) QUOTATION HEADER
	$quotr->set("head", [
		["QUOTATION #", $DATA[1]['quote_ID']],
		["Valid From", $DATA[1]['entry']],
		["Valid Till", $DATA[1]['expiry']]
	]);

	// (B3) CUSTOMER
	$quotr->set("customer", [
		$DATA[2]['firstname'] ." ".$DATA[2]['lastname'],
		$DATA[1]['city'] ." ". $DATA[1]['zipcode'],
		$DATA[1]['address'],
		0 ."".$DATA[2]['phone_number'],
		$DATA[2]['email']
	]);

	// // (B4) ITEMS - ADD ONE-BY-ONE
	// $items = [
	// 	["Rubber Hose", "5m long rubber hose", 3, "$5.50", "$16.50"],
	// 	["Rubber Duck", "Good bathtub companion", 8, "$4.20", "$33.60"],
	// 	["Rubber Band", "", 10, "$0.10", "$1.00"],
	// 	["Rubber Stamp", "", 3, "$12.30", "$36.90"],
	// 	["Rubber Shoe", "For slipping, not for running", 1, "$20.00", "$20.00"]
	// ];

	// show($DATA[0]);
	foreach ($DATA[0] as $key => $i) { $quotr->add("items", $i); }

	// show($i);

	// // (B5) ITEMS - OR SET ALL AT ONCE
	// $quotr->set("items", $items);

	// (B6) TOTALS
	$quotr->set("totals", [
		["SUB-TOTAL", "KSh" . $DATA[1]['total']],
		["Shipping", "KSh" . $DATA[1]['shipping_cost']],
		["GRAND TOTAL", "KSh" . $DATA[2]['grand_total']]
	]);

	// (B7) NOTES, IF ANY
	$quotr->set("notes", [
		"This quotation is not an invoice and it is non-contractual.",
		"YOUR TERMS AND CONDITIONS HERE."
	]);

	// (B8) INCLUDE SIGN-OFF ACCEPTANCE
	//$quotr->set("accept", true);

	// (C) OUTPUT
	// (C1) CHOOSE A TEMPLATE
	$quotr->template("blueberry");
	// $quotr->template("banana");
	// $quotr->template("blueberry");
	// $quotr->template("lime");
	// $quotr->template("simple");
	// $quotr->template("strawberry");

	// (C3) OUTPUT IN PDF
	// 1 : DISPLAY IN BROWSER (DEFAULT)
	// 2 : FORCE DOWNLOAD
	// 3 : SAVE ON SERVER
	$quotr->outputPDF(3, EXPORTED . "/quote.pdf");
	// $quotr->outputPDF(1);
	// $quotr->outputPDF(2, "QUOTATION.pdf");
	// $quotr->outputPDF(3, __DIR__ . DIRECTORY_SEPARATOR . "QUOTATION.pdf");

	// (D) USE RESET() IF YOU WANT TO CREATE ANOTHER ONE AFFTER THIS
	// $quotr->reset();
}

	