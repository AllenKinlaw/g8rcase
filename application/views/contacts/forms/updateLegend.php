<legend>
    <div class="row">
        <div class="col-lg-1">  
            <!--        <label> </label>-->
            <select name="salutation" class="form-control" value="<?php echo $salutation;?>">
                <option> Mr. </option>
                <option> Mrs. </option>
                <option> Ms. </option>
                <option> Dr. </option>
                <option> Prof. </option>
                <option>  </option>
            </select>
        </div>
        <div class="col-lg-4"> 
            <!--        <label>First Name </label>-->
            <input name="first_name" placeholder="First Name" value="<?php echo $first_name;?>" type="text" class="form-control"> 
        </div>
        <div class="col-lg-4"> 
            <!--        <label>Last Name </label>-->
            <input name="last_name" placeholder="Last Name" value="<?php echo $last_name;?>" type="text" class="form-control"> 
        </div>
        <div class="col-lg-2"> 
            <!--        <label>Title </label>-->
            <input name="title" placeholder="Title" value="<?php echo $title;?>" type="text" class="form-control">
        </div>
    </div>
</legend>