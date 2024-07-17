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
        $this->ensureKey($stack, 'stack', 'text', [
            'en' => 'Stack',
            'es' => 'Stack',
        ]);

        $this->ensureKey($stack, 'type', 'text', [
            'en' => 'Type',
            'es' => 'Tipo',
        ]);

        $this->ensureKey($stack, 'name', 'text', [
            'en' => 'Name',
            'es' => 'Nombre',
        ]);

        $this->ensureKey($stack, 'lastname', 'text', [
            'en' => 'Lastname',
            'es' => 'Apellidos',
        ]);

        $this->ensureKey($stack, 'property', 'text', [
            'en' => 'Property',
            'es' => 'Propiedad',
        ]);

        $this->ensureKey($stack, 'createdAt', 'text', [
            'en' => 'Created at',
            'es' => 'Fecha de creación',
        ]);

        $this->ensureKey($stack, 'email', 'text', [
            'en' => 'Email',
            'es' => 'Email',
        ]);

        $this->ensureKey($stack, 'value', 'text', [
            'en' => 'Value',
            'es' => 'Valor',
        ]);

        $this->ensureKey($stack, 'valueEn', 'text', [
            'en' => 'English',
            'es' => 'Inglés',
        ]);

        $this->ensureKey($stack, 'valueEs', 'text', [
            'en' => 'Spanish',
            'es' => 'Español',
        ]);

        $this->ensureKey($stack, 'requiredAdminPerms', 'text', [
            'en' => 'Required admin permissions',
            'es' => 'Requiere permisos de administrador',
        ]);

        $this->ensureKey($stack, 'onlyForCms', 'text', [
            'en' => 'Only for CMS',
            'es' => 'Solo para el CMS',
        ]);

        $this->ensureKey($stack, 'hasCustomPermissions', 'text', [
            'en' => 'Has custom permissions',
            'es' => 'Permisos personalizados',
        ]);

        $this->ensureKey($stack, 'title.index.i18n', 'text', [
            'en' => 'Translations',
            'es' => 'Traducciones',
        ]);

        $this->ensureKey($stack, 'title.edit.i18n', 'text', [
            'en' => 'Edit Translation',
            'es' => 'Editar Traducción',
        ]);

        $this->ensureKey($stack, 'title.create.i18n', 'text', [
            'en' => 'Create Translation',
            'es' => 'Crear Traducción',
        ]);

        $this->ensureKey($stack, 'title.index.i18n-stack', 'text', [
            'en' => 'Translations Stack',
            'es' => 'Grupos de Traducciones',
        ]);

        $this->ensureKey($stack, 'title.edit.i18n-stack', 'text', [
            'en' => 'Edit Translation Stack',
            'es' => 'Editar Grupo de Traducciones',
        ]);

        $this->ensureKey($stack, 'title.create.i18n-stack', 'text', [
            'en' => 'Create Translation Stack',
            'es' => 'Crear Grupo de Traducciones',
        ]);

        $this->ensureKey($stack, 'title.index.user', 'text', [
            'en' => 'Users',
            'es' => 'Usuarios',
        ]);

        $this->ensureKey($stack, 'title.edit.user', 'text', [
            'en' => 'Edit User',
            'es' => 'Editar Usuario',
        ]);

        $this->ensureKey($stack, 'title.create.user', 'text', [
            'en' => 'Create User',
            'es' => 'Crear Usuario',
        ]);

        $this->ensureKey($stack, 'title.index.role', 'text', [
            'en' => 'Roles',
            'es' => 'Roles',
        ]);

        $this->ensureKey($stack, 'title.edit.role', 'text', [
            'en' => 'Edit Role',
            'es' => 'Editar Rol',
        ]);

        $this->ensureKey($stack, 'title.create.role', 'text', [
            'en' => 'Create Role',
            'es' => 'Crear Rol',
        ]);

        $this->ensureKey($stack, 'title.index.page', 'text', [
            'en' => 'Pages',
            'es' => 'Páginas',
        ]);

        $this->ensureKey($stack, 'title.edit.page', 'text', [
            'en' => 'Edit Page',
            'es' => 'Editar Página',
        ]);

        $this->ensureKey($stack, 'title.create.page', 'text', [
            'en' => 'Create Page',
            'es' => 'Crear Página',
        ]);

        $this->ensureChoice($stack, 'i18nChoices', [
            ['name' => Translation::TYPE_CHOICE, 'valueEn' => 'Choice', 'valueEs' => 'Elección'],
            ['name' => Translation::TYPE_EDITOR, 'valueEn' => 'Editor', 'valueEs' => 'Editor'],
            ['name' => Translation::TYPE_TEXT, 'valueEn' => 'Text', 'valueEs' => 'Texto'],
            ['name' => Translation::TYPE_TEXTAREA, 'valueEn' => 'Textarea', 'valueEs' => 'Área de texto'],
        ]);


        return 1;
    }

    private function ensureKey(TranslationStack $stack, string $key, string $type, array $values)
    {
        $query = Translation::getQueryCaller()
            ->andPropertyEqual($key)
            ->andStackEqual($stack->getId());

        $item = Translation::getOne($query);
        if (!$item) $item = Translation::getInstance();

        $item
            ->setStackId($stack->getId())
            ->setProperty($key)
            ->setType($type)
            ->setValueEn($values['en'])
            ->setValueEs($values['es'])
            ->save()
        ;
    }

    private function ensureChoice(TranslationStack $stack, string $key, array $values)
    {
        $query = Translation::getQueryCaller()
            ->andPropertyEqual($key)
            ->andStackEqual($stack->getId());

        $item = Translation::getOne($query);
        if (!$item) $item = Translation::getInstance();

        if ($item->getId() > 0){
            foreach ($values as &$value) {
                $opt = ModularOption::getOne(
                    ModularOption::getQueryCaller()
                        ->andItemIdEqual($item->getId())
                        ->andNameEqual($value['name'])
                );

                if (is_object($opt)) $value['id'] = $opt->getId();
            }
        }

        $item
            ->setStackId($stack->getId())
            ->setProperty($key)
            ->setModularOptionsWithData($values)
            ->setTypeChoice()
            ->setValueEn('')
            ->setValueEs('')
            ->save()
        ;
    }
}