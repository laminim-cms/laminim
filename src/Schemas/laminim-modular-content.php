<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Instances\ModularBlock;
use LaminimCMS\Instances\ModularContent;
use Lkt\Factory\Schemas\Fields\AssocJSONField;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\RelatedKeysField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;

return Schema::table('laminim_modular_blocks', ModularContent::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(ModularContent::class)
            ->setClassNameForGeneratedClass('GeneratedModularContent')
            ->setQueryCallerClassName('ModularContentQueryBuilder')
            ->setWhereClassName('ModularContentWhere')
            ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
            ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
    )
    ->setFieldsForRelatedMode('', '', ['id', 'type', 'breakpoints'])
    ->addField(IdField::define('id'))
    ->addField(StringField::define('type'))
    ->addField(DateTimeField::define('createdAt', 'created_at'))
    ->addField(AssocJSONField::define('breakpoints'));