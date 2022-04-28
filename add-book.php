<?php
    require_once 'header.php';

    if(isset($_POST['save_book'])){
        $book_name = $_POST['book_name'];
        $book_author_name = $_POST['book_author_name'];
        $book_donor = $_POST['book_donor'];
        $book_qty = $_POST['book_qty'];
        $admin_username = $_SESSION['admin_username'];

        $image = explode('.',$_FILES['book_image']['name']);
        $image_ext = end($image);
        $image = date('Ymdhis.').$image_ext;

        $result = mysqli_query($con,"INSERT INTO `books`(`book_name`, `book_image`, `book_author_name`, `book_donor`, `book_qty`, `admin_username`) VALUES ('$book_name','$image','$book_author_name','$book_donor','$book_qty','$admin_username')");
        if($result){
            move_uploaded_file($_FILES['book_image']['tmp_name'],'../Images/books/'.$image);
            $success = "Book info saved Successfully!";
        }else{
            $error = "Book info not save!";
        }
    }
?>
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li></i><a href="javascript:avoid(0)">Add Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-6 col-sm-offset-3">
                    <?php
                if(isset($success)){
                    ?>
                <div class="alert alert-success" role="alert">
                    <?= $success ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                }
                ?>
                <?php
                if(isset($error)){
                    ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                }
                ?>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                        <h5 class="mb-lg">Add Book</h5>
                                        <div class="form-group">
                                            <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Book Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_image" class="col-sm-4 control-label">Book Image</label>
                                            <div class="col-sm-8">
                                                <input type="file" id="book_image" name="book_image" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_author_name" class="col-sm-4 control-label">Book Author</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="book_author_name" name="book_author_name" placeholder="Book Author" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_donor" class="col-sm-4 control-label">Book Donor</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="book_donor" name="book_donor" placeholder="Book Donor" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_qty" class="col-sm-4 control-label">Book Quantity</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="book_qty" name="book_qty" placeholder="Book Quantity" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-5 col-sm-12">
                                                <button type="submit" name="save_book" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
<?php
    require_once 'footer.php';
?>