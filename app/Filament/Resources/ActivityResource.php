<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityResource\Pages;
use App\Models\Activity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationLabel = 'Activities';
    protected static ?string $navigationGroup = 'Content Management';


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
                Forms\Components\Section::make('Activity Details')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                        
                    Forms\Components\DateTimePicker::make('activity_date')
                        ->required()
                        ->label('Activity Date & Time'),
                    
                    Forms\Components\Select::make('category')
                        ->options([
                            'workshop' => 'Workshop',
                            'seminar' => 'Seminar',
                            'competition' => 'Competition',
                            'training' => 'Training',
                            'exhibition' => 'Exhibition',
                            'other' => 'Other',
                        ])
                        ->required()
                        ->native(false),
                        
                    Forms\Components\Hidden::make('created_by')
                        ->default(fn () => auth()->id()),
                        
                    Forms\Components\FileUpload::make('image')
                        ->image()
                        ->directory('activities')
                        ->label('Activity Image')
                        ->columnSpanFull(),

                    Forms\Components\RichEditor::make('description')
                        ->required()
                        ->columnSpanFull(),
                ]),
          
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                    
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->circular(),
                    
                Tables\Columns\TextColumn::make('activity_date')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListActivities::route('/'),
            'create' => Pages\CreateActivity::route('/create'),
            'edit' => Pages\EditActivity::route('/{record}/edit'),
        ];
    }
}