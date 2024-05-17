<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website ban hang cong nghe</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.datatables.net/v/bs4/dt-2.0.7/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="#"><i class="fab fa-wolf-pack-battalion"></i>&nbsp;Wolfmania</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
    </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="text-center text-danger font-weight-normal my-3">CRUD Application Using Bootstrap 4 PHP-OOP, PDO-MySQL & Ajax, Datatable & SweetAlert2</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h4 class="mt-2 text-primary">All Users in database!</h4>
            </div>
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal" data-target="#addModal"><i class="fas fa-user-plus fa-lg"></i>&nbsp;&nbsp; Add New User</button>
                <a href="#" class="btn btn-success m-1 float-right"><i class="fas fa-table fa-lg"></i> Export to Excel</a>
            </div>
        </div>
        <hr class="my-1">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive" id="showUser">
                </div>
            </div>
        </div>
    </div>
    <!-- Add new User modal -->
    <div class="modal" id="addModal">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body px-4">
               <form action="" method="post" id="form-data">
                    <div class="form-group">
                        <input type="text" name="fname" placeholder="First Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lname" placeholder="Last Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" placeholder="Phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="insert" id="insert" value="Add User" class="btn btn-danger btn-block">
                    </div>
               </form>
            </div>  
        </div>
        </div>
    </div>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-2.0.7/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    $(document).ready(function(){
        showAllUser();
        function showAllUser(){
            $.ajax({
                url: "action.php",
                type: "POST",
                data: {action:"view"},
                success: function(response){
                    $("#showUser").html(response);
                    $("table").DataTable({
                        order: [0,'desc']
                    });
                }
            });
        }
        // insert ajax request
        $("#insert").click(function(e){
            if($("#form-data")[0].checkValidity()){
                e.preventDefault();
                $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: $("#form-data").serialize()+"&action=insert",
                    success: function(response){
                        Swal.fire({
                            title: 'User added successfully',
                            type: 'success',
                        })
                        $("#addModal").modal('hide');
                        $("#form-data")[0].reset();
                        showAllUser();
                    }
                });
            }
        });
    });
</script>
</body>
</html>