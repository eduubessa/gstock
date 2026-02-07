<?php

namespace App\Http\Controllers\Box;

use App\Http\Controllers\Controller;
use App\Models\Box;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ListBoxController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response
    {
        return Inertia::render('box/list', [
            'boxes' => Box::with('user')->get()
        ]);
    }
}
