<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Pages\ViewStudent;
use App\Models\Student;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StudentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Filament\Resources\StudentResource\RelationManagers;
use Heloufir\FilamentWorkflowManager\Tables\Columns\WorkflowStatusColumn;
use Heloufir\FilamentWorkflowManager\Forms\Components\WorkflowStatusInput;


class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //

                TextInput::make('name')->required()->default(auth()->user()->name)->disabled(),

                TextInput::make('email')->email()->required(),

                TextInput::make('roll_no')->required(),

                Select::make('status')
                        ->label('Status')
                        ->options([

                                'Active'     => 'Active',
                                'Not-Active' => 'Not-Active',

                            ]),

                WorkflowStatusInput::make(),


            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name'),

                TextColumn::make('email'),

                TextColumn::make('roll_no'),

                TextColumn::make('status'),

                WorkflowStatusColumn::make()

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                workflow_resources_history()
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit'   => Pages\EditStudent::route('/{record}/edit'),
            'view'   => Pages\ViewStudent::route('/{record}'),
        ];
    }
}
