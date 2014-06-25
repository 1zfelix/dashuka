<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TbModel extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('BaseDAO');
    }
    
    public function find($tid)
    {
        $query=$this->db->query("SELECT * FROM tb WHERE tid = '$tid' ");
        $c=count($query->result());
        if ($c>0) {
            return 'y';
        }
        else {
            $info['tid']=$tid;
            $this->db->insert('tb',$info);
            return 'n';
        }
    }
}