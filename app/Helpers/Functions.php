<?php

function isUpperCase($value, $message, $fail) {
    if($value != mb_strtoupper($value, 'UTF-8')) {
        //Xảy ra lỗi
        $fail($message);
    }
}

?>