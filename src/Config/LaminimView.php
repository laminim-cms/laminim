<?php

namespace LaminimCMS\Config;

class LaminimView
{
    protected static array $MODS = [];

    protected string $name = '';
    protected string $type = 'list';

    protected $resolver = null;

    protected array $params = [];

    public static function register(string $name, string $type = 'list'): static
    {
        $r = new static();
        $r->name = $name;
        $r->type = $type;
        static::$MODS[$r->name] = $r;
        return static::$MODS[$r->name];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setResolver(callable $resolver): static
    {
        $this->resolver = $resolver;
        return $this;
    }

    public function setParams(array $params): static
    {
        $this->params = $params;
        return $this;
    }

    public function getResolver(): ?callable
    {
        return $this->resolver;
    }
}