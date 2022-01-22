function update(id,status) {
    $.ajax({
        type: "POST",
        url: "operation.php",
        data: {
            'func_order': 1,
            id: id,
            status: status
           
        },
        success: function (myResponse) {


           
          
            refreshTask();
        }
    });
    refreshTask();
   
}


function newTask(taskName) {
    $.ajax({
        type: "POST",
        url: "operation.php",
        data: {
            'func_order': 2,
           
            task: taskName
           
        },
        success: function (myResponse) {
          
            refreshTask();
        }
    });
}



function deleteTask(id) {
    $.ajax({
        type: "POST",
        url: "operation.php",
        data: {
            'func_order': 3,
           
            id: id
           
        },
        success: function (myResponse) {
           
            refreshTask();
        }
    });
}

$('#addTask').click(function() {


    let newTaskName = $('#newTaskName').val();

    newTask(newTaskName);
    refreshTask();

});


function taskShow(id,status){
    if(status == 0){
        $('#hiddenOrShow'+id).hide();
        $('#checkOrUncheck'+id).css({
            'filter' : 'invert(0%)'
        });
       
    }else{
   $('#hiddenOrShow'+id).show();
   $('#checkOrUncheck'+id).css({
       'filter' : 'invert(100%)'
   });

    }
}

function refreshTask() {

    $.ajax({
        type: "POST",
        url: "tasks.php",
       data:{
        'status' : 3
       },
        success: function (myResponse) {
            $('.row').empty();
            $('.row').append(myResponse);
        }
    });

}

function complatedTasks(){
  
    $.ajax({
        type: "POST",
        url: "tasks.php",
        data: {
            'status': 0
        },
        success: function (myResponse) {
            $('.row').empty();
            $('.row').append(myResponse);
        }
    });


}


function ongoingTasks(){
    $.ajax({
        type: "POST",
        url: "tasks.php",
        data: {
            'status': 1
        },
        success: function (myResponse) {
            $('.row').empty();
            $('.row').append(myResponse);
        }
    });

}