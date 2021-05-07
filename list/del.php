<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$id = $_GET['id'];
echo $id.'<br>';
//连接数据库
mysql_connect('localhost','root','') or die("数据库连接失败");
mysql_query('use data0401') or die("数据库选择失败");
mysql_query('set names utf8');
//拼接一个SQL语句
$sql="delete from products where proid=$id";
echo $sql.'<br>';
if(mysql_query($sql))
	{
		echo '数据删除成功';
		//header('location:admine.php');	
	}else
	{
		die("数据删除失败！！！！");
	}