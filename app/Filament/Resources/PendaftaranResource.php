<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendaftaranResource\Pages;
use App\Models\Pendaftaran;
use App\Models\Feature;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class PendaftaranResource extends Resource
{
    protected static ?string $model = Pendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'restore',
            'restore_any',
            'replicate',
            'reorder',
            'delete',
            'delete_any',
            'force_delete',
            'force_delete_any',
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('features_id')
                    ->label('Feature')
                    ->options(Feature::pluck('name', 'id'))
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nowa')
                    ->label('Nomor WhatsApp')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('feature.name')
                    ->label('Feature')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nowa')
                    ->label('Nomor WhatsApp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
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
                Tables\Filters\SelectFilter::make('features_id')
                    ->label('Feature')
                    ->options(Feature::pluck('name', 'id')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('send_whatsapp')
                    ->label('Kirim WhatsApp')
                    ->icon('heroicon-o-chat-bubble-left')
                    ->color('success')
                    ->form([
                        Forms\Components\Textarea::make('pesan')
                            ->label('Pesan WhatsApp')
                            ->required()
                            ->helperText('Gunakan {nama} untuk menyisipkan nama pendaftar dalam pesan.'),
                    ])
                    ->action(function (Pendaftaran $record, array $data) {
                        try {
                            // Format nomor WhatsApp (pastikan format 62xxx)
                            $nomor = $record->nowa;
                            if (substr($nomor, 0, 1) === '0') {
                                $nomor = '62' . substr($nomor, 1);
                            } elseif (substr($nomor, 0, 1) === '+') {
                                $nomor = substr($nomor, 1); // Hapus tanda +
                            }
                            
                            // Personalisasi pesan dengan nama pendaftar
                            $pesan = str_replace('{nama}', $record->nama, $data['pesan']);
                            
                            // Buat URL wa.me
                            $waUrl = 'https://wa.me/' . $nomor . '?text=' . urlencode($pesan);
                            
                            // Tampilkan notifikasi sukses dengan tautan
                            Notification::make()
                                ->title('Siap Mengirim WhatsApp')
                                ->body('Klik tautan untuk membuka WhatsApp dan kirim pesan ke ' . $record->nama)
                                ->actions([
                                    \Filament\Notifications\Actions\Action::make('open')
                                        ->label('Buka WhatsApp')
                                        ->url($waUrl)
                                        ->openUrlInNewTab(),
                                ])
                                ->success()
                                ->persistent()
                                ->send();
                                
                            return $waUrl;
                        } catch (\Exception $e) {
                            Notification::make()
                                ->title('Gagal mempersiapkan WhatsApp')
                                ->body($e->getMessage())
                                ->danger()
                                ->send();
                        }
                    })
                    ->openUrlInNewTab(),
                
                Tables\Actions\Action::make('send_email')
                    ->label('Kirim Email')
                    ->icon('heroicon-o-envelope')
                    ->color('primary')
                    ->form([
                        Forms\Components\TextInput::make('subject')
                            ->label('Subject')
                            ->required(),
                        Forms\Components\Textarea::make('content')
                            ->label('Isi Email')
                            ->required(),
                    ])
                    ->action(function (Pendaftaran $record, array $data) {
                        // Implementasi untuk mengirim email
                        try {
                            // Ini hanya contoh, sesuaikan dengan konfigurasi email Anda
                            Mail::raw($data['content'], function ($message) use ($record, $data) {
                                $message->to($record->email)
                                    ->subject($data['subject']);
                            });
                            
                            Notification::make()
                                ->title('Email berhasil dikirim ke ' . $record->nama)
                                ->success()
                                ->send();
                        } catch (\Exception $e) {
                            Notification::make()
                                ->title('Gagal mengirim email')
                                ->body($e->getMessage())
                                ->danger()
                                ->send();
                        }
                    }),
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
            'index' => Pages\ListPendaftarans::route('/'),
            'create' => Pages\CreatePendaftaran::route('/create'),
            'edit' => Pages\EditPendaftaran::route('/{record}/edit'),
        ];
    }
}