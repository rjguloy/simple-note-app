<?php

use Core\Session;

view('sessions/create.view.php', ['heading' => 'Log In', 'errors' => Session::get('errors')]);