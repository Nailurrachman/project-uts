<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GradeResource\Pages;
use App\Filament\Resources\GradeResource\RelationManagers;
use App\Models\Grade;
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

class GradeResource extends Resource
{
    protected static ?string $model = Grade::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'School Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('student_id')
                    ->label('Student')
                    ->relationship('student', 'name')
                    ->required(),
                Select::make('subject_id')
                    ->label('Subject')
                    ->relationship('subject', 'name')
                    ->required(),
                    Select::make('grade_type_id')
                    ->label('Grade Type')
                    ->relationship('gradeTypes', 'name')
                    ->required(),
                TextInput::make('score')
                    ->label('Score')
                    ->required()
                    ->minValue(0)
                    ->maxValue(100),
                Textarea::make('notes')
                    ->label('Notes')
                    ->rows(3),
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
                TextInput::make('academic_year')
                    ->label('Academic Year')
                    ->required()
                    ->placeholder('e.g., 2023/2024'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.name')->label('Student')->sortable()->searchable(),
                TextColumn::make('subject.name')->label('Subject')->sortable()->searchable(),
                TextColumn::make('gradeTypes.name')->label('Grade Type')->sortable(),
                TextColumn::make('score')->label('Score')->sortable(),
                TextColumn::make('semester')->label('Semester')->sortable(),
                TextColumn::make('academic_year')->label('Academic Year')->sortable(),
            ])
            ->filters([
                SelectFilter::make('student_id')
                    ->label('Student')
                    ->relationship('student', 'name'),
                SelectFilter::make('subject_id')
                    ->label('Subject')
                    ->relationship('subject', 'name'),
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
                    SelectFilter::make('grade_type_id')
                    ->label('Grade Type')
                    ->relationship('gradeTypes', 'name'),
            ])
            ->defaultSort('student.name');
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
            'index' => Pages\ListGrades::route('/'),
            'create' => Pages\CreateGrade::route('/create'),
            'edit' => Pages\EditGrade::route('/{record}/edit'),
        ];
    }
}
