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

Schema::add(
    Schema::table('laminim_modular_blocks', ModularBlock::COMPONENT)
        ->setInstanceSettings(
            InstanceSettings::define(ModularBlock::class)
                ->setClassNameForGeneratedClass('GeneratedModularBlock')
                ->setQueryCallerClassName('ModularBlockQueryBuilder')
                ->setWhereClassName('ModularBlockWhere')
                ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
                ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
        )
        ->addField(IdField::define('id'))
        ->addField(StringField::define('type'))
        ->addField(StringField::define('itemId', 'item_id'))
        ->addField(DateTimeField::define('createdAt', 'created_at'))
        ->addField(AssocJSONField::define('breakpoints'))
        ->addField(ForeignKeysField::defineRelation(ModularContent::COMPONENT, 'modularContent', 'modular_content'))
);