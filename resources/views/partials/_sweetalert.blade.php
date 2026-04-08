<script type="module">
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            })
        @endif
        
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: "{{ session('error') }}"
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Ada Kesalahan!',
                text: "{{ $errors->first() }}"
            });
        @endif
    });
</script>
