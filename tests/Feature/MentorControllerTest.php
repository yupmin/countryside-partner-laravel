<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MentorControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {

        $faker = Factory::create();

        $response = $this->post('/api/v1/join/mentor', [


        ]);

        $response->assertStatus(200);

//        $this->assertDatabaseHas('cp_mentors', [
//            'mentor_srl' => $mentor_srl ,
//            'id' => $id ,
//        ]);
    }
}
