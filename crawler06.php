<?php
//从本地上传一个文件到ftp服务器
$curl = curl_init();
$fp = fopen('本地文件','r');

curl_setopt($curl, CURLOPT_URL, "ftp://192.168.56.1/test.txt");//上传到ftp的目标文件名
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_TIMEOUT, 300);
curl_setopt($curl, CURLOPT_USERPWD, '123456');  //登录fpt的密码

//设置上传文件
curl_setopt($curl,CURLOPT_UPLOAD,1);    //声明上传文件
curl_setopt($curl,CURLOPT_INFILE,$fp);
curl_setopt($curl,CURLOPT_INFILESIZE,filesize($fp));

$rtn = curl_exec($curl);    //执行结果
fclose($fp);   //关闭文件

if(!curl_errno($curl)){
    echo "上传成功";
}else{
    echo 'curl error'.curl_error($curl);
}

curl_close($curl);


