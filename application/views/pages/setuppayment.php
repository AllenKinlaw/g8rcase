<?php // require_once 'displayList.php';  ?>
<link href= "<?php echo base_url() ?>css/plugins/timeline/timeline.css" rel="stylesheet">
<div id="page-wrapper">
<!--    <div class="row">
        <div class="col-lg-12">
                            <h1 class="page-header">Setup Profile</h1>
        </div>
    </div>-->
    <div class="row" id="mainbody">
        <div class="col-lg-5">
            <div class="row">
                <div class="col-lg-offset-1 col-lg-11">
                    <div class=" panel panel-default ">
                        <div class="panel-heading">
                            <i class="fa fa-list fa-fw"></i> <?php echo 'Setup User Profile' ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body tall-panel" >
                            <div id="vis-nav ">
                                <ul class="nav nav-pills">
                                    <li class="active step-link" id="step1"><a href="#" id="step1" class="step-link" >
                                            <span class="badge"> 1 </span>
                                        </a>
                                    </li>
                                    <li id="step2" class="step-link">
                                        <a href="#" id="step2" class="step-link">
                                            <span class="badge"> 2 </span>
                                        </a>
                                    </li>
                                    <li id="step3" class="step-link">
                                        <a href="#" id="step3" class="step-link">
                                            <span class="badge"> 3 </span>
                                        </a>
                                    <li>
                                </ul>
                                <p></p>
                            </div>
                            <div id="vis-container">
                                <div id="annotation-steps">
                                    <div class="annotation-step" id="step1-annotation" style="display:block;">
                                        <div class="panel panel-success inside-tall-panel">
                                            <div class="panel-heading">
                                                User Profile</div>
                                            <div class="panel-body inside-tall-panel-body">

                                                <span class='text-danger'> <?php echo validation_errors(); ?></span>
                                                <?php
                                                echo form_open('user/saveprofile');
                                                echo '<div class="well well-default">';
                                                //echo '<legend>  </legend>';

                                                echo '<p> <label>Prefered Email Address: </label> <small class="text-danger"> *required </small>';
                                                echo '<div class="panel panel-danger">';
                                                echo form_input(array(
                                                    'name' => 'email',
                                                    'class' => 'form-control danger',
                                                    'value' => $this->input->post('email')
                                                ));
                                                echo '</div>';
                                                echo '<p> <label>Title: </label> <small>(As would appear on offical documents) </small>';
                                                echo form_input(array(
                                                    'name' => 'title',
                                                    'class' => 'form-control',
                                                    'value' => $this->input->post('title')
                                                ));
                                                echo '</div>';
                                                //  echo form_close();
                                                ?>
                                            </div>
                                            <div class="panel-footer">
                                                <a href="#" id="step2" class="step-link">
                                                    <button class="btn btn-sm btn-default btn-primary">
                                                        <span class="badge primary">&gt&gt</span>
                                                    </button>
                                                </a>
                                            </div>

                                        </div>    
                                    </div>
                                    <div class="annotation-step panel-body" id="step2-annotation">
                                        <div class="panel panel-success inside-tall-panel">
                                            <div class="panel-heading">
                                                Phone
                                            </div>
                                            <div class="panel-body inside-tall-panel-body">
                                                <?php
