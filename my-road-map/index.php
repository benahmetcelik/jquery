<!doctype html>
<html lang="en">
<?php
require_once 'connection.php';
if(!$db){
  //  header('Location: install.php');
}
?>

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
            <div class="topFixButtionComponent">
                <input class="form-control" type="text" placeholder="Add To Task" name="newTaskName" id="newTaskName" aria-label="Add">
                <button class="btn btn-success" name="addTask" id="addTask">+</button>
            </div>
            <br>
    <div class="container">
        <div class="col-md-12">
            <div class="row">


            </div>
        </div>
    </div>
  
    <div class="bottomFixButtionComponent">
        <button class="btn btn-success" onclick="complatedTasks();">Complated Tasks </button>
        <div>|</div>
        <button class="btn btn-info" onclick="refreshTask();">All Tasks </button>
        <div>|</div>
        <button class="btn btn-danger" onclick="ongoingTasks();">Ongoing Tasks </button>
    </div>


  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        <?php
        include 'operation.php';
        ?>




        $(window).on('load', function() {

            refreshTask();

        });
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

</body>

</html>