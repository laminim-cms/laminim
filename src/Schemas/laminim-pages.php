<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Generated\ModularBlockWhere;
use LaminimCMS\Instances\ModularBlock;
use LaminimCMS\Instances\Page;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\RelatedKeysField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;

return Schema::table('laminim_pages', Page::COMPONENT)
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
    ->addField(
        RelatedKeysField::defineRelation(ModularBlock::COMPONENT, 'modularBlocks', 'item_id')
        ->setWhere(ModularBlockWhere::typeEqual('lmm-page'))
    )
    ;