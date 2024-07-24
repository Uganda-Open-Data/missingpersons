<?php

namespace App\Filament\Resources;

use App\Enums\Gender;
use App\Enums\Status;
use App\Filament\Resources\ActivityResource\Pages\CreateActivity;
use App\Filament\Resources\ActivityResource\Pages\EditActivity;
use App\Filament\Resources\ActivityResource\Pages\ListActivities;
use App\Filament\Resources\VictimResource\Pages;
use App\Filament\Resources\VictimResource\RelationManagers;
use App\Models\HoldingLocation;
use App\Models\SecurityOrgan;
use App\Models\Victim;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class VictimResource extends Resource
{
    protected static ?string $model = Victim::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function getRecordTitle(Model|null $record): string|null|Htmlable
    {
        return $record->name;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nick_name')
                    ->maxLength(255),
                Forms\Components\Select::make('gender')
                    ->options(Gender::class)
                    ->required(),
                Forms\Components\FileUpload::make('photo')->disk('media'),
                Forms\Components\TextInput::make('x_handle')
                    ->required()
                    ->maxLength(25),
                Forms\Components\Select::make('status')
                    ->options(Status::class)
                    ->required(),
                Forms\Components\DateTimePicker::make('status_date')
                    ->default(now())
                    ->required(),
                Forms\Components\Select::make('security_organ_id')
                    ->label("Security Organ")
                    ->options(SecurityOrgan::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\Select::make('holding_location_id')
                    ->label("Holding Location")
                    ->options(HoldingLocation::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\TextInput::make('last_known_location')
                    ->maxLength(255),
                Forms\Components\RichEditor::make('notes'),
                Forms\Components\Toggle::make('confirmed')
                    ->onColor('success')
                    ->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nick_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('x_handle')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('photo')->disk('media'),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('security_organ.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('holding_location.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('notes')
                    ->searchable()
                    ->wrap(true),
                Tables\Columns\IconColumn::make('confirmed')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(Status::class),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ], position: ActionsPosition::BeforeColumns)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                ]),
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
            'index' => Pages\ListVictims::route('/'),
            'create' => Pages\CreateVictim::route('/create'),
            'view' => Pages\ViewVictim::route('/{record}'),
            'edit' => Pages\EditVictim::route('/{record}/edit'),
        ];
    }

    protected function getTableFiltersLayout(): ?string
    {
        return Layout::AboveContent;
    }

    protected function shouldPersistTableFiltersInSession(): bool
    {
        return true;
    }
}
