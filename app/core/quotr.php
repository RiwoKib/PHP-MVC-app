<?php

require '../vendor/autoload.php';


class Quotr {
  /*** [PART 1] QUOTR DATA ***/

  
  private $pdfPath = __DIR__ . DIRECTORY_SEPARATOR . "PDF" . DIRECTORY_SEPARATOR;

  // (B) FLAGS & TEMP
  private $template = "simple"; // QUOTATION TEMPLATE TO USE
  private $data = null; // TEMP DATA TO GENERATE QUOTATION

  // (C) QUOTATION DATA
  // (C1) COMPANY HEADER - CHANGE TO YOUR OWN!
  private $company = [
    UPLOADED . "/bilkensQuoteLogo.png",
    '',
    "Bilkens Enterprises",
    "Langata Park 2",
    "Phone: 0704-488-355",
    "Email: bilkense@gmail.com"
  ];

  // BANK DETAILS 
  private $bankDetails = [
    "",
    "Bilkens Enterprises Limited",
    "KES Account: 0100007932442",
    "USD Account: 0100007932469",
    "STANBIC BANK",
    "Chiromo Branch",
    "SBICKENX"
  ];

  // (C2) HEADERS - QUOTATION #, DATE OF PURCHASE, DUE DATE
  private $head = [];

  // (C3) CUSTOMER
  private $customer = [];

  // () PAYMENT
  private $payment = [];

  // (C4) ITEMS - NAME, DESCRIPTION, QTY, PRICE EACH, SUB-TOTAL
  private $items = [];

  // (C5) TOTALS - NAME, AMOUNT
  private $totals = [];

  private $shipping = [];
  private $companyInfo = [];
  // (C6) EXTRA FOOTER NOTES, IF ANY
  private $notes = [];

  // (C7) ACCEPTANCE SEGMENT
  private $accept = true;

  // (D) QUOTATION DATA YOGA
  // (D1) ADD () : ADD QUOTATION DATA
  // PARAM $type : type of data (as above - head, customer, items, etc...)
  //       $data : data to add
  function add ($type, $data) {
    if (!isset($this->$type)) { exit("Not a valid data type - $type"); }
    $this->$type[] = $data;
  }

  // (D2) SET() : TOTALLY REPLACE QUOTATION DATA
  // PARAM $type : type of data (as above - head, billto, items, etc...)
  //       $data : data to set
  function set ($type, $data) {
    if (!isset($this->$type)) { exit("Not a valid data type - $type"); }
    $this->$type = $data;
  }

  // (D3) GET () : GET QUOTATION DATA
  // PARAM $type : type of data (as above - head, billto, items, etc...)
  function get ($type) {
    if (!isset($this->$type)) { exit("Not a valid data type - $type"); }
    return $this->$type;
  }

  // (D4) RESET () : RESET QUOTATION DATA
  function reset () {
    $this->company = [];
    $this->head = [];
    $this->payment = [];
    $this->shipping = [];
    $this->customer = [];
    $this->items = [];
    $this->companyInfo = [];
    $this->totals = [];
    $this->bankDetails = [];
    $this->notes = [];
    $this->template = "simple";
    $this->data = null;
  }

  /*** [PART 2] QUOTATION TEMPLATE + OUTPUT ***/
  // (E) TEMPLATE () : USE THE SPECIFIED TEMPLATE
  function template ($template="simple") {
    $this->template = $template;
  }

  // (F) OUTPUTDOWN () : HELPER FUNCTION FOR FORCE DOWNLOAD
  //  $file : filename
  //  $size : file size (optional)
  function outputDown ($file="quotation.html", $size="") {
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"$file\"");
    header("Expires: 0");
    header("Cache-Control: must-revalidate");
    header("Pragma: public");
    if (is_numeric($size)) { header("Content-Length: $size"); }
  }


  // (H) OUTPUTPDF() : OUTPUT IN PDF
  // $mode : 1 = show in browser
  //         2 = force download (provide the file name in $save)
  //         3 = save on server (provide the absolute path and file name in $save)
  // $save : output filename
  function outputPDF ($mode=1, $save = "sample_quotation.pdf") {
    // (H1) LOAD LIBRARY
    $mpdf = new \Mpdf\Mpdf();

    // (H2) LOAD TEMPLATE FILE
    $file = $this->pdfPath . $this->template . ".php";
    if (!file_exists($file)) { exit("$file not found."); }
    $this->data = "";
    require $file;

    // (H3) OUTPUT
    switch ($mode) {
      // (H3-1) SHOW IN BROWSER
      default: case 1:
        $mpdf->Output();
        break;

      // (H3-2) FORCE DOWNLOAD
      case 2:
        $mpdf->Output($save, "D");
        break;

      // (H3-3) SAVE FILE ON SERVER
      case 3:
        $mpdf->Output($save);
        break;
    }
  }

}
