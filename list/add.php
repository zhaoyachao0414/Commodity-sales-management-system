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
	width:500px;
	margin:auto;
	font-size:25px;
	background:#cc99bb;
	}
</style>

<script type="text/javascript">
function check()
{
	//商品名称
	var proname=document.getElementById('proname');
	if(proname.value=='')
	{
		alert('商品名称不能为空');
		proname.focus();      //获得焦点
		return false;
	}
	//验证商品规格
	var proguide=document.getElementById('proguide');
	if(proguide.value=='')
	{
		alert('商品规格不能为空');
		proguide.focus();
		return false;	
	}
	//验证商品价格
	var proprice=document.getElementById('proprice');
	if(proprice.value=='' || isNaN(proprice.value))
	{
		alert('商品价格必须是一个数字');
		proprice.focus();
		proprice.select();  //选中内容
		return false;
	}
	//验证库存量
	var promount=document.getElementById('promount');
	if(promount.value=='' || isNaN(promount.value) || promount.value.indexOf('.')!=-1)
	{
		alert('库存量必须是一个整数');
		promount.focus();
		promount.select();
		return false;
	}
}
</script>
</head>

<body background="">
<?php
if(isset($_POST['button'])){
	$proname=$_POST['proname'];
	$proguide=$_POST['proguide'];
	$proprice=$_POST['proprice'];
	$promount=$_POST['promount'];
	$proimages=$_POST['proimages'];
	$proweb=$_POST['proweb'];
	//连接数据库
	mysql_connect('localhost','root','') or die('数据库连接失败！！！');
	mysql_query('use data0401') or die('数据库选择失败？');
	mysql_query('set names utf8');
	//拼接一个sql语句
	$sql="insert into products values(null,'$proname','$proguide','$proprice','$promount','$proimages','$proweb')";
	echo $sql;
	//执行SQL语句
	if(mysql_query($sql))
	{	
		echo '插入成功';
		header('location:admine.php');  //跳转到admine.php
	}
	else
	{
		echo '插入失败';
	}
}
?>
<form action="" method="post" onsubmit=" return check()" enctype="multipart/form-data" name="form1" id="form1">
  <table width="500" border="1" align="center">
    <tr>
      <td colspan="2" align="center"><h3><strong>添加商品</strong></h3></td>
    </tr>
    <tr>
      <td><strong>商品名称：</strong></td>
      <td align="center"><label for="proprice"></label>
      <input type="text" name="proname" id="proname" /></td>
    </tr>
    <tr>
      <td><strong>规格：</strong></td>
      <td align="center"><label for="proguide"></label>
      <input type="text" name="proguide" id="proguide" /></td>
    </tr>
    <tr>
      <td><strong>价格：</strong></td>
      <td align="center"><label for="proprice"></label>
      <input type="text" name="proprice" id="proprice" /></td>
    </tr>
    
    <tr>
      <td><strong>库存量：</strong></td>
      <td align="center"><label for="promount"></label>
      <input type="text" name="promount" id="promount" /></td>
    </tr>
    <tr>
      <td><strong>图片地址：</strong></td>
      <td align="center"><label for="textfield4"></label>
      <input type="text" name="proimages" id="textfield4" /></td>
    </tr>
    <tr>
      <td><strong>网址：</strong></td>
      <td align="center"><label for="proimages"></label>
      <input type="text" name="proweb" id="proimages" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="button" id="button" value="提交" />
      <input type="button" name="button2" id="button2" value="返回" onclick="location.href='admine.php'"/></td>
    </tr>
  </table>
</form>
</body>
</html>