//                                    echo validation_errors();
//                                    echo form_open('user/saveprofile/');


                                                echo '</p>';
                                                echo '<div class="well well-default">';
                                                // echo '<legend> Phone </legend>';
                                                echo '<p> <label>Work Phone: </label>';
                                                echo form_input(array(
                                                    'name' => 'work_phone',
                                                    'class' => 'form-control',
                                                    'value' => $this->input->post('work_phone')
                                                ));
                                                echo '</p>';
                                                echo '<p> <label>Mobile Phone: </label>';
                                                echo form_input(array(
                                                    'name' => 'mobile_phone',
                                                    'class' => 'form-control',
                                                    'value' => $this->input->post('mobile_phone')
                                                ));
                                                echo '</p>';
                                                echo '<p> <label>Home Phone: </label>';
                                                echo form_input(array(
                                                    'name' => 'home_phone',
                                                    'class' => 'form-control',
                                                    'value' => $this->input->post('home_phone')
                                                ));
                                                echo '</div>';
                                                ?>

                                            </div>
                                            <div class="panel-footer">
                                                <a href="#" id="step1" class="step-link">
                                                    <button class="btn btn-sm btn-default btn-primary">
                                                        <span class="badge primary">&lt&lt</span>
                                                    </button>
                                                </a>
                                                <a href="#" id="step3" class="step-link pull-right">
                                                    <button class="btn btn-sm btn-default btn-primary">
                                                        <span class="badge primary">&GT&GT</span>
                                                    </button>
                                                </a>
                                            </div>
                                            <!--                                        </div>-->
                                        </div>
                                    </div>
                                    <div class="annotation-step panel-body" id="step3-annotation">
                                        <div class="panel panel-success inside-tall-panel">
                                            <div class="panel-heading">
                                                Address 
                                            </div>
                                            <div class="panel-body inside-tall-panel-body">
                                                <?php
                                                echo '</p>';
                                                echo '<div class="well well-default">';
                                                //echo '<legend> Address </legend>';
                                                echo '<p> <label>Street: </label>';
                                                echo form_input(array(
                                                    'name' => 'address_street',
                                                    'class' => 'form-control',
                                                    'value' => $this->input->post('address_street')
                                                ));
                                                echo '</p>';
                                                echo '<p> <label>City </label>';
                                                echo form_input(array(
                                                    'name' => 'address_city',
                                                    'class' => 'form-control',
                                                    'value' => $this->input->post('address_city')
                                                ));
                                                echo '<p> <label>State</label>';
                                                echo form_input(array(
                                                    'name' => 'address_state',
                                                    'class' => 'form-control',
                                                    'value' => $this->input->post('address_state')
                                                ));
                                                echo '<p> <label>Zip </label>';
                                                echo form_input(array(
                                                    'name' => 'address_postalcode',
                                                    'class' => 'form-control',
                                                    'value' => $this->input->post('address_postalcode')
                                                ));

                                                echo '</p>';
                                                echo '</div>';
                                                ?>
                                            </div>
                                            <div class="panel-footer">
                                                <a href="#" id="step2" class="step-link">
                                                    <button class="btn btn-sm btn-default btn-primary">
                                                        <span class="badge primary">&lt&lt</span>
                                                    </button>
                                                </a>
                                                <?php
                                                //echo '<p>';
                                                echo form_submit(array('class' => 'btn btn-default btn-sm btn-success pull-right'), 'Save My Profile');
                                                // echo '</p>';
                                                echo form_close();
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-dialog" id="myDetailModal" >
                        <div class="modal-content">
                            <div class="modal-body">
                                <i class="fa fa-spinner fa-spin fa-5x text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <!--                Cols 1-9-->
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
                    <ul class="timeline">
                        <li>
                            <div class="timeline-badge"><i class="fa fa-check"></i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h5 class="timeline-title">Establish your User Id and Password</h5>
                                    <p>
                                        <small class="text-muted"><i class="fa fa-time"></i> Approximately 2 Minutes</small>
                                    </p>
                                </div>
                                <!--                                        <div class="timeline-body">
                                                                            <p>Setup Your User Id and Password</p>
                                                                        </div>-->
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge success"><i class="fa fa-list"></i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Complete Your User Profile</h4>
                                    <p>
                                        <small class="text-muted"><i class="fa fa-time"></i> Approximately 2 Minutes</small>
                                    </p>
                                </div>
                                <!--                                        <div class="timeline-body">
                                                                            <p>
                                                                                Establish your initial  preferences and settings.
                                                                            </p>
                                
                                                                        </div>-->
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge warning"><i class="fa fa-group"></i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Connect to your firm</h4>
                                    <p>
                                        <small class="text-muted"><i class="fa fa-time"></i> Approximately 1-5 Minutes</small>
                                    </p>
                                    <!--
                                                                            </div>
                                                                            <div class="timeline-body">
                                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                                                                            </div>
                                                                        </div>-->
                                    </li>
                                    <li class="timeline-inverted">
                                        <div class="timeline-badge warning"><i class="fa fa-group"></i>
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">Select Payment Option</h4>
                                                <p>
                                                    <small class="text-muted"><i class="fa fa-time">

                                                        </i> Approximately 1-2 Minutes</small>
                                                </p>
                                                <!--
                                                                                        </div>
                                                                                        <div class="timeline-body">
                                                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                                                                                        </div>
                                                                                    </div>-->
                                                </li>
                                                <li class="timeline">
                                                    <div class="timeline-badge warning"><i class="fa fa-thumbs-up"></i>
                                                    </div>
                                                    <div class="timeline-panel">
                                                        <div class="timeline-heading">
                                                            <h4 class="timeline-title">Start Using Gator Case</h4>
                                                        </div>
                                                        <!--                                                    <div class="timeline-body">
                                                                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                                                                                                            </div>-->
                                                    </div>
                                                </li>
                                                </ul>
                                            </div>
                                        </div> 
                                        <!--Panel DEfault -->
                                        <!-- panel body -->
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