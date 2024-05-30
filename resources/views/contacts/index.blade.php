<x-app-layout>
    <div class="max-w-lg mx-auto p-4 sm:p-6 lg:p-8">
        <div class="flex justify-center mt-3">
            <x-secondary-button class="px-3 inline-flex items-center" onclick="location.href='{{ route('contacts.create') }}'">
                <svg viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8">
                    <path d="M8 1a3 3 0 1 0 .002 6.002A3 3 0 0 0 8 1zM6.5 8A4.491 4.491 0 0 0 2 12.5v.5c0 1.11.89 2 2 2h6v-1H7v-4h3V8.027A4.243 4.243 0 0 0 9.5 8zM11 8v3H8v2h3v3h2v-3h3v-2h-3V8zm0 0" fill="#2e3436"/>
                </svg>
                Agregar Nuevo Contacto
            </x-secondary-button>
        </div>
        @foreach ($contacts as $contact)
            <div class="bg-white p-6 mt-4 rounded-lg shadow">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-lg font-semibold text-gray-700">{{ $contact->first_name }} {{ $contact->last_name }}</p>
                        <p class="text-gray-600">{{ $contact->email }}</p>
                    </div>
                    <div>
                        <a href="{{ route('contacts.show', $contact) }}" class="text-blue-500 hover:text-blue-700">Ver</a>
                        <a href="{{ route('contacts.edit', $contact) }}" class="text-blue-500 hover:text-blue-700 ml-4">Editar</a>
                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar este contacto?');" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 ml-4">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
