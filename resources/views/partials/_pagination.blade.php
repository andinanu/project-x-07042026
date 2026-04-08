<div class="pagination-container">
    @if ($data->hasPages() || $data->total() > 0)
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between p-3 border-top bg-light">
            <div class="mb-3 mb-md-0 text-sm text-muted">
                Menampilkan <strong>{{ $data->firstItem() ?? 0 }}</strong>
                sampai <strong>{{ $data->lastItem() ?? 0 }}</strong> dari
                <strong>{{ $data->total() }}</strong> data
            </div>

            <nav aria-label="Pagination navigation">
                <ul class="pagination mb-0">
                    @if ($data->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">Prev</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $data->previousPageUrl() }}">Prev</a>
                        </li>
                    @endif

                    @if ($data->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $data->nextPageUrl() }}">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">Next</span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    @endif
</div>
