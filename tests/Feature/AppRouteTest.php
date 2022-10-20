<?php

namespace Tests\Feature;

use App\Models\Projet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AppRouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     /** @test*/
    public function homePageTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test*/
    public function aboutUsPageTest()
    {
        $response = $this->get('/a-propos');
        $response->assertStatus(200);
    }

    /** @test */
    public function ourProjectPageTest()
    {
        $response = $this->get("/nos-projets");
        $response->assertStatus(200);
    }

    /** @test */
    public function projectDetailTest()
    {
        $id = Projet::first()->id;
        $response = $this->get("/projects/$id");
        $response->assertStatus(200);
    }

    /** @test */
    public function commentPostTest()
    {
        $comment = [
            'name'=>"kevin KONE",
            "comment" => "Test driven"
        ];

        $response = $this->json("POST","/projects",$comment);
        $response->assertStatus(201)->assertJson(compact("data"));

        $this->assertDatabaseHas('comment',[
            'name'=>$comment['name'],
            'comment'=>$comment['comment']
        ]);
    }
}
