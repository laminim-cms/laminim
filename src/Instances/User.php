<?php

namespace LaminimCMS\Instances;

use LaminimCMS\Generated\GeneratedUser;

class User extends GeneratedUser
{
    const COMPONENT = 'lmm-user';

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_BANNED = 'banned';

    const STATUSES = [
        self::STATUS_ACTIVE,
        self::STATUS_INACTIVE,
        self::STATUS_BANNED,
    ];

    public function getPreparedCustomPermissions(): array
    {
        $currentConfig = $this->getCustomPermissions();
        if (!$currentConfig) $currentConfig = [];
        $config = Permission::getAllComponentPermissions();
        $r = [];

        foreach ($config as $name => $perms) {
            $t = [
                'component' => $name,
                'perms' => [],
            ];

            $existingCfg = array_filter($currentConfig, function ($cfg) use ($name) {
                return $cfg['component'] == $name;
            });

            $existingCfg = reset($existingCfg);
            $existingPerms = is_array($existingCfg) && is_array($existingCfg['perms']) ? $existingCfg['perms'] : [];

            foreach ($perms as $perm) {
                $p = array_key_exists($perm, $existingPerms) ? (bool)$existingPerms[$perm] : false;
                $t['perms'][$perm] = $p;
            }

            $r[] = $t;
        }

        return $r;
    }

    public function logIn(): static
    {
        if ($this->getId() === 0) return $this;

        $_SESSION['lmm-user-id'] = $this->getId();
        return $this;
    }

    public function logOut(): static
    {
        $_SESSION['lmm-user-id'] = 0;
        return $this;
    }

    public static function getLoggedId(): int
    {
//        return 1;
        return (int)$_SESSION['lmm-user-id'];
    }

    public static function getLogged(): static
    {
        return static::getInstance(static::getLoggedId());
    }

    public function getFullName(): string
    {
        $r = [];
        $name = $this->getName();
        if ($name !== '') $r[] = $name;
        $lastname = $this->getLastName();
        if ($lastname !== '') $r[] = $lastname;

        return implode(' ', $r);
    }
}