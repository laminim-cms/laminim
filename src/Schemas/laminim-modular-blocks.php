<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Instances\ModularBlock;
use LaminimCMS\Instances\ModularContent;
use Lkt\Factory\Schemas\Fields\AssocJSONField;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\ForeignKeysField;
use Lkt\Factory\Schemas\Fields\IdField;
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
    ->setFieldsForRelatedMode('', '', ['id', 'name', 'itemId', 'breakpoints', 'modularContent'])
    ->addField(IdField::define('id'))
    ->addField(
        StringField::define('name')
            ->setIsI18nJson()
            ->setLabel('__:lmm.name')
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->addField(StringField::define('type'))
    ->addField(StringField::define('itemId', 'item_id'))
    ->addField(DateTimeField::define('createdAt', 'created_at')
        ->setCurrentTimeStampAsDefaultValue()
    )
    ->addField(AssocJSONField::define('breakpoints'))
    ->addField(ForeignKeysField::defineRelation(ModularContent::COMPONENT, 'modularContent', 'modular_content'));