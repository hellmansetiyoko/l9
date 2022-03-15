<?php

namespace App\Repositories\Enums;

enum CoursesNameEnum: string
{
    case MATWAJIB = 'matematika wajib';
    case MATMINAT = 'matematika pemiatan';
    case BIOLOGI = 'biolog';
    case SEJARAH = 'sejarah';
    case EKONOMI = 'ekonomi';
    //default
    case NONE = 'tidak mengajar';
}
