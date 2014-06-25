<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MAIL extends CI_Controller {

	function Mail()
	{
		parent::__construct();
		$this->load->helper('url');
      $this->load->library('mailer');
      $this->load->library('session');
	}

	public function index()
	{
		$data['title']='index';
      $data['last']=0;
		$this->load->view('0',$data);
	}

	public function call($type,$bid)
	{
      $this->load->model('BookModel');
      $this->load->model('BizModel');
      
      $resp=$this->BizModel->findAll();
      
      foreach ($resp as $key => $value) {
         $b = $value->bid;
         $i = $this->BookModel->findBookByBid($b);
         $resp[$key]->saler=$i[0]->contact;
         if ($b == $bid) {
            $currBiz = $resp[$key];
         }
      }

      $usr = $this->session->userdata('uid');
      $this->load->model('UserModel');
      $ui=$this->UserModel->getUserInfo($usr);
      $acc = (float)$ui->acc;
      $data['acc']=$acc;
      $data['last']=0;

		$this->load->view('4',$data);    
      
      $mail_body = "";
      foreach ($currBiz as $key => $value) {
         $mail_body = $mail_body . $key . " => " . $value . "\n";
      }
      
      $this->mailer->sendmail(
            'gezishudian@163.com',
            'gezishudian@163.com',
            '有新订单 '.date('Y-m-d H:i:s'),
            $mail_body
         );  

      // $config['protocol'] = 'smtp';
      // $config['smtp_host'] = 'smtp.live.com';
      // $config['smtp_user'] = 'fang zheng';
      // $config['smtp_pass'] = 'hotmail8624';

      // $this->email->initialize($config);

      // $this->email->from("fz0420@hotmail.com",'fang zheng');
      // $this->email->to("528762624@qq.com");//2421473442@qq.com
      // $this->email->subject('Here is your info');
      // $this->email->message('Hi Here is the info you requested.');
      
      // $this->email->send();

      // echo $this->email->print_debugger();
	}

}
