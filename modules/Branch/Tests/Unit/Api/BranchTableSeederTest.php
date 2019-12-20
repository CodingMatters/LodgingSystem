<?php

declare(strict_types=1);

namespace CodingMatters\Branch\Tests\Unit\Api;

use CodingMatters\Branch\Database\Seeders\BranchTableSeeder;
use CodingMatters\User\Entities\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

final class BranchTableSeederTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function showResultsBeingAddedAfterSeeding() : void
    {
        $this->runBranchTableSeeder();

        $user = factory(User::class)->create();

        $response = $this->post(route('api.branches.all'), ['api_token' => $user->token()]);
        $response->assertStatus(200);
        $response->assertExactJson([
            "success" => true,
            "data" => [
                "branches" => [
                    [
                        "name" => "Main",
                        "location" => "Philippines"
                    ],
                ]
            ],
        ]);
    }

    public function runBranchTableSeeder(): void
    {
        $seeder = new BranchTableSeeder();
        $seeder->run();
    }
}
