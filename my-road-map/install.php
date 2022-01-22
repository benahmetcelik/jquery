<?php

include('connection.php');




//if (@$db) {
//header('panel/');
// header('Location: index.php');
//} else {
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style>
        .card {
            margin: 0 auto;
            /* Added */
            float: none;
            /* Added */
            margin-bottom: 10px;
            /* Added */
            width: 50%;
            margin-top: 13%;
        }
    </style>


    <section>

        <div class="card text-center" id="firstScreen">
            <div class="card-header">
                İnstaller
            </div>
            <div class="card-body">
                <h5 class="card-title">Hello Friends</h5>
                <p class="card-text">This screen a installer for simple RoadMap system(JQuery, Ajax , PHP, MySql and Core JavaScript)</p>
                <button class="btn btn-primary" id="firstScreenButton">Let's Go And Install</button>
            </div>
            <div class="card-footer text-muted">
                January 21, 2022
            </div>
        </div>


        <div class="card text-center" id="secondScreen">
            <div class="card-header">
                İnstaller
            </div>
            <form id="installerForm" method="post">
                <div class="form-group">
                    <label for="formGroupExampleInput">Hostname Name</label>
                    <input type="text" class="form-control" id="hostname" name="hostName" placeholder="Example input placeholder">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Database Name</label>
                    <input type="text" class="form-control" id="dbName" name="dbName" placeholder="Example input placeholder">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Database Root Username</label>
                    <input type="text" class="form-control" id="dbUsername" name="dbUsername" placeholder="Another input placeholder">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Database Root Password</label>
                    <input type="password" class="form-control" id="dbPass" name="dbPass" placeholder="Another input placeholder">
                </div>
                <div class="form-group">

                    <button class="btn btn-success" id="installButton">Install</button>
                </div>
            </form>
            <div class="card-footer text-muted">
                January 21, 2022
            </div>
        </div>



        <div class="card text-center" id="lastScreen">
            <div class="card-header">
                İnstaller
            </div>
            <div class="card-body">
                <div style="border:1px solid green;margin:10px;width:100%;">
                    <div id="box" style="background:#98bf21;height:50px;width:1px;border:1px solid green;"></div>
                </div>

                <p id="demo"></p>
            </div>
            <div class="card-footer text-muted">
                January 21, 2022
            </div>
        </div>


        <div class="card text-center" id="loginSystem">
            <div class="card-header">
                İnstaller
            </div>
            <div class="card-body">
                <h5 class="card-title">İnstalitation Succesful</h5>
                <p class="card-text">This screen shows the installer completed successfully</p>
                <a href="index.php" class="btn btn-primary" id="firstScreenButton">Let's Go Your Site</a>
            </div>
            <div class="card-footer text-muted">
                January 21, 2022
            </div>
        </div>
    </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#secondScreen').hide();
            $('#lastScreen').hide();
            $('#box').hide();
            $('#loginSystem').hide();



            $('#firstScreenButton').click(function() {
                $('#firstScreen').animate({
                    height: "0px"
                });
                $('#firstScreen').animate({
                    width: "0px"
                });
                $('#firstScreen').hide('slow');
                $('#secondScreen').show(2000);

            });
            $('#secondScreenButton').click(function() {
                $('#secondScreen').animate({
                    height: "0px"
                });
                $('#secondScreen').animate({
                    width: "0px"
                });
                $('#lastScreen').show(2000);

            });



            $('#installerForm #installButton').on('click', function() {
                let dbName = $('#dbName').val();
                let dbUsername = $('#dbUsername').val();
                let dbPass = $('#dbPass').val();
                let hostname = $('#hostname').val();


                installSystem(dbName, hostname, dbUsername, dbPass);








                return false;

            })




        });

        function installSystem(dbName, hostname, dbUsername, dbPass) {


            $('#secondScreen').hide('slow');



            installBox(dbName, hostname, dbUsername, dbPass);
        }

        function installBox(dbName, hostname, dbUsername, dbPass) {

            $('#lastScreen').show();
            $('#box').show();

            $("#box").animate({
                width: "100%"
            }, {
                duration: 5000,
                easing: "linear",
                step: function(x) {
                    $("#demo").text(Math.round(x) + "%");
                }
            });
            loginSystem(dbName, hostname, dbUsername, dbPass)

        }



        function loginSystem(dbName, hostname, dbUsername, dbPass) {

            $.ajax({
                type: "POST",
                url: "installer.php",
                data: {
                    'hostname': hostname,
                    'dbName': dbName,
                    'dbUsername': dbUsername,
                    'dbPass': dbPass
                },


                success: function(myResponse) {
                    setTimeout(function() {
                        $('#lastScreen').hide();
                        $('#loginSystem').show();
                    }, 5000);


                },
                complete: function() {
                    setTimeout(function() {
                        $('#lastScreen').hide();
                        $('#loginSystem').show();
                    }, 5000);

                },
                statusCode: {
                    400: function() {
                        installerError();


                    },
                    401: function() {
                        installerError();



                    },
                    404: function() {

                        installerError();


                    }
                },
                error: function(jqXHR, textStatus) {
                    installerError();


                }
            });


        }

        function installerError() {
            alert('İnstaller Error');
        }
    </script>
</body>

</html>



<?php
//}


?>