<?php


if(!function_exists('fnCheckValue'))
{
    function fnCheckValue($value)
    {
        return ($value > 191) ? 'greater' : 'lesser';
    }
}
?>