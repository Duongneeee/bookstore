<div class="row mt-3">
    <div class="col-12 text-center">
        <nav aria-label="..." class="pagination custom-pagination d-block">
            <ul class="list-unstyled">
                {{-- @if ($items->currentPage()>1)  --}}
                <li class="list-inline-item"><a class="page-link bg-primary text-light" href="{{ $items->previousPageUrl() }}"
                        aria-label="Previous"><span aria-hidden="true">«</span>
                        <span class="sr-only">Previous</span>
                        <div class="ripple-container"></div>
                    </a></li>
                {{-- @endif --}}
                @for ($i = 1; $i <= $items->lastPage(); ++$i)
                    <li class="list-inline-item"><a class="page-link page-number" href="{{$items->url($i)}}">{{$i}}</a></li>
                    @endfor
                    {{-- <li class="list-inline-item"><a class="page-link" href="#" tabindex="-1">1</a></li> --}}
                    {{-- @if ($items->currentPage()<$items->lastPage()) --}}
                    <li class="list-inline-item"><a class="page-link bg-primary text-light" href="{{ $items->nextPageUrl() }}"
                        aria-label="Next"><span aria-hidden="true">»</span>
                        <span class="sr-only">Next</span></a></li>
                    {{-- @endif --}}
                    
            </ul>
        </nav>
    </div>
</div>