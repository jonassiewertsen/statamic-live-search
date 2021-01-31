<div class="relative">
    <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
        <!-- Heroicon name: search -->
        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
        </svg>
    </div>
    <input wire:model="q" id="search" name="search" class="block w-full bg-gray-300 border border-transparent rounded-md py-2 pl-10 pr-3 text-sm placeholder-gray-500 focus:outline-none focus:bg-white focus:border-white focus:ring-white focus:text-gray-900 focus:placeholder-gray-500 sm:text-sm" placeholder="Search" type="search">

    @if ($q)
        <div class="origin-top-right absolute right-0 mt-2 w-64 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
            <div class="py-1 text-sm text-gray-700">
                @forelse($results as $result)
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 hover:text-gray-900">{{ $result['title'] }}</a>
                @empty
                    <div class="block px-4 py-2">No results found</div>
                @endforelse
            </div>
        </div>
    @endif
</div>
