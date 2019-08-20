<?php

use Illuminate\Database\Seeder;
use App\user;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AtividadesTableSeeder::class);
        User::create([
            'name' => 'William',
            'email' => 'william@gmail.com',
            'password' => bcrypt('1#@799wmt'), // password
            'api_token' => '79MSdwvQRI5tMrhdyvE8zAgyHZl9wGWpESRtFGbNYjo3uns7PLysW1fbxpLT',
        ]);
    }
}
