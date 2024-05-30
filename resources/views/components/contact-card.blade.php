<a href="{{ route('contacts.show', $contact) }}" class="block bg-white mt-6 p-6 border-gray-300 hover:border-indigo-300 hover:ring hover:ring-indigo-200 hover:ring-opacity-50 rounded-md shadow-sm">
    <div class="flex items-center space-x-4">
        @if ($contact->profile_picture)
            <img src="{{ Storage::url($contact->profile_picture) }}" alt="Foto de perfil de {{ $contact->first_name }}" class="h-16 w-16 rounded-full object-cover">
        @else
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7S2 13.866 2 10 5.582 3 10 3s8 3.134 8 7zm-8 5c3.72 0 6.85-2.55 7.816-6H2.184c.966 3.45 4.096 6 7.816 6z" clip-rule="evenodd" />
            </svg>
        @endif
        <div class="flex-1 min-w-0">
            <p class="text-sm font-medium text-gray-900 truncate">
                {{ $contact->first_name }} {{ $contact->last_name }}
            </p>
            <p class="text-sm text-gray-500 truncate">
                {{ $contact->email }}
            </p>
            <p class="text-sm text-gray-500 truncate">
                {{ $contact->phone }}
            </p>
        </div>
    </div>
</a>
