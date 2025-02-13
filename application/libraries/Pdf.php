<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Use Composer's autoloader
require_once FCPATH . 'vendor/autoload.php';

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
}
