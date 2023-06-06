<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Models\Course;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Livewire\TemporaryUploadedFile;
use Nette\Utils\Random;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'tabler-book-2';

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
                Forms\Components\Select::make('teachers')
                    ->multiple()
                    ->relationship('teachers', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(Random::generate(8));
                    })
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required(),
                Forms\Components\TextInput::make('regular_price')
                    ->integer()
                    ->required(),
                Forms\Components\TextInput::make('sale_price')
                    ->integer(),
                Forms\Components\TimePicker::make('sunday_start_time'),
                Forms\Components\TimePicker::make('sunday_end_time'),
                Forms\Components\TimePicker::make('monday_start_time'),
                Forms\Components\TimePicker::make('monday_end_time'),
                Forms\Components\TimePicker::make('tuesday_start_time'),
                Forms\Components\TimePicker::make('tuesday_end_time'),
                Forms\Components\TimePicker::make('wednesday_start_time'),
                Forms\Components\TimePicker::make('wednesday_end_time'),
                Forms\Components\TimePicker::make('thursday_start_time'),
                Forms\Components\TimePicker::make('thursday_end_time'),
                Forms\Components\TimePicker::make('friday_start_time'),
                Forms\Components\TimePicker::make('friday_end_time'),
                Forms\Components\TimePicker::make('saturday_start_time'),
                Forms\Components\TimePicker::make('saturday_end_time'),
                Forms\Components\TextInput::make('address')
                    ->required(),
                Forms\Components\DateTimePicker::make('register_open')
                    ->required(),
                Forms\Components\DateTimePicker::make('register_close')
                    ->required(),
                Forms\Components\TextInput::make('hours')
                    ->integer()
                    ->required(),
                Forms\Components\DateTimePicker::make('start_at')
                    ->required(),
                Forms\Components\DateTimePicker::make('closes_at')
                    ->required(),
                Forms\Components\MarkdownEditor::make('main_points')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('institute.name'),
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                // Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('regular_price')->money('syp'),
                Tables\Columns\TextColumn::make('sale_price')->money('SYP'),
                // Tables\Columns\TextColumn::make('sunday_start_time'),
                // Tables\Columns\TextColumn::make('sunday_end_time'),
                // Tables\Columns\TextColumn::make('monday_start_time'),
                // Tables\Columns\TextColumn::make('monday_end_time'),
                // Tables\Columns\TextColumn::make('tuesday_start_time'),
                // Tables\Columns\TextColumn::make('tuesday_end_time'),
                // Tables\Columns\TextColumn::make('wednesday_start_time'),
                // Tables\Columns\TextColumn::make('wednesday_end_time'),
                // Tables\Columns\TextColumn::make('thursday_start_time'),
                // Tables\Columns\TextColumn::make('thursday_end_time'),
                // Tables\Columns\TextColumn::make('friday_start_time'),
                // Tables\Columns\TextColumn::make('friday_end_time'),
                // Tables\Columns\TextColumn::make('saturday_start_time'),
                // Tables\Columns\TextColumn::make('saturday_end_time'),
                Tables\Columns\TextColumn::make('address')->limit(50),
                // Tables\Columns\TextColumn::make('main_points'),
                Tables\Columns\TextColumn::make('register_open')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('register_close')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('hours'),
                Tables\Columns\TextColumn::make('start_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('closes_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('created_at')
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
