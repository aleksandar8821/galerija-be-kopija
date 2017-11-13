<?php

use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class, 5)->create()->each(function ($u) {
        // $u->galleries()->save(factory(App\Gallery::class)->make());});

        //ovako svaki user ima vise galerija, a ne jednu
        \App\User::all()
       ->each(function (App\User $user) {
                $user->galleries()->saveMany(factory(App\Gallery::class, 5)
                    ->make()
            );
        });
    }
}
