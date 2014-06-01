<?php // require_once 'displayList.php';     ?>
<link href= "<?php echo base_url() ?>css/plugins/timeline/timeline.css" rel="stylesheet">
<div id="page-wrapper">
    <!--    <div class="row">
            <div class="col-lg-12">
                                <h1 class="page-header">Setup Profile</h1>
            </div>
        </div>-->
    <input type="hidden" id="user-id" value="<?php echo $id ?>">
    <div class="row" id="mainbody">
        <div class="col-lg-5">
            <div class="row">
                <div class="col-lg-offset-1 col-lg-11">
                    <div class=" panel panel-default ">
                        <div class="panel-heading">
                            <i class="fa fa-list fa-fw"></i> <?php echo $TaskHeader?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body tall-panel" id="step-form-div" >
                            <?php
                            $data = array('steps' => 3,
                                          'step' => 1);
                            $this->load->view('widgets/simpleStepper', $data);
                            ?>                        

                            <?php
                            $data = array('form' => 'users/forms/userProfile_1',
                                'step' => 1,
                                'heading' => $username,
                                'data' => '');
                            $this->load->view('widgets/simpleStepperSteps', $data);
                            ?>
                        </div>

                    </div>
                     <?php //$this->myhelpers->displaySpinner();?>
                </div>
                <!--             div inner row   -->
            </div>
            <!-- /.col-lg-8 -->
        </div>
        <div class="col-lg-6">
            <!-- /.panel-heading -->
            <div class="panel panel-default tall-panel">
                <div class="panel-heading">
                    <i class="fa fa-tasks fa-fw"> </i> Steps to Completion...
                </div>
                <div class="panel-body inside-tall-panel">
                    <?php $this->load->view('widgets/userTimeline') ?>
                </div>
            </div> 
        </div>
    </div>
</div>