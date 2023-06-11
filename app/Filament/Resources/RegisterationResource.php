<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegisterationResource\Pages;
use App\Filament\Resources\RegisterationResource\RelationManagers;
use App\Models\Registeration;
use App\Notifications\FcmNotification;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Notification as FacadesNotification;

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
                Tables\Columns\TextColumn::make('user.first_name')->searchable(),
                Tables\Columns\TextColumn::make('course.name')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('View user')
                    ->color('secondry')
                    ->icon('heroicon-o-eye')
                    ->url(fn (Registeration $record) => route('filament.resources.users.view', $record->user->id)),
                Action::make('Approve')
                    ->color('success')
                    ->action(function (Registeration $record) {
                        $record->admin_approved = true;
                        $record->save();
                        $record->course->students()->create(['user_id' => $record->user->id]);
                        FacadesNotification::send($record->user, new FcmNotification(
                            title: $record->course->name,
                            body: 'تم الموافقة على طلب تسجيلك',
                            data: [],
                            image: $record->course->image,
                        ));
                        Notification::make()
                            ->title('Sended notification to user success')
                            ->success()
                            ->send();
                    }),
                Action::make('Cancel')
                    ->color('danger')
                    ->action(function (Registeration $record) {
                        $record->admin_approved = false;
                        $record->save();
                        FacadesNotification::send($record->user, new FcmNotification(
                            title: $record->course->name,
                            body: 'تم رفض طلبك تسجيلك',
                            data: [],
                            image: $record->course->image,
                        ));
                        $record->delete();
                        Notification::make()
                            ->title('Sended notification to user success')
                            ->success()
                            ->send();
                    }),
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
