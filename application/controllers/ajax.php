<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AJAX extends CI_Controller {
  function Ajax() {
    parent::__construct();
    $this->load->helper('url');
  }
  /**
   * 发送post请求
   * @param string $url 请求地址
   * @param array $post_data post键值对数据
   * @return string
   */
  function send_post($url, $post_data) {

    $postdata = http_build_query($post_data);
    $options = array(
      'http' => array(
        'method' => 'POST',
        'header' => 'Content-type:application/x-www-form-urlencoded',
        'content' => $postdata,
        'timeout' => 15 * 60 // 超时时间（单位:s）
      )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    return $result;
  }

  public function isbn($d) {
    $url = 'http://api.douban.com/v2/book/isbn/'.$d;
    $resp = file_get_contents($url);
    echo($resp);
  }
}
?>
