<?php namespace Tests\Repositories;

use App\Models\Butchers;
use App\Repositories\ButchersRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ButchersRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ButchersRepository
     */
    protected $butchersRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->butchersRepo = \App::make(ButchersRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_butchers()
    {
        $butchers = factory(Butchers::class)->make()->toArray();

        $createdButchers = $this->butchersRepo->create($butchers);

        $createdButchers = $createdButchers->toArray();
        $this->assertArrayHasKey('id', $createdButchers);
        $this->assertNotNull($createdButchers['id'], 'Created Butchers must have id specified');
        $this->assertNotNull(Butchers::find($createdButchers['id']), 'Butchers with given id must be in DB');
        $this->assertModelData($butchers, $createdButchers);
    }

    /**
     * @test read
     */
    public function test_read_butchers()
    {
        $butchers = factory(Butchers::class)->create();

        $dbButchers = $this->butchersRepo->find($butchers->id);

        $dbButchers = $dbButchers->toArray();
        $this->assertModelData($butchers->toArray(), $dbButchers);
    }

    /**
     * @test update
     */
    public function test_update_butchers()
    {
        $butchers = factory(Butchers::class)->create();
        $fakeButchers = factory(Butchers::class)->make()->toArray();

        $updatedButchers = $this->butchersRepo->update($fakeButchers, $butchers->id);

        $this->assertModelData($fakeButchers, $updatedButchers->toArray());
        $dbButchers = $this->butchersRepo->find($butchers->id);
        $this->assertModelData($fakeButchers, $dbButchers->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_butchers()
    {
        $butchers = factory(Butchers::class)->create();

        $resp = $this->butchersRepo->delete($butchers->id);

        $this->assertTrue($resp);
        $this->assertNull(Butchers::find($butchers->id), 'Butchers should not exist in DB');
    }
}
