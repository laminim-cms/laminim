<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Generated\MetadataWhere;
use LaminimCMS\Generated\ModularBlockWhere;
use LaminimCMS\Instances\Metadata;
use LaminimCMS\Instances\ModularBlock;
use LaminimCMS\Instances\Page;
use LaminimCMS\Instances\User;
use LaminimCMS\Instances\Visibility;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\ForeignKeyField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\RelatedField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;
use Lkt\Factory\Schemas\Views\FieldViewConfig;
use Lkt\Factory\Schemas\Views\Layouts\GridLayout;

return Schema::table('lmm_pages', Page::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(Page::class)
            ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
            ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
    )
    ->setSlugPattern(':name')
    ->setCountableField('id')
    ->setItemsPerPage(20)
    ->setFieldsForRelatedMode('id', 'name', ['createdAt'])
    ->setExcludedFieldsForViewFeed('lmm-create', [])
    ->setExcludedFieldsForViewFeed('lmm-edit', ['createdAt', 'createdBy'])
    ->addField(
        IdField::define('id')
            ->setLabel('__:lmm.id')
            ->configureView(FieldViewConfig::dataMode('lmm-index'))
            ->configureView(FieldViewConfig::dataMode('lmm-edit'))
    )
    ->addField(
        StringField::define('name')
            ->setIsI18nJson()
            ->setLabel('__:lmm.name')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'text'))
    )
    ->addField(
        DateTimeField::define('createdAt', 'created_at')
            ->setLabel('__:lmm.createdAt')
            ->setCurrentTimeStampAsDefaultValue()
            ->setDefaultReadFormat('d/m/Y')
            ->setLangDefaultReadFormat('d/m/Y', 'es')
            ->setLangDefaultReadFormat('Y-m-d', 'en')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'date'))
            ->configureView(FieldViewConfig::readMode('lmm-edit', 'date'))
    )
    ->addField(
        ForeignKeyField::defineRelation(User::COMPONENT, 'createdBy', 'created_by')
            ->setLabel('__:lmm.createdBy')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'foreign-key'))
            ->configureView(FieldViewConfig::readMode('lmm-edit', 'foreign-key'))
            ->setDefaultValue([User::class, 'getLoggedId'])
    )
    ->addField(
        RelatedField::defineRelation(ModularBlock::COMPONENT, 'modularBlocks', 'itemId')
            ->setAutoRemoveUnlinked()
            ->addRelatedComponentFeed('type', 'lmm-page')
            ->setWhere(ModularBlockWhere::typeEqual('lmm-page'))
            ->setLabel('__:lmm.modularBlocks')
            ->configureView(FieldViewConfig::editMode('lmm-create', 'lmm-modular-blocks'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'lmm-modular-blocks'))
    )
    ->addField(
        RelatedField::defineRelation(Metadata::COMPONENT, 'metadata', 'itemId')
            ->setSingleMode()
            ->addRelatedComponentFeed('itemType', Page::COMPONENT)
            ->setWhere(MetadataWhere::itemTypeEqual(Page::COMPONENT))
            ->setLabel('__:lmm.metadata')
            ->configureView(FieldViewConfig::editMode('lmm-create', 'lmm-metadata'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'lmm-metadata'))
    )
    ->addField(
        RelatedField::defineRelation(Visibility::COMPONENT, 'visibility', 'itemId')
            ->setSingleMode()
            ->setReturnsEmptyOneInSingleMode()
            ->addRelatedComponentFeed('itemType', Page::COMPONENT)
            ->setWhere(MetadataWhere::itemTypeEqual(Page::COMPONENT))
            ->setLabel('__:lmm.visibility')
            ->configureView(FieldViewConfig::editMode('lmm-create', 'lmm-visibility'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'lmm-visibility'))
    )
    ->setLayout(GridLayout::define('lmm-edit', 1, [
            'name',
            GridLayout::define('main-data', 2, ['createdAt', 'createdBy']),
            'modularBlocks',
            'metadata',
            'visibility',
        ]
    ))
    ;