<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherResource\Pages;
use App\Filament\Resources\TeacherResource\RelationManagers;
use App\Models\Teacher;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'School Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nip')
                    ->label('NIP')
                    ->required()
                    ->unique(),
                TextInput::make('name')
                    ->label('Name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email()
                    ->unique(),
                TextInput::make('phone')
                    ->label('Phone')
                    ->required(),
                TextInput::make('address')
                    ->label('Address')
                    ->required(),
                TextInput::make('specialization')
                    ->label('Specialization')
                    ->required(),
                DatePicker::make('join_date')
                    ->label('Join Date')
                    ->required(),
                Select::make('education_level')
                    ->label('Education Level')
                    ->options([
                        'diploma' => 'Diploma',
                        'bachelor' => 'Bachelor',
                        'master' => 'Master',
                        'doctorate' => 'Doctorate',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nip')->label('NIP')->sortable()->searchable(),
                TextColumn::make('name')->label('Name')->sortable()->searchable(),
                TextColumn::make('email')->label('Email')->sortable()->searchable(),
                TextColumn::make('phone')->label('Phone')->sortable(),
                TextColumn::make('specialization')->label('Specialization')->sortable(),
                TextColumn::make('join_date')->label('Join Date')->date()->sortable(),
                TextColumn::make('education_level')->label('Education Level')->sortable(),
            ])
            ->filters([
                SelectFilter::make('education_level')
                    ->label('Education Level')
                    ->options([
                        'diploma' => 'Diploma',
                        'bachelor' => 'Bachelor',
                        'master' => 'Master',
                        'doctorate' => 'Doctorate',
                    ]),
                SelectFilter::make('specialization')
                    ->label('Specialization')
                    ->options(
                        Teacher::query()
                            ->pluck('specialization', 'specialization')
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
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
            'edit' => Pages\EditTeacher::route('/{record}/edit'),
        ];
    }
}