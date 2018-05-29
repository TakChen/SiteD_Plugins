<?php
header("Content-type: text/html; charset=utf-8");
set_time_limit(0);
@mkdir("sited_xml");
$json=file_get_contents("sited_plugins.json");
$json=json_decode($json,true);
for($i=0;$i<count($json);$i++){
	if($json[$i]["url"]){
		$url=@base64_decode(@array_pop(explode("::",$json[$i]["url"])));
		$title=$json[$i]["name"];
		$content=file_get_contents($url);
		$title=mb_convert_encoding($title,'gbk' ,'utf-8' );
		file_put_contents("sited_xml/".$title.".sited",$content);
		echo $url;
		//var_dump($json[$i]);
	}
	
}
