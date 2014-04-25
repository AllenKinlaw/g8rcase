<?php // require_once 'displayList.php';                     ?>
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
                            <i class="fa fa-list fa-fw"></i> <?php echo 'Connect to Your Firm' ?>
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
                                                echo form_open('user/savefirm/2');
                                                //echo form_open('user/savefirm');
                                                echo '<div class="well well-default">';
                                                //echo '<legend>  </legend>';

                                                echo '<p> <label>My firm has an account: </label>'
                                                . '   <br> <small class="text-danger"> Please type the code you were provided in the field below</small>';
                                                echo '<div class="panel panel-danger">';
                                                echo form_input(array(
                                                    'name' => 'firmkey',
                                                    'id' => 'firmkey',
                                                    'class' => 'form-control danger',
                                                    'value' => set_value('firmkey')
                                                ));
                                                echo '</div>';
                                                echo '<p> <label>My firm does not have an account yet: ';
                                                ?>
                                                <input type="checkbox" 
                                                       name="newfirm" 
                                                       id = "newfirm"
                                                       value="1" <?php echo set_checkbox('newfirm', '1'); ?> />
                                                       <?php
                                                       echo '</label> </p>';
                                                       echo '</div>';
                                                       // echo form_close();
                                                       ?>
                                            </div>
                                            <div class="panel-footer">
                                                <!--                                                <a href="#" id="submit-step1" class="step-link-submit pull-right">-->
                                                <button class="btn btn-sm btn-default btn-primary pull-right" type="submit">
                                                    <span class="badge primary">&gt&gt</span>
                                                </button>
                                                <!--                                               </a>-->
                                            </div>
                                            <?php echo form_close(); ?>
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
                                                echo form_open('user/savefirm/3');
                                                //echo '</p>';
                                                echo '<div class="well well-default">';
                                                // echo '<legend> Firm Account Details </legend>';
                                                ?>
                                                <legend> Firm/Account Details </legend>
                                                    <p> 

                                                        <label>Solo (1 User): 
                                                            <input type="radio" 
                                                                   name="accounttype" 
                                                                   id = "accounttype"
                                                                   value="S" <?php echo set_radio('accounttype','S',true); ?> />
                                                        </label>
                                                        <label class="pull-right">  Firm (Multiple Users): 
                                                            <input type="radio" 
                                                                   name="accounttype" 
                                                                   id = "accounttype2"
                                                                   value="F" <?php echo set_radio('accounttype','F'); ?> />
                                                        </label>
                                                    </p>
                                                <?php
                                                echo '<p> <label>Firm/Account Name: </label>';
                                                echo form_input(array(
                                                    'name' => 'firm_name',
                                                    'class' => 'form-control',
                                                    'value' => $this->input->post('firm_name')
                                                ));
                                                echo '</p>';
                                                echo '<p> <label class="firm-field">Number of users you will set up under this account: </label>';
                                                echo form_input(array(
                                                    'name' => 'num_users',
                                                    'id' => 'num_users',
                                                    'class' => 'form-control firm-field',
                                                    'value' => $this->input->post('num_users')
                                                ));
                                                echo '</p>';
                                                echo '</div>';
                                                ?>

                                            </div>
                                            <div class="panel-footer">

                                                <a href="1" id="step1" class="btn btn-sm btn-default btn-primary step-link">
                                                    <!--                                                <button type="submit" id="step1" class="btn btn-sm btn-default btn-primary">-->
                                                    <span class="badge primary">&lt&lt</span>
                                                    <!--                                                </button>-->
                                                </a>

                                                <a href="#" id="step3" class="step-link pull-right">
                                                    <button class="btn btn-sm btn-default btn-primary">
                                                        <span class="badge primary">&GT&GT</span>
                                                    </button>
                                                </a>
                                            </div>
                                            <?php echo form_close(); ?>
                                            <!--                                        </div>-->
                                        </div>
                                    </div>
<!--                                    <div class="annotation-step panel-body" id="step3-annotation">
                                        <div class="panel panel-success inside-tall-panel">
                                            <div class="panel-heading">
                                                Address 
                                            </div>
                                            <div class="panel-body inside-tall-panel-body">
                                                <?php
                                                echo '<legend> Billing Address </legend>';
                                                echo '<p> <label>Street: </label>';
                                                echo form_input(array(
                                                    'name' => 'street',
                                                    'class' => 'form-control',
                                                    'value' => $this->input->post('street')
                                                ));
                                                echo '</p>';
                                                echo '<p> <label>City: </label>';
                                                echo form_input(array(
                                                    'name' => 'city',
                                                    'class' => 'form-control',
                                                    'value' => $this->input->post('city')
                                                ));
                                                echo '</p>';
                                                echo '<p> <label>State: </label>';
                                                echo form_input(array(
                                                    'name' => 'state',
                                                    'class' => 'form-control',
                                                    'value' => $this->input->post('state')
                                                ));
                                                echo '</p>';
                                                echo '<p> <label>Zip: </label>';
                                                echo form_input(array(
                                                    'name' => 'postalcode',
                                                    'class' => 'form-control',
                                                    'value' => $this->input->post('postalcode')
                                                ));
                                                echo '</p>';
                                                echo '</div>';
                                                ?>
                                            </div>
                                            <div class="panel-footer">
                                                                                                echo form_open('user/savefirm/1');
                                                <a href="#" id="step2" class="step-link">
                                                    <button class="btn btn-sm btn-default btn-primary">
                                                        <span class="badge primary">&lt&lt</span>
                                                    </button>
                                                </a>
                                                echo form_close();
                                                <?php
                                                //echo '<p>';
                                                echo form_submit(array('class' => 'btn btn-default btn-sm btn-success pull-right'), 'Save My Profile');
                                                // echo '</p>';
                                                echo form_close();
                                                ?>
                                            </div>
                                        </div>
                                    </div>-->
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
                            <div class="timeline-badge"><i class="fa fa-check"></i>
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
                            <div class="timeline-badge success"><i class="fa fa-group"></i>
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
                            <input type="hidden" name="current-step" id="current-step" value="<?php echo $currentstep ?>" >
                            <script>
                                $("#firmkey").on("change", function() {

                                    if ($("#firmkey").val() === '') {
                                        $("#newfirm").prop("disabled", false);
                                        return;
                                    }
                                    $("#newfirm").prop("disabled", true);
                                });
                                $("#firmkey").on("keyup blur", function() {

                                    if ($("#firmkey").val() === '') {
                                        $("#newfirm").prop("disabled", false);
                                        return;
                                    }
                                    $("#newfirm").prop("disabled", true);
                                });
                                $("#newfirm").click(function() {
                                    if ($("#newfirm").prop("checked")) {
                                        $("#firmkey").val('');
                                        $("#firmkey").prop("disabled", true);
                                        return;
                                    }
                                    $("#firmkey").prop("disabled", false);
                                });


                                function setStep(newStep)
                                {
                                    $(".step-link").toggleClass("active", false);
                                    $("#" + newStep).toggleClass("active", true);
                                }

                                function setAnnotation(newStep)
                                {
                                    $(".annotation-step").hide();
                                    $("#" + newStep + "-annotation").delay(300).fadeIn(500);
                                }


                                $(window).load(function() {
                                    var clickedStep = $("#current-step").val();
                                    setStep(clickedStep);
                                    setAnnotation(clickedStep);
                                    return false;
                                });

                            </script>