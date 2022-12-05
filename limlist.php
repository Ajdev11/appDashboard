<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .dasdiv {
            border: solid;
            background-color: lightblue;
            border-radius: 50%;
            width: 60%;
            margin: auto;
            height: 80px;
        }

        .btndiv {
            padding-left: 5%;
            margin-bottom: 5px;
        }

        button {
            width: 75%;
            height: 50px;

        }

        #mbtn {
            font-size: 10px;
            border: none;
            background-color: darkblue;
            color: yellow;
            width: auto;
        }

        .dboard {
            font-size: 12px;
            font-weight: bold;
            height: 10vh;
            border-radius: 5px;
            text-align: center;
            margin-top: 3vh;
            cursor: pointer;
            padding-top: 1px;
        }

        .statuscount {
            padding-top: 0px;
            text-align: center;
            font-weight: bold;
            font-size: 16px;
        }
        .center{
            text-align: center;
        }

        @media only screen and (min-width: 600px) {
            #umap {
                font-size: 14px;
            }

            #umap {
                font-size: 14px;
                padding-top: 12px;
            }

            .dboard {
                font-size: 16px;
                height: 18vh;
            }

            .statuscount {
                font-size: 24px;
            }

            li {
                font-size: 12px;
            }

        }
    </style>
    <?php
    require_once "sands.php";

    ?>
</head>

<body>

    <h2 class = "center">RAINBOW BOOK CLUB READING CHALLENGE</h2>
    <h5 id="hed" class = "center">REGISTERED CONTESTANTS</h5>

    <div class="col-12" style="overflow-x: auto;">
        <table class="table table-stripped">
            <tr>
                <th>S/N</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Mobile</th>
            </tr>
            <?php
            require_once "connect.php";
            require_once "rbkdata.php";
            $rdata = new bkdata;
            $contestants = $rdata->getLcontest();
            $i = 0;
            foreach ($contestants as $contestant) {
                $user = $contestant['fname'] . '.'  . $contestant['lname'];
                $i++;
                echo '<tr>';
                echo '<td>' . $i . '</td>';
                echo '<td>' . $contestant['fname'] . '</td>';
                echo '<td>' . $contestant['lname'] . '</td>';
                echo '<td>' . $contestant['pemail'] . '</td>';
                echo '<td>' . $contestant['pmobile'] . '</td>';
                echo '</tr>';
            }

            ?>
        </table>
    </div>
    </div>
    <script type="text/javascript">
        let lim = sessionStorage.lim;
        if(lim == 10){
            var hed = "FIRST TEN TO REGISTER";
        }else{
            var hed = "FIRST 100 TO REGISTER";
        }
        //alert(lim);
        document.getElementById('hed').innerHTML = hed;
    </script>
</body>

</html>