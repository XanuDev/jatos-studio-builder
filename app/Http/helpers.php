<?php

function set_active($route)
{
    if (Request::isMethod('post')) {
        return '';
    }

    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }

    return Request::path() == $route ? 'active' : '';
}

function get_locales()
{
    return ['eu' => 'EUS', 'es' => 'ES', 'en' => 'EN'];
}

function downloadExist($name)
{
    $name = Str::replace(' ', '_', $name);

    return file_exists(public_path() . '/storage/' . $name . '.zip');
}
