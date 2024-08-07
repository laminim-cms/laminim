<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Instances\ModularContent;
use Lkt\Factory\Schemas\Fields\AssocJSONField;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\Fields\ValueListField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;
use Lkt\Factory\Schemas\Views\FieldViewConfig;

return Schema::table('lmm_modular_content', ModularContent::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(ModularContent::class)
            ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
            ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
    )
    ->setCountableField('id')
    ->setItemsPerPage(20)
    ->setFieldsForRelatedMode('', '', ['id', 'type', 'items'])
    ->addField(
        IdField::define('id')
            ->configureView(FieldViewConfig::dataMode('related', 'text'))
    )
    ->addField(
        StringField::define('type')
            ->configureView(FieldViewConfig::readMode('related', 'text'))
    )
    ->addField(DateTimeField::define('createdAt', 'created_at')
        ->setCurrentTimeStampAsDefaultValue())
    ->addField(
        AssocJSONField::define('breakpoints')
    )
    ->addField(
        AssocJSONField::define('config')
    )
    ->addField(
        ValueListField::define('items')
            ->setReadModeToArray()
            ->configureView(FieldViewConfig::editMode('related', 'text'))
    )
    ;