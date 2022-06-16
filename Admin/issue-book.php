<?php
    require_once 'header.php';

    if(isset($_POST['issue-book'])){
        /*echo "<pre>";
        print_r($_POST);
        echo "</pre>";*/
        $user_id = $_POST['user_id'];
        $book_id = $_POST['book_id'];
        $book_issue_date = $_POST['book_issue_date'];
        
        $result = mysqli_query($con,"INSERT INTO `issue_books`(`user_id`, `book_id`, `book_issue_date`) VALUES ('$user_id','$book_id','$book_issue_date')");

        if($result){
            mysqli_query($con,"UPDATE `books` SET `book_qty`=`book_qty`-1 WHERE `id` = '$book_id'");
            ?>
            <script type="text/javascript">
                alert('Book issued successfully!');
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript">
                alert('Book did not store successfully!');
            </script>
            <?php
        }
    }
?>
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li></i><a href="javascript:avoid(0)">Issue Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-6 col-sm-offset-3">
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-inline" method="post" action="">
                                        <div class="form-group">
                                            <select class="form-control" name="user_id" >
                                                <option value="">Select</option>
                                                <?php
                                                     $result = mysqli_query($con, "SELECT * FROM `user` WHERE `status` = '1'");
                                                    while($row = mysqli_fetch_assoc($result)){?>
                                                        <option value="<?= $row['id']?>"><?= ucwords($row['fname'].' '.$row['lname']).' - ( '.$row['reg'].' )' ?></option>
                                                        <?php
                                                    } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="search" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php
                            if(isset($_POST['search'])){
                                $id = $_POST['user_id'];
                                $result = mysqli_query($con, "SELECT * FROM `user` WHERE `id` = '$id' AND `status` = '1'");
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <label for="name">User Name</label>
                                            <input type="text" class="form-control" id="name" value="<?= ucwords($row['fname'].' '.$row['lname']) ?>" readonly>
                                            <input type="hidden" value="<?= $row['id']?>" name="user_id">
                                        </div>
                                        <div class="form-group">
                                            <label>Book Name</label>
                                            <select class="form-control" name="book_id" >
                                                <option value="">Select</option>
                                                <?php
                                                     $result = mysqli_query($con, "SELECT * FROM `books` WHERE `book_qty` > 0");
                                                    while($row = mysqli_fetch_assoc($result)){?>
                                                        <option value="<?= $row['id']?>"><?= $row['book_name']?></option>
                                                        <?php
                                                    } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Book Issue Date</label>
                                            <input class="form-control" type="text" name="book_issue_date" value="<?= date('d-m-Y') ?>" readonly>
                                         </div>                                       
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name ="issue-book">Save Issue Book</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    </div>
                </div>
<?php
    require_once 'footer.php';
?>