<?php
include 'dbconnect.php';
session_start();
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
     date_default_timezone_set('Asia/Kolkata');
    $time = date("h:i:sA");
    $date = date("d/m/Y");
    $todaydate=explode('/',$date)[0];

    $jsonurl = "http://localhost/fitbitapi/index.php?bmi=$fitbitid";

    $json = file_get_contents($jsonurl, 0, null, null);
    $json_output = json_decode($json, JSON_PRETTY_PRINT);
    $exists = $json_output['exists'];
    if($exists=='1'){
        $height=$json_output['height'];
        $weight=$json_output['weight'];

        $age = $json_output['age'];
        $sex = $json_output['sex'];
        $excercise=$json_output['excercise'];
        $bmi=$weight/($height*$height);
       
        $mcalorie=88.632 + (13.397 * $weight) + (4.799 * $height*100)-(5.677 * $age);
        $fcalorie=447.593 + (9.247 * $weight) + (3.098 * $height*100)-(4.330 * $age);

        if($sex=='1'){
            $mycalorie=$mcalorie;
        }
        else{
            $mycalorie=$fcalorie;
        }
        if($excercise=='1')
            $mycalorie=$mycalorie*1.2;
        else if ($excercise == '2')
            $mycalorie = $mycalorie * 1.2;
        else if ($excercise == '3')
            $mycalorie = $mycalorie * 1.375;
        else if ($excercise == '4')
            $mycalorie = $mycalorie * 1.725;
        else if ($excercise == '5')
            $mycalorie = $mycalorie * 1.9;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Foodify :: Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg py-3 navbar-light bg-light shadow-sm">
        <div class="container">
            <a href="#" class="navbar-brand">
                <!-- Logo Image -->
                <img src="foodify_black.png" width="200" alt="" class="d-inline-block align-middle mr-2">
                <!-- Logo Text -->
            </a>

            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="#" class="nav-link mr-5"><b><?php echo $name; ?></b> <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a href="logout.php" class="text-white btn btn-danger nav-link ml-5">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-center">My Profile</h2> <br>
                <div class="row">
                    <div class="text-center col-md-6">
                        <strong>Name :</strong>
                    </div>
                    <div class="text-center mb-2 col-md-6">
                        <?php echo $name; ?>
                    </div>
                    <div class="text-center col-md-6">
                        <strong>Email :</strong>
                    </div>
                    <div class="text-center mb-2 col-md-6">
                        <?php echo $email; ?>
                    </div>
                    <div class="text-center col-md-6">
                        <strong>FitBit ID :</strong>
                    </div>
                    <div class="text-center mb-2 col-md-6">
                        <?php echo $fitbitid; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-center">Total Intake Today</h2> <br>
                <table class="ml-5 table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Calories</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total=0;
                            $query="select * from intakes where uid='$uid'";
                            $run=mysqli_query($connect,$query);
                            
                        ?>
                        <?php while($row=mysqli_fetch_assoc($run)) { $foodid=$row['calorieid']; 
                            $query2="select * from calories where foodid='$foodid'";
                            $run2=mysqli_query($connect,$query2);
                            $fetch2=mysqli_fetch_assoc($run2);
                            $foodname=$fetch2['name'];
                            $calories=$fetch2['calories'];
                            $date=$row['date'];
                            $todaydatecal = explode('/', $date)[0];
                            $total=$total+$fetch2['calories'];
                           if($todaydate==$todaydatecal){
                            ?>
                        <tr>
                            
                            <td><?php echo strtoupper($foodname); ?></td>
                            <td><?php echo strtoupper($calories); ?></td>
                            
                        </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <br>
    <?php if($fitbitid!='NULL') {?>
    <h2 class="text-center">Today's Intake</h2> <br>
    <div class="center">
        <p class="font-weight-bold text-center">

            You have consumed <strong style="font-size: 20px;"><?php echo $total; ?></strong> calories from <strong style="font-size: 20px;"><?php echo $mycalorie; ?></strong> calories.</p>
    </div>
    </div>
    <?php if($total>$mycalorie) {?>
    <div class="center">
        <p style="font-size: 20px; color: red;" class="font-weight-bold text-center">
            You have consumed over the limit of your calories.</p>
    </div>
    <?php } } ?>
    <br>
    <div class="center">
        <button class="btn btn-success btn-lg" onclick="run()"><i class="fa fa-camera" aria-hidden="true"></i> Scanify</button>
    </div><br><br>
    <script>
        function run() {
            window.location.href = "scanify.php";
        }
    </script>
</body>

</html>