<?php require_once 'displayList.php'; ?>
<div id="page-wrapper">
    <!--    <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Home Page</h1>
            </div>
             /.col-lg-12 
        </div>-->
    <div class="row" id="mainbody">
        <div class="col-lg-4">
            <div class="chat-panel-lg panel panel-default panel-list">
                <div class="panel-heading">
                    <i class="fa fa-folder-open fa-fw"></i> <?php echo $module ?>
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body left-nav-panel" >

                    <?php
                    $case = new displayList();
                    $case->printList($listmodel, $rows)
                    ?>
                    <!-- /.list-group -->
                    <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                    <!--                </div>-->
                    <!-- /.panel-body -->
                </div>

            </div>
            <!-- /.col-lg-4 -->
        </div>
        <div class="col-lg-8 pull-right">
            <div class="panel panel-default panel-main">
                <div class="panel-heading">
                    <i class="fa fa-folder-open fa-fw"></i> <?php echo $module ?> Details
                </div>
                <!--            panel heading-->
                <div class="panel-body target-panel" id="target-panel"> 


                    <?php
                    ?>
                </div>
                <div class="modal-dialog" id="myDetailModal" >
                    <div class="modal-content">
                        <div class="modal-body">
                            <i class="fa fa-spinner fa-spin fa-5x text-primary"></i>
                        </div>
                    </div>
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
