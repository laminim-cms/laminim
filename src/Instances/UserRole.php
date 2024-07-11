<?php

namespace LaminimCMS\Instances;

use LaminimCMS\Generated\GeneratedUserRole;

class UserRole extends GeneratedUserRole
{
    const COMPONENT = 'lmm-user-role';

    public function getPreparedConfig(): array
    {
        $currentConfig = $this->getConfig();
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
}