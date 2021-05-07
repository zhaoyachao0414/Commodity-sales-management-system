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
	//连接数据库
	$link=@mysql_connect('localhost','root','') or die('数据库连接失败！！！');
	//选择数据库：方法一
	mysql_query('use data0401') or die('数据库选择失败？');
	//选择数据库：方法二
	
//设置字符编码
	mysql_query('set names utf8');
	//mysql_select_db('data0401') or die('mysql_error');
	//获取data0401表数据
	$rs=mysql_query('select * from products');
	var_dump($rs);
	/*$rows=mysql_fetch_row($rs);
	echo $rows[1].'<br>';
	$rows=mysql_fetch_row($rs);
	echo $rows[1].'<br>';
	*/
?>
<table>
<tr bgcolor="#FFFF33">
      <th width="50">编号</th>
      <th width="180">商品名称</th>
      <th width="180">价格</th>
      <th width="100">规格</th>
      <th width="100">库存量</th>
      <th width="80">图片</th>
      <th>网址</th>
    </tr>
  </table></th>
</tr>
</table>
<table>
<?php
//循环取出，取出一条记录匹配成索引数组
while($rows=mysql_fetch_row($rs)){
	echo '<tr>';
	echo '<td width="50">'.$rows[0].'</td>';
	echo '<td width="180">'.$rows[1].'</td>';
	echo '<td width="180">'.$rows[2].'</td>';
	echo '<td width="100">'.$rows[3].'</td>';
	echo '<td width="100">'.$rows[4].'</td>';
	echo $rows[5]=='' ? '<td>图片暂缺</td>' : '<td width="80"><img src="'.$rows[5].'"/></td>';
	echo '<td>'.$rows[6].'</td>';
	echo '</tr>';
	}	
?>
</table>
</body>
</html> 
