<?php
    include 'dbconnect.php';
    if(isset($_GET['verify'])){
        $userid=$_GET['verify'];
        $query="select * from users where uid='$userid'";
        $run=mysqli_query($connect,$query);
        if(mysqli_num_rows($run)==1){
            $json=array(
                'exists'=>'1'
            );
        }
        else{
        $json = array(
            'exists' => '0'
        );
        }
        echo json_encode($json);
    }
if (isset($_GET['bmi'])) {
    $userid = $_GET['bmi'];
    $query = "select * from users where uid='$userid'";
    $run = mysqli_query($connect, $query);
    $fetch=mysqli_fetch_assoc($run);
    $height=$fetch['height'];
    $weight=$fetch['weight'];
    $age=$fetch['age'];
    $excercise=$fetch['excercise'];
    $sex=$fetch['sex'];
    if (mysqli_num_rows($run) == 1) {
        $json = array(
            'height' => "$height",
            'weight' => "$weight",
            'age'=> "$age",
            'sex'=> "$sex",
            'excercise'=>"$excercise",
            'exists' => '1'
        );
    } else {
        $json = array(
            'exists' => '0'
        );
    }
    echo json_encode($json);
}
?>