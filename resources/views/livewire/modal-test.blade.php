<div class="flex items-center justify-center">
    <div>
        <button wire:click="$set('showModal', true)"
            class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition font-semibold text-base">
            New Post
        </button>

        <!-- Modal Overlay -->
        @if ($showModal)
            <div class="fixed inset-0 z-50 flex items-center justify-center" aria-modal="true" role="dialog">
                {{-- overlay --}}
                <div class="fixed inset-0 bg-black/20"></div>
                <!-- Modal Box -->
                <div class="relative bg-white rounded-2xl shadow-2xl p-8 w-full max-w-md mx-2 flex flex-col items-center">
                    <!-- Close Button -->
                    <button wire:click="$set('showModal', false)"
                        class="absolute top-3 right-3 text-gray-400 hover:text-gray-700 text-2xl font-bold focus:outline-none"
                        aria-label="Close modal">&times;</button>
                    <h2 class="text-2xl font-bold mb-4 text-gray-800 text-center">Create New Post</h2>
                    <form wire:submit.prevent="goToSecondModal" class="flex flex-col space-y-4 w-full">
                        <input type="text" wire:model="title"
                            class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-700 text-base"
                            placeholder="Post Title" required>
                        <select wire:model="category"
                            class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-700 text-base">
                            <option value="">Select a category</option>
                            <option value="news">News</option>
                            <option value="updates">Updates</option>
                            <option value="events">Events</option>
                        </select>
                        <textarea wire:model="content"
                            class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none text-gray-700 text-base min-h-[100px]"
                            rows="4" placeholder="Write your post here..."></textarea>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold text-base w-full">
                            Next
                        </button>
                    </form>
                </div>
            </div>
        @endif

        @if ($showSecondModal)
            <div class="fixed inset-0 z-50 flex items-center justify-center" aria-modal="true" role="dialog">
                <div class="fixed inset-0 bg-black/20"></div>
                <div class="relative bg-white rounded-2xl shadow-2xl p-8 w-full max-w-md mx-2 flex flex-col items-center">
                    <button wire:click="$set('showSecondModal', false)"
                        class="absolute top-3 right-3 text-gray-400 hover:text-gray-700 text-2xl font-bold focus:outline-none"
                        aria-label="Close modal">&times;</button>
                    <h2 class="text-2xl font-bold mb-4 text-gray-800 text-center">Confirm & Save Post</h2>
                    <div class="mb-4 w-full">
                        <div class="mb-2"><span class="font-semibold">Title:</span> {{ $title }}</div>
                        <div class="mb-2"><span class="font-semibold">Category:</span> {{ $category }}</div>
                        <div class="mb-2"><span class="font-semibold">Content:</span> {{ $content }}</div>
                    </div>
                    <form wire:submit.prevent="save" class="flex flex-col space-y-4 w-full">
                        <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-semibold text-base w-full">
                            Save Post
                        </button>
                    </form>
                </div>
            </div>
        @endif

        <!-- Loading Modal: only show when save is running -->
        <div wire:loading.delay.class.remove="hidden" wire:target="save" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/20">
            <div class="bg-white rounded-2xl shadow-2xl p-8 flex flex-col items-center">
                <svg class="animate-spin h-8 w-8 text-blue-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                </svg>
                <span class="text-lg font-semibold text-gray-700">Saving post...</span>
            </div>
        </div>
    </div>
</div>
