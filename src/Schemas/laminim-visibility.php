<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Instances\Metadata;
use LaminimCMS\Instances\Visibility;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\ForeignKeyField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\StringChoiceField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;
use Lkt\Factory\Schemas\Views\FieldViewConfig;
use Lkt\Factory\Schemas\Views\Layouts\GridLayout;

return Schema::table('lmm_visibility', Visibility::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(Visibility::class)
            ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
            ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
    )
    ->setCountableField('id')
    ->setItemsPerPage(20)
    ->setFieldsForRelatedMode('id', 'status', ['id', 'status'])
    ->addField(
        IdField::define('id')
            ->setLabel('__:lmm.id')
            ->configureView(FieldViewConfig::dataMode('index'))
            ->configureView(FieldViewConfig::dataMode('related'))
            ->configureView(FieldViewConfig::dataMode('edit'))
    )
    ->addField(
        DateTimeField::define('createdAt', 'created_at')
            ->setLabel('__:lmm.createdAt')
            ->setDefaultReadFormat('Y-m-d H:i:s')
            ->setCurrentTimeStampAsDefaultValue()
            ->configureView(FieldViewConfig::readMode('edit', 'date'))
    )
    ->addField(
        DateTimeField::define('autoPublishAt', 'auto_publish_at')
            ->setLabel('__:lmm.autoPublishAt')
            ->setDefaultReadFormat('Y-m-d H:i:s')
            ->setCurrentTimeStampAsDefaultValue()
            ->configureView(FieldViewConfig::readMode('edit', 'date'))
    )
    ->addField(
        StringField::define('itemType', 'item_type')
            ->setLabel('__:lmm.itemType')
            ->configureView(FieldViewConfig::readMode('index', 'text'))
            ->configureView(FieldViewConfig::editMode('related', 'text'))
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->addField(
        ForeignKeyField::define('item', 'item_id')
            ->setDynamicComponentField('itemType')
            ->setLabel('__:lmm.item')
            ->configureView(FieldViewConfig::editMode('create', 'foreign-key'))
            ->configureView(FieldViewConfig::editMode('edit', 'foreign-key'))
            ->configureView(FieldViewConfig::editMode('filters', 'foreign-key'))
    )
    ->addField(
        StringChoiceField::choice(Visibility::STATUSES, 'status')
            ->setDefaultValue(Visibility::STATUS_PUBLISHED)
            ->setLabel('__:lmm.status')
            ->configureView(FieldViewConfig::readMode('index', 'text'))
            ->configureView(FieldViewConfig::editMode('filters', 'text'))
            ->configureView(FieldViewConfig::editMode('related', 'text'))
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->setLayout(
        GridLayout::define('create', 1, [
            ]
        ), ['edit']
    )
    ->setLayout(
        GridLayout::define('filters', 2, [
                'name', 'type'
            ]
        )
    );