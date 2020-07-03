<?php
 //解析GET参数
 $sOp = $_GET['op'];
 $sData = $_GET['data'];
 $sData = str_replace(' ', '+', $sData);
 $sData = base64_decode($sData);
 //初始化返回字符串
 $sRsData = '';
 //如果是请求数据
 if ($sOp=='get')
 {
    $arrData = json_decode($sData, true); 
	$sType = $arrData['dataType'];
	//处理请求运费列表
	if ($sType == 'spPrice')
	{
	   $sRsData = '[{"type":"顺丰快递","price":"20元"},{"type":"邮政快递","price":"15元"},'
          .'{"type":"普通快递","price":"10元"}]';
	}
	//处理请求商品列表
	else if ($sType == 'prdList')
	{
	   $sSearch = $arrData['searchValue'];
	   //带条件过滤商品
	   if ($sSearch != '') 
	   {
          $sRsData = '['
            .'{"name":"华为mate20","price":"799","description":"2018年的旗舰手机"},'
            .'{"name":"华为P40","price":"299","description":""}'
            .']';
		}
		//返回全部商品
        else
		{
          $sRsData = '['
            .'{"name":"华为mate20","price":"799","description":"2018年的旗舰手机"},'
            .'{"name":"华为mate20X","price":"699","description":"大屏的mate20,支持20倍数码变焦"},'
            .'{"name":"华为P40","price":"299","description":""},'
            .'{"name":"华为P40pro+","price":"199","description":"最新旗舰,拍照全球第一"}'
            .']';
		}	
	}
 }
 //如果是提交数据
 else if ($sOp == 'pos')
 {
    if ($sData != '')
	{
	   $sRsData = '{"code":"0","msg":"提交成功"}';
	}
 }
 $sRsData = base64_encode($sRsData);
 $sRsData = '{"data":"'.$sRsData.'"}';
 echo $sRsData;
?>