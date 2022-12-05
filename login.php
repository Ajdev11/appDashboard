<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CloudEdgeReg</title>
  <link rel="stylesheet" href="css.css">

  <?php
  require_once "sands.php";
  ?>
  <script type="text/javascript">
    sessionStorage.disbtn = 0;
  </script>
</head>
<style>
  button {
    outline: none;
    margin-top: 20px;
  }
  #submit{
    background-color: darkblue;
    color: whitesmoke;
    margin-top: 15px;
  }

  form {
    display: grid;
    justify-content: center;
    padding-bottom: 20px;
   
  }
  .cont {
      border: solid;
      border-radius: 5px;
      background-color: rgba(60, 100, 140, 0.8);
      color: whitesmoke;
      width: 98%;
      margin: auto;
      height: 100vh;
    }

    @media only screen and (min-width: 600px) {
      .cont {
        width: 60%;
      }

    }
</style>

<body>
  <!--NAVBAR SECTION -->
  <nav class="navbar navbar-expand-lg fixed-top bg-light">
    <div class="container-fluid m-2">
      <img src="Rainbow.png" alt="" style="width: 150px; height: 50px" />
    </div>
  </nav>
  <!--Login page-->
  <div class="container-fluid cont">
    <div style="margin-top:100px;">
    <h2 id="hed" class="text-light">RAINBOW BOOK CLUB READING CHALLENGE</h2>
    <h2 id="hed" class="text-light">LOGIN PAGE</h2>
    </div>
    <form id="frmm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="form-group my-3" id="fdiv">
        <label for="username" class="">USERNAME</label>
        <input type="text" name="uname" class="shadow-none" placeholder="Enter Your Username" />
      </div>
      <br />
      <div class="form-group my-1" id="fdiv">
        <label for="Password" class="">ENTER PASSWORD</label>
        <input type="password" name="pwd" class=" shadow-none" placeholder="Enter Your Password" />
      </div>
      <input type="submit" id="submit" name="submit" value="SUBMIT" style="width: 80px; display: block; float: right; margin-right: 5%;">
        <div>
          <a href="resetpwd.php" style="text-decoration: none; color: white;">Forgot Password?</a>
        </div>
      </div>
    </form>
  </div>
  </div>
    
      
  <!-- </div> -->
</body>

<?php
if (isset($_POST['submit'])) {

  require_once "connect.php";
  require_once "rbkdata.php";
  $rdata = new bkdata;
  //Gather data
  $uname = $_POST['uname'];

  $pwd = $_POST['pwd'];
  if (empty($uname) || empty($pwd)) {
?>
    <script>
      alert('Enter both username and password');
      return;
    </script>
  <?php
  }

  ?>
  <script type="text/javascript">
    var uname = '<?php echo $uname ?>';
    sessionStorage.usa = uname;
  </script>
  <?php
  $ulev = 9;
  $codename = $rdata->codeme($uname);
  $_SESSION['usa'] = $codename;
  $codepwd = $rdata->codepas($pwd);
  //die($codepwd);
  $login = $rdata->loguser($codename, $codepwd);
  $_SESSION['oru'] = $codepwd;
  $uid = $login['uid'];
  $vtype = $login['vtype'];
  $_SESSION['fvprefix'] = $uid;

  if ($login != 'N') {
    $ulev = $login['ulev'];
    $login = 'Y';
  }

  ?>
  <script>
    var logstatus = '<?php echo $login ?>';
    // 
    if (logstatus == 'N') {
      alert('Wrong username or password');
    } else {
      var ulev = '<?php echo $ulev ?>';
      var vtype = '<?php echo $vtype ?>';
      let lenusa = vtype.length;
      lenusa = lenusa - 4;
      var usa = vtype.slice(0, lenusa);
      var appuser = usa.slice(6);
      //alert(appuser);
      // location.href = "vidupload.php";
      if (ulev == '0') {
        location.href = "appdash.php";
      } else {
        var vlen = vtype.length;
        if (vlen < 2) {
          location.href = "vidupload.php";
        } else {
          let bfile = 'book/' + appuser + '.pdf';
          sessionStorage.bfile = bfile; // 'book/1.pdf';
          sessionStorage.vfile = vtype;
          sessionStorage.fuser = sessionStorage.usa;
          location.href = "dispupload.php";

        }

      }
    }
  </script>
<?php
}
?>

</html>
</body>

</html>