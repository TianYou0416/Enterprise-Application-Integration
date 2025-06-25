<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
        [
            'title' => 'Music Run 2025',
            'category' =>'Sport',
            'description' => 'A high-energy event combining live music and running, where participants groove to exciting beats along the running track.',
            'date' => '2025-05-17',
            'location' => 'National Stadium Kuala Lumpur',
            'ticket_type' => 'Standard',
            'ticket_price' => 100.00,
            'image' => 'Event1.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Babymonster World Tour 2025',
            'category' =>'Entertainment',
            'description' => 'A global concert tour featuring the sensational K-pop group BABYMONSTER, bringing their electrifying performances to fans worldwide.',
            'date' => '2025-06-21',
            'location' => 'Axiata Arena Kuala Lumpur',
            'ticket_type' => 'Standard',
            'ticket_price' => 388.00,
            'image' => 'Event2.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'SQL E-Invoice Mandatory Implementation Course',
            'category' =>'Seminar',
            'description' => 'A specialized training session to equip professionals with essential knowledge on implementing SQL-based e-invoicing systems.',
            'date' => '2025-07-23',
            'location' => 'SQL Training Centre, PV128',
            'ticket_type' => 'Standard',
            'ticket_price' => 99.00,
            'image' => 'Event3.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'ATM RAMPAS KUALA LUMPUR',
            'category' =>'Entertainment',
            'description' => 'An adrenaline-filled event showcasing daring stunts and martial arts performances, hosted in the heart of Kuala Lumpur.',
            'date' => '2025-06-28',
            'location' => 'Mega Star Arena Kuala Lumpur',
            'ticket_type' => 'Standard',
            'ticket_price' => 189.00,
            'image' => 'Event4.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => '6th International Technology - Enhanced Language Learning Symposium',
            'category' =>'Seminar',
            'description' => 'A prestigious academic gathering focused on innovative research and practices in integrating technology into language learning.',
            'date' => '2025-07-17',
            'location' => 'Online Event',
            'ticket_type' => 'Standard',
            'ticket_price' => 88.00,
            'image' => 'Event5.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Perodua Malaysia Master 2025',
            'category' =>'Sport',
            'description' => 'An elite badminton championship featuring top international players, held as part of the BWF World Tour in Malaysia.',
            'date' => '2025-05-20',
            'location' => 'Axiata Arena Kuala Lumpur',
            'ticket_type' => 'Standard',
            'ticket_price' => 126.00,
            'image' => 'Event6.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        ]);
    }
}
