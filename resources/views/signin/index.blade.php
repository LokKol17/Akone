<x-layoult title="Sign In - Akone" :mensagem="$mensagem">
    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('sign-in/style.css') }}">
    </x-slot>

    <section class="form">
        <h1 class="form__titulo">Ora, então você voltou</h1>
        <form action="{{ route('signin') }}" method="POST" class="form__container">
            @csrf
            <div class="form__group--email">
                <label for="input-email">Email</label>
                <input type="email" name="email" class="form__group__input--email" id="input-email" required>
            </div>
            <div class="form__group__password">
                <div class="form__group--password">
                    <label for="input-password">Senha</label>
                    <input type="text" name="password" class="form__group__input--password" id="input-password" required>
                </div>
            </div>
            <span class="error" id="error"></span>
            <button type="submit" id="botao">entrar</button>
        </form>

    </section>

    <x-slot name="scripts">

    </x-slot>
</x-layoult>
