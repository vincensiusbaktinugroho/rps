<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RpsResource\Pages;
use App\Filament\Resources\RpsResource\RelationManagers;
use App\Models\Rps;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RpsResource extends Resource
{
    protected static ?string $model = Rps::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Rps';

    protected static ?string $modelLabel = 'Rps';

    protected static ?string $navigationGroup = 'RPS';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\Section::make('Awalan')
                ->description('Nav Konten lah.')
                ->schema([
            // Forms\Components\Select::make('mata_kuliah_id')
            //     ->label('Nama Mata Kuliah')
            //     ->relationship(name: 'Matakuliah', titleAttribute: 'nama')
            //     ->searchable()
            //     ->preload()
            //     ->required(),

            Forms\Components\TextInput::make('nama_mk')
            ->label('Nama Matakuliah')
            ->nullable()
            ->maxLength(255),

            Forms\Components\TextInput::make('kode')
                ->label('Kode RPS')
                ->required()
                ->maxLength(50),

            Forms\Components\TextInput::make('rumpun_mk')
                ->label('Rumpun MK')
                ->nullable()
                ->maxLength(255),

            Forms\Components\TextInput::make('bobot_sks')
                ->label('Bobot SKS')
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('semester')
                ->label('Semester')
                ->required()
                ->maxLength(50),

            Forms\Components\DatePicker::make('tanggal_penyusunan')
                ->label('Tanggal Penyusunan')
                ->nullable(),

                ])->columns(6),
                
            Forms\Components\Section::make('Otorisasi')
                ->schema([
            Forms\Components\TextInput::make('pengembang_rps')
                ->label('Pengembang RPS')
                ->nullable()
                ->maxLength(255),

            Forms\Components\TextInput::make('koordinator_rmk')
                ->label('Koordinator RMK')
                ->nullable()
                ->maxLength(255),

            Forms\Components\TextInput::make('ketua_prodi')
                ->label('Ketua Prodi')
                ->nullable()
                ->maxLength(255),

                ])->columns(3),

            Forms\Components\Section::make('Capaian Pembelajaran')
                ->description('Isikan Capaian Pembelajaran')
                ->schema([
            Forms\Components\RichEditor::make('cpl_prodi_id')
                ->label('CPL Prodi')
                ->nullable(),

            Forms\Components\RichEditor::make('cp_matakuliah')
                ->label('CP Mata Kuliah')
                ->nullable(),

                ])->columns(2),

            Forms\Components\Section::make('Deskripsi Singkat MK')
                ->description('Isi tentang deskripsi singkat MK')
                ->schema([    

            Forms\Components\RichEditor::make('deskripsi_mk')
                ->label('Deskripsi MK')
                ->nullable(),

                ]),

            Forms\Components\Section::make('Pustaka')
                ->description('Tentang Pustaka Yang digunakan.')
                ->schema([

            Forms\Components\RichEditor::make('pustaka_utama')
                ->label('Pustaka Utama')
                ->nullable(),

            Forms\Components\RichEditor::make('pustaka_pendukung')
                ->label('Pustaka Pendukung')
                ->nullable(),

                ]),

            Forms\Components\Section::make('Media Pembelajaran')
                ->description('Tuliskan perangkat yang digunakan mahasiswa untuk belajar.')
                ->schema([

            Forms\Components\RichEditor::make('media_perangkat_lunak')
                ->label('Media Perangkat Lunak')
                ->nullable(),

            Forms\Components\RichEditor::make('media_perangkat_keras')
                ->label('Media Perangkat Keras')
                ->nullable(),

                ])->columns(2),

            Forms\Components\Section::make('Team Teaching')
                ->description('Tuliskan nama dosen atau tim dosen pengampu mata kuliah.')
                ->schema([
            Forms\Components\TextInput::make('team_teaching')
                ->label('Team Teaching')
                ->nullable()
                ->maxLength(255),

                ]),

            Forms\Components\Section::make('Matakuliah Syarat')
                ->description('Tuliskan mata kuliah prasyarat, jika ada.')
                ->schema([
            Forms\Components\TextInput::make('matakuliah_syarat')
                ->label('Mata Kuliah Syarat')
                ->nullable(false)
                ->maxLength(255),
                ]),

//edit baru untuk menambahkan subcpmk agar tidak dipisah
                Forms\Components\Section::make('Sub_CPMK')
                ->description('Tentang Pustaka Yang digunakan.')
                ->schema([

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
                ]),
//end dari subcpmk yg baru ditambahkan
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_mk')
                ->searchable(),
                Tables\Columns\TextColumn::make('kode')
                ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_penyusunan')
                ->dateTime()
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

                // Action::make('Download Pdf')
                // ->icon ('heroicon-o-document-download')
                // ->link(fn (Rps $record) => route ('rps.pdf.download', $record))
                // ->openUrlInNewTab(),
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
            'index' => Pages\ListRps::route('/'),
            'create' => Pages\CreateRps::route('/create'),
            'view' => Pages\ViewRps::route('/{record}'),
            'edit' => Pages\EditRps::route('/{record}/edit'),
        ];
    }
}
