<?php

namespace App\Enums;

enum SkillEnum: int
{
    case Frontend = 1;
    case Backend = 2;
    case Database = 3;
    case DevOps = 4;

    public function output(): string
    {
        return match($this) {
            self::Frontend => 'Frontend',
            self::Backend => 'Backend',
            self::Database => 'Database',
            self::DevOps => 'DevOps',
        };
    }
}
