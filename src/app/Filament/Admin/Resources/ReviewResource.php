<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ReviewResource\Pages;
use App\Filament\Admin\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('film_id')
                    ->label('Film')
                    ->options(\App\Models\Film::pluck('title', 'id')->toArray())
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->options(\App\Models\User::pluck('name', 'id')->toArray())
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('rating')
                    ->label('Rating (1-5)')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(5)
                    ->required(),

                Forms\Components\Textarea::make('comment')
                    ->label('Komentar')
                    ->rows(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('film.title')->label('Film'),
                Tables\Columns\TextColumn::make('user.name')->label('User'),
                Tables\Columns\TextColumn::make('rating')->label('Rating')->sortable(),
                Tables\Columns\TextColumn::make('comment')->label('Komentar')->limit(50),
                Tables\Columns\TextColumn::make('created_at')->label('Tanggal')->dateTime('d M Y'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
