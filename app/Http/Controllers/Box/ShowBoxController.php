<?php

declare(strict_types=1);

namespace App\Http\Controllers\Box;

use App\Http\Controllers\Controller;
use App\Models\Box;
use Illuminate\Http\Request;

final class ShowBoxController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Box $box)
    {
        //
        return response()->json([
            'data' => [
                'box' => $box,
            ],
        ]);
    }
}
