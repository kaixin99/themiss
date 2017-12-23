<?php


//获取本月月初和月末的时间戳
$start = strtotime(date("Y-m-d H:i:s",mktime(0, 0 , 0,date("m"),1,date("Y"))));
$end =  strtotime(date("Y-m-d H:i:s",mktime(23,59,59,date("m"),date("t"),date("Y"))));

//获取上月月初和月末的时间戳（如果是1月查询上年12月）
if(date("m")=="01"){
	//获取上一年和上一年12月的天数
	$year = date("Y")-1;
	$d = $year."-12";
	$day = date("t",strtotime($d));
	$begin = mktime(0,0,0,12,1,$year);
	$end = mktime(23,59,59,12,$day,$year);
}else{
	//获取上一月和上一月的最后一天
	$month = date("m")-1;
	$d = date("Y")."-".$month;
	$day = date("t",strtotime($d));
	$begin = mktime(0,0,0,$month,1,date("Y"));
	$end = mktime(23,59,59,$month,$day,date("Y"));
}

==========================================================================

//去除二维数组重复的值并把其他值相加
$container = array();
$result = array();
foreach ($order as $item) {
	$key = $item['ctime'] . '_' . $item['type'];
	if (empty($container[$key])) {
		$container[$key] = $item['price'];
	} else {
		$container[$key] += $item['price'];
	}
}
foreach ($container as $key => $item) {
	list($ctime, $type) = explode('_', $key);
	$result[] = array('ctime' => $ctime, 'type' => $type, 'price' => $item);
}
最初数组 													//遍历以后
array (size=6)												array (size=5)
0 =>														0 => 
	array (size=3)												array (size=3)
	  'ctime' => string '11-18' (length=5)							'ctime' => string '11-18' (length=5)
	  'type' => string '原产地直供' (length=15) 					'type' => string '原产地直供' (length=15)
	  'price' => string '30' (length=2)								'price' => string '30' (length=2)
1 => 														1 => 
	array (size=3)												array (size=3)
	  'ctime' => string '11-15' (length=5)							'ctime' => string '11-15' (length=5)
	  'type' => string '菜场' (length=6)							'type' => string '菜场' (length=6)
	  'price' => string '20' (length=2)								'price' => string '20' (length=2)
2 =>  														2 => 
	array (size=3) 												array (size=3)
	  'ctime' => string '11-10' (length=5)							'ctime' => string '11-10' (length=5)
	  'type' => string '原产地直供' (length=15) 					'type' => string '原产地直供' (length=15)
	  'price' => string '40' (length=2) 							'price' => string '40' (length=2)
3 => 														3 => 
	array (size=3) 												array (size=3)
	  'ctime' => string '11-05' (length=5)							'ctime' => string '11-05' (length=5)
	  'type' => string '菜场' (length=6)							'type' => string '菜场' (length=6)
	  'price' => string '30' (length=2)								'price' => int 80
4 => 														4 => 
	array (size=3)												array (size=3)
	  'ctime' => string '11-05' (length=5)							'ctime' => string '11-05' (length=5)
	  'type' => string '原产地直供' (length=15)						'type' => string '原产地直供' (length=15)
	  'price' => string '80' (length=2)								'price' => string '80' (length=2)
5 => 
	array (size=3)
	  'ctime' => string '11-05' (length=5)
	  'type' => string '菜场' (length=6)
	  'price' => string '50' (length=2)
	  
==========================================================================

