<?php
function sha1_multiple() : string{
    $args = func_get_args();
    return sha1(serialize($args));
}