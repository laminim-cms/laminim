<?php

namespace LaminimCMS\Config;

use LaminimCMS\Http\LaminimController;
use Lkt\Http\Routes\GetRoute;

class LaminimRouting
{
    protected static ?LaminimRouting $instance = null;

    protected string $path = 'laminim';

    public function __construct()
    {
        if (!static::$instance) {
            static::$instance = $this;
        }
        return static::$instance;}

    public static function getInstance(): static
    {
        if (!static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function setCMSRoutePath(string $path): static
    {
        $r = static::getInstance();
        $r->path = $path;
        return $r;
    }

    public function getCMSRoutePath(): string
    {
        return static::getInstance()->path;
    }

    public function setup()
    {
        $instance = static::getInstance();

        GetRoute::onlyLoggedUsers("/{$instance->path}/api/menu", [LaminimController::class, 'menu']);

        foreach (LaminimModule::getModules() as $module) {
            foreach ($module->getViews() as $view) {
                $resolver = $view->getResolver();
                if ($resolver){
                    GetRoute::onlyLoggedUsers("/{$instance->path}/api/{$view->getName()}", $view->getResolver());
                }
            }
        }
    }
}