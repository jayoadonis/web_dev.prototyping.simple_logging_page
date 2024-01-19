<?php

namespace util;

class Error {
    public const FATAL = -1;
    public const NONE = 0;
    public const USER_NAME = 2;
    public const PASSWORD = 4;
    public const RE_PASSWORD = 8;
    public const EMAIL = 16;

    public static array $value = [
        self::FATAL => 'Fatal Error found.',
        self::NONE => 'No Error',
        self::USER_NAME => 'Error found: User Name invalid',
        self::PASSWORD => 'Error found: Password invalid',
        self::USER_NAME | self::PASSWORD => 'Error found: both user name & password invalid',
        self::RE_PASSWORD => 'Error found: Re-password invalid',
        self::EMAIL => 'Error found: Email Address invalid'
    ];
}