<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(config('permissions') as $key => $value){
            Permission::factory()->create([
                'en_name'=>$value['en_name'],
                'ar_name'=>$value['ar_name'],
                'slug'=>$value['slug'],
            ]);
        }

        // Permission::factory()->create([
        //     'name' => 'create-user',
        //     'description' => fake()->text(),
        // ]);
        // Permission::factory()->create([
        //     'name' => 'edit-user',
        //     'description' => fake()->text(),
        // ]);
        // Permission::factory()->create([
        //     'name' => 'update-user',
        //     'description' => fake()->text(),
        // ]);
        // Permission::factory()->create([
        //     'name' => 'delete-user',
        //     'description' => fake()->text(),
        // ]);
        // Permission::factory()->create([
        //     'name' => 'create-store',
        //     'description' => fake()->text(),
        // ]);
        // Permission::factory()->create([
        //     'name' => 'edit-store',
        //     'description' => fake()->text(),
        // ]);
        // Permission::factory()->create([
        //     'name' => 'update-store',
        //     'description' => fake()->text(),
        // ]);
        // Permission::factory()->create([
        //     'name' => 'delete-store',
        //     'description' => fake()->text(),
        // ]);
        // Permission::factory()->create([
        //     'name' => 'create-product',
        //     'description' => fake()->text(),
        // ]);
        // Permission::factory()->create([
        //     'name' => 'edit-product',
        //     'description' => fake()->text(),
        // ]);
        // Permission::factory()->create([
        //     'name' => 'update-product',
        //     'description' => fake()->text(),
        // ]);
        // Permission::factory()->create([
        //     'name' => 'delete-product',
        //     'description' => fake()->text(),
        // ]);
    }
}
