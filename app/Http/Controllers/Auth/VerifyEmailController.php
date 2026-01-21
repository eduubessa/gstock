<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EmailValidationRequest;
use Illuminate\Auth\Events\Verified;

final class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailValidationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended('dashboard?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            $user = $request->user();

            event(new Verified($user));
        }

        return redirect()->intended('dashboard?verified=1');
    }
}
