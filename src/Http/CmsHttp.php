<?php

namespace LaminimCMS\Http;

use Lkt\Http\Response;
use Lkt\Locale\Locale;
use Lkt\Templates\Template;

class CmsHttp
{
    public static function home(): Response
    {
        return Response::ok(Template::file(__DIR__ . '/../../resources/phtml/index.phtml')->setData([
            'lang' =>  Locale::getLangCode(),
        ]));
    }

    public static function publicAppJs(): Response
    {
        return Response::ok(Template::file(__DIR__ . '/../../interface/dist/assets/index.js'))
            ->setContentTypeByFileExtension('js');
    }

    public static function publicAppCss(): Response
    {
        return Response::ok(Template::file(__DIR__ . '/../../interface/dist/assets/index.css'))
            ->setContentTypeByFileExtension('css');
    }

    public static function getList(): Response
    {
        return Response::ok([
            'results' => [],
            'maxPage' => 0,
            'perms' => ['create', 'update', 'read', 'drop']
        ]);
    }
}