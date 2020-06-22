<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
table,td,th{
	border:#6F9 solid 2px;
	}
table{
	width:980px;
	margin:auto;
	font-size:18px;
	background:#cc99bb;
	}
</style>
</head>

<body>
<?php
	$link=@mysql_connect('localhost','root','') or die('数据库连接失败！！！');
	mysql_query('use data0401') or die('数据库选择失败？');
	mysql_query('set names utf8');
	//求总记录数
	$rs=mysql_query('select count(*) from products');
	$rows=mysql_fetch_row($rs);//将资源数匹配成索引数组
	$recordcount=$rows[0];	//总记录数
	echo $recordcount;		
	//var_dump($rs);
	/*$rows=mysql_fetch_row($rs);
	echo $rows[1].'<br>';
	$rows=mysql_fetch_row($rs);
	echo $rows[1].'<br>';
	*/
	$pagecount=ceil($recordcount/$pagesize);
	echo $pagecount;
?>
<table>
<tr bgcolor="#FFFF33">
      <th width="50">编号</th>
      <th width="180">商品名称</th>
      <th width="180">规格</th>
      <th width="100">价格</th>
      <th width="100">库存量</th>
      <th width="80">图片</th>
      <th>网址</th>
    </tr>
  </table></th>
</tr>
</table>
<table>
<?php
/*（mysql_fetch_object）开始匹配时候指针指向第一个纪录，取出资源中的一条数据，匹配成对象，一条记录是一个对象，一个字段就是一个属性，指针下移一条*/
//在PHP中通过->符号调用对象的属性
while($rows=mysql_fetch_object($rs)){
	echo '<tr>';
	echo '<td width="50">'.$rows -> proID.'</td>';
	echo '<td width="180">'.$rows -> proname.'</td>';
	echo '<td width="180">'.$rows -> proguide.'</td>';
	echo '<td width="100">'.$rows -> proprice.'</td>';
	echo '<td width="100">'.$rows ->promount.'</td>';
	echo $rows ->proimages =='' ? '<td>图片暂缺</td>' : '<td width="80"><img src="'.$rows ->proimages.'"/></td>';
	echo '<td>'.$rows ->proweb.'</td>';
	echo '</tr>';
	}	

mysql_free_result($rs);	
?>
</table>
</body>
</html> 