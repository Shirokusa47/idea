<!-- props define los datos (variables) que este componente va a recibir cada vez que lo uses.
     Si no le pasas un 'type', por defecto usará 'text'. -->
@props([
    'label',
    'name',
    'type' => 'text',
])

<div>
    <!-- for e id (en el input de abajo) conectan el texto con la cajita.
         {{ $label }} imprime el nombre que le pases (ej. "Email" o "Password"). -->
    <label for="{{ $name }}" class="label">
        {{ $label }}
    </label>

    <!-- La caja donde el usuario escribe.
         Se llena automáticamente con las variables que definiste arriba en props. -->
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ old($name) }}"
        class="input"
    >
<!-- pregunta “¿existe un error para este campo?”-->
    @error($name)
    <p class="text-red-500 text-sm mt-2">
        {{ $message }}
    </p>
    @enderror
</div>
