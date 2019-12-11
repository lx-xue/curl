<?php
//从ftp下载一个文件到本地
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "ftp://192.168.56.1/test.txt");
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_TIMEOUT, 300);
curl_setopt($curl, CURLOPT_USERPWD, '123456');  //登录fpt的密码

//设置输出文件
$outfile = fopen('dest.txt', 'wb'); //保存到本地的文件名
curl_setopt($curl, CURLOPT_FILE, $outfile);

$rtn = curl_exec($curl);    //执行结果
fclose($outfile);   //关闭文件

if(!curl_errno($curl)){
    echo "return".$rtn;
}else{
    echo 'curl error'.curl_error($curl);
}

curl_close($curl);


