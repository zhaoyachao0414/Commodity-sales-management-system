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

</head>

<body>
<?php		//判断是否点击登录按钮
if(isset($_POST['button']))
{			//用户输入的用户名和密码
	$username=$_POST['username'];
	$password=$_POST['password'];
	mysql_connect('localhost','root','') or die('???');	//连接数据库
	mysql_select_db('data0401') or die('数据库选择失败？+1');	//选择数据库
	$link=mysql_select_db('data0401');
	mysql_query('set names utf8');	//设置客户端字符编码
	
	$sql="select * from user where username='$username' and password='$password'";
	echo $sql;
	$rs=mysql_query($sql);
	var_dump($rs);
	if(mysql_num_rows($rs) != null)
	{
		echo '登录成功';
		header('location:admine.php');  //跳转到admine.php	
	}
	else
	{
		echo '登录失败！';
	}		
}
if(isset($_POST['button2'])){		//注册
	$username=$_POST['username'];
	$password=$_POST['password'];
	mysql_connect('localhost','root','') or die('???');
	mysql_select_db('data0401') or die('数据库选择失败？+2');
	//$link1=mysql_select_db('data0401');
	mysql_query('set names utf8');
	
	$sql1="insert into user values(null,'$username','$password','m','2000','go')";
	
	$rs1=mysql_query($sql1);
	//var_dump($rs1);
	if($rs1){	//注册成功
		echo "<script>alert('注册成功')</script>";}
	else{
		echo "<script>alert('注册失败')</script>";}
}

	
?>
<form id="form1" name="form1" method="post" action="">
  <table width="500" height="100" border="1" align="center">
    <tr>
      <td colspan="2" align="center" valign="middle">用户登录界面</td>
    </tr>
    <tr>
      <td align="center" valign="middle">用户名：</td>
      <td align="center" valign="middle"><label for="username"></label>
      <input type="text" name="username" id="username" /></td>
    </tr>
    <tr>
      <td align="center" valign="middle">密码:</td>
      <td align="center" valign="middle"><label for="password"></label>
      <input type="password" name="password" id="password" /></td>
    </tr>
    <tr>
      <td align="center" valign="middle">验证码:</td>
      <td align="center" valign="middle"><label for="password"></label>
      <input type="password" name="password" id="password" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="middle"><input type="submit" name="button" id="button" value="提交" />
      <input type="submit" name="button2" id="button2" value="注册" /></td>
    </tr>
  </table>
</form>
</body>
</html>