<?php

namespace LaminimCMS\Http;

use LaminimCMS\Config\LaminimModule;
use Lkt\Http\Response;
use Lkt\Http\Routes\GetRoute;

class DynamicController
{

    public static function list()
    {

    }

    public static function menu()
    {
        $r = [];

        foreach (LaminimModule::getModules() as $module) {
            $children = [];
            foreach ($module->getViews() as $view) {
                $children[] = [
                    'name' => $view->getName(),
                ];
            }

            if (count($children) > 0) {
                $r[] = [
                    'name' => $children[0]['name'],
                    'children' => $children,
                ];
            }
        }

        return Response::ok(['data' => $r]);
    }
}