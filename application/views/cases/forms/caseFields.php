<!--    <div class="well well-default">-->
<input name="id" value="<?php echo $id ?>" type="hidden" class="form-control">
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <label><i class="fa fa-flag fa-fw"> </i>Case Details </label>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-lg-12">
                        <fieldset <?php echo $disabled; ?> >
                            <label>Docket: </label>
                            <input name="docket" value="<?php if (isset($fields['docket'])) {echo $docket;}; ?>" type="text" class="form-control">
                            <label>Title: </label>
                            <input name="title" value="<?php echo $title ?>" type="text" class="form-control">
                            <label>type: </label>
                            <input name="type" value="<?php echo $type ?>" type="text" class="form-control">
                            <label>claims: </label>
                            <input name="claims" value="<?php echo $claims ?>" type="text" class="form-control">
                            <label>status: </label>
                            <input name="status" value="<?php echo $status ?>" type="text" class="form-control">
                            <label>partytype: </label>
                            <input name="partytype" value="<?php echo $partytype ?>" type="text" class="form-control">
                            <label>datefiled: </label>
                            <input name="datefiled" value="<?php  if (isset($fields['datefiled'])) {echo date('Y-M-d',$datefiled->sec);}?>" type="text" class="form-control">

                            <label>Resolution: </label>
                            <input name="resolution" value="<?php if (isset($fields['resolution'])) {echo $resolution;}; ?>" type="text" class="form-control">
                            
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--    </div>-->
