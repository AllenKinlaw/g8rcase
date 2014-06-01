<div id="vis-container">
    <div id="annotation-steps">
        <div class="annotation-step" id="step<?php echo $step; ?>-annotation" style="display:block;">
            <div class="panel panel-success inside-tall-panel">
                <div class="panel-heading">
                    <?php echo $heading ?></div>
                <div class="panel-body inside-tall-panel-body" >
                    <?php
                    $this->load->view('widgets/spinnerModal');
                    $this->load->view($form, $data);
                    ?>
                </div>
                <div class="panel-footer">
<!--                    <a href="#" id="step<?php echo $step;?>" class="step-link">-->
                    <button class="btn btn-sm btn-default btn-primary" id="save-step">
<!--                            <span class="badge primary">Save</span>-->
                        Save
                        </button>
<!--                    </a>-->
                </div>

            </div>    
        </div>
    </div>
</div>
