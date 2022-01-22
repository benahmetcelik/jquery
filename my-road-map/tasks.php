<?php
include 'connection.php';
if ($_POST) {


    if ($_POST['status'] == 1) {

        $tasks = $db->query("SELECT * FROM mytasks WHERE status = 1  ORDER BY id DESC", PDO::FETCH_ASSOC);
        if ($tasks->rowCount()) {
            foreach ($tasks as $task) {
                echo '
                   
                   <div class="col-md-2  m-3 p-3 task">
                   <div class="card text-center mx-auto" style="width: 18rem;" id="myTask' . $task['id'] . '">
                       <div class="card-header">
                       ' . $task['name'] . '<br>
                           <img src="assets/img/trash.png" style="width: 20px;" id="pushDestroy' . $task['id'] . '" onclick="deleteTask(' . $task['id'] . ');">
                           <img src="assets/img/check.png" style="width: 20px;" onclick="update(' . $task['id'] . ',';
                if ($task['status'] == 1) {
                    echo '0';
                } else {
                    echo '1';
                }
                echo ');" id="checkOrUncheck' . $task['id'] . '">
        
                       </div>
                       <div id="hiddenOrShow' . $task['id'] . '">
                      
                           <label class="custom-control-label" for="' . $task['id'] . '">
                               <img src="assets/img/pin.png" class="img taskCheck' . $task['id'] . '" id="img' . $task['id'] . '" onclick="update(' . $task['id'] . ',';
                if ($task['status'] == 1) {
                    echo '0';
                } else {
                    echo '1';
                }
                echo ');" id="img' . $task['id'] . '">
                           </label>
                       </div>
                   </div>
               </div>
               <script>
               taskShow(' . $task['id'] . ',' . $task['status'] . ');
               </script>
                   ';
            }
        }
    } else if ($_POST['status'] == 0) {




        $tasks = $db->query("SELECT * FROM mytasks WHERE status = 0  ORDER BY id DESC", PDO::FETCH_ASSOC);
        if ($tasks->rowCount()) {
            foreach ($tasks as $task) {
                echo '
                   
                   <div class="col-md-2  m-3 p-3 task">
                   <div class="card text-center mx-auto" style="width: 18rem;" id="myTask' . $task['id'] . '">
                       <div class="card-header">
                       ' . $task['name'] . '<br>
                           <img src="assets/img/trash.png" style="width: 20px;" id="pushDestroy' . $task['id'] . '" onclick="deleteTask(' . $task['id'] . ');">
                           <img src="assets/img/check.png" style="width: 20px;" onclick="update(' . $task['id'] . ',';
                if ($task['status'] == 1) {
                    echo '0';
                } else {
                    echo '1';
                }
                echo ');" id="checkOrUncheck' . $task['id'] . '">
        
                       </div>
                       <div id="hiddenOrShow' . $task['id'] . '">
                      
                           <label class="custom-control-label" for="' . $task['id'] . '">
                               <img src="assets/img/pin.png" class="img taskCheck' . $task['id'] . '" id="img' . $task['id'] . '" onclick="update(' . $task['id'] . ',';
                if ($task['status'] == 1) {
                    echo '0';
                } else {
                    echo '1';
                }
                echo ');" id="img' . $task['id'] . '">
                           </label>
                       </div>
                   </div>
               </div>
               <script>
               taskShow(' . $task['id'] . ',' . $task['status'] . ');
               </script>
                   ';
            }
        }
    } else {


        $tasks = $db->query("SELECT * FROM mytasks ORDER BY id DESC", PDO::FETCH_ASSOC);
        if ($tasks->rowCount()) {
            foreach ($tasks as $task) {
                echo '
           
           <div class="col-md-2  m-3 p-3 task">
           <div class="card text-center mx-auto" style="width: 18rem;" id="myTask' . $task['id'] . '">
               <div class="card-header">
               ' . $task['name'] . '<br>
                   <img src="assets/img/trash.png" style="width: 20px;" id="pushDestroy' . $task['id'] . '" onclick="deleteTask(' . $task['id'] . ');">
                   <img src="assets/img/check.png" style="width: 20px;" onclick="update(' . $task['id'] . ',';
                if ($task['status'] == 1) {
                    echo '0';
                } else {
                    echo '1';
                }
                echo ');" id="checkOrUncheck' . $task['id'] . '">

               </div>
               <div id="hiddenOrShow' . $task['id'] . '">
              
                   <label class="custom-control-label" for="' . $task['id'] . '">
                       <img src="assets/img/pin.png" class="img taskCheck' . $task['id'] . '" id="img' . $task['id'] . '" onclick="update(' . $task['id'] . ',';
                if ($task['status'] == 1) {
                    echo '0';
                } else {
                    echo '1';
                }
                echo ');" id="img' . $task['id'] . '">
                   </label>
               </div>
           </div>
       </div>
       <script>
       taskShow(' . $task['id'] . ',' . $task['status'] . ');
       </script>
           ';
            }
        }
    }
}


?>
