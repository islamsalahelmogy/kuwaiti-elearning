<?php

namespace App\Http\Utility;

class TeacherRoleEnum
{

    const ADMIN = 'admin';
    const USER = 'user';
    const NOTACTIVE = 'not_active';

    const ROLE = array(
        self::ADMIN,
        self::USER,
        self::NOTACTIVE,
    );

}
