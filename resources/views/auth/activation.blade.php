<h1>Hola, $user->first_name</h1>

<p>
    <a href="{{ env('APP_URL') }}/activarcuenta/{{ $user->id }}/{{ $code }}">activar cuenta</a>
</p>