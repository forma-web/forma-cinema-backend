<?php

namespace App\Enums;

enum RussianAgesEnum : int
{
    use Arrayable;

    case ZERO = 0;
    case SIX = 6;
    case TWELVE = 12;
    case EIGHTEEN = 18;
}
