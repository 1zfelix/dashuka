<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PriceModel extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    public function cal($opr)
    {
        $opr = floatval($opr);
        if ($opr <= '5.0') {
            $npr = 5;
        }
        else if (5.0 < $opr && $opr <= 10.0) {
            $npr = ceil($opr) + 3;
        }
        else if (10.0 < $opr && $opr <= 15.0) {
            $npr = ceil($opr) + 4;
        }
        else if (15.0 < $opr && $opr <= 20.0) {
            $npr = ceil($opr) + 5;
        }
        else{
            $npr = ceil($opr*1.25);
        }
        return $npr;
    }
}