
<?php
session_start();
$PATH = dirname(__FILE__).'/';
$COOKIEFILE = $PATH.'protect/kk-cookies';
$ch = curl_init();
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
curl_setopt($ch, CURLOPT_CAINFO, $PATH."cacert.pem");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, $COOKIEFILE);
curl_setopt($ch, CURLOPT_COOKIEFILE, $COOKIEFILE);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 120);


$form_field['Username']  = "HP00000008";
$form_field['Password'] = "Aef7e7bf14";
$post_string = '';
foreach($form_field as $key => $value) {
    $post_string .= $key . '=' . urlencode($value) . '&';
}
$post_string = substr($post_string, 0, -1);


curl_setopt($ch, CURLOPT_REFERER, 'http://www.joker138.net/Service/Login');
curl_setopt($ch, CURLOPT_URL, 'http://www.joker138.net/Service/Login');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
$data = curl_exec($ch);

echo $data;

?>
