@if ($paginator->hasPages())
    <div class="join grid grid-cols-2 mt-4 flex justify-center ">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <button class="join-item btn btn-outline" disabled>Previous</button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="join-item btn btn-outline text-black">Previous</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="join-item btn btn-outline text-black">Next</a>
        @else
            <button class="join-item btn btn-outline" disabled>Next</button>
        @endif
    </div>
@endif
