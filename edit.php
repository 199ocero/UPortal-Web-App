<?php
    session_start();
    include('includes/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="main-txt-color text-center">Update Student Profile</h4>
                </div>
                <div class="card-body">
                    <?php
                    $token = $_GET['token'];
                    include('dbcon.php');
                    $reference = $database->getReference('students')->getChild($token)->getValue();
                    
                    ?>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="code.php" method="POST">
                                <input type="hidden" name="token" value="<?php echo $token; ?>">
                                <div class="form-group mb-3">
                                    <label for="">First Name</label>
                                    <input type="text" name="fName" class="form-control" value="<?php echo $reference['fName']; ?>" placeholder="Enter First Name">
                                </div>
                                <div class="form-group mb-3">
                                        <label for="">Middle Name</label>
                                        <input type="text" name="mName" class="form-control" value="<?php echo $reference['mName']; ?>" placeholder="Enter Middle Name">
                                </div>
                                <div class="form-group mb-3">
                                        <label for="">Last Name</label>
                                        <input type="text" name="lName" class="form-control" value="<?php echo $reference['lName']; ?>" placeholder="Enter Last Name">
                                </div>
                                <div class="form-group mb-3">
                                        <label for="">Email Address</label>
                                        <input type="email" name="email" class="form-control" value="<?php echo $reference['email']; ?>" placeholder="name@example.com">
                                </div>
                                <div class="form-group mb-3 float-right">
                                    <button type="submit" name="update-data" class="btn btn-primary">UPDATE</button>
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