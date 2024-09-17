<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Instances\ModularBlock;
use LaminimCMS\Instances\ModularContent;
use LaminimCMS\Instances\User;
use Lkt\Factory\Schemas\Fields\AssocJSONField;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\ForeignKeyField;
use Lkt\Factory\Schemas\Fields\ForeignKeysField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\IntegerField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;
use Lkt\Factory\Schemas\Views\FieldViewConfig;

return Schema::table('lmm_modular_blocks', ModularBlock::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(ModularBlock::class)
            ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
            ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
    )
    ->setCountableField('id')
    ->setItemsPerPage(20)
    ->setFieldsForRelatedMode('', '', [
        'id',
        'component',
        'itemId',
        'itemType',
        'className',
        'blocks',
        'content',
        'config',
        'title',
        'columns',
    ])
    ->addField(IdField::define('id'))
    ->addField(DateTimeField::define('createdAt', 'created_at')
        ->setCurrentTimeStampAsDefaultValue()
        ->setDefaultReadFormat('d/m/Y')
        ->setLangDefaultReadFormat('d/m/Y', 'es')
        ->setLangDefaultReadFormat('Y-m-d', 'en')
    )
    ->addField(
        ForeignKeyField::defineRelation(User::COMPONENT, 'createdBy', 'created_by')
            ->setLabel('__:lmm.createdBy')
            ->configureView(FieldViewConfig::readMode('lmm-edit', 'foreign-key'))
            ->setDefaultValue([User::class, 'getLoggedId'])
    )
    ->addField(StringField::define('component'))
    ->addField(
        StringField::define('content')
            ->setIsI18nJson()
            ->setLabel('__:lmm.name')
            ->configureView(FieldViewConfig::editMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'text'))
    )
    ->addField(
        StringField::define('title')
            ->setIsI18nJson()
            ->setLabel('__:lmm.title')
            ->configureView(FieldViewConfig::editMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'text'))
    )
    ->addField(StringField::define('type', 'type'))
    ->addField(StringField::define('elementId', 'element_id'))
    ->addField(StringField::define('itemType', 'item_type'))
    ->addField(ForeignKeyField::define('item', 'item_id')
        ->setDynamicComponentField('itemType'))
    ->addField(ForeignKeysField::define('items', 'items_ids')
        ->setDynamicComponentField('itemType'))
    ->addField(StringField::define('className', 'class_name'))
    ->addField(IntegerField::define('columns'))

    ->addField(AssocJSONField::define('config'))
    ->addField(
        ForeignKeysField::defineRelation(ModularBlock::COMPONENT, 'blocks')
            ->addRelatedComponentFeed('type', function ($referrer) {
                return $referrer->getType();
            })
            ->addRelatedComponentFeed('elementId', function ($referrer) {
                return $referrer->getElementId();
            })
    );