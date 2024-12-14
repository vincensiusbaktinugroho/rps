<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CplProdiResource\Pages;
use App\Filament\Resources\CplProdiResource\RelationManagers;
use App\Models\CplProdi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CplProdiResource extends Resource
{
    protected static ?string $model = CplProdi::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';
    
    protected static ?string $navigationLabel = 'Cpl Prodi';

    protected static ?string $modelLabel = 'Cpl Prodi';

    protected static ?string $navigationGroup = 'RPS';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_cpl_prodi')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_cpl_prodi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCplProdis::route('/'),
            'create' => Pages\CreateCplProdi::route('/create'),
            'view' => Pages\ViewCplProdi::route('/{record}'),
            'edit' => Pages\EditCplProdi::route('/{record}/edit'),
        ];
    }
}
