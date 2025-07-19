<div class="min-h-screen  wire:poll.5000ms">
    {{-- test modal show --}}
    {{-- Header --}}
    {{-- Search bar --}}
    <div class="max-w-2xl mx-auto mb-6 px-2 sm:px-0">
        <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 items-stretch">
            <input
                type="text"
                wire:model.live="query"
                placeholder="Search posts..."
                class="flex-[3] px-4 py-2 bg-white rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 text-sm sm:text-base"
            />
            <select
                wire:model.live="filter"
                class="flex-[1] max-w-[180px] px-4 py-2 bg-white rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 text-sm sm:text-base"
            >
                <option value="">All Categories</option>
                <option value="news">News</option>
                <option value="updates">Updates</option>
                <option value="events">Events</option>
                <option value="Uncategorized">Uncategorized</option>
            </select>
        </div>
    </div>
    {{-- <div class="max-w-2xl mx-auto mb-6">
        <form wire:submit.prevent="search" class="flex items-center bg-white rounded-lg shadow px-4 py-2">
            <input type="text" wire:model="query" placeholder="Search posts..."
                class="flex-1 px-3 py-2 border-none focus:ring-0 focus:outline-none bg-transparent text-gray-700" />
            <button type="submit"
                class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Search</button>
        </form>
    </div> --}}

    {{-- Posts --}}
    <div class="max-w-2xl mx-auto flex flex-col space-y-4 sm:space-y-6 px-2 sm:px-0">
        @if ($posts->count())
            @foreach ($posts as $post)
                <div
                    class="p-4 sm:p-6 bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 border border-gray-200">
                    <h2 class="text-lg sm:text-2xl font-bold text-blue-700 mb-2">{{ $post->title }}</h2>
                    <p class="mt-2 text-gray-700 text-sm sm:text-base">{{ $post->content }}</p>
                   
                        <p class="mt-2 text-xs sm:text-sm text-gray-500">Category: <span
                                class="font-medium text-blue-600">{{ $post->category }}</span></p>
                    <p class="mt-4 text-xs sm:text-sm text-gray-500 flex items-center">
                        <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Posted on: {{ $post->created_at->format('Y-m-d H:i') }}
                    </p>
                </div>
            @endforeach
        @else
            <div class="bg-white rounded-xl shadow p-4 sm:p-6 text-center text-gray-500">
                <svg class="mx-auto mb-2 w-8 h-8 sm:w-10 sm:h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 17v-2a4 4 0 118 0v2M9 17h6M9 17v2a2 2 0 002 2h2a2 2 0 002-2v-2M7 9a4 4 0 018 0v2a4 4 0 01-8 0V9z" />
                </svg>
                <span class="text-xs sm:text-base">No posts found.</span>
            </div>
        @endif
    </div>

    {{-- Pagination --}}
    <div class="mt-8 flex justify-center px-2 sm:px-0">
        {{ $posts->links('vendor.livewire.customPagination', ['scrollTo' => false]) }}
    </div>
</div>
