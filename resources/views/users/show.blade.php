    @extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4 rounded">
        <h2>Detalles del Usuario</h2>

        <p><strong>Nombre:</strong> {{ $user->name }}</p>
        <p><strong>Número de Control:</strong> {{ $user->numControl }}</p>
        <p><strong>Correo:</strong> {{ $user->email }}</p>
        <p><strong>Rol:</strong> {{ $user->rol ? $user->rol->nombre : 'Sin rol' }}</p>

        <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">
            Volver
        </a>
    </div>
</div>
@endsection
