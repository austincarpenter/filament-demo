<?php

namespace Tests\Feature\Resources\Shop;

use App\Filament\Resources\Shop\OrderResource\Pages\ListOrders;
use Livewire\Livewire;
use Tests\TestCase;

class OrderResourceTest extends TestCase
{
    public function test_list_orders_created_at_filter()
    {
        $date = now()->subDays(7)->format('Y-m-d');

        Livewire::test(ListOrders::class)
            ->filterTable('created_at', [
                'created_from' => $date,
            ])
            ->assertSet('tableFilters.created_at', [
                'created_from' => $date,
            ]);
    }
}
