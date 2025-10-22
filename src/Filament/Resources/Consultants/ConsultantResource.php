<?php

namespace TresPontosTech\Consultant\Filament\Resources\Consultants;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use TresPontosTech\Consultant\Core\Models\Consultant;
use TresPontosTech\Consultant\Filament\Resources\Consultants\Pages\CreateConsultant;
use TresPontosTech\Consultant\Filament\Resources\Consultants\Pages\EditConsultant;
use TresPontosTech\Consultant\Filament\Resources\Consultants\Pages\ListConsultants;
use TresPontosTech\Consultant\Filament\Resources\Consultants\Schemas\ConsultantForm;
use TresPontosTech\Consultant\Filament\Resources\Consultants\Tables\ConsultantsTable;
use UnitEnum;

class ConsultantResource extends Resource
{
    protected static ?string $model = Consultant::class;
    protected static string | UnitEnum | null $navigationGroup = 'Consultants';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    public static function form(Schema $schema): Schema
    {
        return ConsultantForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConsultantsTable::configure($table);
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
            'index' => ListConsultants::route('/'),
            'create' => CreateConsultant::route('/create'),
            'edit' => EditConsultant::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
