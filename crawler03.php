<?php
//实例化 调用接口获取天气
$data = 'theCityName=s上海';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://www.webxml.com.
cn/WebServices/WeatherWebService.asmx/getWeatherbyCityName");
curl_setopt($curl, CURLOPT_HEADER, 0);  //不显示header
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  //不直接打印
curl_setopt($curl, CURLOPT_POST, 1);    //是post请求方式
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);  //设置请求参数
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    "application/x-www-form-urlencoded;charset=utf-8",
    "Content-length: " . strlen($data)
)); //http请求内容设置
//执行
$output = curl_exec($curl);
if (!curl_errno($output)) {
    echo $output;
} else {
    echo 'Curl error:' . curl_error($output);
}
//关闭
curl_close($curl);

