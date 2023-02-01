<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Telefone -->
        <div>
            <x-input-label for="telefone" :value="__('Telefone')" />
            <x-text-input id="telefone" class="block mt-1 w-full" type="number" name="telefone" :value="old('telefone')" required autofocus />
            <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
        </div>

        <!-- Funcao -->
        <div>
            <x-input-label for="funcao" :value="__('Função')" />
            <x-text-input id="funcao" class="block mt-1 w-full" type="number" name="funcao" :value="old('funcao')" required autofocus />
            <x-input-error :messages="$errors->get('funcao')" class="mt-2" />
        </div>

        <!-- Unidade -->
        <div>
            <x-input-label for="unidade" :value="__('Unidade')" />
            <x-text-input id="unidade" class="block mt-1 w-full" type="number" name="unidade" :value="old('unidade')" required autofocus />
            <x-input-error :messages="$errors->get('unidade')" class="mt-2" />
        </div>

        <!-- Treinamento -->
        <div>
            <x-input-label for="treinamento" :value="__('Treinamento')" />
            <x-text-input id="treinamento" class="block mt-1 w-full" type="text" name="treinamento" :value="old('treinamento')" required autofocus />
            <x-input-error :messages="$errors->get('treinamento')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
