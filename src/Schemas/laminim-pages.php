<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Generated\ModularBlockWhere;
use LaminimCMS\Instances\ModularBlock;
use LaminimCMS\Instances\Page;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\RelatedField;
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
    ->setFieldsForView('index', ['id', 'name', 'createdAt'])
    ->setFieldsForRelatedMode('id', 'name', ['createdAt'])
    ->addField(
        IdField::define('id')
            ->setLabel('__:lmm.id')
            ->setIsDataInUpdateView()
    )
    ->addField(
        StringField::define('name')
            ->setIsI18nJson()
            ->setLabel('__:lmm.name')
            ->setIsEditableInCreateView()
            ->setIsEditableInUpdateView()
    )
    ->addField(
        DateTimeField::define('createdAt', 'created_at')
            ->setLabel('__:lmm.createdAt')
            ->setIsVisibleInUpdateView()
    )
    ->addField(
        RelatedField::defineRelation(ModularBlock::COMPONENT, 'modularBlocks', 'itemId')
            ->addRelatedComponentFeed('type', 'lmm-page')
            ->setWhere(ModularBlockWhere::typeEqual('lmm-page'))
            ->setLabel('__:lmm.modularBlocks')
            ->setIsEditableInCreateView()
            ->setIsEditableInUpdateView()
            ->setCustomType('lmm-modular-blocks')
    );