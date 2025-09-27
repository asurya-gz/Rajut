@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="inline-flex items-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="inline-flex items-center gap-2 rounded-full border border-pink-200 bg-white/70 px-4 py-2 text-sm font-medium text-pink-300 cursor-not-allowed">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Sebelumnya
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center gap-2 rounded-full border border-pink-300 bg-white px-4 py-2 text-sm font-medium text-pink-500 shadow-sm transition hover:-translate-y-0.5 hover:bg-pink-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Sebelumnya
            </a>
        @endif

        {{-- Pagination Elements --}}
        <ul class="mx-3 flex items-center gap-2">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-pink-100 bg-white text-sm font-medium text-pink-300">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-pink-500 to-rose-500 text-sm font-semibold text-white shadow-lg">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-pink-200 bg-white text-sm font-medium text-pink-500 transition hover:-translate-y-0.5 hover:border-pink-400 hover:bg-pink-50">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center gap-2 rounded-full border border-pink-300 bg-white px-4 py-2 text-sm font-medium text-pink-500 shadow-sm transition hover:-translate-y-0.5 hover:bg-pink-50">
                Selanjutnya
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        @else
            <span class="inline-flex items-center gap-2 rounded-full border border-pink-200 bg-white/70 px-4 py-2 text-sm font-medium text-pink-300 cursor-not-allowed">
                Selanjutnya
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </span>
        @endif
    </nav>
@endif
