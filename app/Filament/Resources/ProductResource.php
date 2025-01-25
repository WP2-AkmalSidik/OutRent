<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationGroup = 'Tenant';
    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('price_per_day')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('stock')
                    ->required()
                    ->numeric(),
                Forms\Components\FileUpload::make('image')
                    ->image(),
                // Pilihan shop_id berdasarkan relasi dengan model Shop
                Forms\Components\Select::make('shop_id')
                    ->relationship('shop', 'name', function ($query) {
                        $query->where('user_id', Auth::id()); // Batasi pilihan hanya untuk toko milik user yang sedang login
                    })
                    ->default(fn() => Auth::user()->shop?->id) // Isi default dengan shop_id user yang login
                    ->required()
                    ->label('Toko')
                    ->visible(fn() => !Auth::user()->hasRole('admin')), // Tampilkan untuk selain admin
                Forms\Components\Select::make('shop_id')
                    ->relationship('shop', 'name') // Dropdown toko untuk admin
                    ->visible(fn() => Auth::user()->hasRole('admin')) // Tampilkan hanya untuk admin
                    ->label('Toko'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            // Filter data berdasarkan user yang sedang login
            ->modifyQueryUsing(function (Builder $query) {
                $user = Auth::user();

                // Jika user bukan admin, tampilkan hanya produk dari shop miliknya
                if (!$user->hasRole('admin')) {
                    $query->whereHas('shop', function ($query) use ($user) {
                        $query->where('user_id', $user->id);
                    });
                }
            })
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price_per_day')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('shop.name')
                    ->label('Nama Toko')
                    ->visible(fn() => Auth::user()->hasRole('admin')),
                Tables\Columns\ImageColumn::make('image'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
