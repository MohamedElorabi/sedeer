<?php namespace Tests\Repositories;

use App\Models\Intro;
use App\Repositories\IntroRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class IntroRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var IntroRepository
     */
    protected $introRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->introRepo = \App::make(IntroRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_intro()
    {
        $intro = factory(Intro::class)->make()->toArray();

        $createdIntro = $this->introRepo->create($intro);

        $createdIntro = $createdIntro->toArray();
        $this->assertArrayHasKey('id', $createdIntro);
        $this->assertNotNull($createdIntro['id'], 'Created Intro must have id specified');
        $this->assertNotNull(Intro::find($createdIntro['id']), 'Intro with given id must be in DB');
        $this->assertModelData($intro, $createdIntro);
    }

    /**
     * @test read
     */
    public function test_read_intro()
    {
        $intro = factory(Intro::class)->create();

        $dbIntro = $this->introRepo->find($intro->id);

        $dbIntro = $dbIntro->toArray();
        $this->assertModelData($intro->toArray(), $dbIntro);
    }

    /**
     * @test update
     */
    public function test_update_intro()
    {
        $intro = factory(Intro::class)->create();
        $fakeIntro = factory(Intro::class)->make()->toArray();

        $updatedIntro = $this->introRepo->update($fakeIntro, $intro->id);

        $this->assertModelData($fakeIntro, $updatedIntro->toArray());
        $dbIntro = $this->introRepo->find($intro->id);
        $this->assertModelData($fakeIntro, $dbIntro->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_intro()
    {
        $intro = factory(Intro::class)->create();

        $resp = $this->introRepo->delete($intro->id);

        $this->assertTrue($resp);
        $this->assertNull(Intro::find($intro->id), 'Intro should not exist in DB');
    }
}
