<?php

namespace LaminimCMS\Instances;

use LaminimCMS\Generated\GeneratedUser;

class User extends GeneratedUser
{
    const COMPONENT = 'lmm-user';

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
        return (int)$_SESSION['lmm-user-id'];
    }

    public static function getLogged(): static
    {
        return static::getInstance(static::getLoggedId());
    }
}