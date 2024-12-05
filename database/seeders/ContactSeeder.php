<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([ 
            'message' => 'message_user' 
        ]); 
 
        Contact::create([ 
            'message' => 'message_user' 
        ]);
    
        Contact::factory(20)->create();
    }
}
