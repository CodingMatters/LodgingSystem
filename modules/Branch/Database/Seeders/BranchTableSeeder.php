<?php

declare(strict_types=1);

namespace CodingMatters\Branch\Database\Seeders;

use CodingMatters\Branch\Entities\Branch;
use Illuminate\Database\Seeder;

final class BranchTableSeeder extends Seeder
{
    public function run() : void
    {
        foreach ($this->branches() as $branch) {
            if(! Branch::whereName($branch['name'])->exists()) {
                Branch::create($branch);
            }
        }
    }

    public function branches() : array
    {
        return [
            [
                'name' => "Main",
                'slug' => 'main',
                'location' => "Philippines"
            ]
        ];
    }
}
