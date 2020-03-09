<?php

use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages_arr = [
            'email_from' => 'test_email@',
            'recipient_id' => 1,
            'message' => 'Donec ut lobortis justo. Donec enim tortor, rhoncus nec nunc vel, tempus mattis eros. Praesent ornare augue eget neque dictum ornare.',
            'product_id' => 1
        ];
        for ($i = 0; $i < 10; $i++)
        {
            $messages_arr['email_from'] = $messages_arr['email_from'].$i.'example.pl';
            \App\Models\Messages\Message::create($messages_arr);
        }
    }
}
