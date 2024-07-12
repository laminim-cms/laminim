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
use Lkt\Factory\Schemas\Views\FieldViewConfig;

return Schema::table('lmm_pages', Page::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(Page::class)
            ->setClassNameForGeneratedClass('GeneratedPage')
            ->setQueryCallerClassName('PageQueryBuilder')
            ->setWhereClassName('PageWhere')
            ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
            ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
    )
    ->setFieldsForRelatedMode('id', 'name', ['createdAt'])
    ->addField(
        IdField::define('id')
            ->setLabel('__:lmm.id')
            ->configureView(FieldViewConfig::dataMode('index'))
            ->configureView(FieldViewConfig::dataMode('edit'))
    )
    ->addField(
        StringField::define('name')
            ->setIsI18nJson()
            ->setLabel('__:lmm.name')
            ->configureView(FieldViewConfig::readMode('index', 'text'))
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->addField(
        DateTimeField::define('createdAt', 'created_at')
            ->setLabel('__:lmm.createdAt')
            ->setDefaultReadFormat('Y-m-d H:i:s')
            ->configureView(FieldViewConfig::readMode('edit', 'text'))
    )
    ->addField(
        RelatedField::defineRelation(ModularBlock::COMPONENT, 'modularBlocks', 'itemId')
            ->addRelatedComponentFeed('type', 'lmm-page')
            ->setWhere(ModularBlockWhere::typeEqual('lmm-page'))
            ->setLabel('__:lmm.modularBlocks')
            ->configureView(FieldViewConfig::editMode('create', 'lmm-modular-blocks'))
            ->configureView(FieldViewConfig::editMode('edit', 'lmm-modular-blocks'))
    );