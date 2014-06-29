<script>
    $("#module-pills li").toggleClass("active", false);
    $("#contacts-pill").toggleClass("active", true);
</script>
<legend> <?php
    echo $salutation . ' ';
    if (isset($fields['firstName'])) {
        echo $firstName . ' ';
    }
    if (isset($fields['middleName'])) {
        echo $middleName . ' ';
    }
    if (isset($fields['lastName'])) {
        echo $lastName;
    }
    if (isset($fields['type'])) {
        echo' - ' . $type;
    }
    ?> 
</legend>