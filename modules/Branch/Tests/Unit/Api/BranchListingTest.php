<?php

declare(strict_types=1);

namespace CodingMatters\Branch\Tests\Unit\Api;

use CodingMatters\Branch\Entities\Branch;
use CodingMatters\User\Entities\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

final class BranchListingTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function shouldDisplayMainBranchAsDefaultBranch() : void
    {
        $branchName = $this->faker->company . " MAIN";
        $location = $this->faker->address;

        factory(Branch::class)->create([
            "name" => $branchName,
            "location" => $location,
        ]);

        $user = factory(User::class)->create();

        $response = $this->post(route('api.branches.all'), ['api_token' => $user->token()]);
        $response->assertStatus(200);
        $response->assertExactJson([
            "success" => true,
            "data" => [
                "branches" => [
                    [
                        "name" => $branchName,
                        "location" => $location
                    ]
                ]
            ],
        ]);
    }

    /**
     * @test
     */
    public function shouldDisplayAllBranch() : void
    {
        $branchName = $this->faker->company . " MAIN";
        $location = $this->faker->address;

        factory(Branch::class)->create([
            "name" => $branchName,
            "location" => $location,
        ]);

        $secondBranchName = $this->faker->company . " SECOND";
        $secondLocation = $this->faker->address;

        factory(Branch::class)->create([
            "name" => $secondBranchName,
            "location" => $secondLocation,
        ]);

        $user = factory(User::class)->create();

        $response = $this->post(route('api.branches.all'), ['api_token' => $user->token()]);
        $response->assertStatus(200);
        $response->assertExactJson([
            "success" => true,
            "data" => [
                "branches" => [
                    [
                        "name" => $branchName,
                        "location" => $location
                    ],
                    [
                        "name" => $secondBranchName,
                        "location" => $secondLocation
                    ],
                ]
            ],
        ]);
    }
}
