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
		$this->load->view('0',$data);
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
		$this->load->view('sale_start');
	}

   public function quick()
   {
      $json=$this->input->post('jsonInfo');
      $json=json_encode($json);
      $data['jsonInfo']=$json;
      $this->load->view('sale_quick',$data);
   }

	public function user()
	{
		$json=$this->input->post('jsoninfo');
      $json=json_encode($json);
		$data['jsoninfo']=$json;
		$this->load->view('sale_user',$data);
	}

	public function succ()
	{
      $this->session->sess_destroy();
		$json=$this->input->post('jsoninfo');
      // $json=json_encode($json);
      $data['jsoninfo']=$json;
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

      $this->load->view('buy_main',$data);
   }

   public function SBP($page,$perSize,$prop,$val)
   {
      $this->load->model('BookModel');
      $pageNum=$this->BookModel->countPage($perSize);
      if ($prop == 'all') {
         $resp=$this->BookModel->findAll($page,$perSize);
      }
      else {
         $resp=$this->BookModel->findByPropertyWithLimit($page,$perSize,$prop,$val);
      }
      
      $data['prop']=$prop;
      $data['val']=$val;
      $data['result']=$resp;
      $data['pageNum']=$pageNum;
      $data['currPage']=$page;
      $data['perSize']=$perSize;

      $this->load->view('buy_main',$data);
   }

   public function SBF($page,$perSize,$prop)
   {
      $this->load->model('BookModel');
      $pageNum=$this->BookModel->countPage($perSize);
      $val=$this->input->get('isbn');
      $resp=$this->BookModel->findByPropertyWithLimit($page,$perSize,$prop,$val);

      $data['prop']=$prop;
      $data['val']=$val;
      $data['result']=$resp;
      $data['pageNum']=$pageNum;
      $data['currPage']=$page;
      $data['perSize']=$perSize;

      $this->load->view('buy_main',$data);
   }

	public function showbook($bid)
	{
		$this->load->model('BookModel');
		$resp=$this->BookModel->findBookByBid($bid);
		$data['row']=$resp;
		$this->load->view('buy_showbook',$data);
	}

	public function buy($bid)
	{
		$this->load->model('BookModel');
		$resp=$this->BookModel->findBookByBid($bid);
		$data['row']=$resp;
		$this->load->view('buy_userinfo',$data);
	}

	public function pay()
	{
		$json=$this->input->post('jsoninfo');
		$jobid="a23rr";
		$data['jsoninfo']=$json;
		$data['jobid']=$jobid;
		$this->load->view('buy_pay',$data);
	}

	public function calluser($jobid)
	{
		$this->load->view('4');
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
