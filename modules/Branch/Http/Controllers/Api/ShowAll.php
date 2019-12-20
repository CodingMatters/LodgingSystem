<?php

declare(strict_types=1);

namespace CodingMatters\Branch\Http\Controllers\Api;

use CodingMatters\Branch\Entities\Branch;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

final class ShowAll extends Controller
{
    public function __invoke(Request $request) : JsonResponse
    {
        $branches = Branch::all();

        return response()->json([
            'success' => true,
            "data" => [
                "branches" => $branches->toArray(),
            ],
        ]);
    }
}
