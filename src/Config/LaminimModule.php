<?php

namespace LaminimCMS\Config;

use Lkt\Factory\Schemas\Schema;

class LaminimModule
{
    protected static $MODS = [];

    protected string $name = '';
    protected string $title = '';
    protected string $component = '';
    protected bool $freePick = false;

    protected string $mode = '';

    protected Schema|null $schema = null;

    const MODE_AUTO = 'auto';
    const MODE_ITEM_LIST = 'item-list';
    const MODE_ROUTE = 'route';
    const MODE_LAYOUT = 'layout';

    /**
     * @return static[]
     */
    public static function getModules(): array
    {
        return static::$MODS;
    }
    public static function getMappedModules(): array
    {
        return array_map(function (self $module) {return $module->read();}, array_values(static::$MODS));
    }

    public function getName(): string
    {
        return $this->name;
    }

    public static function defineAuto(string $name, string $title): static
    {
        $r = new static();
        $r->name = $name;
        $r->title = $title;
        $r->mode = static::MODE_AUTO;
        static::$MODS[$r->name] = $r;
        return static::$MODS[$r->name];
    }

    public static function defineItemList(string $name, string $title, string $component, bool $freePick = false): static
    {
        $r = new static();
        $r->name = $name;
        $r->title = $title;
        $r->mode = static::MODE_ITEM_LIST;
        $r->component = $component;
        $r->freePick = $freePick;
        static::$MODS[$r->name] = $r;
        return static::$MODS[$r->name];
    }

    public static function defineRoute(string $name, string $title): static
    {
        $r = new static();
        $r->name = $name;
        $r->title = $title;
        $r->mode = static::MODE_ROUTE;
        static::$MODS[$r->name] = $r;
        return static::$MODS[$r->name];
    }

    public static function defineLayout(string $name, string $title, Schema $schema): static
    {
        $r = new static();
        $r->name = $name;
        $r->title = $title;
        $r->mode = static::MODE_LAYOUT;
        $r->schema = $schema;
        static::$MODS[$r->name] = $r;
        return static::$MODS[$r->name];
    }

    public function read(): array
    {
        return [
            'value' => $this->name,
            'label' => $this->title,
            'mode' => $this->mode,
            'component' => $this->component,
            'freePick' => $this->freePick,
        ];
    }

    public static function getModule(string $module)
    {
        return static::$MODS[$module];
    }
}