<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserModel extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('BaseDAO');
    }
    
    public function findUser($usr)
    {
        $cnt = $this->BaseDAO->countAll('user','usr',$usr);
        if ($cnt == 0) {
            return false;
        }
        return true;
    }

    public function checkPwd($usr,$pwd)
    {
        $obj = $this->BaseDAO->findMapping('user','usr',$usr,'pwd');
        $stdpwd = $obj[0]->pwd;
        if ($stdpwd == $pwd) {
            return true;
        }
        else {
            return false;
        }
    }

    public function getUserInfo($usr)
    {
        $obj = $this->BaseDAO->findAll('user','usr',$usr);
        return $obj[0];
    }
}