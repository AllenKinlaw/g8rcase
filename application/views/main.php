<?php // require_once 'displayList.php';         ?>
<div id="page-wrapper">
    <input type="hidden" id="user-id" value="<?php echo $id ?>">
    <div class="row" id="mainbody">
        <div class="col-lg-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class=" panel panel-default" >
                        <div class="panel-heading">
                            <i class="fa fa-list fa-fw"></i> <?php echo $TaskHeader ?>
                            <div class="input-group">
                                <input id="search-btn-input" name="search-btn-input" class="form-control input-sm" type="text" placeholder="Search..">
                                <span class="input-group-btn">
                                    <button id="btn-search" class="btn btn-warning btn-sm" href="<?php echo base_url() . $module . '/search'; ?> "> <i class="fa fa-search fa-fw"></i> </button>
                                </span>
                            </div>

                            <?php
                            ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body tall-panel " id="main-list-div"  >
                            <?php
                            $data = array('listitems' => $listitems);
                            $this->load->view($listname, $data);
                            ?>
                        </div>

                    </div>
                    <?php //$this->myhelpers->displaySpinner();?>
                </div>
                <!--             div inner row   -->
            </div>
            <!-- /.col-lg-8 -->
        </div>
        <div class="col-lg-9">
            <!-- /.panel-heading -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-tasks fa-fw"> </i> Contact Details
                    <button class="btn btn-default pull-right" id="create-button" href="<?php echo base_url() . $module . '/create/'; ?>">
                        <i class="fa fa-plus-square fa-fw"> </i>
                    </button>
                    <p></p>
                    <p></p>
                </div>
                <div class="panel-body inside-tall-panel" id="main-form-div">
                    <?php
                    $formvars = array('class' => 'main-form',
                        'target-div' => 'main-form-div',
                        'id' => 'step-form');
                    echo form_open('', $formvars);
                    $this->load->view('widgets/gatorDefault');
                    echo form_close();
                    ?>
                </div>
            </div> 
        </div>
    </div>
</div>
