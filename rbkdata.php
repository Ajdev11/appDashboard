<?php
// session_start();
	
class bkdata extends Connections
{

	public function codeme($uname) //List states
	{
		$oru = "";
		$mix = substr($uname, 1, 2);
		$mix2 = substr($uname, 3, 2);
		$uname = $mix2 . $mix . $uname;
		$uname = strrev($uname);
		$i = strlen($uname);
		// echo($uname);
		for ($x = 0; $x < $i; $x++) {
			$digi = substr($uname, $x, 1);
			$sql = "SELECT DISTINCT oruk FROM oruko where digi = BINARY '$digi'";
			$result = $this->connect()->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				while ($row = $result->fetch_assoc()) {
					$coruk = $row["oruk"];
					$oru = $oru . $coruk;
					//echo $oru."<br>";
				}
			}
		}  //For ends here
		return $oru;
		//echo $oru."<br>";

	}

	public function codepas($upwd) //List states
	{
		$pas = "";
		$mix = substr($upwd, 1, 2);
		$mix2 = substr($upwd, 4, 2);
		$upwd = $mix2 . $mix . $upwd;
		$upwd = strrev($upwd);
		$i = strlen($upwd);
		for ($x = 0; $x < $i; $x++) {
			$digi = substr($upwd, $x, 1);

			$sql = "SELECT oruk FROM oruko where digi = BINARY '$digi'";
			$result = $this->connect()->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				while ($row = $result->fetch_assoc()) {
					$cpas = $row["oruk"];
					$pas = $pas . $cpas;
				}
			}
		} //For ends here
		return $pas;
	}
	public function savepwd($codename, $codepwd, $lev, $codeques, $codeans, $uid){

		//($codename, $codepwd, $lev,  $codeques, $codeans, $uid)
		$query = "INSERT INTO pade (uname, upw, ulev, sQues, qAns, uid) VALUES ('$codename', '$codepwd', '$lev', '$codeques', '$codeans', '$uid')";
		
        if  ($this->connect()->query($query) === TRUE) {
            return "Y";
        }else{
            return "N";
        }
	}

public function savereg($pName, $pMobile, $pEmail, $dob, $fname, $sch, $oname, $lname, $uname, $fullname){
        $query = "INSERT INTO appusers (pName, pMobile, pEmail, dob, fname, sch, oname, lname, uname, fullname) VALUES ('$pName', '$pMobile', '$pEmail', '$dob', '$fname', '$sch', '$oname', '$lname', '$uname', '$fullname')";
        var_dump($query);
        // die();
        if  ($this->connect()->query($query) === TRUE) {
            return "Y";
        }else{
            return "N";
        }
    }

	public function loguser($codename, $codepwd){
		$query = "SELECT  * FROM pade WHERE uname = '$codename' AND upw = '$codepwd'"; 
		//return $query;
        $result = $this->connect()->query($query);
         $num_rows = $result->num_rows;
 
         if ($num_rows > 0) {
             while ($rows = $result->fetch_assoc()) {
                 $data = $rows;
             }
             return $data;
         }else{
			return "N";
		 }
	}

	public function savevideo($vfile, $oru){
		$query = "UPDATE pade SET vtype ='$vfile' WHERE upw='$oru'";
        if  ($this->connect()->query($query) === TRUE) {
            return "Y";
        }else{
            return "N";
        }

	}

	
	public function getuser($codename){

		$query = "SELECT  * FROM pade WHERE uname = '$codename'"; 
		//return $query;
        $result = $this->connect()->query($query);
         $num_rows = $result->num_rows;
 
         if ($num_rows > 0) {
             while ($rows = $result->fetch_assoc()) {
                 $data = $rows;
             }
             return $data;
         }else{
			return "N";
		 }
	}

	public function resetpwd($codepwd, $codename){
		$codename = trim($codename);
		$query = "UPDATE pade SET upw = '$codepwd' WHERE uname =' $codename'";
		var_dump($query);
    die();
        if  ($this->connect()->query($query) === TRUE) {
            return "Your password has been successfully changed";
        }else{
            return "N";
        }
	}

	public function getcontest(){
		$query = "SELECT  * FROM appusers "; 
		//return $query;
        $result = $this->connect()->query($query);
         $num_rows = $result->num_rows;
 
         if ($num_rows > 0) {
             while ($rows = $result->fetch_assoc()) {
                 $data[]= $rows;
             }
             return $data;
         }else{
			return "N";
		 }
	}

	public function getLcontest(){
		$query = "SELECT  * FROM appusers  LIMIT 10"; 
		//return $query;
        $result = $this->connect()->query($query);
         $num_rows = $result->num_rows;
 
         if ($num_rows > 0) {
             while ($rows = $result->fetch_assoc()) {
                 $data[]= $rows;
             }
             return $data;
         }else{
			return "N";
		 }
	}
	public function getL2contest(){
		$query = "SELECT  * FROM appusers  LIMIT 100"; 
		//return $query;
        $result = $this->connect()->query($query);
         $num_rows = $result->num_rows;
 
         if ($num_rows > 0) {
             while ($rows = $result->fetch_assoc()) {
                 $data[]= $rows;
             }
             return $data;
         }else{
			return "N";
		 }
	}

	public function getVideo($user){

		$query = "SELECT  vtype FROM pade WHERE uname = '$user' AND vtype != 'NULL'"; 
		//return $query;
        $result = $this->connect()->query($query);
         $num_rows = $result->num_rows;
 
         if ($num_rows > 0) {
             while ($rows = $result->fetch_assoc()) {
                 $data = $rows;
             }
             return $data;
         }else{
			return "N";
		 }
	}

	public function setHits(){

		$query = "SELECT  hit FROM hits" ; 
		
        $result = $this->connect()->query($query);
         $num_rows = $result->num_rows;
         $rows = $result->fetch_assoc();
                 $data = $rows['hit'];
             	$data++;
             	$query = "UPDATE hits SET hit ='$data' WHERE id = 1";
        		$this->connect()->query($query);
             
        
	}
	public function getHits(){

		$query = "SELECT  hit FROM hits" ; 
		
        $result = $this->connect()->query($query);
         $num_rows = $result->num_rows;
         $rows = $result->fetch_assoc();
         $data = $rows['hit'];
         return $data;
        
	}

	public function getReg(){

		$query = "SELECT COUNT(appusers.fname) FROM appusers" ; 
		
        // $query = "SELECT COUNT(chreg.ustate) AS $mem FROM chreg";
        $result = $this->connect()->query($query);
        $num_rows = $result->num_rows;
        if ($num_rows > 0) {
            while ($rows = $result->fetch_assoc()) {
                $data =$rows;
            }
            return $data;
        }
        
	}

	public function getUp(){

		$query = "SELECT COUNT(pade.uname) FROM pade WHERE vtype != 'Null'" ; 
		
        // $query = "SELECT COUNT(chreg.ustate) AS $mem FROM chreg";
        $result = $this->connect()->query($query);
        $num_rows = $result->num_rows;
        if ($num_rows > 0) {
            while ($rows = $result->fetch_assoc()) {
                $data =$rows;
            }
            return $data;
        }
        
	}

	
	//---------------
}
