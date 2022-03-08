<?php
function sanitizeInput($input) {
    $transformedInput = strip_tags($input);
    return str_replace(" ", '', $transformedInput);
}
