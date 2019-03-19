<?php
session_start();
	if(!(isset($_SESSION)&&$_SESSION["AUTH"]==true))
	{
		session_destroy();
		header("Location: business.php");
		die();
	}
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");


// following files need to be included
require_once("PaytmKit/lib/config_paytm.php");
require_once("PaytmKit/lib/encdec_paytm.php");
require_once("conn.php");
$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<h1 align='center' color='green'><b>Transaction status is success</b>" . "<br/><b>You will soon recive an acknowledgement mail...<b></h1>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		if (isset($_POST) && count($_POST)>0 )
	{ 
		$ORDERID = $_POST["ORDERID"];
		$TXNID = $_POST["TXNID"];
		$RESPCODE = $_POST["RESPCODE"];
		$BANKTXNID = $_POST["BANKTXNID"];
		$RESPMSG = $_POST["RESPMSG"];
		$TXNDATE  = $_POST["TXNDATE"];
		$TXNAMOUNT = $_POST["TXNAMOUNT"];
		$GATEWAYNAME = $_POST["GATEWAYNAME"];
		$TEAMID = substr($ORDERID, 7);
		$sql = "INSERT INTO txndetails (ORDERID, TXNID, RESPCODE, BANKTXNID, RESPMSG, TXNDATE, TXNAMOUNT, GATEWAYNAME, TEAMID)
		VALUES ('".$ORDERID."', '".$TXNID."', '".$RESPCODE."', '".$BANKTXNID."', '".$RESPMSG."', '".$TXNDATE."', ".$TXNAMOUNT.", '".$GATEWAYNAME."', ".$TEAMID.")";
		$conn->exec($sql);
		// use exec() because no results are returned
		$sql = "UPDATE team SET OrderId='".$ORDERID."', PaymentStatus=1 WHERE TeamID='".$TEAMID."'";
		$conn->exec($sql);
		$to = $_SESSION["Email"];
		$subject = "Welcome To The Board Team ".$_SESSION['TeamName']." ($ORDERID)";

	$message = "
	<html>
	<head>
	<title>Welcome To The Board Team ".$_SESSION['TeamName']."($ORDERID)</title>
	</head>
	<body>
	<p>This email is in refference to your Succesfull Registration For KGEC E-SUBMMIT Order No. <b><u>$ORDERID</b></u></p>
	<p>This Mail Confirms that Payment of Rs 500/- have been accepted by us and your team, ".$_SESSION["TeamName"]." consisting of ".$_SESSION["TeamSize"]." member(s) is registered for the event. Your Team ID is <b><u>BPL".date("Y").$_SESSION["id"]."</u></b></p>
	<p>Your Registered Email Address ". $_SESSION["Email"] ." is and registered phone number is ".$_SESSION["Phone"]."</p>
	<p>For any further query mail us at <a href='mailto:kgececellenquiry@gmail.com?Subject=(TeamId. ".$_SESSION["id"].")' >kgececellenquiry@gmail.coml</a></p>
	<p>
	With Regards,<br/>
	Event Coordinator,<br/>
	KGEC-Ecell
	</p>
	</body>
	</html>
	";

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: <noreply@kgececell.com>' . "\r\n";
	$headers .= 'Cc: convenor@kgececell.com' . "\r\n";

	mail($to,$subject,$message,$headers);
	
	}
	
	}
	else {
		echo "<h1 align='center' color='red'><b >Transaction status is failure</b>" . "<br/></h1><h2 align='center'>Money(if deducted) will be added shortly back in your account.</h2>";
	}
		if (isset($_POST) && count($_POST)>0 )
	{ 
		$ORDERID = $_POST["ORDERID"];
		$TXNID = $_POST["TXNID"];
		$RESPMSG = $_POST["RESPMSG"];
		$RESPMSG = $_POST["RESPMSG"];
		$TXNAMOUNT = $_POST["TXNAMOUNT"];
		$STATUS = $_POST["STATUS"];
		$to = "convenor@kgececell.com";
		$subject = "Failed Transaction With OrderID($ORDERID) and TransactionId($TXNID)";

		$message = "
		<html>
		<head>
		<title>Failed Transaction With OrderID($ORDERID) and TransactionId($TXNID)</title>
		</head>
		<body>
		<p>
		<table>
		<tr><th>ORDERID</th><td>$ORDERID</td></tr>
		<tr><th>TXNID</th><td>$TXNID</td></tr>
		<tr><th>RESPMSG</th><td>$RESPMSG</td></tr>
		<tr><th>STATUS</th><td>$STATUS</td></tr>
		<tr><th>TXNAMOUNT</th><td>$TXNAMOUNT</td></tr>
		</table>
		</p>
		</body>
		</html>
		";

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: <noreply@kgececell.com>' . "\r\n";
		
	mail($to,$subject,$message,$headers);
	}

	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}
session_destroy();
?>
<script>

    window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "https://kgececell.com/";

    }, 2000);

</script>

