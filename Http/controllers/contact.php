<?php

// session_destroy();

$_SESSION['lastname'] = 'Guloy';

view("contact.view.php", ['heading' => 'Contact Us']);