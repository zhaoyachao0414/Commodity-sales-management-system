<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>

<style type="text/css">
table,td,th{
	border:#6F9 solid 2px;}
table{
	width:500px;
	margin:auto;
	font-size:25px;
	background:#cc99bb;}
</style>
</head>

<body>
<?php
@$id=$_GET['id'];   //获取需要修改的数据编号   
echo $id;
mysql_connect('localhost','root','') or die("数据库连接失败");
mysql_query('use data0401') or die("数据库选择失败");
mysql_query('set names utf8');

//执行修改业务逻辑
if(isset($_POST['button1']))
{
	$proname=$_POST['proname'];
	$proguide=$_POST['proguide'];
	$proprice=$_POST['proprice'];
	$promount=$_POST['promount'];
	$proimages=$_POST['proimages'];
	$proweb=$_POST['proweb'];
	
	//拼接SQL语句
	$sql="update products set proname='$proname',proguide='$proguide',proprice='$proprice',promount='$promount',proimages='$proimages',proweb='$proweb' where proid=$id";
	echo $sql;
	if(mysql_query($sql))
	{
		echo '修改成功';
		header('location:admine.php');
	}
	else
	{
		echo '修改失败';
		exit();
	}
}

//取出id对应的商品信息
$sql="select * from products where proid=$id";
$rs=mysql_query($sql);
@$rows=mysql_fetch_assoc($rs);   //因为就一条数据，所以不用循环
?>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="500" border="1" align="center">
    <tr>
      <td colspan="2" align="center"><h3><strong>修改商品</strong></h3></td>
    </tr>
    <tr>
      <td><strong>商品名称：</strong></td>
      <td align="center"><label for="proprice"></label>
      <input type="text" name="proname" id="proname" value="<?php echo $rows['proname']?>"/></td>
    </tr>
    <tr>
      <td><strong>规格：</strong></td>
      <td align="center"><label for="proguide"></label>
      <input type="text" name="proguide" id="proguide" value="<?php echo $rows['proguide']?>"/></td>
    </tr>
    <tr>
      <td><strong>价格：</strong></td>
      <td align="center"><label for="proprice"></label>
      <input type="text" name="proprice" id="proprice" value="<?php echo $rows['proprice']?>"/></td>
    </tr>
    
    <tr>
      <td><strong>库存量：</strong></td>
      <td align="center"><label for="promount"></label>
      <input type="text" name="promount" id="promount" value="<?php echo $rows['promount']?>"/></td>
    </tr>
    <tr>
      <td><strong>图片地址：</strong></td>
      <td align="center"><label for="textfield4"></label>
      <input type="text" name="proimages" id="textfield4" value="<?php echo $rows['proimages']?>"/></td>
    </tr>
    <tr>
      <td><strong>网址：</strong></td>
      <td align="center"><label for="proimages"></label>
      <input type="text" name="proweb" id="proimages" value="<?php echo $rows['proweb']?>"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="button1" id="button" value="修改" />
      <input type="button" name="button2" id="button2" value="返回" onclick="location.href='admine.php'"/></td>
    </tr>
  </table>
</form>
</body>
</html>
