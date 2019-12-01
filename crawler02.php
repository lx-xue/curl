<?php
//实例化
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,'http://www.baidu.com');  //设置访问资源的url
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true); //设置为执行之后不直接打印出来

//执行
$output = curl_exec($curl);
//关闭
curl_close($curl);

//随意操作
echo str_replace('百度','ttttt',$output);
