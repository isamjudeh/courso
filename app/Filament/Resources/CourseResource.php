<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('institute_id')
                    ->relationship('institute', 'name')
                    ->required(),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\TextInput::make('teacher_id')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\Textarea::make('image')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required(),
                Forms\Components\TextInput::make('regular_price')
                    ->required(),
                Forms\Components\TextInput::make('sale_price'),
                Forms\Components\DateTimePicker::make('sunday_start_time')
                    ->required(),
                Forms\Components\DateTimePicker::make('sunday_end_time')
                    ->required(),
                Forms\Components\DateTimePicker::make('monday_start_time')
                    ->required(),
                Forms\Components\DateTimePicker::make('monday_end_time')
                    ->required(),
                Forms\Components\DateTimePicker::make('tuesday_start_time')
                    ->required(),
                Forms\Components\DateTimePicker::make('tuesday_end_time')
                    ->required(),
                Forms\Components\DateTimePicker::make('wednesday_start_time')
                    ->required(),
                Forms\Components\DateTimePicker::make('wednesday_end_time')
                    ->required(),
                Forms\Components\DateTimePicker::make('thursday_start_time')
                    ->required(),
                Forms\Components\DateTimePicker::make('thursday_end_time')
                    ->required(),
                Forms\Components\DateTimePicker::make('friday_start_time')
                    ->required(),
                Forms\Components\DateTimePicker::make('friday_end_time')
                    ->required(),
                Forms\Components\DateTimePicker::make('saturday_start_time')
                    ->required(),
                Forms\Components\DateTimePicker::make('saturday_end_time')
                    ->required(),
                Forms\Components\Textarea::make('address')
                    ->required(),
                Forms\Components\Textarea::make('main_points')
                    ->required(),
                Forms\Components\DateTimePicker::make('register_open')
                    ->required(),
                Forms\Components\DateTimePicker::make('register_close')
                    ->required(),
                Forms\Components\TextInput::make('hours')
                    ->required(),
                Forms\Components\DateTimePicker::make('start_at')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('institute.name'),
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('teacher_id'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('image'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('regular_price'),
                Tables\Columns\TextColumn::make('sale_price'),
                Tables\Columns\TextColumn::make('sunday_start_time')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('sunday_end_time')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('monday_start_time')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('monday_end_time')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('tuesday_start_time')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('tuesday_end_time')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('wednesday_start_time')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('wednesday_end_time')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('thursday_start_time')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('thursday_end_time')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('friday_start_time')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('friday_end_time')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('saturday_start_time')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('saturday_end_time')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('main_points'),
                Tables\Columns\TextColumn::make('register_open')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('register_close')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('hours'),
                Tables\Columns\TextColumn::make('start_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }    
}
