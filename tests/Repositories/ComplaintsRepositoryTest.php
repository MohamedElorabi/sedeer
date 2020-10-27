<?php namespace Tests\Repositories;

use App\Models\Complaints;
use App\Repositories\ComplaintsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ComplaintsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ComplaintsRepository
     */
    protected $complaintsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->complaintsRepo = \App::make(ComplaintsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_complaints()
    {
        $complaints = factory(Complaints::class)->make()->toArray();

        $createdComplaints = $this->complaintsRepo->create($complaints);

        $createdComplaints = $createdComplaints->toArray();
        $this->assertArrayHasKey('id', $createdComplaints);
        $this->assertNotNull($createdComplaints['id'], 'Created Complaints must have id specified');
        $this->assertNotNull(Complaints::find($createdComplaints['id']), 'Complaints with given id must be in DB');
        $this->assertModelData($complaints, $createdComplaints);
    }

    /**
     * @test read
     */
    public function test_read_complaints()
    {
        $complaints = factory(Complaints::class)->create();

        $dbComplaints = $this->complaintsRepo->find($complaints->id);

        $dbComplaints = $dbComplaints->toArray();
        $this->assertModelData($complaints->toArray(), $dbComplaints);
    }

    /**
     * @test update
     */
    public function test_update_complaints()
    {
        $complaints = factory(Complaints::class)->create();
        $fakeComplaints = factory(Complaints::class)->make()->toArray();

        $updatedComplaints = $this->complaintsRepo->update($fakeComplaints, $complaints->id);

        $this->assertModelData($fakeComplaints, $updatedComplaints->toArray());
        $dbComplaints = $this->complaintsRepo->find($complaints->id);
        $this->assertModelData($fakeComplaints, $dbComplaints->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_complaints()
    {
        $complaints = factory(Complaints::class)->create();

        $resp = $this->complaintsRepo->delete($complaints->id);

        $this->assertTrue($resp);
        $this->assertNull(Complaints::find($complaints->id), 'Complaints should not exist in DB');
    }
}
