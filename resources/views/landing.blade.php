<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Todo App</title>
</head>
<body>
    <!-- sprintf(%2d,$arg) -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <h1>Task List</h1>
                
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary createBtn">Add</button>
            </div>
        </div>
        <!-- card section for indicating pending,completed,and deleted tasks -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <p class="text-dark">Pending</p>
                        <p class="text-muted">02</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <p class="text-dark">Completed</p>
                        <p class="text-muted">09</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <p class="text-dark">Deleted</p>
                        <p class="text-muted">12</p>
                    </div>
                </div>
            </div> 
        <!-- card ends -->
         <!-- task list -->
         <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Task</td>
                        <td>Date</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
         </div>
         <!-- task list ends -->
          <!-- modal -->
            <div class="modal" tabindex="-1" role="dialog" id="createModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
            
          <span aria-hidden="true" ><i class="fa fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-wrapper">
            <div class="form-group">
                <label for="task" >Enter Task *</label>
                <input type="text" id="task"  value="" class="form-control" placeholder="enter task...">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary saveBtn">Save changes</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
           <!-- modal ends -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <script>
        $(document).on('click','.createBtn',function(){
            $("#task").val("")
            $("#createModal").modal('toggle');

        })

        // task submition
        $(document).on('click','.saveBtn',function()
        {
            let taskInput=$("#task");  //caching selector 
            let task=taskInput.val().trim()
          
            if(!task)
            {
                showErrorMessage("task should not be empty !")
                taskInput.focus();
                
                return false;
            }

            if(task.length < 10)
            {
                showErrorMessage("should be atleast 10 characters")
                taskInput.focus();
                return false;
            }
        });

        // function for showing validation error

        function showErrorMessage(msg)
        {
            if(msg)
            {
               alert(msg)
            }
          
        }

        // removing aria-hidden issue in modern browsers on bootstrap modal
        document.addEventListener('hidden.bs.modal', function (event) {
  
            if (document.activeElement) {
            document.activeElement.blur();
            }
        });
    </script>
</body>
</html>