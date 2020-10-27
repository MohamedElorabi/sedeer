<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MeatType;

class MeatTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_meat_type()
    {
        $meatType = factory(MeatType::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/meat_types', $meatType
        );

        $this->assertApiResponse($meatType);
    }

    /**
     * @test
     */
    public function test_read_meat_type()
    {
        $meatType = factory(MeatType::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/meat_types/'.$meatType->id
        );

        $this->assertApiResponse($meatType->toArray());
    }

    /**
     * @test
     */
    public function test_update_meat_type()
    {
        $meatType = factory(MeatType::class)->create();
        $editedMeatType = factory(MeatType::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/meat_types/'.$meatType->id,
            $editedMeatType
        );

        $this->assertApiResponse($editedMeatType);
    }

    /**
     * @test
     */
    public function test_delete_meat_type()
    {
        $meatType = factory(MeatType::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/meat_types/'.$meatType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/meat_types/'.$meatType->id
        );

        $this->response->assertStatus(404);
    }
}
