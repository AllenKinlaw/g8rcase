<?php require_once 'displayCaseList.php'; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Home Page</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="chat-panel-lg panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-folder-open fa-fw"></i> Cases
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
                    $case = new displayCaseList();
                    $case->printCaseList($fieldkey, $fieldvalue)
                    ?>
                    </ul>
                    <!-- /.list-group -->
                    <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                    <!--                </div>-->
                    <!-- /.panel-body -->
                </div>

            </div>
            <!-- /.col-lg-4 -->
        </div>
        <div class="col-lg-8 pull-right">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-folder-open fa-fw"></i> Case Details
                </div>
                <!--            panel heading-->
                <div class="panel-body"> 
                    <?php
   
                    ?>
                </div>
            </div> 
            <!--        panel-->

            <!-- /.col-lg-12 -->
            <?php
            // put your code here
            ?>
        </div>
    </div>
