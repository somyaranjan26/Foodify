 <?php
    session_start();
    include 'dbconnect.php';

    if (!isset($_SESSION['uid'])) {
        header("location:index.php");
    } else {
        $uid = $_SESSION['uid'];
        $query = "select * from users where uid='$uid'";
        $run = mysqli_query($connect, $query);
        $fetch = mysqli_fetch_assoc($run);
        $name = $fetch['name'];
        $email = $fetch['email'];
        $fitbitid = $fetch['fitbitid'];
    

   
  
    }
    if (isset($_POST['submit'])) {
        $img = $_POST['image'];
        $folderPath = "images/";
        function randstr($len)
        {
            $str = "123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPWRSTUVWXYZ";
            $rand = "";
            for ($i = 1; $i <= $len; $i++) {
                $rand .= $str[rand(0, strlen($str) - 1)];
            }
            return $rand;
        }
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.jpg';

        $file = $folderPath . $fileName;

        file_put_contents($file, $image_base64);

        $code = 'python test.py images/' . $fileName;

        exec($code, $output, $x);

        $brand = explode(" (score =", $output[0])[0];

        $queryx = "select * from calories where name like '%$brand%'";
        $runx = mysqli_query($connect, $queryx);
        $datax = mysqli_fetch_assoc($runx);
        $name = $datax['name'];
        $calories = $datax['calories'];
        $calorieid = $datax['foodid'];
        $intakeid = randstr(14);
        date_default_timezone_set('Asia/Kolkata');
        $time = date("h:i:sA");
        $date = date("d/m/Y");
        $query = "insert into intakes values('NULL','$intakeid','$calorieid','$uid','$date','$time')";
        $run = mysqli_query($connect, $query);
        echo $run;
    }
    
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Foodify :: Summary</title>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
     <style type="text/css">
         .center {
             display: flex;
             justify-content: center;
             align-items: center;
         }

         #logo img {
             width: 30%;
         }
     </style>
 </head>

 <body>
     <div id="logo" class="container center my-5"><img src="foodify_black.png"></div>
     <div class="container">
         <div class="row">
             <div class="col-md-6">
                 <img style="width:60%;" src="<?php echo $file; ?>">
                 <br>
                 <br>
                 <p style="font-size:20px; font-weight: bold;" class="text-uppercase ml-5 pl-5"><?php echo $name; ?></p><br>
                 <p style="font-size:20px;" class="ml-5 pl-2">It contains <b><?php echo $calories; ?></b> calories.</p>
             </div>
             <div class="col-md-6">
                 <h3 class="text-center">Nutrients Value</h3> <br>
                 <?php
                    $queryx = "select * from nutritions where foodid='$calorieid'";
                    $runx = mysqli_query($connect, $queryx);
                    $fetchx = mysqli_fetch_assoc($runx);
                    ?>
                 <div class="row">
                     <div class="text-center col-lg-6">
                         <b>Protein :</b>
                     </div>
                     <div class="mb-2 text-center col-lg-6">
                         <?php echo $fetchx['protein']; ?>
                     </div>
                     <div class="text-center col-lg-6">
                         <b>Fat :</b>
                     </div>
                     <div class="mb-2 text-center col-lg-6">
                         <?php echo $fetchx['fat']; ?>
                     </div>
                     <div class="text-center col-lg-6">
                         <b>Cholestrol :</b>
                     </div>
                     <div class="mb-2 text-center col-lg-6">
                         <?php echo $fetchx['chol']; ?>
                     </div>
                     <div class="text-center col-lg-6">
                         <b>Carbohydrates :</b>
                     </div>
                     <div class="mb-2 text-center col-lg-6">
                         <?php echo $fetchx['carbo']; ?>
                     </div>
                 </div>
             </div>
         </div>
         <br>
         
        
         <div class="center">
             <button onclick="dashboard()" class="mt-4 btn btn-lg btn-success">Back to Dashboard</button>
         </div>
     </div>
     <script>
         function dashboard() {
             window.location.href = "dashboard.php";
         }
     </script>
 </body>

 </html>