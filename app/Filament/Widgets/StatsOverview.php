<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Product;
use App\Models\Category;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Card::make('Total Products', Product::count())
                ->description(description: "Total number of products")
                ->color('success'),
            Card::make('Total Categories', Category::count())
                ->description(description: "Total number of categories")
                ->color('success'),

            // display low stock products
            Card::make('Low Stock Products', Product::where('stock', '<=', 30)->count())
                ->description('Products with stock <= 30')
                ->color('danger')
        ];
    }
}
