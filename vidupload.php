<?php
  session_start();
  $oru = $_SESSION['oru'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
   <?php
    require "sands.php";
  ?> 
  <link rel="stylesheet" type="text/css" href="css.css">  
  <style type="text/css">

    form{
      height: 100vh;
      padding: 10px;
      
    }

    #submit{
      display: block;
      float: right;
      margin-right: 3%;
    }
    input{
      margin-bottom: 10px;
    }
    #submit{
      display: block;
      float: right;
      margin-right: 5%;
    }
    #fdiv{
      padding-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <h2 id="hed">RAINBOW BOOK CLUB BOOK READING CHALLENGE</h2>
    <h3 id="usa"></h3>
    <form action="saveform.php" method="post" enctype="multipart/form-data">
      <div id="vdiv">
        <h6>Select your video for upload:</h6>
        <p><i>Video file must be mp3 or mp4 only, not more than 150M</i></p>
        <input type="file" name="fileToUpload" id="fileToUpload">
      </div>
      <div id="fdiv">
        <h6>Select your book review for upload:</h6>
        <p><i>File must be in pdf format only</i></p>
        <input type="file" name="pdfToUpload" id="pdfToUpload" accept="pdf">
      </div>
      <input type="hidden" id="oru" name="oru">
      <button class="btn btn-primary" id="submit" name="submit"> Upload </button>

  </form>
  </div>
  <script type="text/javascript">
    let oru = '<?php echo $oru ?>';
    $("#oru").val(oru);
    let usa = sessionStorage.usa;
    let msg = "WELCOME " + usa;
    // msg = msg.toUpper();
    document.getElementById('apusa').innerHTML = msg;
  </script>
</body>
</html>