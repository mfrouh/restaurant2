<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class,15)->create();
        factory(App\User::class)->create(['role'=>'admin']);
        factory(App\User::class,50)->create(['role'=>'manager'])
        ->each(function ($u) {
            $u->restaurant()->save(factory(App\Restaurant::class)->create()
            );
        });
        factory(App\Product::class,300)->create();
     
        
    }
}
