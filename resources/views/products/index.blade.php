@extends('default')
@section('content')
    <div class="p-2 p-md-4">
        <div class="row">
            <h2 class="mb-4">Products <a href="{{ route('product.create') }}" class="btn btn-success btn-sm">Tambah</a></h2>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-3">Product List</h5>
                <form action="{{ route('product.index') }}" id="filter" class="d-flex gap-2 flex-wrap align-items-end">
                    <div class="flex-grow-1" style="min-width: 200px;">
                        <label for="search" class="form-label mb-2">Cari Nama Produk</label>
                        <input type="text" name="search" id="search" placeholder="Masukkan nama produk..." class="form-control" value="{{ request('search') }}">
                    </div>
                    <div style="min-width: 200px;">
                        <label for="category" class="form-label mb-2">Filter Kategori</label>
                        <select name="category" id="category" class="form-select">
                            <option value="" {{ request('category') === '' ? 'selected' : '' }}>Semua Kategori</option>
                            <option value="elektronik" {{ request('category') === 'elektronik' ? 'selected' : '' }}>Elektronik</option>
                            <option value="alat tulis kantor" {{ request('category') === 'alat tulis kantor' ? 'selected' : '' }}>Alat Tulis Kantor</option>
                            <option value="makanan dan minuman" {{ request('category') === 'makanan dan minuman' ? 'selected' : '' }}>Makanan & Minuman</option>
                        </select>
                    </div>
                    <button type="reset" class="btn btn-secondary btn-sm">Reset Filter</button>
                </form>
            </div>
            <div class="card-body">
                <div class="ajax-paginated table-responsive">
                    <div class="ajax-table">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $row)
                                    <tr>
                                        <td>{{ $loop->iteration + ($products->firstItem() - 1) }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->category }}</td>
                                        <td>{{ $row->price }}</td>
                                        <td>{{ $row->stock }}</td>
                                        <td>
                                            <a href="{{ route('product.show', $row->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <button name="delete" data-name="{{ $row->name }}" data-href="{{ route('product.destroy', $row->id) }}"
                                                class="btn btn-danger btn-sm">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('partials._pagination', ['data' => $products])
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterForm = document.getElementById('filter');
    const searchInput = document.getElementById('search');
    const categorySelect = document.getElementById('category');
    
    // Submit form to update filters (jquery-pagination.js will handle pagination AJAX)
    function submitFilter() {
        // Build URL with current filter values
        const formData = new FormData(filterForm);
        const params = new URLSearchParams(formData);
        const url = new URL(filterForm.action);
        
        // Set query params
        for (let [key, value] of params) {
            if (value) {
                url.searchParams.set(key, value);
            }
        }
        
        // Navigate to updated URL (jquery-pagination.js will intercept pagination links for AJAX)
        window.location.href = url.toString();
    }
    
    // Trigger filter on search input change (debounce for performance)
    let searchTimeout;
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(submitFilter, 300);
    });
    
    // Trigger filter on category select change
    categorySelect.addEventListener('change', submitFilter);
});
</script>
@endpush