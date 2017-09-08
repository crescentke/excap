<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WiFi Login</title>
<style type="text/css">
h1{
font-family:Arial, Helvetica, sans-serif;
color:#999999;
}
.wrapper{width:600px; margin-left:auto;margin-right:auto;}
.welcome_txt{
	margin: 20px;
	background-color: #EBEBEB;
	padding: 10px;
	border: #D6D6D6 solid 1px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
}
.tw_box{
	margin: 20px;
	background-color: #FFF0DD;
	padding: 10px;
	border: #F7CFCF solid 1px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
}
.tw_box .image{ text-align:center;}

.tweetList{
	margin: 20px;
	padding:20px;
	background-color: #E2FFF9;
	border: #CBECCE solid 1px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
}
.tweetList ul{
	padding: 0px;
	font-family: verdana;
	font-size: 12px;
	color: #5C5C5C;
}
.tweetList li{
	border-bottom: silver dashed 1px;
	list-style: none;
	padding: 5px;
}
.btn-twitter, .btn-twitter:focus, .btn-twitter:hover{border-radius: 100px;
    box-shadow: none;
    cursor: pointer;
    font-size: 14px;
    font-weight: bold;
    line-height: 20px;
    padding: 6px 16px;
    position: relative;
    text-align: center;
    white-space: nowrap;
	background-color: #1da1f2;
border: 1px solid #1da1f2;
color: #fff;
margin: 0 5px;
}
.btn-facebook, .btn-facebook:focus, .btn-facebook:hover{border-radius: 100px;
    box-shadow: none;
    cursor: pointer;
    font-size: 14px;
    font-weight: bold;
    line-height: 20px;
    padding: 6px 16px;
    position: relative;
    text-align: center;
    white-space: nowrap;
	background-color: #4267b2;
border: 1px solid #4267b2;
color: #fff;
margin: 0 5px;
}
p.error{font-size: 16px;color: #EA4335;}
</style>
<link rel="stylesheet" href="<?= base_url('dist/css/bootstrap.min.css') ?>">
</head>
<body class="text-center">
	<h1>WiFi Login</h1>
<?php
if(!empty($error_msg)){
	echo '<p class="error">'.$error_msg.'</p>';
}
?>

<?php
if(!empty($userData)){
	$outputHTML = '
		<div class="wrapper">
			<h4>User Profile Details </h4>
			<div class="welcome_txt">Welcome <b>'.$userData['first_name'].'</b></div>
			<div class="tw_box">
				<p class="image"><img src="'.$userData['picture_url'].'" alt="" width="300" height="220"/></p>
				<p><b>Name : </b>'.$userData['first_name'].' '.$userData['last_name'].'</p>
				<p><b>Twitter Profile Link : </b><a href="'.$userData['profile_url'].'" target="_blank">'.$userData['profile_url'].'</a></p>
				<p><b>You are login with : </b>Twitter</p>
				<p><b>Logout from <a href="'.base_url().'index.php/welcome/logout">Log Out</a></b></p>';
	$outputHTML .= '</div>
		</div>';
}else{
	$outputHTML = '<a class="btn-twitter" href="'.$oauthURL.'">Twitter</a><a class="btn-facebook" href="'.$authUrlFB.'">Facebook</a>';
}
?>
<?php echo $outputHTML; ?>
</body>
</html>
