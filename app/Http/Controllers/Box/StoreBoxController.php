<?php

declare(strict_types=1);

namespace App\Http\Controllers\Box;

use App\Actions\Box\CreateNewBox;
use App\Http\Controllers\Controller;
use App\Http\Requests\Box\StoreBoxRequest;
use App\Models\Box;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

final class StoreBoxController extends Controller
{
    use AuthorizesRequests;

    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreBoxRequest $request, CreateNewBox $action)
    {
        //
        $this->authorize('create', Box::class);

        try {

            $box = $action->handle($request->validated(), auth()->user());

            return redirect()
                ->route('boxes.show', $box)
                ->with('success', 'Caixa criada com sucesso!');

        } catch (Throwable $throwable) {
            Log::error("Error creating box: {$throwable->getMessage()}");

            return redirect()
                ->back()
                ->withInput()
                ->withError('error', 'Não foi possivel criar a caixa, tente novamente!');
        }
    }
}
