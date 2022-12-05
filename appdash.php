<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript">
        // alert();
        function dashdetail(opt){
            if(opt == 'VIS'){

            }else if(opt == 'REG'){
                location.href = 'reglist.php';
            }if(opt == 'UPL'){
                // alert();
                location.href = 'uplist.php';
            }if(opt == 'TEN'){
                // sessionStorage.lim = 10;
                location.href = 'limlist.php';
            }if(opt == 'HUN'){
                sessionStorage.lim = 100;
                location.href = 'lim2list.php';
                
            }
        }
    </script>
    <style>
        .dasdiv{
            border:solid ;
            background-color: lightblue;
            border-radius: 50%;
            width: 60%;
            margin: auto;
            height: 80px;
        }
        .btndiv{
            padding-left: 5%;
            margin-bottom: 5px;
        }
        button{
            width: 75%;
            height: 50px;
            
        }
        #mbtn{
            font-size: 10px;
            border: none;
            background-color: darkblue;
            color: yellow;
            width: auto;
        }
        .dboard{
          font-size: 12px;
          font-weight: bold;
          height: 10vh;
          border-radius: 5px; 
          text-align: center;
          margin-top:3vh ;
          cursor: pointer;
          padding-top: 1px;
        }

     .statuscount{
      padding-top: 0px;
      text-align: center;
      font-weight: bold;
      font-size: 16px;
     }
     .center{
        text-align: center;
     }

    @media only screen and (min-width: 600px){
      #umap{
        font-size: 14px;
      }

      #umap{
        font-size: 14px;
        padding-top: 12px;
      }
      .dboard{
        font-size: 16px;
        height: 18vh;
      }
      .statuscount{
      font-size: 24px;
     }

      li{
        font-size: 12px;
      }
      
    }
    </style>
    <?php
        require_once "sands.php";
    ?>
</head>
<body>
    <?php
      require_once "connect.php";
      require_once "rbkdata.php";
      $rdata = new bkdata;
      $siteHits = $rdata->getHits();
      $regcount = $rdata->getReg();
      $regNo =$regcount['COUNT(appusers.fname)'];
      // print_r($regcount);
      $upcount = $rdata->getUP();
      $upNo =$upcount['COUNT(pade.uname)'];
      
    ?>
    <div class="container-fluid">
        <h3 class="center">RAINBOW BOOK CLUB READING CHALLENGE</h3>
        <h4 class="center">DASHBOARD</h4>
        <div class="row" style="display: no;">
            <div class="col-4">
                <div ondblclick="dashdetail('VIS')" class="w3-card-4 dboard" style=" background-color: coral; color:white;"><p>NO OF VISITS</p>
                <p id="newcount" class="statuscount"><?php echo $siteHits ?></p>
              </div>
            </div>
            
            <div class="col-4 ">
                <div ondblclick="dashdetail('REG')" class="w3-card-4 dboard" style=" background-color: darkblue; color:white;"><p>NO REGISTERED</p>
                   <p id="newcount" class="statuscount"><?php echo $regNo ?></p>
                  </div>
            </div>
            <div class="col-4 ">
                <div ondblclick="dashdetail('UPL')" class="w3-card-4 dboard" style=" background-color: darkgreen; color:white;"><p>NO OF UPLOADS</p>
                    <p id="newcount" class="statuscount"><?php echo $upNo ?></p>
                  </div>
            </div>

        </div>

        <div class="row" style="display: no;">
            <div class="col-4">
            <form action="limlist.php" method="post" enctype="multipart/form-data">
                <div name="ten" ondblclick="dashdetail('TEN')" class="w3-card-4 dboard" style=" background-color: darkmagenta; color:white; padding-top: 25px;"><p>FIRST 10 TO REGISTER</p>
                
              </div>
            </div>
            
            <div class="col-4 ">
                <div ondblclick="dashdetail('HUN')" class="w3-card-4 dboard" style=" background-color: darkgray; color:white;">
                    <p></p>
                    <p>FIRST 100 TO REGISTER</p>
                  </div>
            </div>
        </div>
        </form>

    </div>
    <script type="text/javascript">
        function getUpload(vfile, bfile){
            sessionStorage.vfile = vfile;
            sessionStorage.bfile = bfile;
            location.href = "dispupload.php";
        }
    </script>

    
</body>
</html>