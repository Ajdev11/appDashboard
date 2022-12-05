
<?php
	session_start();

require_once "connect.php";
require_once "rbkdata.php";

//$connec = new Connection;
$rdata = new bkdata;

if (isset($_POST['getuser'])) {
	$uname = $_POST['getuser'];
	$codename = $rdata -> codeme($uname);
	$_SESSION['uname'] = trim($codename);
	$userDetail = $rdata -> getuser($codename);
	if($userDetail == 'N'){
		echo $userDetail;
	}else{
		$sQues = $userDetail['sQues'];
		$_SESSION['qAns'] = $userDetail['qAns'];
    	echo $sQues;
	}
	
}

if (isset($_POST['veruser'])) {
	$upw =$_POST['veruser'];
	
	$codepwd = $rdata -> codepas($upw);
	$qAns = $_SESSION['qAns'];
	// echo $codepwd . " / " . $qAns;
	if(trim($codepwd) != trim($qAns)){
		echo "N";
	}else{
		echo 'Verified';
	}
}