<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubCpmkResource\Pages;
use App\Filament\Resources\SubCpmkResource\RelationManagers;
use App\Models\SubCpmk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubCpmkResource extends Resource
{
    protected static ?string $model = SubCpmk::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?string $navigationLabel = 'Cpmk';

    protected static ?string $modelLabel = 'Cpmk';

    protected static ?string $navigationGroup = 'RPS';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('rps_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('minggu_ke')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('sub_cpmk')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('materi_pembelajaran')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('metode_pembelajaran')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('assessment_indikator')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('assessment_bentuk')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('assessment_bobot')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rps_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('minggu_ke')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('assessment_bobot')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListSubCpmks::route('/'),
            'create' => Pages\CreateSubCpmk::route('/create'),
            'view' => Pages\ViewSubCpmk::route('/{record}'),
            'edit' => Pages\EditSubCpmk::route('/{record}/edit'),
        ];
    }
}
