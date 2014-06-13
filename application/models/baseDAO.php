<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class BaseDAO extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function findAllWithLimit($page,$perSize)
    {
        $beg=($page-1)*$perSize;
        $query=$this->db->query("SELECT * FROM book LIMIT $beg,$perSize");
        return $query->result();
    }

    public function findByProperty($prop,$val)
    {
        $query=$this->db->query("SELECT * FROM book WHERE $prop like '%$val%'");
        return $query->result();
    }

    public function findByPropertyWithLimit($page,$perSize,$prop,$val)
    {
        $beg=($page-1)*$perSize;
        $query=$this->db->query("SELECT * FROM book WHERE $prop like '%$val%' LIMIT $beg,$perSize");
        return $query->result();
    }
}