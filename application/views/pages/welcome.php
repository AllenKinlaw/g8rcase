<?php require_once 'displayList.php'; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-offset-4 col-lg-4">
            <h1 class="page-header">Welcome to Gator Case!</h1>
        </div>
    </div>
    <div class="row" id="mainbody">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="chat-panel-lg panel panel-default panel-list">
                <div class="panel-heading">
                    <i class="fa fa-suitcase fa-fw text-primary fa-2x"></i> <?php echo 'You are on the way to becomeing a Gator!' ?>

                </div>
                <!-- /.panel-heading -->
                <div class=" panel-registration" >
                    <img src="images/headshot.png"> </i>
                    <?php
                    echo validation_errors();
                    echo form_open('user/completeRegistration/'.$key);
                    echo '<p> <label>Password: </label>';
                    echo form_password(array(
                        'name' => 'Password',
                        'class' => 'form-control'
                    ));
                    echo '<p> <label>Confirm Password: </label>';
                    echo form_password(array(
                        'name' => 'CPassword',
                        'class' => 'form-control'
                    ));
                    echo '</p>';
                    echo '<p>';
                    echo form_submit('login_submit', 'Sign Up');
                    echo '</p>';
                    echo form_close();
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