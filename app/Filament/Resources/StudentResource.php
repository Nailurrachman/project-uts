<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
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

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'School Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nim')
                    ->label('NIM')
                    ->required()
                    ->unique(),
                TextInput::make('name')
                    ->label('Name')
                    ->required(),
                DatePicker::make('birth_date')
                    ->label('Birth Date')
                    ->required(),
                Select::make('gender')
                    ->label('Gender')
                    ->required()
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ]),
                TextInput::make('address')
                    ->label('Address')
                    ->required(),
                TextInput::make('phone')
                    ->label('Phone')
                    ->required(),
                Select::make('class_id')
                    ->label('Class')
                    ->relationship('class', 'name')
                    ->required(),
                TextInput::make('parent_name')
                    ->label('Parent Name')
                    ->required(),
                TextInput::make('parent_phone')
                    ->label('Parent Phone')
                    ->required(),
                TextInput::make('entry_year')
                    ->label('Entry Year')
                    ->required()
                    ->numeric()
                    ->length(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')->label('NIM')->sortable()->searchable(),
                TextColumn::make('name')->label('Name')->sortable()->searchable(),
                TextColumn::make('class.name')->label('Class')->sortable()->searchable(),
                TextColumn::make('gender')->label('Gender')->sortable(),
                TextColumn::make('birth_date')->label('Birth Date')->date()->sortable(),
                TextColumn::make('entry_year')->label('Entry Year')->sortable(),
            ])
            ->filters([
                SelectFilter::make('class_id')
                    ->label('Class')
                    ->relationship('class', 'name'),
                SelectFilter::make('gender')
                    ->label('Gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ]),
            ])
            ->defaultSort('name');
    }

    public static function getRelations(): array
    {
        return [
            // Define relations if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}