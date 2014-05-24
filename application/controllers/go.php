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
		$this->load->view('1');
	}
	public function booklist($page,$perSize)
	{
		$this->load->model('BookModel');
		$pageNum=$this->BookModel->countPage($perSize);
		$data['result']=$this->BookModel->readBook($page,$perSize);
		$data['pageNum']=$pageNum;
		$data['currPage']=$page;
		$data['perSize']=$perSize;
		//$this->load->view('2_1',$data);
		$this->load->view('2',$data);
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

}

/* End of file go.php */
/* Location: ./application/controllers/go.php */