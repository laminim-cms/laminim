<?php

namespace LaminimCMS\Console\Commands;

use LaminimCMS\Instances\ModularOption;
use LaminimCMS\Instances\Translation;
use LaminimCMS\Instances\TranslationStack;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SeedLmmTranslationsCommand extends Command
{
    protected static $defaultName = 'lmm:seed:i18n';

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Ensure lmm translations stack to work as expected')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        // Stack:
        $stackQuery = TranslationStack::getQueryCaller()
            ->andPropertyEqual('lmm');

        $stack = TranslationStack::getOne($stackQuery);
        if (!$stack) $stack = TranslationStack::getInstance();

        $stack
            ->setName('Laminim CMS i18n')
            ->setProperty('lmm')
            ->setOnlyForCms(true)
            ->setRequiredAdminPerms(true)
            ->save()
        ;

        // Required i18n
        Translation::ensureKey($stack, 'btn.add', 'text', [
            'en' => 'Add',
            'es' => 'Agregar',
        ]);
        Translation::ensureKey($stack, 'btn.addContent', 'text', [
            'en' => 'Add content',
            'es' => 'Agregar contenido',
        ]);
        Translation::ensureKey($stack, 'btn.addBreakpoint', 'text', [
            'en' => 'Add breakpoint',
            'es' => 'Agregar breakpoint',
        ]);
        Translation::ensureKey($stack, 'btn.addModularBlock', 'text', [
            'en' => 'Add block',
            'es' => 'Agregar bloque',
        ]);
        Translation::ensureKey($stack, 'btn.addModularOption', 'text', [
            'en' => 'Add option',
            'es' => 'Agregar opción',
        ]);
        Translation::ensureKey($stack, 'btn.edit', 'text', [
            'en' => 'Edit',
            'es' => 'Editar',
        ]);
        Translation::ensureKey($stack, 'btn.save', 'text', [
            'en' => 'Save',
            'es' => 'Guardar',
        ]);
        Translation::ensureKey($stack, 'btn.drop', 'text', [
            'en' => 'Remove',
            'es' => 'Eliminar',
        ]);
        Translation::ensureKey($stack, 'btn.logout', 'text', [
            'en' => 'Logout',
            'es' => 'Cerrar sesión',
        ]);
        Translation::ensureKey($stack, 'header.myAccount', 'text', [
            'en' => 'My account',
            'es' => 'Mi cuenta',
        ]);
        Translation::ensureKey($stack, 'header.help', 'text', [
            'en' => 'Help',
            'es' => 'Ayuda',
        ]);



        Translation::ensureKey($stack, 'stack', 'text', [
            'en' => 'Stack',
            'es' => 'Stack',
        ]);

        Translation::ensureKey($stack, 'type', 'text', [
            'en' => 'Type',
            'es' => 'Tipo',
        ]);

        Translation::ensureKey($stack, 'name', 'text', [
            'en' => 'Name',
            'es' => 'Nombre',
        ]);

        Translation::ensureKey($stack, 'lastname', 'text', [
            'en' => 'Lastname',
            'es' => 'Apellidos',
        ]);

        Translation::ensureKey($stack, 'property', 'text', [
            'en' => 'Property',
            'es' => 'Propiedad',
        ]);

        Translation::ensureKey($stack, 'createdAt', 'text', [
            'en' => 'Created at',
            'es' => 'Fecha de creación',
        ]);

        Translation::ensureKey($stack, 'createdBy', 'text', [
            'en' => 'Created by',
            'es' => 'Creado por',
        ]);

        Translation::ensureKey($stack, 'email', 'text', [
            'en' => 'Email',
            'es' => 'Email',
        ]);

        Translation::ensureKey($stack, 'value', 'text', [
            'en' => 'Value',
            'es' => 'Valor',
        ]);

        Translation::ensureKey($stack, 'valueEn', 'text', [
            'en' => 'English',
            'es' => 'Inglés',
        ]);

        Translation::ensureKey($stack, 'valueEs', 'text', [
            'en' => 'Spanish',
            'es' => 'Español',
        ]);

        Translation::ensureKey($stack, 'requiredAdminPerms', 'text', [
            'en' => 'Required admin permissions',
            'es' => 'Requiere permisos de administrador',
        ]);

        Translation::ensureKey($stack, 'onlyForCms', 'text', [
            'en' => 'Only for CMS',
            'es' => 'Solo para el CMS',
        ]);

        Translation::ensureKey($stack, 'hasCmsAccess', 'text', [
            'en' => 'Has CMS access',
            'es' => 'Permitir acceso al CMS',
        ]);

        Translation::ensureKey($stack, 'hasCustomPermissions', 'text', [
            'en' => 'Has custom permissions',
            'es' => 'Permisos personalizados',
        ]);

        Translation::ensureKey($stack, 'items', 'text', [
            'en' => 'Items',
            'es' => 'Elementos',
        ]);

        Translation::ensureKey($stack, 'visibility', 'text', [
            'en' => 'Visibility',
            'es' => 'Visibilidad',
        ]);

        Translation::ensureKey($stack, 'title.breakpoints', 'text', [
            'en' => 'Breakpoints',
            'es' => 'Breakpoints',
        ]);

        Translation::ensureKey($stack, 'title.block', 'text', [
            'en' => 'Block',
            'es' => 'Bloque',
        ]);

        Translation::ensureKey($stack, 'title.index.i18n', 'text', [
            'en' => 'Translations',
            'es' => 'Traducciones',
        ]);

        Translation::ensureKey($stack, 'title.edit.i18n', 'text', [
            'en' => 'Edit Translation',
            'es' => 'Editar Traducción',
        ]);

        Translation::ensureKey($stack, 'title.create.i18n', 'text', [
            'en' => 'Create Translation',
            'es' => 'Crear Traducción',
        ]);

        Translation::ensureKey($stack, 'title.index.i18n-stack', 'text', [
            'en' => 'Translations Stack',
            'es' => 'Grupos de Traducciones',
        ]);

        Translation::ensureKey($stack, 'title.edit.i18n-stack', 'text', [
            'en' => 'Edit Translation Stack',
            'es' => 'Editar Grupo de Traducciones',
        ]);

        Translation::ensureKey($stack, 'title.create.i18n-stack', 'text', [
            'en' => 'Create Translation Stack',
            'es' => 'Crear Grupo de Traducciones',
        ]);

        Translation::ensureKey($stack, 'title.index.user', 'text', [
            'en' => 'Users',
            'es' => 'Usuarios',
        ]);

        Translation::ensureKey($stack, 'title.edit.user', 'text', [
            'en' => 'Edit User',
            'es' => 'Editar Usuario',
        ]);

        Translation::ensureKey($stack, 'title.create.user', 'text', [
            'en' => 'Create User',
            'es' => 'Crear Usuario',
        ]);

        Translation::ensureKey($stack, 'title.index.role', 'text', [
            'en' => 'Roles',
            'es' => 'Roles',
        ]);

        Translation::ensureKey($stack, 'title.edit.role', 'text', [
            'en' => 'Edit Role',
            'es' => 'Editar Rol',
        ]);

        Translation::ensureKey($stack, 'title.create.role', 'text', [
            'en' => 'Create Role',
            'es' => 'Crear Rol',
        ]);

        Translation::ensureKey($stack, 'title.index.page', 'text', [
            'en' => 'Pages',
            'es' => 'Páginas',
        ]);

        Translation::ensureKey($stack, 'title.edit.page', 'text', [
            'en' => 'Edit Page',
            'es' => 'Editar Página',
        ]);

        Translation::ensureKey($stack, 'title.create.page', 'text', [
            'en' => 'Create Page',
            'es' => 'Crear Página',
        ]);

        Translation::ensureKey($stack, 'menu.page', 'text', [
            'en' => 'Pages',
            'es' => 'Páginas',
        ]);

        Translation::ensureKey($stack, 'menu.user', 'text', [
            'en' => 'Users',
            'es' => 'Usuarios',
        ]);

        Translation::ensureKey($stack, 'menu.role', 'text', [
            'en' => 'Roles',
            'es' => 'Roles',
        ]);

        Translation::ensureKey($stack, 'menu.i18n', 'text', [
            'en' => 'Translations',
            'es' => 'Traducciones',
        ]);

        Translation::ensureKey($stack, 'menu.i18nStack', 'text', [
            'en' => 'Stacks',
            'es' => 'Grupos',
        ]);

        Translation::ensureKey($stack, 'menu.multimedia', 'text', [
            'en' => 'Multimedia',
            'es' => 'Multimedia',
        ]);

        Translation::ensureChoice($stack, 'i18nChoices', [
            ['name' => Translation::TYPE_CHOICE, 'valueEn' => 'Choice', 'valueEs' => 'Elección'],
            ['name' => Translation::TYPE_EDITOR, 'valueEn' => 'Editor', 'valueEs' => 'Editor'],
            ['name' => Translation::TYPE_TEXT, 'valueEn' => 'Text', 'valueEs' => 'Texto'],
            ['name' => Translation::TYPE_TEXTAREA, 'valueEn' => 'Textarea', 'valueEs' => 'Área de texto'],
        ]);


        return 1;
    }
}