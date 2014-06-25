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
        $query=$this->db->query("SELECT * FROM book WHERE status = 's' LIMIT $beg,$perSize");
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
        $query=$this->db->query("SELECT * FROM book WHERE $prop like '%$val%' AND status = 's' LIMIT $beg,$perSize");
        return $query->result();
    }

    public function findMapping($db,$srcp,$srcv,$tarp)
    {
        $query=$this->db->query("SELECT $tarp FROM $db WHERE $srcp = '$srcv'");
        return $query->result_array();
    }

    public function countAll($db,$prop,$val)
    {
        $query=$this->db->query("SELECT * FROM $db WHERE $prop = '$val'");
        return count($query->result());
    }

    public function findAll($db,$prop,$val)
    {
        $query=$this->db->query("SELECT * FROM $db WHERE $prop = '$val'");
        return $query->result();
    }

    public function setProperty($db,$srcp,$srcv,$tarp,$tarv)
    {
        $query=$this->db->query("UPDATE $db SET $tarp = '$tarv' WHERE $srcp = '$srcv'");
        // return $query->result();
        return null;
    }
}