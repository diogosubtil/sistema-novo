<x-layout>
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="p-4 small-box bg-white">
                <div class="col-12">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <!-- Name -->
                        <div class="row">
                            <div class="row col-12 p-4">
                                <div class="col-12">
                                    Dados do Usuario
                                </div>
                                <div class="col-lg-4 col-12 mt-3">
                                    <x-input-label for="name">Nome</x-input-label>
                                    <x-text-input id="name" class="block mt-1 col-12" type="text" name="name" :value="$user->name" autofocus></x-text-input>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2"></x-input-error>
                                </div>
                                <!-- Telefone -->
                                <div class="col-lg-2 col-12 mt-3">
                                    <x-input-label for="telefone">Telefone</x-input-label>
                                    <x-text-input id="telefone" class="block mt-1 col-12 telphone_with_code" data-mask="(99) 99999-9999" telphon type="text" name="telefone" :value="$user->telefone" autofocus></x-text-input>
                                    <x-input-error :messages="$errors->get('telefone')" class="mt-2"></x-input-error>
                                </div>
                                <!-- Funcao -->
                                <div class="col-lg-3 col-12 mt-3">
                                    <x-input-label for="funcao">Função</x-input-label>
                                    <x-select-input name="funcao" id="funcao" :value="old('funcao')" class="col-12">
                                        <option value="">Selecione</option>
                                        <option {{ ($user->funcao == '1' ? "selected":"") }} value="1">Master</option>
                                        <option {{ ($user->funcao == '2' ? "selected":"") }} value="2">Gerente</option>
                                        <option {{ ($user->funcao == '3' ? "selected":"") }} value="3">Aplicadora</option>
                                    </x-select-input>
                                    <x-input-error :messages="$errors->get('funcao')" class="mt-2"></x-input-error>
                                </div>
                                <!-- Treinamento -->
                                <div class="col-lg-3 col-12 mt-3">
                                    <x-input-label for="treinamento">Treinamento</x-input-label>
                                    <x-select-input name="treinamento" id="treinamento" :value="old('treinamento')" class="col-12">
                                        <option value="">Selecione</option>
                                        <option {{ ($user->treinamento == 'n' ? "selected":"") }} value="n">Não</option>
                                        <option {{ ($user->treinamento == 's' ? "selected":"") }} value="s">Sim</option>
                                    </x-select-input>
                                    <x-input-error :messages="$errors->get('treinamento')" class="mt-2"></x-input-error>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="row col-lg-4 col-12 p-4 mt-2 mr-1">
                                <div class="col-12">
                                    Login e Senha
                                </div>
                                <!-- Email Address -->
                                <div class="col-12 mt-3">
                                    <x-input-label for="email">E-mail</x-input-label>
                                    <x-text-input id="email" class="block mt-1 col-12" type="email" name="email" :value="$user->email"></x-text-input>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2"></x-input-error>
                                </div>
                                <!-- Password -->
                                <div class="col-12 mt-3">
                                    <x-input-label for="password">Senha</x-input-label>

                                    <x-text-input id="password" class="block mt-1 col-12"
                                                  type="password"
                                                  name="password"
                                                  autocomplete="new-password"></x-text-input>

                                    <x-input-error :messages="$errors->get('password')" class="mt-2"></x-input-error>
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-12 mt-3">
                                    <x-input-label for="password_confirmation">Confirmação de senha</x-input-label>

                                    <x-text-input id="password_confirmation" class="block mt-1 col-12"
                                                  type="password"
                                                  name="password_confirmation"></x-text-input>

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"></x-input-error>
                                </div>
                            </div>

                            <div id="userDivider" class="col-12">
                                <hr>
                            </div>

                            <!-- Unidade -->
                            <div id="userUnidade" style="" class="col-lg-8 col-12 p-4 mt-2">
                                <div>
                                    Unidades de acesso
                                </div>
                                <x-input-error :messages="$errors->get('unidade')" class="mt-2"></x-input-error>
                                <div class="row col-12 mt-4">
                                    <div class="col-lg-4 col-12 mt-2">
                                        <label class="col-6 form-check-label">Campina Grande</label>
                                        <input type="checkbox" {{ (in_array('1', $unidades ) ? "checked" : null ) }} name="unidade[]" value="1" class="col-6 js-single" data-switchery="true" style="display: none;">
                                    </div>

                                    <div class="col-lg-4 col-12 mt-2">
                                        <label class="col-6 form-check-label">João Pessoa</label>
                                        <input type="checkbox" {{ (in_array('2', $unidades ) ? "checked" : null ) }} name="unidade[]" value="2" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                    </div>
                                    <div class="col-lg-4 col-12 mt-2">
                                        <label class="col-6 form-check-label">Belém</label>
                                        <input type="checkbox" {{ (in_array('3', $unidades ) ? "checked" : null ) }} name="unidade[]" value="3" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                    </div>
                                    <div class="col-lg-4 col-12 mt-2">
                                        <label class="col-6 form-check-label">Brasília</label>
                                        <input type="checkbox" {{ (in_array('4', $unidades ) ? "checked" : null ) }} name="unidade[]" value="4" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                    </div>

                                    <div class="col-lg-4 col-12 mt-2">
                                        <label class="col-6 form-check-label">Lauro de Freitas</label>
                                        <input type="checkbox" {{ (in_array('5', $unidades ) ? "checked" : null ) }} name="unidade[]" value="5" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                    </div>
                                    <div class="col-lg-4 col-12 mt-2">
                                        <label class="col-6 form-check-label">Campo Grande</label>
                                        <input type="checkbox" {{ (in_array('6', $unidades ) ? "checked" : null ) }} name="unidade[]" value="6" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                    </div>
                                    <div class="col-lg-4 col-12 mt-2">
                                        <label class="col-6 form-check-label">Maceió</label>
                                        <input type="checkbox" {{ (in_array('7', $unidades ) ? "checked" : null ) }} name="unidade[]" value="7" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                    </div>
                                    <div class="col-lg-4 col-12 mt-2">
                                        <label class="col-6 form-check-label">Salvador</label>
                                        <input type="checkbox" {{ (in_array('8', $unidades ) ? "checked" : null ) }} name="unidade[]" value="8" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                    </div>
                                    <div class="col-lg-4 col-12 mt-2">
                                        <label class="col-6 form-check-label">Curitiba</label>
                                        <input type="checkbox" {{ (in_array('9', $unidades ) ? "checked" : null ) }} name="unidade[]" value="9" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                    </div>
                                    <div class="col-lg-4 col-12 mt-2">
                                        <label class="col-6 form-check-label">Londrina</label>
                                        <input type="checkbox" {{ (in_array('10', $unidades ) ? "checked" : null ) }} name="unidade[]" value="10" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                    </div>
                                    <div class="col-lg-4 col-12 mt-2">
                                        <label class="col-6 form-check-label">Santa Catarina</label>
                                        <input type="checkbox" {{ (in_array('11', $unidades ) ? "checked" : null ) }} name="unidade[]" value="11" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                    </div>
                                    <div class="col-lg-4 col-12 mt-2">
                                        <label class="col-6 form-check-label">Cascavel</label>
                                        <input type="checkbox" {{ (in_array('12', $unidades ) ? "checked" : null ) }} name="unidade[]" value="12" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                Salvar
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
