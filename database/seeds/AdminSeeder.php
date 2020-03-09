<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'Kamila Więckowka',
            'email' => 'admin@world-design.pl',
            'password' => 'SoftSquad20',
            'activated' => 1,
            'role' => 'R_ADMIN',
            'accept_reg' => 1,
            'status' => 'OK'
        ]);
        \App\Models\Users\Contact::create([
            'user_id' => $user->id,
            'city' => 'Łódź',
            'address' => 'Kwiatowa 13',
            'post_code' => '00-000',
            'phone' => '123-123-123',
            'country' => 'Polska'
        ]);
    }
}
