@extends('default')
@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Update Produk</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('product.update', $product->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="productName" name="name"
                            placeholder="Masukkan nama produk" required value="{{ $product->name }}">
                    </div>                    
                </div>

                <div class="row">
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <select class="form-select" id="category" name="category" required>
                            <option value="" selected disabled>Pilih kategori...</option>
                            <option value="elektronik" @if($product->category == 'elektronik') selected @endif>Elektronik</option>
                            <option value="alat tulis kantor" @if($product->category == 'alat tulis kantor') selected @endif>Alat Tulis Kantor</option>
                            <option value="makanan dan minuman" @if($product->category == 'makanan dan minuman') selected @endif>Makanan & Minuman</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label">Harga (Rp)</label>
                        <input type="number" class="form-control" id="price" name="price"
                            placeholder="1000000" required value="{{ $product->price }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="stock" class="form-label">Stok Produk</label>
                        <input type="number" class="form-control" id="stock" name="stock" placeholder="0" required value="{{ $product->stock }}">
                    </div>
                </div>

                <div class="d-grid gap-2 mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-outline-secondary">Reset form</button>
                </div>

            </form>
        </div>
    </div>
@endsection
