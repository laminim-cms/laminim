<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Instances\UserRole;
use Lkt\Factory\Schemas\Fields\AssocJSONField;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\MethodGetterField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;

return Schema::table('lmm_user_roles', UserRole::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(UserRole::class)
            ->setClassNameForGeneratedClass('GeneratedUserRole')
            ->setQueryCallerClassName('UserRoleQueryBuilder')
            ->setWhereClassName('UserRoleWhere')
            ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
            ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
    )
    ->setFieldsForView('index', ['id', 'name', 'createdAt'])
    ->setFieldsForRelatedMode('id', 'name', [])
    ->addField(
        IdField::define('id')
            ->setLabel('__:lmm.id')
            ->setIsDataInUpdateView()
    )
    ->addField(
        DateTimeField::define('createdAt', 'created_at')
            ->setLabel('__:lmm.createdAt')
            ->setIsVisibleInUpdateView()
    )
    ->addField(
        StringField::define('name')
            ->setIsI18nJson()
            ->setLabel('__:lmm.name')
            ->setIsEditableInCreateView()
            ->setIsEditableInUpdateView()
    )
    ->addField(
        AssocJSONField::define('config')
    )
    ->addField(
        MethodGetterField::define('getPreparedConfig', 'config')
            ->setLabel('__:lmm.rolePermConfig')
            ->setCustomType('lmm-modular-perms')
            ->setIsEditableInCreateView()
            ->setIsEditableInUpdateView()
    );