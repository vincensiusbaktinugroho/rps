<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MataKuliahResource\Pages;
use App\Filament\Resources\MataKuliahResource\RelationManagers;
use App\Models\MataKuliah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MataKuliahResource extends Resource
{
    protected static ?string $model = MataKuliah::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?string $navigationLabel = 'Mata Kuliah';

    protected static ?string $modelLabel = 'Mata Kuliah';

    protected static ?string $navigationGroup = 'RPS';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode')
                ->label('Kode Mata Kuliah')
                ->required()
                ->maxLength(50),

            Forms\Components\TextInput::make('nama')
                ->label('Nama Mata Kuliah')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('sks')
                ->label('Jumlah SKS')
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('jurusan')
                ->label('Jurusan')
                ->default('Teknik Informatika')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('semester')
                ->label('Semester')
                ->maxLength(50)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode')
                ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                ->searchable(),
                Tables\Columns\TextColumn::make('sks')
                ->searchable(),
                Tables\Columns\TextColumn::make('jurusan')
                ->searchable(),
                Tables\Columns\TextColumn::make('semester')
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
            'index' => Pages\ListMataKuliahs::route('/'),
            'create' => Pages\CreateMataKuliah::route('/create'),
            'view' => Pages\ViewMataKuliah::route('/{record}'),
            'edit' => Pages\EditMataKuliah::route('/{record}/edit'),
        ];
    }
}
