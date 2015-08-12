<?php
    $password = 'test';
    $cryptedPass = password_hash($password,  PASSWORD_DEFAULT);
    echo $cryptedPass;
