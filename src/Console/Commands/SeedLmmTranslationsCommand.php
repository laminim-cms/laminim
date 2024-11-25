<?php

namespace LaminimCMS\Console\Commands;

use LaminimCMS\Instances\MultimediaItem;
use LaminimCMS\Instances\Translation;
use LaminimCMS\Instances\TranslationStack;
use LaminimCMS\Instances\User;
use LaminimCMS\Instances\Visibility;
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

        Translation::ensureKey($stack, 'src', 'text', [
            'en' => 'Source',
            'es' => 'Origen',
        ]);

        Translation::ensureKey($stack, 'file', 'text', [
            'en' => 'File',
            'es' => 'Archivo',
        ]);

        Translation::ensureKey($stack, 'image', 'text', [
            'en' => 'Image',
            'es' => 'Imagen',
        ]);

        Translation::ensureKey($stack, 'description', 'text', [
            'en' => 'Description',
            'es' => 'Descripción',
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

        Translation::ensureKey($stack, 'title.menu.component', 'text', [
            'en' => ':component',
            'es' => ':component',
        ]);

        Translation::ensureKey($stack, 'title.index.component', 'text', [
            'en' => ':component',
            'es' => ':component',
        ]);

        Translation::ensureKey($stack, 'title.create.component', 'text', [
            'en' => 'Create :component',
            'es' => 'Crear :component',
        ]);

        Translation::ensureKey($stack, 'title.edit.component', 'text', [
            'en' => 'Edit :component',
            'es' => 'Editar :component',
        ]);

        Translation::ensureKey($stack, 'startedAt', 'text', [
            'en' => 'Started at',
            'es' => 'Fecha de inicio',
        ]);

        Translation::ensureKey($stack, 'finishedAt', 'text', [
            'en' => 'Finished at',
            'es' => 'Fecha de fin',
        ]);

        Translation::ensureKey($stack, 'about', 'text', [
            'en' => 'About',
            'es' => 'Acerca de',
        ]);

        Translation::ensureKey($stack, 'experience', 'text', [
            'en' => 'Experience',
            'es' => 'Experiencia',
        ]);

        Translation::ensureChoice($stack, 'i18nChoices', [
            ['name' => Translation::TYPE_CHOICE, 'valueEn' => 'Choice', 'valueEs' => 'Elección'],
            ['name' => Translation::TYPE_EDITOR, 'valueEn' => 'Editor', 'valueEs' => 'Editor'],
            ['name' => Translation::TYPE_TEXT, 'valueEn' => 'Text', 'valueEs' => 'Texto'],
            ['name' => Translation::TYPE_TEXTAREA, 'valueEn' => 'Textarea', 'valueEs' => 'Área de texto'],
        ]);

        Translation::ensureChoice($stack, 'multimediaTypeChoices', [
            ['name' => MultimediaItem::TYPE_IMAGE, 'valueEn' => 'Image', 'valueEs' => 'Imagen'],
            ['name' => MultimediaItem::TYPE_VIDEO, 'valueEn' => 'Video', 'valueEs' => 'Vídeo'],
            ['name' => MultimediaItem::TYPE_FILE, 'valueEn' => 'File', 'valueEs' => 'Archivo'],
            ['name' => MultimediaItem::TYPE_OFFICE, 'valueEn' => 'Office', 'valueEs' => 'Office'],
            ['name' => MultimediaItem::TYPE_YOUTUBE, 'valueEn' => 'Youtube', 'valueEs' => 'Youtube'],
            ['name' => MultimediaItem::TYPE_VIMEO, 'valueEn' => 'Vimeo', 'valueEs' => 'Vimeo'],
            ['name' => MultimediaItem::TYPE_URL, 'valueEn' => 'URL', 'valueEs' => 'URL'],
        ]);

        Translation::ensureChoice($stack, 'visibilityChoices', [
            ['name' => Visibility::STATUS_DRAFT, 'valueEn' => 'Draft', 'valueEs' => 'Borrador'],
            ['name' => Visibility::STATUS_SCHEDULED, 'valueEn' => 'Scheduled', 'valueEs' => 'Programado'],
            ['name' => Visibility::STATUS_PUBLISHED, 'valueEn' => 'Published', 'valueEs' => 'Público'],
        ]);

        Translation::ensureChoice($stack, 'userStatus', [
            ['name' => User::STATUS_ACTIVE, 'valueEn' => 'Active', 'valueEs' => 'Activo'],
            ['name' => User::STATUS_INACTIVE, 'valueEn' => 'Inactive', 'valueEs' => 'Inactivo'],
            ['name' => User::STATUS_BANNED, 'valueEn' => 'Banned', 'valueEs' => 'Bloqueado'],
        ]);

        $this->seedComponents();

        return 1;
    }

    private function seedComponents()
    {
        // Stack:
        $stackQuery = TranslationStack::getQueryCaller()
            ->andPropertyEqual('components');

        $stack = TranslationStack::getOne($stackQuery);
        if (!$stack) $stack = TranslationStack::getInstance();

        $stack
            ->setName('Laminim CMS Components i18n')
            ->setProperty('components')
            ->setOnlyForCms(true)
            ->setRequiredAdminPerms(true)
            ->save()
        ;

        Translation::ensureKey($stack, 'page.many', 'text', [
            'en' => 'Pages',
            'es' => 'Páginas',
        ]);

        Translation::ensureKey($stack, 'page.one', 'text', [
            'en' => 'Page',
            'es' => 'Página',
        ]);

        Translation::ensureKey($stack, 'user.many', 'text', [
            'en' => 'Users',
            'es' => 'Usuarios',
        ]);

        Translation::ensureKey($stack, 'user.one', 'text', [
            'en' => 'User',
            'es' => 'Usuario',
        ]);

        Translation::ensureKey($stack, 'role.many', 'text', [
            'en' => 'Role',
            'es' => 'Roles',
        ]);

        Translation::ensureKey($stack, 'role.one', 'text', [
            'en' => 'Role',
            'es' => 'Rol',
        ]);

        Translation::ensureKey($stack, 'lmm-metadata.many', 'text', [
            'en' => 'Metadata',
            'es' => 'Metadatos',
        ]);

        Translation::ensureKey($stack, 'lmm-metadata.one', 'text', [
            'en' => 'Metadata',
            'es' => 'Metadatos',
        ]);

        Translation::ensureKey($stack, 'i18n.many', 'text', [
            'en' => 'Translations',
            'es' => 'Traducciones',
        ]);

        Translation::ensureKey($stack, 'i18n.one', 'text', [
            'en' => 'Translation',
            'es' => 'Traducciones',
        ]);

        Translation::ensureKey($stack, 'i18n-stack.many', 'text', [
            'en' => 'Translations Stacks',
            'es' => 'Grupos de Traducciones',
        ]);

        Translation::ensureKey($stack, 'i18n-stack.one', 'text', [
            'en' => 'Translation Stack',
            'es' => 'Grupo de Traducciones',
        ]);

        Translation::ensureKey($stack, 'multimedia.many', 'text', [
            'en' => 'Multimedia',
            'es' => 'Multimedia',
        ]);

        Translation::ensureKey($stack, 'multimedia.one', 'text', [
            'en' => 'Multimedia',
            'es' => 'Multimedia',
        ]);
    }
}