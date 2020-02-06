<?php
declare(strict_types=1);
namespace Tests\Unit\App\Http\Controllers\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\{RefreshDatabase, DatabaseTransactions};
use App\Entities\User;

/**
 *
 */
final class UserControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     *
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create([
            'age' => 18,
        ]);
    }

    /**
     * @test
     */
    public function show_should_work()
    {
        $userId = $this->user->id;
        $url = "/api/users/{$userId}";

        $response = $this->getAuthedRequest()->json('GET', $url);
        $response->assertStatus(200);
    }

    // ------------------------------------------------------------
    //  private
    // ------------------------------------------------------------

    private function getAuthedRequest()
    {
        return $this
            ->withHeaders([
                'Authorization' => "",
            ]);
    }

}
