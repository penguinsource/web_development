<!-- <!DOCTYPE html>           // HTML5 -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<title>
	410 Asn3
</title>
<link rel="stylesheet" type="text/css" href="design.css">

<!-- include the php and javascript functions -->
<?php include 'signupFuncs.php'; ?>
<script type="text/javascript" src="signup.js"></script>

</head>

<body onload="clearCookies()">

<div id="centerPageContainer">

<div id="titleContainer">
	<p class="title"> Sign Up </p>
</div>

<div id="bodyContainer">
	<H2>	Customer Identification</H2>
	
	<p id="register"> Fields with <span id=red > * </span> are mandatory  </p>
	
	<form name="register" onsubmit="return validateForm()" method="get">
	
	<div id="registerFields"> 
	
	<table>
	<tr>
        <td> Access: </td>
        <td> <select name="access"> 
             <option value="admin">Admin</option>
             <option value="user">User</option>
             </select>
        </td>
    </tr>
	<tr>
		<td> Name </td>
		<td> <input type="text" name="Name" id="Name"> <span id=red > * </span> </td>
	</tr>
	<tr>
		<td> Address </td>
		<td> <input type="text" name="Address" id="Address"> </td>
	</tr>
	<tr>
		<td> City </td>
		<td> <input type="text" name="City" id="City"> </td>
	</tr>
	<tr>
		<td> Postal Code </td>
		<td> <input type="text" name="PostalCode" id="PostalCode"> </td>
	</tr>
	<tr>
		<td> Email </td>
		<td> <input type="text" name="Email" id="Email"> <span id=red > * </span> </td>
	</tr>
	<tr>
		<td> Birth Date </td>
		<td> <input type="text" name="BirthDate" id="BirthDate"> </td>
		<td> (YYYY-MM-DD) </td>
	</tr>
	
	</table>
	
	<input name="registerSubmit" type="submit" value="Submit">
	
	</div>
	</form>
    <hr>
    
    <form name="login" method="get">
    <div class="loginField">
    
    <h2> Or Login</h2>
    <p id="register"></p>
    <table>
        <tr>
        <td>Name: &nbsp; &nbsp; &nbsp; &nbsp;</td>
        <td><input type="text" name="loginName" id="loginName"> </td>
        </tr>
    </table>
    
    <input name="loginSubmit" type="submit" value="Submit">
    </div>
	</form>
	
	<?php //------------------------------------ PHP GET REQUEST
		// validate registration variables
		if (isset($_GET["registerSubmit"])) {
			echo "checking registration.."; // . $_GET["loginName"];
			validateRegistration();
			// process the form contents...
		}
		
		// check if login is correct in database..
		if (isset($_GET["loginSubmit"])) {
			echo "checking login..";
			validateLogin();
			// process the form contents...
		}
	?>
	
</div>


</div>


</body>

</html>

