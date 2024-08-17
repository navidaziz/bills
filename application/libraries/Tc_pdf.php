<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/TCPDF/tcpdf.php';

class Tc_pdf extends TCPDF
{

 
	  protected $company;

    public function setCompany($var){
        $this->company = $var;
    }

 
 
	
public function Header()
	{
 
  

	}



	public
	function Footer()
	{
	 
	
 

	}
	
	
}