<?php
//登录拉勾网，爬取一定条件的招聘信息
$curl = curl_init();
//登录数据 $data
$data = 'user_name=xxxx&password=xxxxxx&remember=1';

curl_setopt($curl, CURLOPT_URL, 'http://www.xxxx.com/user/login');  //登录url自己找，笨蛋
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  //执行之后不直接打印出来，curlopt_returntransfer 设置为true即可

/*************登录相关，cookie相关设置，此设置必须在所有会话之前设置********************/
date_default_timezone_set('PRC');  //时区
curl_setopt($curl, CURLOPT_COOKIESESSION, true);  //设置session支持
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookiefile');  //session取数据设置
curl_setopt($curl, CURLOPT_COOKIEJAR, 'coolkiefile');  //session存数据设置
curl_setopt($curl, CURLOPT_COOKIE, session_name().'='.session_id());
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);  //设置让curl支持页面链接跳转

curl_setopt($curl, CURLOPT_POST, 1);    //post类型请求
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);  //请求参数
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    "application/x-www-form-urlencoded;charset=utf-8",
    "Content-length:".strlen($data)
));    //http请求设置

curl_exec($curl);   //执行成功之后，就是登录成功
//可以请求，想要抓取的数据
curl_setopt($curl, CURLOPT_URL, 'http://www.aaa.com/work/lists');
curl_setopt($curl, CURLOPT_POST, 0); //如果不是post请求，则设置为不是post请求
curl_setopt($curl, CURLOPT_HTTPHEADER, "Content-type:text-xml"); //并且清除HTTPHEADER

$output= curl_exec($curl);   //再次执行
curl_close($curl);
echo $output;


