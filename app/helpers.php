<?php
if (!function_exists('classActiveOnlyPath')) {
    function classActiveOnlyPath($path)
    {
        return Request::is($path) ? ' active' : '';
    }
}
if (!function_exists('classActiveOnlySegment')) {
    function classActiveOnlySegment($segment, $value)
    {
        if (!is_array($value)) {
            return Request::segment($segment) == $value ? ' active' : '';
        }
        foreach ($value as $v) {
            if (Request::segment($segment) == $v) {
                return ' active';
            }
        }
        return '';
    }
}