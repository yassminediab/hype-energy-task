<?php

if (isset($errors) && !empty($errors)) {
    echo' <div class="alert alert-danger" role="alert">';

    foreach ($errors as $error) {
        echo ($error). '<br/>';
    }
    echo '</div>';
}
if(isset($success) && $success) {
    echo'<div class="alert alert-success">
         <strong>Success!</strong> You Can Login from <a href="login.php"> here </a>
    </div>';
}
?>