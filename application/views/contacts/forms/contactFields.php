<!--    <div class="well well-default">-->
<legend> <?php echo $salutation . ' ' . $first_name . ' ' . $last_name . ' - ' . $title ?> </legend>
<input name="salutation" value="<?php echo $salutation ?>" type="hidden" class="form-control ">
<input name="first_name" value="<?php echo $first_name ?>" type="hidden" class="form-control">
<input name="last_name" value="<?php echo $last_name ?>" type="hidden" class="form-control">
<input name="title" value="<?php echo $title ?>" type="hidden" class="form-control">
<input name="id" value="<?php echo $id ?>" type="hidden" class="form-control">
<input name="email1" value="<?php echo $email1 ?>" type="hidden" class="form-control">
<input name="primary_address_street" value="<?php echo $primary_address_street ?>" type="hidden" class="form-control">
<input name="primary_address_city" value="<?php echo $primary_address_city ?>" type="hidden" class="form-control">
<input name="primary_address_state" value="<?php echo $primary_address_state ?>" type="hidden" class="form-control">
<input name="primary_address_postalcode" value="<?php echo $primary_address_postalcode ?>" type="hidden" class="form-control">
<input name="primary_address_country" value="<?php echo $primary_address_country ?>" type="hidden" class="form-control">
<input name="phone_work" value="<?php echo $phone_work ?>" type="hidden" class="form-control">
<input name="phone_home" value="<?php echo $phone_home ?>" type="hidden" class="form-control">
<input name="phone_mobile" value="<?php echo $phone_mobile ?>" type="hidden" class="form-control">
<input name="phone_other" value="<?php echo $phone_other ?>" type="hidden" class="form-control">
<input name="phone_fax" value="<?php echo $phone_fax ?>" type="hidden" class="form-control">
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <label><i class="fa fa-envelope fa-fw"> </i>Email </label>
            </div>
            <div class="panel-body">
                <fieldset <?php echo $disabled; ?> >
                    <label>Preferred Email Address: </label>
                    <input name="email1" value="<?php echo $email1 ?>" type="text" class="form-control">
                </fieldset>

            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <label><i class="fa fa-flag fa-fw"> </i>Primary Address </label>
            </div>
            <div class="panel-body">
                <fieldset <?php echo $disabled; ?> >
                    <label>Street Address: </label>
                    <input name="primary_address_street" value="<?php echo $primary_address_street ?>" type="text" class="form-control">
                    <label>City: </label> 
                    <input name="primary_address_city" value="<?php echo $primary_address_city ?>" type="text" class="form-control">
                    <label>State: </label> 
                    <input name="primary_address_state" value="<?php echo $primary_address_state ?>" type="text" class="form-control">
                    <label>Zip: </label> 
                    <input name="primary_address_postalcode" value="<?php echo $primary_address_postalcode ?>" type="text" class="form-control">
                    <label>Country: </label> 
                    <input name="primary_address_country" value="<?php echo $primary_address_country ?>" type="text" class="form-control">
                    <!--        '',
                            '',
                            '',
                            '',
                            '',
                            'alt_address_street',
                            'alt_address_city',
                            'alt_address_state',
                            'alt_address_postalcode',
                            'alt_address_country',-->
                </fieldset>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <label><i class="fa fa-phone-square fa-fw"> </i>Phone </label>
            </div>
            <div class="panel-body">
                <fieldset <?php echo $disabled; ?> >
                    <label>Work Phone: </label> 
                    <input name="phone_work" value="<?php echo $phone_work ?>" type="text" class="form-control">
                    <label>Home Phone: </label> 
                    <input name="phone_home" value="<?php echo $phone_home ?>" type="text" class="form-control">
                    <label>Mobile Phone: </label> 
                    <input name="phone_mobile" value="<?php echo $phone_mobile ?>" type="text" class="form-control">
                    <label>Other Phone: </label> 
                    <input name="phone_other" value="<?php echo $phone_other ?>" type="text" class="form-control">
                    <label>fax: </label> 
                    <input name="phone_fax" value="<?php echo $phone_fax ?>" type="text" class="form-control">

                </fieldset>
            </div>
        </div>

    </div>
</div>
<!--    </div>-->
