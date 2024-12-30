<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClassRoomResource\Pages;
use App\Filament\Resources\ClassRoomResource\RelationManagers;
use App\Models\ClassRoom;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\QueryBuilder\Constraints\NumberConstraint;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClassRoomResource extends Resource
{
    protected static ?string $model = ClassRoom::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'School Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Class Name')
                    ->required()
                    ->unique(),
                TextInput::make('grade_level')
                    ->label('Grade Level')
                    ->required(),
                TextInput::make('academic_year')
                    ->label('Academic Year')
                    ->required(),
                Select::make('homeroom_teacher_id')
                    ->label('Homeroom Teacher')
                    ->relationship('teacher', 'name')
                    ->required(),
                TextInput::make('room_number')
                    ->label('Room Number')
                    ->required(),
                TextInput::make('capacity')
                    ->label('Capacity')
                    ->numeric()
                    ->integer()
                    ->minValue(1)
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Class Name')->sortable()->searchable(),
                TextColumn::make('grade_level')->label('Grade Level')->sortable(),
                TextColumn::make('academic_year')->label('Academic Year')->sortable(),
                TextColumn::make('teacher.name')->label('Homeroom Teacher')->sortable()->searchable(),
                TextColumn::make('room_number')->label('Room Number')->sortable(),
                TextColumn::make('capacity')->label('Capacity')->sortable(),
            ])
            ->filters([
                SelectFilter::make('homeroom_teacher_id')
                    ->label('Homeroom Teacher')
                    ->relationship('teacher', 'name'),
                SelectFilter::make('academic_year')
                    ->label('Academic Year')
                    ->options(
                        ClassRoom::query()
                            ->pluck('academic_year', 'academic_year')
                            ->toArray()
                    ),
            ])
            ->defaultSort('name');
    }

    public static function getRelations(): array
    {
        return [
            // Define any related resources if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClassRooms::route('/'),
            'create' => Pages\CreateClassRoom::route('/create'),
            'edit' => Pages\EditClassRoom::route('/{record}/edit'),
        ];
    }
}