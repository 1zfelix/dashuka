<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class BookModel extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('BaseDAO');
    }
    
    public function addBook($json)
    {
        $json = json_decode($json);
        $this->load->model('PriceModel');

        foreach ($json->bk as $key => $value) {
            $authorArray = $value->org->author;
            $authorStr = json_encode($value->org->author);
            $priceB = $this->PriceModel->cal($value->usr->price);
            $info = array(
               'bid' => $value->usr->bid,
               'isbn' => $value->usr->isbn,
               'name' => $value->org->title,
               'authors'=> $authorStr,
               'press' => $value->org->publisher,
               'type'=> $value->usr->type,
               'old' => $value->usr->old,
               'pubdate' => $value->usr->pubdate,
               'oprice' => floatval($value->usr->price),
               'price' => $priceB,
               'school'=> '',
               'contact'=> $json->us->contact,
               'place' => $json->us->place,
               'imgurl' => $value->org->image,
               'status' => 's'
            );
            $this->db->insert('book', $info);
        }
    }

    public function countPage($perSize)
    {
        $query=mysql_query("SELECT count(*) FROM book");
        $ret=mysql_fetch_array($query);
        $totalSize=intval($ret[0]);
        $pageNum=ceil($totalSize/$perSize);
        return $pageNum;
    }

    public function findAll($page,$perSize)
    {
        return $this->BaseDAO->findAllWithLimit($page,$perSize);
    }

    public function findByPropertyWithLimit($page,$perSize,$prop,$val)
    {
        return $this->BaseDAO->findByPropertyWithLimit($page,$perSize,$prop,$val);
    }

    public function findBookByBid($bid)
    {
        return $this->BaseDAO->findByProperty('bid',$bid);
    }
    
    public function checkStatusByBid($bid)
    {
        return $this->BaseDAO->findMapping('book','bid',$bid,'status');
    }
    
    public function setStatus2Pay($bid)
    {
        return $this->BaseDAO->setProperty('book','bid',$bid,'status','p');
    }
}