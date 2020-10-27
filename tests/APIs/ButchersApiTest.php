<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Butchers;

class ButchersApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_butchers()
    {
        $butchers = factory(Butchers::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/butchers', $butchers
        );

        $this->assertApiResponse($butchers);
    }

    /**
     * @test
     */
    public function test_read_butchers()
    {
        $butchers = factory(Butchers::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/butchers/'.$butchers->id
        );

        $this->assertApiResponse($butchers->toArray());
    }

    /**
     * @test
     */
    public function test_update_butchers()
    {
        $butchers = factory(Butchers::class)->create();
        $editedButchers = factory(Butchers::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/butchers/'.$butchers->id,
            $editedButchers
        );

        $this->assertApiResponse($editedButchers);
    }

    /**
     * @test
     */
    public function test_delete_butchers()
    {
        $butchers = factory(Butchers::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/butchers/'.$butchers->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/butchers/'.$butchers->id
        );

        $this->response->assertStatus(404);
    }
}
