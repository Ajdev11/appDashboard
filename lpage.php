<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RBK Competition</title>
  <!-- <link rel="stylesheet" href="rbk/css.css"> -->
  <?php
    require_once "sands.php";
  ?>

  <style>

  </style>
</head>

<body>
    <?php
      require_once "connect.php";
      require_once "rbkdata.php";
      $rdata = new bkdata;
      $hits = $rdata->setHits();
      $siteHits = $rdata->getHits();
      9
    ?>
     <!--NAVBAR SECTION -->
    <nav class="navbar navbar-expand-lg fixed-top bg-light">
      <div class="container-fluid m-2">
        <img
          src="./Rainbow.png"
          alt=""
          style="width: 150px; height: 50px"
        />
      </div>
    </nav>
    <!--SECTION-ONE-->
    <div class="pt-lg-5 py-3 text-sm-start" style="margin-top: 100px">
      <div class="container">
        <div>
          <h1 id="hed" class="text-center" style="font-size: 32px;">RAINBOW BOOK CLUB READING CHALLENGE</h2>
        </div>
      </div>
    </div>
    <section>
      <div class="container" style="overflow: hidden;">
        <div class="row">
          <div class="col-md my-3">
            <div class="card bg-dark text-light">
              <div class="card-body">
                <div class="card-title mb-3">
                  <h4 id="about" class="text-center">
                    <span style="color: yellow; font-size: 25px;">3 STEPS TO ENTER</span>
                  </h4> 
                  <!-- <h4>
                    <span style=" font-size: 20px;">3 STEPS TO ENTER:</span>
                  </h4> -->
                  <h5 class="my-5" style="font-size: 16px;">
                    STEP 1 ==> REGISTER BY FILLING AN ONLINE FORM
                  </h5>
                  <ol>
                    <li>
                      The parent or legal guardian of the contestant should fill
                      in this form and submit on behalf of the minor
                    </li>
                    <li>
                      By filling this form, the adult agrees to all the terms
                      and conditions of this competition
                    </li>
                  </ol>
                </div>
                <h5 class="text-danger py-2 fs-5 ">
                  <i>
                    registration, click on login for submission of written and
                    video reviews using the profile you created while
                    registering</i
                  >
                </h5>
                <h5 class="my-5" style="font-size: 16px;">STEP 2 ==> SUBMIT A WRITTEN REVIEW</h5>
                <ol>
                  <li>
                    The parent or legal guardian of the contestant should submit
                    the contestants written review of the book.
                  </li>
                  <li>The review should be between 400 and 500 words.</li>
                  <li>
                    The following information should appear on the written
                    review
                    <ul>
                      <li>Child’s first and surname</li>
                      <li>Child’s age</li>
                      <li>Child’s school</li>
                      <li>Child’s town, state and country</li>
                      <li>A title given the review by the child</li>
                      <li>Word count should be written at the top</li>
                      <li>
                        Entry must be in English, typed out in black ink on one
                        page, font size 12 and double line spacing
                      </li>
                      <li>
                        Entries must be saved in Microsoft word and submitted in
                        pdf format
                      </li>
                      <li>
                        The file name should be the first and surname and age of
                        the child
                      </li>
                    </ul>
                  </li>
                </ol>
                <h5 class="my-5" style="font-size: 16px;">STEP 3 ==> SUBMIT A VIDEO REVIEW</h5>
                <ol>
                  <li>The video review should not be longer than 3 minutes</li>
                  <li>
                    The following information should appear on the video review
                    and in this format
                    <ul>
                      <li>Child’s first name and age (line one)</li>
                      <li>Child’s town and country (line two)</li>
                      <li>
                        The child should hold up a copy of the book and mention
                        the title and author of the book before making the
                        review
                      </li>
                      <li>Review must be in English</li>
                      <li>
                        Video should be submitted in wmv, mp4,mov, avi & 3gp format.
                      </li>
                    </ul>
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="container" style="display:flex; justify-content: space-between;">
            <button class="btn btn-primary">
                <a id="reg" href="reg.php" class="text-light text-decoration-none" >Click To Register</a>
            </button>
            <button class="btn btn-primary">
                <a id="reg" href="login.php" class="text-light text-decoration-none " >Click To Login</a>
            </button>
          </div>
    </section>

</body>

</html>