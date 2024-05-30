<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center space-x-4">
                @if ($contact->profile_picture)
                    <img src="{{ Storage::url($contact->profile_picture) }}" alt="Foto de perfil de {{ $contact->first_name }}" class="h-24 w-24 rounded-full object-cover">
                @else
                    <!-- Placeholder si no hay imagen -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7S2 13.866 2 10 5.582 3 10 3s8 3.134 8 7zm-8 5c3.72 0 6.85-2.55 7.816-6H2.184c.966 3.45 4.096 6 7.816 6z" clip-rule="evenodd" />
                    </svg>
                @endif
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 mt-4">{{ $contact->first_name }} {{ $contact->last_name }}</h2>
            <p class="text-gray-600 mt-2"><strong>Email:</strong> {{ $contact->email }}</p>
            <p class="text-gray-600 mt-2"><strong>Teléfono:</strong> {{ $contact->phone }}</p>
            <p class="text-gray-600 mt-2"><strong>Dirección:</strong> {{ $contact->address }}</p>
            <p class="text-gray-600 mt-2"><strong>Fecha de Nacimiento:</strong> {{ $contact->birthday ? \Carbon\Carbon::parse($contact->birthday)->format('d/m/Y') : 'No especificado' }}</p>
            <div class="mt-4">
                <x-secondary-button onclick="location.href='{{ route('contacts.index') }}'">Volver</x-secondary-button>
            </div>
        </div>
    </div>
</x-app-layout>
