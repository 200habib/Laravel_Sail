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



o$ php artisan make:mail Test -m
PHP Warning:  Module "sqlite3" is already loaded in Unknown on line 0

   INFO  Mailable [app/Mail/Test.php] created successfully.  

   INFO  Markdown view [resources/views/mail/test.blade.php] created successfully.  

el@el-Lenovo-ideapad-330-15AST:~/Bureau/personal_project/code/laravel/mio-progetto$ docker run -d -p 1025:1025 -p 8025:8025 mailhog/mailhog
docker: permission denied while trying to connect to the Docker daemon socket at unix:///var/run/docker.sock: Head "http://%2Fvar%2Frun%2Fdocker.sock/_ping": dial unix /var/run/docker.sock: connect: permission denied

Run 'docker run --help' for more information
el@el-Lenovo-ideapad-330-15AST:~/Bureau/personal_project/code/laravel/mio-progetto$ sudo usermod -aG docker $USER
[sudo] Mot de passe de el : 
Désolé, essayez de nouveau.
[sudo] Mot de passe de el : 
Désolé, essayez de nouveau.
[sudo] Mot de passe de el : 
sudo: 3 saisies de mots de passe incorrectes
el@el-Lenovo-ideapad-330-15AST:~/Bureau/personal_project/code/laravel/mio-progetto$ sudo usermod -aG docker $USER
[sudo] Mot de passe de el : 
el@el-Lenovo-ideapad-330-15AST:~/Bureau/personal_project/code/laravel/mio-progetto$ newgrp docker