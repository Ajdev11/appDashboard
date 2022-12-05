<?php
session_start();

$uid = $_SESSION['fvprefix'];
$oru = $_SESSION['oru'];


  require_once 'connect.php';
  require_once "rbkdata.php";
  $rdata = new bkdata;

if (isset($_POST['submit'])) {
  ?>
  <!-- <video src="video/ogo.mp4"> -->
    <!-- <div style="display: flex; justify-content: space-evenly; margin-top: 100px">
       <video width="320" height="240" controls>
      <source src="video/ogo.mp4" type="video/mp4">
      <source src="movie.ogg" type="video/ogg">
      Your browser does not support the video tag.
    </video>
    <iframe width="320" height="240" src="book/ogo.pdf" title="My Book Review">
</iframe>
    </div> -->
   
  <?php
  //die();
  //Video dir
  $target_dir = "video/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  //die($target_file);
  if ($target_file == 'video/') {
?>
    <script type="text/javascript">
      alert('Please select video to upload');
      window.history.back();
    </script>
  <?php
    return;
  }
  //review dir
  $pdftarget_dir = "book/";
  $pdftarget_file = $pdftarget_dir . basename($_FILES["pdfToUpload"]["name"]);
  if ($pdftarget_file == 'book/') {
  ?>
    <script type="text/javascript">
      alert('Please select your book review');
      window.history.back();
    </script>
    <?php
    return;
  }

  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $pdfimageFileType = strtolower(pathinfo($pdftarget_file, PATHINFO_EXTENSION));

  // Restrict video file formats
  $imageFileType = strtolower($imageFileType);
  if (
    $imageFileType != "wmv" && $imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "3gp" && $imageFileType != "mov"
  ) {
    echo "Sorry, only wmv, mp4, mov, avi & 3gp files are allowed.";
    $uploadOk = 0;
    return;
  }
  
  // Restirct to pdf file formats only
  if ($pdfimageFileType != "pdf") {
    echo "Sorry, only PDF file is allowed.";
    $uploadOk = 0;
    return;
  }
  $bfile = 'book/' . trim($uid)  . ".pdf";
  if ($imageFileType == "wmv") {
    $vfile = 'video/' . trim($uid)  . ".wmv";
  } else if ($imageFileType == "mp4") {
    $vfile = 'video/' . trim($uid)  . ".mp4";
  }
    else if ($imageFileType == "mov") {
    $vfile = 'video/' . trim($uid)  . ".mov";
  } else if ($imageFileType == "avi") {
      $vfile = 'video/' . trim($uid)  . ".avi";
  } else if ($imageFileType == "3gp") {
    $vfile = 'video/' . trim($uid)  . ".3gp";
  }
  // die($vfile);
  if (file_exists($vfile)) {
    echo "You have already uploaded your video.";
    ?>
    <script type="text/javascript">
      let bfile = '<?php echo $bfile ?>';
      sessionStorage.bfile = bfile;
      let vfile = '<?php echo $vfile ?>';
      sessionStorage.vfile = vfile;
      sessionStorage.fuser = sessionStorage.usa;
      location.href ="dispupload.php";
    </script>
    <?php
    $uploadOk = 0;
    $fexist = true;
    return;
  }

  
  // Check if pdf already exists
  if (file_exists($bfile)) {
    echo "You have already uploaded your book review.";
    $uploadOk = 0;
    return;
  }

  // Check video file size
  if ($_FILES["fileToUpload"]["size"] > 150000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    return;
  }

  //die($vfile);
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file cannot  not uploaded.";
  } else { // if everything is ok, try to upload file
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $vfile)) {
      //Move pdf file
      move_uploaded_file($_FILES["pdfToUpload"]["tmp_name"], $bfile);
      //update pade with video file  extension
      require_once "connect.php";
      require_once "rbkdata.php";
      $rdata = new bkdata;
      $savevid = $rdata->savevideo($vfile, $oru);

      if ($savevid == 'Y') {

    ?>

        <script type="text/javascript">
          alert('Your video and book review are sucessfully uploaded');
          let bfile = '<?php echo $bfile ?>';
          sessionStorage.bfile = bfile;
          let vfile = '<?php echo $vfile ?>';
          sessionStorage.vfile = vfile;
          location.href ="dispupload.php";
        </script>
    <?php
      }
    } else {
      echo "Sorry,  your file were not uploaded due to one or more errors.";
    }
  }
}

if (isset($_POST['reset'])) {
  $npwd = $_POST['newpwd'];
  $cpwd = $_POST['retypepwd'];
  if($npwd != $cpwd){
    ?>
  <script type="text/javascript">
    //var pas = '<?php echo $npwd . ' / ' . $cpwd ?>';
    alert(pas + ' Password mismatch, tyr again');
    window.history.back();
  </script>
  <?php
  return;
  }

    $codepwd = $rdata -> codepas($npwd);
    $codename = trim($_SESSION['uname']);
    $resetpas = $rdata -> resetpwd($codepwd,$codename);
    
    return $resetpas;
}



//---------------
?>