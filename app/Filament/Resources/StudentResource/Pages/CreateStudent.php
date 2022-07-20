<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

use Heloufir\FilamentWorkflowManager\Core\WorkflowResource;

class CreateStudent extends CreateRecord
{
    use WorkflowResource;

    protected static string $resource = StudentResource::class;
}
