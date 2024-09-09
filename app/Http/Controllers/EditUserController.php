<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EditUserController extends Controller
{

    public function __invoke(Request $request): RedirectResponse|View
    {
        return view('edituser');
    }
}