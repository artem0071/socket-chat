<?php

Route::get('/', function (Illuminate\Http\Request $request) {
    if ($request->exists('channel') && !$request->hasValidSignature()) {
        abort(401);
    }

    return view('main');
})->name('main');

Route::get('new_channel', function (Illuminate\Http\Request $request) {
    redirect()->to(
        \URL::signedRoute('main', [
            'channel' => \Illuminate\Support\Str::uuid()->toString()
        ])
    )->send();
});
