<!DOCTYPE html>
<html lang="en">

<head>
  <title>Password Reset</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  require_once "sands.php";
  ?>

  <script>
    // Function to check Whether both passwords
    // is same or not.
    function checkPassword(form) {
      password1 = form.newpwd.value;
      password2 = form.retypepwd.value;

      // If password not entered
      if (password1 == '')
        alert("Please enter Password");

      // If confirm password not entered
      else if (password2 == '')
        alert("Please enter confirm password");

      // If Not same return False.    
      else if (password1 != password2) {
        alert("\nPassword did not match: Please try again...")
        return false;
      }

      // If same return True.
      // else {
      //   alert("Password Match: Your password has been accepted!!!")
      //   return true;
      // }
    }

    function getUserDetail(uname) {
      //alert(uname);
      $.post("rbklink.php", {
          
          getuser: uname

      }, function(data, status) {
        // alert(data);
        if(data != 'N'){
          // $('#reset').show();
          $('#sQues').val(data);
        }else{
          alert(uname + ' is not a valid user')
          $('#sQues').val('');
          $('#uname').val('');
        }
      })
    }

    function verifyAns(){
      let qAns = $('#secAns').val();
      // alert(qAns);
      let sQ = $('#sQues').val();
      if(sQ == ""){
        alert('Please enter your username');
        $('#uname').focus();
        return;
      }
      $.post("rbklink.php", {
          
          veruser: qAns

      }, function(data, status) {
        
        if(data != 'N'){
          alert(data);
          $('#reset').show();
          sessionStorage.disbtn = 1;
        }else{
          alert(uname + ' is not a valid user')
          $('#sQues').val('');
          $('#uname').val('');
        }
      })
    }

    $(document).ready(function(){
      let disbtn = sessionStorage.disbtn;
      if(disbtn == 0){
        $("#reset").hide();
        }else{
          $("#reset").show();
        }
      });
      
  </script>

  <style type="text/css">
     #reset{
/*      //display: none;*/
     }
  </style>

</head>

<body>
  <!--NAVBAR SECTION -->
  <nav class="navbar navbar-expand-lg fixed-top bg-light">
    <div class="container-fluid m-2">
      <img src="Rainbow.png" alt="" style="width: 150px; height: 50px" />
    </div>
  </nav>

  <div class="container" style="margin-top: 100px;">
    <form>
      <div>
        <p>Type in your username</p>
        <input type="text" name="uname" onblur="getUserDetail(this.value)">
      </div>
      <div class="form-group row">
        <label for="staticQuestio" class="col-sm-2 col-form-label">Your Security Question</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="sQues" name="sQues" >
        </div>
      </div>
      <div class="form-group row">
        <label for="secAns" class="col-sm-2 col-form-label">Enter Answer to security question</label>
        <div class="col-sm-10">
          <input type="text" class="form-control w-50" id="secAns" name="secAns" placeholder="Enter your Answer">
          <button onclick="verifyAns()"><i>Verify</i></button>
        </div>
      </div>
    </form>
    <font color="lilac">
      <h2 class="my-3 text-center">Password Reset Form</h2>
    </font>
    <!-- <p>Provide answer to your Security question below</p> -->

    <form method="post" action="saveform.php" onSubmit="return checkPassword(this)">
      
      <div class="form-group row">
        <label for="newpwd" class="col-sm-2 col-form-label">Enter New Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control w-50" id="newpwd" name="newpwd" placeholder="Password">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control w-50" name="retypepwd" id="retypepwd" placeholder="Retype Password">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label"> </label>
        <div class="col-sm-10">
          <button id="reset" name="reset" class="btn btn-primary mb-2">Reset Password</button>
        </div>
      </div>
    </form>


    </p>
  </div>


</body>

</html>