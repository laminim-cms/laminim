<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Instances\Page;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;

Schema::add(
    Schema::table('laminim_pages', Page::COMPONENT)
        ->setInstanceSettings(
            InstanceSettings::define(Page::class)
                ->setClassNameForGeneratedClass('GeneratedPage')
                ->setQueryCallerClassName('PageQueryBuilder')
                ->setWhereClassName('PageWhere')
                ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
                ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
        )
        ->addField(IdField::define('id'))
        ->addField(StringField::define('name'))
        ->addField(DateTimeField::define('createdAt', 'created_at'))
);