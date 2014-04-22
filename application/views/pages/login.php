<?php require_once 'displayList.php'; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Login</h1>
        </div>
    </div>
    <div class="row" id="mainbody">
        <div class="col-lg-8">
            <div class="chat-panel-lg panel panel-default panel-list">
                <div class="panel-heading">
                    <i class="fa fa-gears fa-fw"></i> <?php echo 'User Profile' ?>

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body left-nav-panel" >

                    <?php
                    echo validation_errors();
                    ?>

                </div>

            </div>
            <div class="modal-dialog" id="myDetailModal" >
                <div class="modal-content">
                    <div class="modal-body">
                        <i class="fa fa-spinner fa-spin fa-5x text-primary"></i>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <div class="col-lg-4 pull-right">
            <div class="panel panel-default panel-main">
                <div class="panel-heading">
                    <i class="fa fa-sign-in fa-fw"></i> <?php echo 'Sign in' ?> Details
                </div>
                <!--            panel heading-->
                <div class="panel-body target-panel" id="target-panel"> 


                    <?php
                    echo form_open('user/validate_login');
                    echo '<p> Email: ';
                    echo form_input('Email');
                    echo '</p>';
                    echo '<p> Password: ';
                    echo form_input('Password');
                    echo '</p>';
                    echo '<p>';
                    echo form_submit('login_submit', 'Sign Up');
                    echo '</p>';
                    echo form_close();
                    ?>
                    <a href="user/registeruser">
                        <button href="users/registeruser" type="button" class="btn btn-primary btn-xs">
                        Become a Gator...
                        </button>
                    </a>
                </div>

            </div> 
            <!--        panel-->


            <!-- /.col-lg-12 -->
            <?php
            // put your code here
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12" id="myModal">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-body">
                        <i class="fa fa-spinner fa-spin fa-5x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>