@if ($paginator->lastPage() > 1)
    <div class="mt-4 flex justify-center">
        <div class="inline-flex items-center space-x-1 pagination-fade w-full max-w-xs sm:max-w-none sm:w-auto sm:space-x-1">
            {{-- Prev Button --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-1 bg-gray-200 text-gray-400 rounded-md cursor-not-allowed transition-all duration-300 text-xs sm:text-base">Prev</span>
            @else
                <button type="button"
                    wire:click="previousPage('{{ $paginator->getPageName() }}')"
                    class="px-3 py-1 bg-[#DF760B] text-white rounded-md hover:bg-[#c95e00] transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#DF760B]/30 text-xs sm:text-base">
                    Prev
                </button>
            @endif

            {{-- Custom pagination logic --}}
            @php
                $total = $paginator->lastPage();
                $current = $paginator->currentPage();
                $maxLinks = 4;
                $start = max(1, $current - 1);
                $end = min($total, $start + $maxLinks - 2);
                if ($end - $start < $maxLinks - 1) {
                    $start = max(1, $end - $maxLinks + 2);
                }
                $showStartDots = $start > 2;
                $showEndDots = $end < $total - 1;
                // Only show one set of dots at a time
                if ($showStartDots && $showEndDots) {
                    // Show only one, based on which side is closer to the current page
                    if ($current - 1 < $total - $current) {
                        $showEndDots = false;
                    } else {
                        $showStartDots = false;
                    }
                }
            @endphp

            @if ($start > 1)
                <button type="button"
                    wire:click="gotoPage(1, '{{ $paginator->getPageName() }}')"
                    class="px-3 py-1 bg-[#FFF8F0] text-[#DF760B] rounded-md hover:bg-[#DF760B] hover:text-white hover:scale-110 hover:shadow transition-all duration-300 text-xs sm:text-base">
                    1
                </button>
            @endif
            @if ($showStartDots)
                <button type="button"
                    wire:click="gotoPage({{ $start - $maxLinks }}, '{{ $paginator->getPageName() }}')"
                    class="px-3 py-1 bg-[#FFF8F0] text-[#DF760B] rounded-md font-bold hover:bg-[#DF760B] hover:text-white hover:scale-110 hover:shadow transition-all duration-300 text-xs sm:text-base">
                    ...
                </button>
            @endif

            @for ($page = $start; $page <= $end; $page++)
                @if ($page == $current)
                    <span class="px-3 py-1 bg-[#DF760B] text-white rounded-md font-bold scale-110 shadow transition-all duration-300 text-xs sm:text-base">{{ $page }}</span>
                @else
                    <button type="button"
                        wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                        class="px-3 py-1 bg-[#FFF8F0] text-[#DF760B] rounded-md hover:bg-[#DF760B] hover:text-white hover:scale-110 hover:shadow transition-all duration-300 text-xs sm:text-base">
                        {{ $page }}
                    </button>
                @endif
            @endfor

            @if ($showEndDots)
                <button type="button"
                    wire:click="gotoPage({{ $end + $maxLinks }}, '{{ $paginator->getPageName() }}')"
                    class="px-3 py-1 bg-[#FFF8F0] text-[#DF760B] rounded-md font-bold hover:bg-[#DF760B] hover:text-white hover:scale-110 hover:shadow transition-all duration-300 text-xs sm:text-base">
                    ...
                </button>
            @endif
            @if ($end < $total)
                <button type="button"
                    wire:click="gotoPage({{ $total }}, '{{ $paginator->getPageName() }}')"
                    class="px-3 py-1 bg-[#FFF8F0] text-[#DF760B] rounded-md hover:bg-[#DF760B] hover:text-white hover:scale-110 hover:shadow transition-all duration-300 text-xs sm:text-base">
                    {{ $total }}
                </button>
            @endif

            {{-- Next Button --}}
            @if ($paginator->hasMorePages())
                <button type="button"
                    wire:click="nextPage('{{ $paginator->getPageName() }}')"
                    class="px-3 py-1 bg-[#DF760B] text-white rounded-md hover:bg-[#c95e00] transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#DF760B]/30 text-xs sm:text-base">
                    Next
                </button>
            @else
                <span class="px-3 py-1 bg-gray-200 text-gray-400 rounded-md cursor-not-allowed transition-all duration-300 text-xs sm:text-base">Next</span>
            @endif
        </div>
    </div>
@endif