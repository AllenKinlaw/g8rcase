
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-offset-4 col-lg-5">
            <h1 class="page-header">Welcome to Gator Case!</h1>
        </div>
    </div>
    <div class="row" id="mainbody">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="chat-panel-lg panel panel-default panel-list">
                <div class="panel-heading">
                    <i class="fa fa-suitcase fa-fw text-primary fa-2x"></i> <?php echo 'Please reset your password' ?>

                </div>
                <!-- /.panel-heading -->
                <div class="panel-registration" id="panel-registration" >
                    <img src="<?php echo base_url();?>images/headshot.png"> </i>
                    <?php require_once 'resetPasswordForm.php';?>

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
        <div class="col-lg-3 pull-right">
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