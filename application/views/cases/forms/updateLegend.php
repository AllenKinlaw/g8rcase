<legend>
    <div class="row">
        <div class="col-lg-2">
            <fieldset <?php echo $disabled; ?> >
                <label>Case#: </label>
                <input name="docket" value="<?php echo $docket ?>" type="text" class="form-control">
            </fieldset>
        </div>
        <div class="col-lg-4">
            <fieldset <?php echo $disabled; ?> >
                <label>Name: </label>
                <input name="title" value="<?php echo $title ?>" type="text" class="form-control">
            </fieldset>
        </div>
        <div class="col-lg-4">
            <fieldset <?php echo $disabled; ?> >
                <label>Type: </label>
                <input name="type" value="<?php echo $type ?>" type="text" class="form-control">
            </fieldset>
        </div>
        <div class="col-lg-2">
            <fieldset <?php echo $disabled; ?> >
                <label>Status: </label>
                <input name="status" value="<?php echo $status ?>" type="text" class="form-control">
            </fieldset>
        </div>
    </div>
</legend>