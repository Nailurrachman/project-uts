<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScheduleResource\Pages;
use App\Filament\Resources\ScheduleResource\RelationManagers;
use App\Models\Schedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationGroup = 'Academic Management';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('subject_id')
                    ->relationship('subject', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                Forms\Components\Select::make('teacher_id')
                    ->relationship('teacher', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                Forms\Components\Select::make('class_id')
                    ->relationship('class', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                Forms\Components\Select::make('day')
                    ->options([
                        'Monday' => 'Monday',
                        'Tuesday' => 'Tuesday',
                        'Wednesday' => 'Wednesday',
                        'Thursday' => 'Thursday',
                        'Friday' => 'Friday',
                        'Saturday' => 'Saturday',
                        'Sunday' => 'Sunday',
                    ])
                    ->required(),

                Forms\Components\TimePicker::make('start_time')
                    ->required()
                    ->seconds(false),

                Forms\Components\TimePicker::make('end_time')
                    ->required()
                    ->seconds(false)
                    ->after('start_time'),

                Forms\Components\TextInput::make('room_number')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('semester')
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

                Forms\Components\TextInput::make('academic_year')
                    ->required()
                    ->maxLength(9)
                    ->placeholder('2023/2024'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subject.name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('teacher.name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('class.name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('day')
                    ->sortable(),

                Tables\Columns\TextColumn::make('start_time')
                    ->time()
                    ->sortable(),

                Tables\Columns\TextColumn::make('end_time')
                    ->time()
                    ->sortable(),

                Tables\Columns\TextColumn::make('room_number')
                    ->searchable(),

                Tables\Columns\TextColumn::make('semester')
                    ->sortable(),

                Tables\Columns\TextColumn::make('academic_year')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('day'),
                Tables\Filters\SelectFilter::make('semester'),
                Tables\Filters\SelectFilter::make('academic_year'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}