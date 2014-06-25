<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TB extends CI_Controller {

	function Tb()
	{
		parent::__construct();
		$this->load->helper('url');
      	$this->load->library('mailer');
      	$this->load->library('session');
	}

	public function taobaoRec($tid)
	{
		// $tid = $this->input->get('taobaoOID');
		$this->load->model('TbModel');
		$r = $this->TbModel->find($tid);
		if ($r == 'y') {
			echo 'u';
			return;
		}

		date_default_timezone_set('PRC');
		$ts = date("Y-m-d H:i:s",time());
		$tsc = date("Y-m-d+H\%3\Ai\%3\As",time());
		
		// echo $ts.' ';
		// echo $tsc.' ';

		$secret = "acb03f791f30cbf77f9a41bb840b626e";
		$a['app_key']="21806534";
       	$a['fields']="payment";
       	$a['format']="json";
       	$a['method']="taobao.trade.get";
       	$a['session']="61012079eba3a2e1c23d81e4575ce8682492200bd4bf050671382586";
       	$a['sign_method']="md5";
       	$a['tid']=$tid;
       	$a['timestamp']=$ts;
       	$a['v']="2.0";

       	$sign = '';
       	foreach ($a as $key => $value) {
       		$sign = $sign.$key.$value;
       	}
		$sign = $secret.$sign.$secret;
		$sign = md5($sign);
		$sign = strtoupper($sign);

		$url = "http://gw.api.taobao.com/router/rest?sign=".$sign."&timestamp=".$tsc."&v=2.0&app_key=21806534&method=taobao.trade.get&partner_id=top-apitools&session=61012079eba3a2e1c23d81e4575ce8682492200bd4bf050671382586&format=json&tid=". $tid."&fields=payment";

		$url1 = 
'http://gw.api.taobao.com/router/rest?sign=CC713855D514CC568CCDB9BA3D336478&timestamp=2014-06-25+22%3A59%3A11&v=2.0&app_key=21806534&method=taobao.trade.get&partner_id=top-apitools&session=61012079eba3a2e1c23d81e4575ce8682492200bd4bf050671382586&format=json&tid='.$tid.'&fields=payment';

		// echo $url;

		$resp = file_get_contents(
	        $url1,
	        false,
	      	stream_context_create(
	        	array(
		            'http' => array(
		                'ignore_errors' => true
		            )
	        	)
	      	)
	    );

		echo $resp;
	}

	public function updateAcc($pay)
	{
		$usr = $this->session->userdata('uid');
		$this->load->model('UserModel');
		$ui=$this->UserModel->getUserInfo($usr);
		$acc = (float)$ui->acc + (float)$pay;
		$newacc = $this->UserModel->setAcc($usr,$acc);
		echo $acc;
	}

	public function getAcc()
	{
		$usr = $this->session->userdata('uid');
		$this->load->model('UserModel');
		$ui=$this->UserModel->getUserInfo($usr);
		$acc = (float)$ui->acc;
		echo $acc;
	}


}


