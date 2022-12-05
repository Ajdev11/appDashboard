<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>RBC READING CHALLENGE</title>
  <script>
    function getAge(dat) {
      let dateString = dat;

      if (dateString != " " || dateString == null) {
        let today = new Date();
        let birthDate = new Date(dateString);
        let age = today.getFullYear() - birthDate.getFullYear();
        if (age > 12) {
          alert("Age above the limit");
          return;
        } else if (age < 8) {
          alert("You are below the required age");
          return;
        }
        $("#contdiv").show();
      }
    }

    function validateForm(){
      alert();
      return true;
    }
  </script>
  <link rel="stylesheet" href="css.css">
  <?php
  require_once "sands.php";
  ?>

  <style type="text/css">
    #cont{
      border: solid;
      border-radius: 5px;
      background-color: rgba(60, 100, 80, 0.7);
      color: whitesmoke;
      width: 98%;
      margin: auto;
    }
    *{
      color: black;
    }
  @media only screen and (min-width: 600px) {
    #cont{
      width: 60%;
    }

  }
  </style>
</head>

<body>
   <!--NAVBAR SECTION -->
    <nav class="navbar navbar-expand-lg fixed-top bg-light">
      <div class="container-fluid m-2">
        <img
          src="Rainbow.png"
          alt=""
          style="width: 150px; height: 50px"
        />
      </div>
    </nav>
  <!--Reg page-->
  <div  id="cont" class="container-fluid py-4">
    <h2 class="text text-center" style="margin-top: 100px; color: white;">REGISTRATION FORM</h2>
      <div >
        <form id="frmm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  style="
          display: grid;
          justify-content: center;
          margin-top: 40px;
        ">
        <!-- <form name="myForm" action="/action_page.php" onsubmit="return validateForm()" method="post"> -->
          <div class="form-group">
            <p >Parent's/Guardian Fullname</p>
            <input type="text" name="pName" id="pName" class="form-control my-1 shadow-none">
          </div>
          <br>
          <div class="form-group">
            <p >Parent's/Guardian Mobile No</p>
            <input type="number" name="pMobile" id="pMobile" class="form-control shadow-none">
          </div>
          <br>
          <div class="form-group">
            <p >Parent's/Guardian Email Address</p>
            <input type="text" name="pEmail" id="pEmail" class="form-control shadow-none">
          </div>
          <br>
          <div class="form-group">
            <p >Contestant's Date of Birth</p>
            
            <input type="date" name="dat" id="dat" class="form-control shadow-none" required onchange="getAge(this.value)">
          <span style="color:red";><i>Year from 2010 to 2014</i></span>
          </div>
          <br>
          <div id="contdiv">
            <div class="form-group">
              <p >Contestant's Title</p>
              <select name="tit" id="tit">
                <option value="">Select</option>
                <option value="">MASTER</option>
                <option value="">MISS</option>
              </select>
            </div>
            <br>
            <div class="form-group">
              <p >Contestant's Firstname</p>
              <input type="text" name="fname" id="fname" class="form-control shadow-none" onblur="setuname()">
            </div>
            <br>
            <div class="form-group">
              <p >Contestant's Lastname</p>
              <input type="text" name="lname" id="lname" class="form-control shadow-none" onblur="setuname()">
            </div>
            <br>
            <div class="form-group">
              <p >Contestant's Othername</p>
              <input type="text" name="oname" id="oname" class="form-control shadow-none">
            </div>
            <br>
            <div class="form-group">
              <p >Contestant's username (for login)</p>
              <input type="text" name="uname" id="uname" class="form-control shadow-none">
            </div>
            <br>
            <div class="form-group">
              <p >School Name</p>
              <input type="text" name="sch" id="sch" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
              <p >Enter password</p>
              <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Must be bewteen 8 and 16 characters">
            </div>
            <br>
            <div class="form-group">
              <p >confirm password</p>
              <input type="password" name="cpwd" id="cpwd" class="form-control" placeholder="Must be bewteen 8 and 16 characters">
            </div>
            <br>
            <div class="form-group">
              <p >Select a secret question</p>
              <select name="sQues" id="sQues">
                <option value="">Select</option>
                <option value="What is the name of your school">What is the name of your school? </option>
                <option value="What is the name of your school">What is your best subject? </option>
                <option value="What is the name of your school">What is the name of your favorite teacher? </option>
                <option value="What is the name of your school">What is the name of your first pet? </option>
              </select>
            </div>
            <br>
            <div class="form-group">
              <p >Enter secret question answer</p>
              <input type="text" id="qAns" name="qAns">
            </div>
              <br>
              <div class="form-group row"> 
                <div class="col-12" style="display: flex; justify-content:space-between;">
                <button id="submit" name="submit" class="btn btn-primary"> REGISTER</button>
              
                </div>
              </div>
            </div>
        </form>
      </div>
  </div>

  <script>
    function setuname() {
      var fname = document.getElementById('fname').value;
      var lname = document.getElementById('lname').value;
      var uname = fname + "." + lname;
      uname = uname.toLowerCase();
      document.getElementById('uname').value = uname;
    }

    function d(dat) {
      // let mindate = 

      // let dattt = $("#dat").val();
      //alert(dat);
      $("#contdiv").show();
    }
    $(document).ready(function() {
     // document.getElementById('uname').readOnly = true;
      $('#datepicker1').datepicker({
        dateFormat: "yy-mm-dd",
        maxDate: new Date('2022-11-20')

      });


      // Number
      $('#datepicker2').datepicker({
        dateFormat: "yy-mm-dd",
        maxDate: 2
      });

      // String
      $('#datepicker3').datepicker({
        dateFormat: "yy-mm-dd",
        maxDate: "+1m"
      });
    });
  </script>
  <script src="./age.js"></script>

  <?php
  if (isset($_POST['submit'])) {

    require_once "connect.php";
    require_once "rbkdata.php";
    $rdata = new bkdata;
    //Gather data
    $pName = $_POST['pName'];
    // echo $pName;
    $pMobile = $_POST['pMobile'];
    $pEmail = $_POST['pEmail'];
    $dob = $_POST['dat'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $oname = $_POST['oname'];
    // $uname = $_POST['uname'];
    $uname = strtolower($fname . '.' . $lname); 
    // die($uname);
    $sch = $_POST['sch'];
    // $klas = $_POST['klas'];
    $pwd = $_POST['pwd'];
    $sQues = $_POST['sQues'];
    $qAns = $_POST['qAns'];
    $uid = substr($fname, 2,2) . 'r' . substr($lname, 1,2) . 'b';
    $uid = strtolower($uid);
    // die($uid);
    
    $pass = strlen($pwd);
    if($pass < 8 || $pass > 16){
        
        ?>
        <script>
            alert('Password must be between 8 and 16 charachter');
            
        </script>
        <?php
        return;
    }
    
    // if($fname !== $lname){
    //     ?>
    //     <script>
    //         alert(Password mismatch);
    //         window.history.back();
    //     </script>
    //     <?php
    //     return;
    // }
    
    if (empty($pName) || empty($pMobile) || empty($pEmail)) {

    ?>
      <script>
        alert('Fill in all fields for the pareant');
        return;
      </script>
    <?php
    }

    if (empty($fname) || empty($lname) || empty($sQues) || empty($qAns)) {

    ?>
      <script>
        alert('Fill in all fields for the contestant');
        return;
      </script>
    <?php
    } 
     
    //limit nreg
    $regcount = $rdata->getReg();
    $regNo =$regcount['COUNT(appusers.fname)'];
    if($regNo > 1000){

      ?>
      <script type="text/javascript">
        alert('Sorry, you cannot be registered, only the first 1000 registrations ia allowed.');
        window.history.back();
      </script>
      <?php
      return;
    }
    
    $codename = $rdata->codeme($uname);
    $codepwd = $rdata->codepas($pwd);
   
    $codeques = $sQues;
    $codeans = $rdata->codepas($qAns);
    $lev = 1;
    // confirm contestant is not yet registered
    $contestants = $rdata->getuser($codename);
    //  echo $codepwd;
        
    
        // die('asdfghj');
    if($contestants != 'N'){
        $contestant = $contestants['uname'];
      ?>
      <script type="text/javascript">
        let uname = '<?php echo $uname ?>';
        alert(uname + ' is already registered.');
        window.history.back();
      </script>
      <?php
      return;
    }
    
    $regpwd = $rdata->savepwd($codename, $codepwd, $lev,  $codeques, $codeans, $uid);
    print_r($contestants);
    // print_r($regpwd);
    
    //$regpwd = 'Y';
    if ($regpwd != 'Y') {
    ?>
      <script>
        alert('Unable to save your record');
        window.history.back();
      </script>
    <?php
      return;
    }
    $fullname = $fname . ' ' . $lname;
    $regdata = $rdata->savereg($pName, $pMobile, $pEmail, $dob, $fname, $sch, $oname, $lname, $uname, $fullname);
    // die($regdata);
    ?>
    <script>
      var msg = '<?php echo $regdata ?>';
      var uname = '<?php echo $uname ?>';
      if (msg == 'Y') {
        var note =  "You have successfully registered, your login name is " + uname;
      } else {
        var note = "Error registering you, try again.";
      }
      alert(note);
      location.href = "login.php";
    </script>
  <?php

  }
  ?>
</body>

</html>