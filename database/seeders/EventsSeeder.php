<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $events = [
            [
                'user_id' => 1, // Ensure this user exists
                'type_id' => 1, // Ensure this type exists
                'city_id' => 1, // Ensure this city exists
                'title' => 'Rock Concert',
                'ticket_price' => '50.00',
                'ticket_url' => 'http://example.com/tickets/1',
                'from' => '2024-06-01 18:00:00',
                'to' => '2024-06-01 21:00:00',
                'image_url' => 'http://example.com/images/concert.jpg',
                'comment' => 'This is going to be an amazing rock concert!',
                'contact' => 'contact@example.com',
                'location' => 'Madison Square Garden',
            ],
            [
                'user_id' => 2, // Ensure this user exists
                'type_id' => 2, // Ensure this type exists
                'city_id' => 2, // Ensure this city exists
                'title' => 'Tech Conference',
                'ticket_price' => '200.00',
                'ticket_url' => 'http://example.com/tickets/2',
                'from' => '2024-07-15 09:00:00',
                'to' => '2024-07-15 17:00:00',
                'image_url' => 'http://example.com/images/conference.jpg',
                'comment' => 'Join us for a day of tech talks and networking.',
                'contact' => 'contact@techconf.com',
                'location' => 'Los Angeles Convention Center',
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
