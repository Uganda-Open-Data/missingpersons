<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Status: string implements HasLabel {
    case Missing = 'Missing';
    case Arrested = 'Arrested';
    case Fallen = 'Fallen';
    case Kidnapped = 'Kidnapped';

    case Found = 'Found';

    case Unknown = 'Unknown';

    case Remanded = 'Remanded';

    case Released = 'Released';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
