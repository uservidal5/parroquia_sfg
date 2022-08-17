<script>
    @if (session('status') == 'ok')
        Swal.fire({
            title: 'Listo!',
            text: '{{ session('message') }}',
            icon: 'success',
            showConfirmButton: false,
            timer: 2000
        });
    @endif

    @if ($errors->any())
        lanzar_toast("error", "Datos incorrectos!");
    @endif
</script>
