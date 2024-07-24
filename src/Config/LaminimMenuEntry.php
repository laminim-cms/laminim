<?php

namespace LaminimCMS\Config;

class LaminimMenuEntry
{
    public static $entries = [];

    protected string $name = '';
    protected string $route = '';
    protected string $text = '';
    protected string $icon = '';
    protected array $children = [];

    public static function define(string $name, string $route, string $text, string $icon = '')
    {
        $r = new static();
        $r->name = $name;
        $r->route = $route;
        $r->text = $text;
        $r->icon = $icon;
        return $r;
    }

    public function setChildren(array $children)
    {
        $this->children = $children;
        return $this;
    }

    public static function register(self $entry)
    {
        static::$entries[$entry->name] = $entry;
    }

    public function read()
    {
        return [
            'name' => $this->name,
            'route' => $this->route,
            'text' => $this->text,
            'icon' => $this->icon,
            'children' => array_map(function (LaminimMenuEntry $entry) { return $entry->read();}, $this->children),
        ];
    }

    public static function getMappedEntries(): array
    {
        return array_map(function (LaminimMenuEntry $entry) { return $entry->read();}, array_values(static::$entries));
    }
}