//输出Excel
function exportexcel($data=array(),$title=array(),$filename='report'){
	header("Content-type:application/octet-stream");
	header("Accept-Ranges:bytes");
	header("Content-type:application/vnd.ms-excel");
	header("Content-Disposition:attachment;filename=".$filename.".xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	//导出xls 开始
	if (!empty($title)){
		foreach ($title as $k => $v) {
			$title[$k]=iconv("UTF-8", "GB2312",$v);
		}
		$title= implode("\t", $title);
		echo "$title\n";
	}
	if (!empty($data)){
		foreach($data as $key=>$val){
			foreach ($val as $ck => $cv) {
				$data[$key][$ck]=iconv("UTF-8", "GB2312", $cv);
			}
			$data[$key]=implode("\t", $data[$key]);
		}
		echo implode("\n",$data);
	}
}
/*        <td style='vnd.ms-excel.numberformat:@'>".$printable."</td>/n*/
	$arrordername = array('昵称','姓名','身份证号','手机号','性别','身高','年龄','所在城市','学校','求职意向','测评意向','个人简介','认证状态','钱包余额','邀请码','推荐者邀请码');
	foreach($member_list as $key=>$val){
		$arrorderlist[] = array($val['m_nickname'],$val['m_name'],"身份证号：".$val['id_number'],$val['m_account'],$val['m_sex'],$val['m_height'],$val['age'],$val['m_address'],$val['m_school'],$val['certify'],$val['purpose'],str_replace(array("\r\n", "\r", "\n"),'', $val['m_introduce']),$val['au_status'],$val['m_wallet'],$val['code'],$val['code_num']);
	}
	//dump($arrordername);
	//dump($arrorderlist);
	//exit;
	exportexcel($arrorderlist,$arrordername,'学生表');
==========================================================================

//PC端页面插入视频
第一种：
<video src="movie.ogg" controls="controls">
	您的浏览器不支持 video 标签。
</video>
第二种插入视频封面图：
<video controls poster="./Uploads/{$video['pic']}" width="100%">
	<source src="./Uploads/Video/{$video['video']}" type="video/mp4">
</video>

==========================================================================

//编辑器内容图片更换成绝对路径
public function aboutUs(){
	$where['status'] =  array('neq',9);
	$res = D("About")->where($where)->find();
//        $res1['content'] = $res['content'];
	$content = $res['content'];
	preg_match_all('/src=\"\/?(.*?)\"/',$content,$match);
	foreach($match[1] as $key => $src){
		if(!strpos($src,'://')){
			$content = str_replace('/'.$src,'http://'.$_SERVER['HTTP_HOST']."/".$src."\" width=80% height=au" , $content);
		}
	}
	$res1['content'] = $content;
	apiResponse('success','获取成功',$res1);
}
	
==========================================================================
	
//编辑器内容
if (get_magic_quotes_gpc()) {
	$list['desc'] = stripslashes($_POST['desc']);
} else {
	$list['desc'] = $_POST['desc'];
}
	
	
==========================================================================

/*
    *   两个经纬度之间的距离
    *  @param float $lat 纬度值
    *  @param float $lng 经度值
    */
function getDistance($lat1,$lng1,$lat2,$lng2){
    $earthRadius = 6367000;
    $lat1 = ($lat1 * pi() ) / 180;
    $lng1 = ($lng1 * pi() ) / 180;
    $lat2 = ($lat2 * pi() ) / 180;
    $lng2 = ($lng2 * pi() ) / 180;
    $calcLongitude = $lng2 - $lng1;
    $calcLatitude = $lat2 - $lat1;
    $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);
    $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
    $calculatedDistance = $earthRadius * $stepTwo / 1000;
    return round($calculatedDistance,1);
}


==========================================================================

/**
 * 过滤掉html标签 2013-8-3 15:06:38
 * */
function filterHtml($str){
	if(is_array($str)){
		foreach($str as $key => $val){
			$str[$key] = sstripslashes(preg_replace("/(\<[^\<]*\>|\r|\n|\s|\&nbsp;|\[.+?\])/is", '', $val));
		}
	}else{
		$str = preg_replace("/(\<[^\<]*\>|\r|\n|\s|\&nbsp;|\[.+?\])/is", '', $str);
	}
	return $str;
}
foreach($list['list'] as $k=>$v){
	$list['list'][$k]['about'] = mb_substr(filterHtml($v['about']), 0, 10, 'utf-8');
	$list['list'][$k]['content'] = mb_substr(filterHtml($v['content']), 0, 20, 'utf-8');
}

==========================================================================

/**
 * curl获取接口信息，这个是万能的调用微信api方法的函数，可以自定的加载url，然后返回你想得到的数据
 * @url  要访问api地址
 * @data 默认get请求(请求数据url拼接使用http_build_query()函数)  如果是post请求data为请求数据的数组
 */
function httpsRequest($url,$data = null){
    //初始化，创建一个新cURL资源
    $curl = curl_init();
    //设置URL和相应的选项
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    //将curl_exec()获取的信息以文件流的形式返回，而不是直接输出
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return json_decode($output,true);
}
 $data['m_id'] = 1;
 $data['type'] = 1;
 $get = http_build_query($data);
 $url = "http://house.txunda.com/index.php/Api/Bank/bankList?".$get;
 $url =
 $a = httpsRequest($url);
 var_dump($a);
 
=====================================================================================================
?>