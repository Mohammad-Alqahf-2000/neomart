<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Store;

class StoreOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::all();
        $stores = Store::all();

        foreach ($stores as $store) {
            $store->orders()->attach(
                $orders->random(1, $orders->count())->pluck('id')->toArray()
            );
        }
    }
}
