<?php

namespace App\Models\Workspace;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

enum WorkspaceParticipationSettingMethod: string
{
    case Free = 'Free';

    case Entry = 'Entry';

    case Invitation = 'Invitation';

    case DisableParticipation = 'DisableParticipation';

    public static function default(): self
    {
        return self::Invitation;
    }
}
