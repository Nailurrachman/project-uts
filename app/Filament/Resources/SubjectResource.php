<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubjectResource\Pages;
use App\Filament\Resources\SubjectResource\RelationManagers;
use App\Models\Subject;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubjectResource extends Resource
{
    protected static ?string $model = Subject::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'School Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Subject Name')
                    ->required(),
                TextInput::make('code')
                    ->label('Subject Code')
                    ->required()
                    ->unique(),
                Textarea::make('description')
                    ->label('Description')
                    ->rows(3),
                TextInput::make('credits')
                    ->label('Credits')
                    ->required()
                    ->minValue(1)
                    ->maxValue(10),
                Select::make('teacher_id')
                    ->label('Teacher')
                    ->relationship('teacher', 'name')
                    ->required(),
                Select::make('semester')
                    ->label('Semester')
                    ->options([
                        '1' => 'Semester 1',
                        '2' => 'Semester 2',
                        '3' => 'Semester 3',
                        '4' => 'Semester 4',
                        '5' => 'Semester 5',
                        '6' => 'Semester 6',
                        '7'=> 'Semester 7',
                        '8'=> 'Semester 8',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Subject Name')->sortable()->searchable(),
                TextColumn::make('code')->label('Subject Code')->sortable()->searchable(),
                TextColumn::make('teacher.name')->label('Teacher')->sortable()->searchable(),
                TextColumn::make('credits')->label('Credits')->sortable(),
                TextColumn::make('semester')->label('Semester')->sortable(),
            ])
            ->filters([
                SelectFilter::make('teacher_id')
                    ->label('Teacher')
                    ->relationship('teacher', 'name'),
                SelectFilter::make('semester')
                    ->label('Semester')
                    ->options([
                        '1' => 'Semester 1',
                        '2' => 'Semester 2',
                        '3' => 'Semester 3',
                        '4' => 'Semester 4',
                        '5' => 'Semester 5',
                        '6' => 'Semester 6',
                        '7'=> 'Semester 7',
                        '8'=> 'Semester 8',
                    ]),
            ])
            ->defaultSort('name');
    }

    public static function getRelations(): array
    {
        return [
            // Define related resources if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubjects::route('/'),
            'create' => Pages\CreateSubject::route('/create'),
            'edit' => Pages\EditSubject::route('/{record}/edit'),
        ];
    }
}