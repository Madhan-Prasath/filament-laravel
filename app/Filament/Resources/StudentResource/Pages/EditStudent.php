<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

use Heloufir\FilamentWorkflowManager\Core\WorkflowResource;

class EditStudent extends EditRecord
{
    use WorkflowResource;

    protected $listeners = ['WorkflowStatusUpdated' => 'status_updated'];

    protected static string $resource = StudentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function status_updated($obj)
    {
        return($obj); // $obj is the details object defined before
    }

    protected function getSavedNotificationMessage(): ?string
    {
        return 'User updated';
    }
}
