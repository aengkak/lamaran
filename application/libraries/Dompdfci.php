<?php

if (!defined("BASEPATH")) exit('No direct script access allowed!');

require_once dirname(__FILE__).'/dompdf/autoload.inc.php';  // Untuk load autoload library Dompdf

use Dompdf\Dompdf; //Karena beda namespace, ini harus dipanggil

class Dompdfci extends Dompdf {
    public function __construct()
    {
        parent::__construct();
    }
}