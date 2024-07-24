<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'first_name' => 'Adam',
            'surname' => 'Luckman',
            'email' => 'adamluckman@yahoo.co.uk',
            'password' => 'Fergus123', //Fergus123
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'is_admin' => 1,
            'phone_number' => '07821456437',
            'mobile_number' => '07821456437',
            'dob' => '1989-01-14',
        ]);

        \App\Models\User::create([
            'first_name' => 'Mike',
            'surname' => 'Lawson',
            'email' => 'mcloud_immortal@hotmail.com',
            'password' => 'G3raltwitcher', //password
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'is_admin' => 1,
            'phone_number' => '07821456437',
            'mobile_number' => '07821456437',
            'dob' => '1985-07-26',
        ]);

        \App\Models\User::create([
            'first_name' => 'Wayne',
            'surname' => 'Lawson',
            'email' => 'waynelawson10@gmail.com',
            'password' => 'Ellalou16', //password
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'is_admin' => 1,
            'phone_number' => '07821456437',
            'mobile_number' => '07821456437',
            'dob' => '1991-08-12',
        ]);

        \App\Models\User::create([
            'first_name' => 'Some',
            'surname' => 'User',
            'email' => 'test3@test.co.uk',
            'password' => 'password', //password
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'is_admin' => 0,
            'phone_number' => '07821456437',
            'mobile_number' => '07821456437',
            'dob' => '1989-01-14',
        ]);

        $this->call([
            CategorySeeder::class,
           // ProductSeeder::class,
            SlideSeeder::class,
            BlogPostSeeder::class,
        ]);
    }
}
