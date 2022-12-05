<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
    <?php
      require_once "sands.php";
      ?>
</head>
<body>
	<h3 id="fuser" style="text-align: center;"></h3>
	  <div style="display: flex; justify-content: space-evenly; margin-top: 100px">
       <video id="vid" width="320" height="240" controls>
      <source src="" >
      Your browser does not support the video tag.
    </video>
    <iframe id="bid" width="320" height="240" src="" title="My Book Review">
</iframe>
    </div>
     <!--Hashtags Instructions-->
     <!-- <div style="margin: auto; margin-top: 30px;">
      <p style="font-size:20px;">Kindly note that, for you to be selected you will need to share your video and book review on Twitter and instagram using this hashtags in this order #PastorAdeboye#Rccg#Rainbow</p>
     </div> -->
    

    <script type="text/javascript">
        let vfile = sessionStorage.vfile;
        let bfile = sessionStorage.bfile;
        let fuser = sessionStorage.fuser + ' uploaded video and book entries';
        document.getElementById('fuser').innerHTML = fuser;
        document.getElementById('vid').src = vfile;
        document.getElementById('bid').src = bfile;
        //alert(vfile + " " + bfile);
    </script>

</body>
</html>