<!DOCTYPE html>
<html>

<head>
    <title>Foodify :: Scan</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results {
            padding: 20px;
            border: 1px solid;
            background: #ccc;
        }

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
        <form method="POST" action="storeimage.php" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div id="my_camera"></div>
                    <br>
                    <div class="center">
                        <input id="snap" class="btn btn-warning" type=button value="Take Snapshot" onClick="clickphoto()">
                    </div>
                    <input type="hidden" name="image" class="tagimage">

                </div>
                <div class="col-md-6">
                    <div id="results">Your captured image will appear here...</div>
                </div>
                <div class="col-md-12 text-center">
                    <br>
                    <button id="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Configure a few settings and attach camera -->
    <script language="JavaScript">
        $('#submit').hide();
        Webcam.set({
            width: 490,
            height: 390,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach('#my_camera');

        function clickphoto() {
            Webcam.snap(function(data_uri) {
                $(".tagimage").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
                $('#submit').show();
                $('#snap').hide();
            });
        }
    </script>

</body>

</html>