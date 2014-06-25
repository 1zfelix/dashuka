<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class BizModel extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('BaseDAO');
    }
    
    public function addBizItem($biz)
    {
        $this->db->insert('biz', $biz);
    }

    public function setStatus($bid,$s)
    {
        $this->BaseDAO->setProperty('biz','bid',$bid,'status',$s);
    }
    
    public function findAll()
    {
        $query=$this->db->query("SELECT * FROM biz");
        return $query->result();
    }
}