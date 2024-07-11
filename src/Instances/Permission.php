<?php

namespace LaminimCMS\Instances;

class Permission
{
    protected static $customPermissions = [];
    protected static $enabledPerms = [];

    public static function addCustomPermission(string $perm, array $components)
    {
        static::$customPermissions[$perm] = $components;
    }

    public static function enableComponentPermission(string $component, string $perm)
    {
        if (!is_array(static::$enabledPerms[$component])) static::$enabledPerms[$component] = [];
        static::$enabledPerms[$component][] = $perm;
    }

    public static function getComponentPermissions(string $component)
    {
        if (!is_array(static::$enabledPerms[$component])) static::$enabledPerms[$component] = [];
        return static::$enabledPerms[$component];
    }

    public static function getAllComponentPermissions()
    {
        return static::$enabledPerms;
    }
}