<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersetujuanrpsResource\Pages;
use App\Filament\Resources\PersetujuanrpsResource\RelationManagers;
use App\Models\Persetujuanrps;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersetujuanrpsResource extends Resource
{
    protected static ?string $model = Persetujuanrps::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Status RPS';

    protected static ?string $modelLabel = 'Status Rps';

    protected static ?string $navigationGroup = 'RPS';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            Forms\Components\TextInput::make('nama_rps')
                ->label('Nama RPS')
                ->nullable()
                ->maxLength(50),

            Forms\Components\Select::make('status')
                ->label('Status Persetujuan')
                ->options([
                    'draft' => 'Draft',
                    'submitted' => 'Submitted',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                ])
                ->required()
                ->reactive(),

            Forms\Components\Textarea::make('alasan_ditolak')
                ->label('Alasan Ditolak')
                ->nullable()
                ->visible(fn (callable $get) => $get('status') === 'rejected'),

            Forms\Components\TextInput::make('reviewer')
                ->label('Reviewer')
                ->nullable()
                ->maxLength(50),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_rps')
                ->searchable(),
                Tables\Columns\TextColumn::make('status')
                ->searchable(),
                Tables\Columns\TextColumn::make('alasan_ditolak')
                ->searchable(),
                Tables\Columns\TextColumn::make('reviewer')
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListPersetujuanrps::route('/'),
            'create' => Pages\CreatePersetujuanrps::route('/create'),
            'edit' => Pages\EditPersetujuanrps::route('/{record}/edit'),
        ];
    }
}
