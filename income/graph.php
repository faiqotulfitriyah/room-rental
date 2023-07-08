<?php
$countries = array('AU' => 'Australia', 'AF' => 'Afghanistan');
$selected = 'AU';
foreach ($countries as $code => $label) {
    echo '<option value="' . $code . '"';
    if ($selected == $code) {
        echo ' selected="selected"';
    }
    echo '>' . $label . '</option>';
}
?>