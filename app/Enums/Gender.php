<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Gender: string implements HasLabel {
    case Male = 'Male';
    case Female = 'Female';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
