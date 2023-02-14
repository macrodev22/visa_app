<?php

namespace App\Libraries;

require_once "dompdf/autoload.inc.php";

use Dompdf\Dompdf;

class Pdf extends Dompdf {
    function __construct($options = null)
    {
        parent::__construct($options);
    }
}

?>