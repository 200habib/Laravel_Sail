 Esempio 1 - Redirect a una URL con i vecchi input

return redirect('/form')->withInput();

✅ Ti rimanda alla rotta /form
✅ Porta con sé tutti i dati che erano stati mandati nella request precedente

Nel form potrai usare:

<input type="text" name="name" value="{{ old('name') }}">

E Laravel riprenderà il valore inserito prima.


use Illuminate\Http\Request;

Route::post('/set-cookie', function (Request $request) {
    if ($request->has('accept_cookies')) {
        // Imposta un cookie quando l'utente accetta
        return response()->json(['message' => 'Cookie accettato'])
            ->cookie('user_session', 'xyz12345', 60, '/', null, true, true);  // Imposta un cookie che dura 60 minuti
    }

    return response()->json(['message' => 'Errore nella richiesta'], 400);
});
<meta name="csrf-token" content="{{ csrf_token() }}">


<div id="cookie-consent-banner" style="position: fixed; bottom: 0; left: 0; width: 100%; background: #333; color: white; text-align: center; padding: 10px;">
    Questo sito utilizza i cookie. Accetta l'uso dei cookie per migliorare la tua esperienza.
    <button id="accept-cookies" style="background: green; color: white; padding: 5px 10px; margin-left: 10px;">Accetta</button>
</div>