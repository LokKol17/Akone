<x-layoult title="Sign Up - Akone" :mensagem="$mensagem">
    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('sign-up/style.css') }}">
    </x-slot>

    <section class="form">
        <h1 class="form__titulo">Junte-se à nós</h1>
        <form action="{{ route('signup') }}" method="POST" class="form__container">
            @csrf
            <div class="form__group--nick">
                 <label for="input-nick">Nome de usuário</label>
                 <input type="text" name="nick" class="form__group__input--nick" id="input-nick" required>
            </div>
            <div class="form__group--email">
                <label for="input-email">Email</label>
                <input type="email" name="email" class="form__group__input--email" id="input-email" required>
            </div>
            <div class="form__group__password">
                <div class="form__group--password">
                    <label for="input-password">Senha</label>
                    <input type="text" name="password" class="form__group__input--password" id="input-password" required>
                </div>
                <div class="form__group--cpassword">
                    <label for="input-cpassword">Confirmar senha</label>
                    <input type="text" name="cpassword" class="form__group__input--cpassword" id="input-cpassword" required>
                </div>
            </div>
            <span class="error" id="error"></span>
            <button type="submit" id="botao">entrar</button>
        </form>

    </section>

    <x-slot name="scripts">
        <script src="{{ asset('./sign-up/verifyRegister.js') }}"></script>
    </x-slot>
</x-layoult>
