<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GO extends CI_Controller {

	function Go()
	{
		parent::__construct();
		$this->load->helper('url');
      $this->load->library('session');
	}

	public function welcome()
	{
		$this->load->view('welcome_message');
	}
	public function index()
	{
		$data['title']='index';
      $data['last']=0;
		$this->load->view('0',$data);
	}

   public function admin()
   {
      $this->load->model('BookModel');
      $this->load->model('BizModel');
      
      $resp=$this->BizModel->findAll();
      
      foreach ($resp as $key => $value) {
         $b = $value->bid;
         $i = $this->BookModel->findBookByBid($b);
         // $s[$b] = $i[0]->contact;
         $resp[$key]->saler=$i[0]->contact;
      }
      $data['result']=$resp;
      // $data['saler']=$s;
      
      $data['last']=0;

      $this->load->view('admin',$data);
   }

/*/////////////////////////////////////////////////////*/


   public function logstatus()
   {
      $uid = $this->session->userdata('uid');
      if ($uid) {
         echo $uid;
      }
      else {
         echo 'n';
      }
   }

   public function login()
   {
      $usr = $this->input->post('usr');
      $pwd = $this->input->post('pwd');
      $this->load->model('UserModel');
      $ret1 = $this->UserModel->findUser($usr);
      if ($ret1) {
         $ret2 = $this->UserModel->checkPwd($usr,$pwd);
         if ($ret2) {
            $this->session->set_userdata(
               array(
                  'uid'=>$usr,
               )
            );
            $data[0]='y';
            $data[1]=$usr;
            if ($usr == 'felixadmin') {
               $data[0]='a';
            }
            
         }
         else {
            $data[0]='p';
         }     
      }
      else {
         $data[0]='u';
      }
      echo json_encode($data);
   }

   public function logout()
   {
      $this->session->unset_userdata('uid');   
      echo 'y';
   }

   public function register()
   {
      $usr = $this->input->get('usr');
      $pwd = $this->input->get('pwd');

      $this->load->model('UserModel');
      $ret1 = $this->UserModel->findUser($usr);
      if ($ret1) {
         $data[0]='u';   
      }
      else {
         $this->UserModel->addUser($usr,$pwd);
         $this->session->set_userdata(
               array(
                  'uid'=>$usr,
               )
            );
         $data[0]='y';
         $data[1]=$usr;
      }
      echo json_encode($data);
   }


   public function goToRegPage()
   {
      $data['last']=0;
      $this->load->view('regPage',$data);
   }

/*/////////////////////////////////////////////////////*/


   public function ajaxsess()
   {
      $in = $this->input->post('newsess');
      $this->session->unset_userdata('booksAdded');

      if ($in) {
         $this->session->set_userdata(
            array(
               'booksAdded' => $in,
            )
         );
         echo $this->session->userdata('booksAdded');
      }
      else {
         $this->session->set_userdata(
            array(
               'booksAdded' => '',
            )
         );
         echo 'n';
      }
   }

   public function getsess()
   {
      if ($this->session->userdata('booksAdded')){
         echo $this->session->userdata('booksAdded');
      }
      else {
         echo '';
      }
   }

	public function bookrec()
	{
      $in = $this->input->post('added');
      $this->session->unset_userdata('booksAdded');
      if ($in) {
         $this->session->set_userdata(
            array(
               'booksAdded' => $in,
            )
         );
      }
      $data['last']=0;
		$this->load->view('sale_start',$data);
	}

   public function quick()
   {
      $json=$this->input->post('jsonInfo');
      $json=json_encode($json);
      $data['jsonInfo']=$json;
      $data['last']=0;
      $this->load->view('sale_quick',$data);
   }

	public function user()
	{
		$json=$this->input->post('jsoninfo');
      $json=json_encode($json);
		$data['jsoninfo']=$json;
      $data['last']=0;
		$this->load->view('sale_user',$data);
	}

	public function succ()
	{
      $this->session->sess_destroy();
		$json=$this->input->post('jsoninfo');
      // $json=json_encode($json);
      $data['jsoninfo']=$json;
      $data['last']=0;
		$this->load->view('sale_succ',$data);

      $this->load->model('BookModel');
      $data=$this->BookModel->addBook($json);
	}


/*/////////////////////////////////////////////////////*/


   public function booklist($page,$perSize)
   {
      $this->load->model('BookModel');
      $pageNum=$this->BookModel->countPage($perSize);
      $resp=$this->BookModel->findAll($page,$perSize);

      $data['result']=$resp;
      $data['pageNum']=$pageNum;
      $data['currPage']=$page;
      $data['perSize']=$perSize;
      $data['last']=0;

      $this->load->view('buy_main',$data);
   }

   public function SBP($page,$perSize,$prop,$val)
   {
      $this->load->model('BookModel');
      $pageNum=$this->BookModel->countPage($perSize);
      if ($prop == 'all') {
         $resp=$this->BookModel->findAll($page,$perSize);
      }
      else if ($prop == 's') {
         $prop1 = 'isbn';
         $prop2 = 'name';
         $prop3 = 'authors';
         $val = $this->input->post('sval');
         if ($val == '') $val = 0;
         $resp1=$this->BookModel->findByPropertyWithLimit($page,$perSize,$prop1,$val);
         $resp2=$this->BookModel->findByPropertyWithLimit($page,$perSize,$prop2,$val);
         $resp3=$this->BookModel->findByPropertyWithLimit($page,$perSize,$prop3,$val);
         $resp = $resp1;
         if ($resp1 != null) {
            $resp = $resp1;
         }
         else if ($resp2 != null) {
            $resp = $resp2;
         }
         else if ($resp3 != null) {
            $resp = $resp3;
         }
      }
      else {
         $resp=$this->BookModel->findByPropertyWithLimit($page,$perSize,$prop,$val);
      }
      // var_dump($resp);var_dump($val);
      $data['prop']=$prop;
      $data['val']=$val;
      $data['result']=$resp;
      $data['pageNum']=$pageNum;
      $data['currPage']=$page;
      $data['perSize']=$perSize;
      $data['last']=0;

      $this->load->view('buy_main',$data);
   }

   public function checkSold($bid)
   {
      $this->load->model('BookModel');
      // $this->load->model('BizModel');
      // $this->BizModel->addBizItem($bid);
      $resp=$this->BookModel->checkStatusByBid($bid);
      if ($resp[0]['status'] == 's') {
         $this->BookModel->setStatus2Pay($bid);
      }
      // var_dump($resp);
      echo $resp[0]['status'];
   }

   public function checkPaid($type,$bid,$ca)
   {
      $this->load->model('BizModel');
      if ($type == '0') {
         $this->BizModel->setStatus($bid,'p');
         $this->load->model('UserModel');
         $usr = $this->session->userdata('uid');
         $ui = $this->UserModel->getUserInfo($usr);
         $ca = (float)$ui->acc-(float)$ca;
         $this->UserModel->setAcc($usr,$ca);
      }
      else {
         $this->BizModel->setStatus($bid,'l');
      }
      
      echo 'y';
      
   }

	public function showbook($bid)
	{
		$this->load->model('BookModel');
		$resp=$this->BookModel->findBookByBid($bid);
		$data['row']=$resp;
      $data['last']=0;
		$this->load->view('buy_showbook',$data);
	}

	public function buy($bid)
	{
		$this->load->model('BookModel');
		$resp=$this->BookModel->findBookByBid($bid);
		$data['row']=$resp;
      $data['last']=0;
		$this->load->view('buy_userinfo',$data);
	}

	public function pay()
	{
		$this->load->model('BookModel');
      $json=$this->input->post('jsoninfo');
      // var_dump($json);
      $resp=$this->BookModel->findBookByBid(json_decode($json)->bid);
      // $resp[0]->price = (float)$resp[0]->price;

      $this->load->model('UserModel');
      $usr=$this->session->userdata('uid');
      $ui=$this->UserModel->getUserInfo($usr);

		$data['jsoninfo']=$json;
      $data['bookinfo']=$resp;

      if ($ui!='') {
         $data['acc']=(float)$ui->acc;
      }
      else {
         $data['acc']='';
      }      

      $jsoninfo = json_decode($json);
      $bizinfo = array(
         'bid' => $jsoninfo->bid,
         'name' => $resp[0]->name,
         'usr' => $usr,
         'phone' => $jsoninfo->contact,
         'splace' => $resp[0]->place,
         'place' => $jsoninfo->place,
         'oprice' => $resp[0]->oprice,
         'price' => $resp[0]->price,
         'status' => 'n'
      );
      $this->load->model('BizModel');
      $this->BizModel->addBizItem($bizinfo);
		
      $data['last']='1';
      $this->load->view('buy_pay',$data);
	}

	public function payoffline($jobid)
	{
		$this->load->view('4');
	}

   public function service()
   {
      $this->load->view('4');
   }
}

/* End of file go.php */
/* Location: ./application/controllers/go.php */
