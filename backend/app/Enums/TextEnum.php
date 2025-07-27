<?php

namespace App\Enums;

enum TextEnum: int
{
    case curriculumPresentacion = 1;
    case curriculumSignature = 2;
    case portfolioHome = 3;
    case portfolioAboutMe = 4;

    public function output(): string
    {
        return match($this) {
            self::curriculumPresentacion => 'Curriculum - Presentazione',
            self::curriculumSignature => 'Curriculum - Firma',
            self::portfolioHome => 'Portfolio - Home',
            self::portfolioAboutMe => 'Portfolio - Su di me',
        };
    }
}