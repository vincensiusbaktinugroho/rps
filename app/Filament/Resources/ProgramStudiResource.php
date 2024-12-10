<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramStudiResource\Pages;
use App\Filament\Resources\ProgramStudiResource\RelationManagers;
use App\Models\ProgramStudi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProgramStudiResource extends Resource
{
    protected static ?string $mxodel = ProgramStudi::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?string $navigationLabel = 'Program Studi';

    protected static ?string $modelLabel = 'Program Studi';

    protected static ?string $navigationGroup = 'RPS';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                ->label('Nama Program Studi')
                ->required()
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
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
            'index' => Pages\ListProgramStudis::route('/'),
            'create' => Pages\CreateProgramStudi::route('/create'),
            'view' => Pages\ViewProgramStudi::route('/{record}'),
            'edit' => Pages\EditProgramStudi::route('/{record}/edit'),
        ];
    }
}
