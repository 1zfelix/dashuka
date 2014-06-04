<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GO extends CI_Controller {

	function Go()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function welcome()
	{
		$this->load->view('welcome_message');
	}
	public function index()
	{
		$this->load->view('0');
	}
	public function bookrec()
	{
		$this->load->view('sale_main');
	}
	public function booklist($page,$perSize)
	{
		$this->load->model('BookModel');
		$pageNum=$this->BookModel->countPage($perSize);
		$resp=$this->BookModel->readBook($page,$perSize);

		$data['result']=$resp;
		$data['pageNum']=$pageNum;
		$data['currPage']=$page;
		$data['perSize']=$perSize;

		$this->load->view('buy_main',$data);
	}
	public function bookstorage()
	{
		$this->load->model('BookModel');
		$data=$this->BookModel->addBook();
		$this->load->view('3',$data);
	}
	public function service()
	{
		$this->load->view('4');
	}
	public function login()
	{
		
	}
    public function ajax() 
    {
    	
    }

   	public function user()
   	{
   		$json=$this->input->post('jsoninfo');
   		$data['jsoninfo']=$json;
   		$data['saletype']='user';
   		$this->load->view('sale_userinfo_new',$data);
   	}

   	public function succ()
   	{
   		$json=$this->input->post('jsoninfo');
   		$data['jsoninfo']=$json;
   		$data['saletype']='user';
   		$this->load->view('sale_userinfo_succ',$data);
   	}

   	public function showbook($id)
   	{
   		$this->load->model('BookModel');
   		$resp=$this->BookModel->findByProperty('id',$id);
   		$data['row']=$resp;
   		$this->load->view('buy_showbook',$data);
   	}

   	public function buy($id)
   	{
   		$this->load->model('BookModel');
   		$resp=$this->BookModel->findByProperty('id',$id);
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
}

/* End of file go.php */
/* Location: ./application/controllers/go.php */
