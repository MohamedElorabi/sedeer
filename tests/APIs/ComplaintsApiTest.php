<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Complaints;

class ComplaintsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_complaints()
    {
        $complaints = factory(Complaints::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/complaints', $complaints
        );

        $this->assertApiResponse($complaints);
    }

    /**
     * @test
     */
    public function test_read_complaints()
    {
        $complaints = factory(Complaints::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/complaints/'.$complaints->id
        );

        $this->assertApiResponse($complaints->toArray());
    }

    /**
     * @test
     */
    public function test_update_complaints()
    {
        $complaints = factory(Complaints::class)->create();
        $editedComplaints = factory(Complaints::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/complaints/'.$complaints->id,
            $editedComplaints
        );

        $this->assertApiResponse($editedComplaints);
    }

    /**
     * @test
     */
    public function test_delete_complaints()
    {
        $complaints = factory(Complaints::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/complaints/'.$complaints->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/complaints/'.$complaints->id
        );

        $this->response->assertStatus(404);
    }
}
