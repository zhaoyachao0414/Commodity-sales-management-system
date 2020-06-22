<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>

<style type="text/css">
table{
		width:1280px;
		border:#000 solid 5px;
		margin:auto;
		border-collapse:collapse;
}

td{
	border:#f00 solid 2px;
	text-align:center;
	}
</style>
</head>

<body>
<table>
    <tr>
   		<?php
        for($i=1;$i<=50;$i++){
			echo '<td><img src="picture/('.$i.').png" width="88" height="66"  alt="big"/></td>>';
			if($i % 10 == 0)
			{
				echo '</tr><tr>';
			}
			}
		?>
    </tr>
    
</table>
</body>
</html>