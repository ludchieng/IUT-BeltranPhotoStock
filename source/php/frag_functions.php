<?php
function throwError($text) {
    echo '<span class=\'debug\'>Exception: '.$text.'.</span>';
    die();
}

function preFillInputField($fieldName) {
    if(isset($_POST[$fieldName])) {
      echo '"'.$_POST[$fieldName].'"';
    } else {
      echo '""';
    }
}

?>
