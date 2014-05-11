
<div id="vis-nav ">
    <ul class="nav nav-pills">
        <?php
        for ($s = 1; $s <= $steps; $s++) {
            if ($step == $s) {
                echo '<li class="active step-link" id="step' . $s . '"><a href="#" id="step1" class="step-link" >' . "\n"
                . '   <span class="badge">' . $s . ' </span>' . "\n"
                . ' </a>'
                . ' </li>';
            } else {
                echo '<li class="step-link" id="step' . $s . '"><a href="#" id="step1" class="step-link" >' . "\n"
                . '   <span class="badge">' . $s . ' </span>' . "\n"
                . ' </a>'
                . ' </li>';
            }
        }
        ?>
    </ul>
    <p></p>
</div>