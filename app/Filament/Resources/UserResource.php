<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use App\Filament\Exports\UserExporter;
use App\Filament\Imports\UserImporter;
use Filament\Forms\Components\Section;
use Filament\Support\Enums\FontWeight;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Hash;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Tables\Actions\ExportBulkAction;
use App\Filament\Resources\UserResource\Pages;
use Carbon\Carbon;
use STS\FilamentImpersonate\Tables\Actions\Impersonate;
use Filament\Infolists\Components\Section as InfolistSection;
use Filament\Notifications\Collection;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('User Information')
                ->schema([
                    FileUpload::make('avatar_url')
                        ->label('Profile Photo')
                        ->image()
                        ->avatar()
                        ->disk('public')
                        ->directory('avatars')
                        ->imageEditor()
                        ->columnSpanFull(),
                    TextInput::make('name')
                        ->required(),
                    TextInput::make('email')
                        ->email()
                        ->required()
                        ->unique(ignoreRecord: true),
                    TextInput::make('password')
                        ->password()
                        ->dehydrateStateUsing(fn($state) => Hash::make($state))
                        ->dehydrated(fn($state) => filled($state))
                        ->required(fn(string $operation): bool => $operation === 'create'),
                    TextInput::make('email_verified_at')
                        ->label('Email Verification Date')
                        ->default(now()->format('Y-m-d H:i:s'))
                        ->disabled()
                        ->dehydrated(true)
                        ->hidden(fn(string $operation): bool => $operation !== 'create'),
                    Select::make('roles')
                        ->label('Role')
                        ->relationship('roles', 'name')
                        ->multiple()
                        ->preload()
                        ->searchable()
                        ->required(),
                ]),
            ]);
    }

    public static function canCreate(): bool
    {
        return true;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\Layout\Split::make([
                    Tables\Columns\ImageColumn::make('avatar_url')
                        ->searchable()
                        ->circular()
                        ->grow(false)
                        ->getStateUsing(fn($record) => $record->avatar_url
                            ? $record->avatar_url
                            : "https://ui-avatars.com/api/?name=" . urlencode($record->name)),
                    Tables\Columns\TextColumn::make('name')
                        ->searchable()
                        ->weight(FontWeight::Bold),
                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('roles.name')
                            ->searchable()
                            ->icon('heroicon-o-shield-check')
                            ->grow(false)
                            ->badge()
                            ->color('primary'),
                        Tables\Columns\TextColumn::make('email')
                            ->icon('heroicon-m-envelope')
                            ->searchable()
                            ->grow(false),
                        Tables\Columns\TextColumn::make('email_verified_at')
                            ->label('Verified At')
                            ->dateTime('M d, Y')
                            ->icon('heroicon-o-check-circle')
                            ->color('success')
                            ->grow(false),
                    ])->alignStart()->visibleFrom('lg')->space(1)
                ]),
            ])
            ->filters([
                SelectFilter::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload(),
                Tables\Filters\Filter::make('verified')
                    ->label('Email Verified')
                    ->query(fn ($query) => $query->whereNotNull('email_verified_at')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Action::make('Set Role')
                    ->icon('heroicon-m-adjustments-vertical')
                    ->form([
                        Select::make('roles')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->required()
                            ->searchable()
                            ->preload()
                            ->optionsLimit(10)
                            ->getOptionLabelFromRecordUsing(fn($record) => $record->name),
                    ])
                    ->action(function (User $record, array $data): void {
                        $record->syncRoles($data['roles']);
                    }),
                Action::make('verify_email')
                    ->label('Verify Email')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->hidden(fn (User $record) => $record->hasVerifiedEmail())
                    ->action(function (User $record): void {
                        $record->markEmailAsVerified();
                    }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(UserExporter::class),
                ImportAction::make()
                    ->importer(UserImporter::class)
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('verifyEmails')
                        ->label('Verify Emails')
                        ->icon('heroicon-o-check-circle')
                        ->action(fn (Collection  $records) => $records->each(function ($record) {
                            $record->markEmailAsVerified();
                        })),
                ]),
                ExportBulkAction::make()
                    ->exporter(UserExporter::class)
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
    
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfolistSection::make('User Information')->schema([
                    ImageEntry::make('avatar_url')
                        ->label('Profile Photo')
                        ->circular()
                        ->defaultImageUrl(fn($record) => 
                            "https://ui-avatars.com/api/?name=" . urlencode($record->name))
                        ->columnSpanFull(),
                    TextEntry::make('name'),
                    TextEntry::make('email'),
                    TextEntry::make('roles.name')
                        ->label('Roles')
                        ->badge()
                        ->color('primary'),
                    TextEntry::make('email_verified_at')
                        ->label('Email Verified At')
                        ->date('F j, Y, g:i a'),
                ]),
            ]);
    }
}