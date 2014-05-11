                            <div id="vis-container">
                                <div id="annotation-steps">
                                    <div class="annotation-step" id="step1-annotation" style="display:block;">
                                        <div class="panel panel-success inside-tall-panel">
                                            <div class="panel-heading">
                                                User Profile</div>
                                            <div class="panel-body inside-tall-panel-body">

                                                <span class='text-danger'> <?php echo validation_errors(); ?></span>
                                                <?php
                                                $this->load->view('users/forms/userProfile_1');
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
