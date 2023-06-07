<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegisterationResource\Pages;
use App\Filament\Resources\RegisterationResource\RelationManagers;
use App\Models\Registeration;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegisterationResource extends Resource
{
    protected static ?string $model = Registeration::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'id')
                    ->required(),
                Forms\Components\Select::make('course_id')
                    ->relationship('course', 'name')
                    ->required(),
                Forms\Components\Toggle::make('registered_before')
                    ->required(),
                Forms\Components\Toggle::make('admin_approved')
                    ->required(),
                Forms\Components\Toggle::make('user_approved'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.first_name'),
                Tables\Columns\TextColumn::make('course.name'),
                Tables\Columns\IconColumn::make('admin_approved')
                    ->boolean(),
                Tables\Columns\IconColumn::make('user_approved')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListRegisterations::route('/'),
            // 'create' => Pages\CreateRegisteration::route('/create'),
            // 'edit' => Pages\EditRegisteration::route('/{record}/edit'),
        ];
    }
}
