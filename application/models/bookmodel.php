<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class BookModel extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function addBook()
    {
        $info = array(
               'name' => $_POST['name'] ,
               'type'=> $_POST['type'] ,
               'authors'=> $_POST['authors'] ,
               'press' => $_POST['press'] ,
               'school'=> $_POST['school'] ,
               'owner'=> $_POST['owner'] ,
               'contact'=> $_POST['contact'] ,
               'place' => $_POST['place'] ,
               'price' => $_POST['price'] ,
               'pubdate' => $_POST['pubdate'] ,
               'imgurl' => $_POST['imgurl']
            );
        // $code = 
        $this->db->insert('book', $info);
        $data['row']=$info;
        $data['err']="";
        return $data;
    }

    public function readBook($page,$perSize)
    {
        $beg=($page-1)*$perSize;
        $query=$this->db->query("SELECT * FROM book LIMIT $beg,$perSize");
        return $query->result();
    }

    public function countPage($perSize)
    {
        /*
        $query=$this->db->query("SELECT count(*) FROM book");
        $ret=$query->result_array();
        */
        $query=mysql_query("SELECT count(*) FROM book");
        $ret=mysql_fetch_array($query);
        $totalSize=intval($ret[0]);
        $pageNum=ceil($totalSize/$perSize);
        return $pageNum;
    }

    public function findBookById($id)
    {
        return findByProperty('id',$id);
    }

    public function findByProperty($name,$val)
    {
        $query=$this->db->query("SELECT * FROM book WHERE ".$name."=".$val);
        return $query->result();
    }
}