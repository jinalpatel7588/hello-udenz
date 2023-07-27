<?php

namespace App\Enums;

use BenSampo\Enum\Enum;


final class StatusEnum extends Enum
{
    const ACTIVE   = 1;
    const DEACTIVE = 0;

    const API_SUCCESS_STATUS  = 200;
    const API_ERROR_STATUS  = 400;
    
    const LOGIN = 1;
    const LOGOUT = 0;
}
