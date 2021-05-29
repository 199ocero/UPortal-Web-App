<?php
    session_start();
    include('includes/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="main-txt-color text-center">Student Registration</h4>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_SESSION['status'])){
                        ?>
                            <div class="alert alert-main-color alert-dismissible fade show" role="alert">
                                <strong>Well Done!</strong> <?php echo $_SESSION['status']?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                                unset($_SESSION['status']);
                            }
                        ?>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="code.php" method="POST">
                                <div class="form-group mb-3">
                                    
                                        <label for="">First Name</label>
                                        <input type="text" name="fName" class="form-control" placeholder="Enter First Name">
                                    
                                </div>
                                <div class="form-group mb-3">
                                        <label for="">Middle Name</label>
                                        <input type="text" name="mName" class="form-control" placeholder="Enter Middle Name">
                                </div>
                                <div class="form-group mb-3">
                                        <label for="">Last Name</label>
                                        <input type="text" name="lName" class="form-control" placeholder="Enter Last Name">
                                </div>
                                <div class="form-group mb-3">
                                        <label for="">Email Address</label>
                                        <input type="email" name="email" class="form-control" placeholder="name@example.com">
                                </div>
                                <div class="form-group mb-3">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                </div>
                                <div class="form-group mb-3 float-right">
                                    <button type="submit" name="save-data" class="btn btn-primary">REGISTER</button>
                                    <a href="index.php" class="btn btn-danger">BACK</a>
                                </div>
                                <div class="form-group mb-3">
                                   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include('includes/footer.php');
?>