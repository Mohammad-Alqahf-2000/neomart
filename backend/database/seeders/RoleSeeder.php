<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['Admin', 'مدير' , 'admin'],
            ['Client', 'زبون' , 'client'],
            ['Seller', 'بائع' , 'seller'],
            ['Assistant', 'مساعد' , 'assistant']
        ];

        foreach ($roles as $role) {
            Role::factory()->create([
                'en_name' => $role[0],
                'ar_name' => $role[1],
                'slug' => $role[2],
            ]);
        }
    }
}
