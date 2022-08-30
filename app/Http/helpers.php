<?php

function set_active($route)
{
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

function get_locales()
{
    return ['eu' => 'EUS', 'es' => 'ES', 'en' => 'EN'];
}
