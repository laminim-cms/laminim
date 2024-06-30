<?php

namespace LaminimCMS\Config;

class LaminimModule
{
    protected static $MODS = [];

    protected string $name = '';
    protected array $views = [];

    public static function register(string $name): static
    {
        $r = new static();
        $r->name = $name;
        static::$MODS[$r->name] = $r;
        return static::$MODS[$r->name];
    }

    public function setView(LaminimView $view): static
    {
        $this->views[$view->getName()] = $view;
        return $this;
    }

    /**
     * @return LaminimView[]
     */
    public function getViews(): array
    {
        return $this->views;
    }

    /**
     * @return static[]
     */
    public static function getModules(): array
    {
        return static::$MODS;
    }

    public function getName(): string
    {
        return $this->name;
    }
}