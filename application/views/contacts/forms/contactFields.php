<!--    <div class="well well-default">-->
<input name="_id" value="<?php echo set_value('_id', ((isset($fields['_id'])) ? $fields['_id'] : '')); ?>" type="hidden" class="form-control">
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <label><i class="fa fa-envelope fa-fw"> </i>Email </label>
            </div>
            <div class="panel-body">
                <fieldset <?php echo $disabled; ?> >
                    <?php
                    if (isset($fields['_id'])) {
                        $cntr = 0;
                        foreach ($fields as $field => $value) {
                            if (strpos($field, 'email') !== false) {
                                $cntr +=1;
                                echo '<label>' . ucfirst($field) . ' </label>';
                                echo '<input id= "' . $field . '" name="email" class="form-control" type="text" value="' . $value . '">';
                            }
                        }
                    } else {
                        echo '<label> Primary Email </label>';
                        echo '<input id="email" name="email" class="form-control" type="text" value="" placeholder="Email">';
                    }
                    ?>
                </fieldset>

            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <label><i class="fa fa-phone-square fa-fw"> </i>Phone </label>
            </div>
            <div class="panel-body">
                <fieldset <?php echo $disabled; ?> >
                    <?php
                    if (isset($fields['_id'])) {
                        $cntr = 0;
                        foreach ($fields as $field => $value) {
                            if (strpos($field, 'phone') !== false) {
                                $cntr +=1;
                                echo '<label>' . ucfirst($field) . ' </label>';
                                echo '<input name="' . $field . '" class="form-control" type="text" value="' . $value . '">';
                            }
                        }
                    } else {

                        echo '<label> Phone </label>';
                        echo '<input id= "phone" name="phone" class="form-control" type="text" value="" placeholder="Phone">';
                    }
                    ?>

                </fieldset>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-info">
                        <div class="panel-heading">
                <label><i class="fa fa-flag fa-fw"> </i>Address </label>
            </div>
            <div class="panel-body">
                <fieldset <?php echo $disabled; ?> >
                    <label> Primary</label>
                    <div class="well">
                        <label> Street</label>
                        <input name="street" class="form-control" type="text" value="<?php
                        if (isset($fields['street'])) {
                            echo $street;
                        }
                        ?>">
                        <label> City</label>
                        <input name="city" class="form-control" type="text" value="<?php
                        if (isset($fields['city'])) {
                            echo $city;
                        }
                        ?>">
                        <label> State</label>
                        <input name="state" class="form-control" type="text" value="<?php
                        if (isset($fields['state'])) {
                            echo $state;
                        }
                        ?>">
                        <label> Postal Code</label>
                        <input name="postalcode" class="form-control" type="text" value="<?php
                        if (isset($fields['postalcode'])) {
                            echo $postalcode;
                        }
                        ?>">
                        <label> Country</label>
                        <input name="country" class="form-control" type="text" value="<?php
                    if (isset($fields['country'])) {
                        echo $country;
                    }
                    ?>">

                    </div>
<?php
//                  foreach($email as $key => $value){
//                        echo '<label>'. ucfirst($key). ' </label>';
//                        echo '<input name="email" class="form-control" type="text" value="'.$value.'">';
//                    }
?>
                </fieldset>
            </div>

        </div>

    </div>
</div>
<!--    </div>-->
