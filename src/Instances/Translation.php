<?php

namespace LaminimCMS\Instances;

use LaminimCMS\Generated\GeneratedTranslation;

class Translation extends GeneratedTranslation
{
    const COMPONENT = 'lmm-i18n';

    const TYPE_TEXT = 'text';
    const TYPE_TEXTAREA = 'textarea';
    const TYPE_EDITOR = 'editor';
    const TYPE_CHOICE = 'choice';

    const TYPES = [
        self::TYPE_TEXT,
        self::TYPE_TEXTAREA,
        self::TYPE_EDITOR,
        self::TYPE_CHOICE,
    ];



    public static function ensureKey(TranslationStack $stack, string $key, string $type, array $values)
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

    public static function ensureChoice(TranslationStack $stack, string $key, array $values)
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

    public function getDisplayName(): string
    {
        $r = [];
        $name = $this->getStack()?->getProperty();
        if ($name !== '') $r[] = $name;

        $lastname = $this->getProperty();
        if ($lastname !== '') $r[] = $lastname;

        return implode('.', $r);
    }
}