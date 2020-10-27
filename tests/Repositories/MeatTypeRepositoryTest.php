<?php namespace Tests\Repositories;

use App\Models\MeatType;
use App\Repositories\MeatTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MeatTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MeatTypeRepository
     */
    protected $meatTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->meatTypeRepo = \App::make(MeatTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_meat_type()
    {
        $meatType = factory(MeatType::class)->make()->toArray();

        $createdMeatType = $this->meatTypeRepo->create($meatType);

        $createdMeatType = $createdMeatType->toArray();
        $this->assertArrayHasKey('id', $createdMeatType);
        $this->assertNotNull($createdMeatType['id'], 'Created MeatType must have id specified');
        $this->assertNotNull(MeatType::find($createdMeatType['id']), 'MeatType with given id must be in DB');
        $this->assertModelData($meatType, $createdMeatType);
    }

    /**
     * @test read
     */
    public function test_read_meat_type()
    {
        $meatType = factory(MeatType::class)->create();

        $dbMeatType = $this->meatTypeRepo->find($meatType->id);

        $dbMeatType = $dbMeatType->toArray();
        $this->assertModelData($meatType->toArray(), $dbMeatType);
    }

    /**
     * @test update
     */
    public function test_update_meat_type()
    {
        $meatType = factory(MeatType::class)->create();
        $fakeMeatType = factory(MeatType::class)->make()->toArray();

        $updatedMeatType = $this->meatTypeRepo->update($fakeMeatType, $meatType->id);

        $this->assertModelData($fakeMeatType, $updatedMeatType->toArray());
        $dbMeatType = $this->meatTypeRepo->find($meatType->id);
        $this->assertModelData($fakeMeatType, $dbMeatType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_meat_type()
    {
        $meatType = factory(MeatType::class)->create();

        $resp = $this->meatTypeRepo->delete($meatType->id);

        $this->assertTrue($resp);
        $this->assertNull(MeatType::find($meatType->id), 'MeatType should not exist in DB');
    }
}
