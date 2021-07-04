@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        <h5 class=" text-center mdi mdi-alert">
            Verifique los campos del formulario</h5>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif