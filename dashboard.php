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
    $todaydate = explode('/', $date)[0];

    $jsonurl = "http://localhost/fitbitapi/index.php?bmi=$fitbitid";

    $json = file_get_contents($jsonurl, 0, null, null);
    $json_output = json_decode($json, JSON_PRETTY_PRINT);
    $exists = $json_output['exists'];
    if ($exists == '1') {
        $height = $json_output['height'];
        $weight = $json_output['weight'];

        $age = $json_output['age'];
        $sex = $json_output['sex'];
        $excercise = $json_output['excercise'];
        $bmi = $weight / ($height * $height);

        $mcalorie = 88.632 + (13.397 * $weight) + (4.799 * $height * 100) - (5.677 * $age);
        $fcalorie = 447.593 + (9.247 * $weight) + (3.098 * $height * 100) - (4.330 * $age);

        if ($sex == '1') {
            $mycalorie = $mcalorie;
            $bmr = $mcalorie;
        } else {
            $mycalorie = $fcalorie;
            $bmr = $fcalorie;
        }

        if ($excercise == '1')
            $mycalorie = $mycalorie * 1.2;
        else if ($excercise == '2')
            $mycalorie = $mycalorie * 1.2;
        else if ($excercise == '3')
            $mycalorie = $mycalorie * 1.375;
        else if ($excercise == '4')
            $mycalorie = $mycalorie * 1.725;
        else if ($excercise == '5')
            $mycalorie = $mycalorie * 1.9;
    }

    $jsonurl = "http://localhost/fitbitapi/index.php?getcal=$fitbitid";
    $json = file_get_contents($jsonurl, 0, null, null);
    $json_output = json_decode($json, JSON_PRETTY_PRINT);
    $exists = $json_output['exists'];

    if ($exists == '1') {

        $fitbitcalorie = $json_output['calories'];;
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
                    <?php if ($fitbitid != 'NULL') { ?>
                        <div class="text-center col-md-6">
                            <strong>BMR (Basal Metabolic Rate) :</strong>
                        </div>
                        <div class="text-center mb-2 col-md-6">
                            <?php echo "<b>" . $bmr . " J/(h·kg)</b>"; ?>
                        </div>
                        <div class="text-center col-md-6">
                            <strong>Max. Calorie Intake :</strong>
                        </div>
                        <div class="text-center mb-2 col-md-6">
                            <?php echo "<b>" . number_format((float) $mycalorie, 2, '.', '') . " calories </b>"; ?>
                        </div>
                        <div class="text-center col-md-6">
                            <strong>Burnt Calories :</strong>
                        </div>
                        <div class="text-center mb-2 col-md-6">
                            <?php echo "<b>" . $fitbitcalorie . " calories </b>"; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-center">Total Intake Today</h2> <br>
                <table class="ml-5 table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Total Calories / Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $query = "select * from intakes where uid='$uid' group by calorieid";
                        $run = mysqli_query($connect, $query);

                        ?>
                        <?php while ($row = mysqli_fetch_assoc($run)) {
                            $foodid = $row['calorieid'];
                            $query2 = "select * from calories where foodid='$foodid'";
                            $run2 = mysqli_query($connect, $query2);
                            $fetch2 = mysqli_fetch_assoc($run2);
                            $foodname = $fetch2['name'];
                            $calories = $fetch2['calories'];
                            $date = $row['date'];
                            $queryx = "select id from intakes where calorieid='$foodid'";
                            $runx = mysqli_query($connect, $queryx);
                            $count = mysqli_num_rows($runx);
                            $todaydatecal = explode('/', $date)[0];
                            $total = $total + $fetch2['calories'] * $count;

                            if ($todaydate == $todaydatecal) {
                                ?>
                                <tr>

                                    <td><?php echo strtoupper($foodname); ?></td>
                                    <td><?php echo strtoupper($calories) * $count . ' / ' . $count; ?></td>

                                </tr>
                        <?php }
                        } ?>
                        <tr>
                            <td><b>Total</b> </td>
                            <td><b><?php echo $total; ?></b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <br>
    <?php if ($fitbitid != 'NULL') { ?>
        <h2 class="text-center">Your Consumption</h2> <br>
        <div class="center">
            <?php $dispcalorie = number_format((float) $mycalorie, 2, '.', '') + $fitbitcalorie - $total;
                if ((float) $dispcalorie > 0) {
                    ?>
                <p class="font-weight-bold text-center">

                    You can consume <strong style="font-size: 20px;"><?php echo number_format((float) $dispcalorie, 2, '.', ''); ?> calories</strong>
                <?php
                    }
                    ?>



        </div>
        </div>
        <?php if ($total > ($fitbitcalorie + $mycalorie)) { ?>
            <div class="center">
                <p style="font-size: 20px; color: red;" class="font-weight-bold text-center">
                    You have consumed over the limit of your daily intake calories.</p>
            </div>
            <div class="center">
                <p style="font-size: 20px; color: red;" class="font-weight-bold text-center">
                    You need to burn atleast <?php echo (float)$total - number_format((float) $mycalorie, 2, '.', '') + (float)$fitbitcalorie;  ?> calories. </p>
            </div>
    <?php }
    } ?>
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