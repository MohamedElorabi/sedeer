<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Intro;

class IntroApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_intro()
    {
        $intro = factory(Intro::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/intros', $intro
        );

        $this->assertApiResponse($intro);
    }

    /**
     * @test
     */
    public function test_read_intro()
    {
        $intro = factory(Intro::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/intros/'.$intro->id
        );

        $this->assertApiResponse($intro->toArray());
    }

    /**
     * @test
     */
    public function test_update_intro()
    {
        $intro = factory(Intro::class)->create();
        $editedIntro = factory(Intro::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/intros/'.$intro->id,
            $editedIntro
        );

        $this->assertApiResponse($editedIntro);
    }

    /**
     * @test
     */
    public function test_delete_intro()
    {
        $intro = factory(Intro::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/intros/'.$intro->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/intros/'.$intro->id
        );

        $this->response->assertStatus(404);
    }
}
