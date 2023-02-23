<x-layoult title="Upload - Akone" :mensagem="$mensagem">
    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('uploads/style.css') }}">
    </x-slot>

    <form
        action="@empty($anime){{ route('upload') }}@endempty
                @isset($anime) {{ route('upload.put', $anime->id) }} @endisset"
        method="POST" class="form" enctype="multipart/form-data">
        @csrf
        @isset($anime)
            @method('PUT')
            <h1 class="form__titulo">Editar {{$anime->getFormatedName()}}</h1>
        @endisset
        @empty($anime)
            <h1 class="form__titulo">Upload</h1>
        @endempty
        <div class="form__container">
            <div class="container__capa">
                <label class="capa__upload" id="capa">
                    <input type="file" name="capa" accept="image" id="capa">
                </label>
                @isset($anime)<img src="{{asset($anime->imagem_path)}}" id="imagem-capa" alt="" class="capa">@endisset
            </div>
            <div class="form__group">
                <label for="nome" class="form__label--nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form__input--nome"
                       @isset($anime) value="{{$anime->getFormatedName()}}" @endisset>

                <label for="sinopse" class="form__label--sinopse">Sinopse</label>
                <textarea name="sinopse" id="sinopse" class="form__input--sinopse">
                    @isset($anime) {{$anime->sinopse}} @endisset
                </textarea>
            </div>
        </div>
        <div class="form__container--serie">
            <div class="controlador">
                <div class="adicionar">
                    <div class="adicionarTemporada" id="adicionarTemporada">Add. Temporada</div>
                </div>
                <button type="submit" class="submit">Salvar Alterações</button>
            </div>
        </div>
    </form>
    <x-slot name="scripts">
        <script src="{{asset('uploads/showImageWhenInsertAtInput.js')}}"></script>
    </x-slot>
</x-layoult>
