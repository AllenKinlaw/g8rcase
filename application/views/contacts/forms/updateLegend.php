<legend>
    <div class="row">
        <div class="col-lg-1">  
            <!--        <label> </label>-->
            <select name="salutation" class="form-control" value="<?php echo set_value('salutation', ((isset($fields['salutation'])) ? $fields['salutation'] :'') ); ?>">
                <option> Mr. </option>
                <option> Mrs. </option>
                <option> Ms. </option>
                <option> Dr. </option>
                <option> Prof. </option>
                <option>  </option>
            </select>
        </div>
        <div class="col-lg-3"> 
            <!--        <label>First Name </label>-->
            <input name="firstName" placeholder="First Name" value="<?php echo set_value('firstName',((isset($fields['firstName'])) ? $fields['firstName'] :'') );  ?>" type="text" class="form-control"> 
        </div>
        <div class="col-lg-3"> 
            <!--        <label>Middle Name Name </label>-->
            <input name="middleName" placeholder="Middle Name" value="<?php echo set_value('middleName', ((isset($fields['middleName'])) ? $fields['middleName'] :'') ); ?>" type="text" class="form-control"> 
        </div>
        <div class="col-lg-3"> 
            <!--        <label>Last Name </label>-->
            <input name="lastName" placeholder="Last Name" value="<?php echo set_value('lastName', ((isset($fields['lastName'])) ? $fields['lastName'] :'') );  ?>" type="text" class="form-control"> 
        </div>
        <div class="col-lg-1"> 
            <!--        <label>Title </label>-->
            <input name="type" placeholder="type" value="<?php echo set_value('type',((isset($fields['type'])) ? $fields['type'] :'') ); ?>" type="text" class="form-control">
        </div>
    </div>
</legend>