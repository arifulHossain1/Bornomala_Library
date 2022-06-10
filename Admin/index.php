<?php
    require_once 'header.php';
?>
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                    <div class="row">
                   
                    <?php
                                $admins = mysqli_query($con,"SELECT * FROM `ladmin`");
                                $total_admin = mysqli_num_rows($admins);
                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                            <a href="#">
                                <div class="panel-content">
                                    <h1 class="title color-light-1"> <i class="fa fa-users"></i><?= ' '.$total_admin?></h1>
                                    <h4 class="subtitle">Total Admin</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <?php
                                $users = mysqli_query($con,"SELECT * FROM `user`");
                                $total_users = mysqli_num_rows($users);
                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                            <a href="users.php">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-users"></i><?= ' '.$total_users?> </h1>
                                    <h4 class="subtitle color-darker-1">Total Users</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                   
                    <?php
                                $books = mysqli_query($con,"SELECT * FROM `books`");
                                $total_books = mysqli_num_rows($books);

                                $qty = mysqli_query($con,"SELECT SUM(`book_qty`) as total FROM `books`;");
                                $total_qty = mysqli_fetch_assoc($qty);
                     ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-light color-darker-2">
                            <a href="manage-book.php">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-book"></i><?= ' '.$total_books.' ('.$total_qty['total'].')'?> </h1>
                                    <h4 class="subtitle color-darker-1">Total Books</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
<?php
    require_once 'footer.php';
?>