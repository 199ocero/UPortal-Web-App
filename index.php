<?php
    session_start();
    include('includes/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="main-txt-color">UPortal Admin Panel
                        <a href="register-student.php" class="btn btn-primary float-right">REGISTER STUDENT</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_SESSION['status'])){
                        ?>
                        <div class="alert alert-main-color alert-dismissible fade show" role="alert">
                            <strong>Yehey!</strong> <?php echo $_SESSION['status']?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                            unset($_SESSION['status']);
                        }
                    ?>
                    <table class="table table-bordered table-fit">
                        <thead>
                            <tr class="text-center main-txt-color-dark">
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Email Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include('dbcon.php');
                                $fetchData = $database->getReference('students')->getValue();
                                if($fetchData >0){
                                foreach($fetchData as $key =>$row){    
                                    ?>
                                    <tr class="text-center main-txt-color-dark">
                                        <td><?php echo $row['fName'];?></td>
                                        <td><?php echo $row['mName'];?></td>
                                        <td><?php echo $row['lName'];?></td>
                                        <td><?php echo $row['email'];?></td>
                                        <td>
                                            <a href="edit.php?token=<?php echo $key;?>" class="btn btn-secondary btn-space">Edit</a>
                                        </td>
                                        <td>
                                            <form action="code.php" method="POST">
                                                <input type="hidden" name="ref-token-delete" value="<?php echo $key;?>">
                                                <button type="submit" name="delete-data" class="btn btn-danger">Delete  </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                }else{
                                    ?>
                                    <tr class="main-txt-color-dark">
                                        <td colspan="6">
                                            No data yet. Please register a student.
                                        </td>
                                    </tr>
                                    <?php

                                }
                            ?>  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include('includes/footer.php');
?>