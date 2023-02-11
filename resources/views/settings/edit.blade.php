<x-layout>

    @slot('stylesheet')
        <!-- Color Picker css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/spectrum/css/spectrum.css') }}">
        <!-- Mini-color css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/jquery-minicolors/css/jquery.minicolors.css') }}">
    @endslot

    @slot('slot')
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="p-2 card">
                    <div class="col-12">
                        <form method="POST" action="{{ route('settings.update', $setting->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Name -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 mt-2 mb-3">
                                            Configurações do Tema
                                        </div>
                                        <div class="col-xl-4 col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="name" class="col-form-label">Nome da Empresa</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon bg-primary" id="basic-addon1">
                                                            <i class="icofont icofont-building"></i>
                                                        </span>
                                                        <input id="name" name="name" type="text" class="form-control" value="{{ $setting->name }}" placeholder="Nome">
                                                    </div>
                                                    <span class="form-bar">
                                                        @if ($errors->get('name'))
                                                            <ul class="text-danger">
                                                                @foreach ((array) $errors->get('name') as $message)
                                                                    <li>{{ $message }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="col-xl-12 col-md-6 col-12">
                                                    <label for="color_primary" class="col-form-label">Cor Primaria</label>
                                                    <input type="text" id="hue-demo" name="color_primary" class="form-control demo" data-control="hue" value="{{ $setting->color_primary }}">
                                                    <span class="form-bar">
                                                        @if ($errors->get('color_primary'))
                                                            <ul class="text-danger">
                                                                @foreach ((array) $errors->get('color_primary') as $message)
                                                                    <li>{{ $message }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="col-xl-12 col-md-6 col-12">
                                                    <label for="color_secondary" class="col-form-label">Cor Secundario</label>
                                                    <input type="text" id="hue-demo" name="color_secondary" class="form-control demo" data-control="hue" value="{{ $setting->color_secondary }}">
                                                    <span class="form-bar">
                                                        @if ($errors->get('color_secondary'))
                                                            <ul class="text-danger">
                                                                @foreach ((array) $errors->get('color_secondary') as $message)
                                                                    <li>{{ $message }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <label for="logo" class="col-form-label">Logo</label>
                                            <div class="input-group input-group-button d-flex justify-content-center align-content-center">
                                                <div class="side-menu-user-info">
                                                    <div class="side-menu-user-photo">
                                                        <img id="imgLogo" src="{{ asset($setting->logo) }}" alt="your image"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fileUpload btn btn-primary">
                                                <span>Upload</span>
                                                <input type="file" name="logo" id="logo" value="teste" onchange="loadFileLogo(event)" class="upload"/>
                                            </div>
                                            <span class="form-bar">
                                                @if ($errors->get('logo'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('logo') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </span>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <label for="favicon" class="col-form-label">Favicon</label>
                                            <div class="input-group input-group-button d-flex justify-content-center align-content-center">
                                                <div class="side-menu-user-info">
                                                    <div class="side-menu-user-photo">
                                                        <img id="imgFavicon" src="{{ asset($setting->favicon) }}" alt="your image"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fileUpload btn btn-primary">
                                                <span>Upload</span>
                                                <input type="file" name="favicon" id="favicon" value="teste" onchange="loadFileFavicon(event)" class="upload"/>
                                            </div>
                                            <span class="form-bar">
                                                @if ($errors->get('favicon'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('favicon') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            Menu Lateral
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <label for="color_menu" class="col-form-label">Cor de fundo</label>
                                            <input type="text" id="hue-demo" name="color_menu" class="form-control demo" data-control="hue" value="{{ $setting->color_menu }}">
                                            <span class="form-bar">
                                                @if ($errors->get('color_menu'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('color_menu') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </span>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <label for="color_menu_letter" class="col-form-label">Cor das Letras</label>
                                            <input type="text" id="hue-demo" name="color_menu_letter" class="form-control demo" data-control="hue" value="{{ $setting->color_menu_letter }}">
                                            <span class="form-bar">
                                                @if ($errors->get('color_menu_letter'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('color_menu_letter') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </span>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <label for="color_menu_letter_active" class="col-form-label">Cor das Letras (Ativas)</label>
                                            <input type="text" id="hue-demo" name="color_menu_letter_active" class="form-control demo" data-control="hue" value="{{ $setting->color_menu_letter_active }}">
                                            <span class="form-bar">
                                                @if ($errors->get('color_menu_letter_active'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('color_menu_letter_active') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </span>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <label for="color_menu_tittle" class="col-form-label">Cor dos Titulos</label>
                                            <input type="text" id="hue-demo" name="color_menu_tittle" class="form-control demo" data-control="hue" value="{{ $setting->color_menu_tittle }}">
                                            <span class="form-bar">
                                                @if ($errors->get('color_menu_tittle'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('color_menu_tittle') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </span>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <label for="color_menu_icon" class="col-form-label">Cor dos Icones</label>
                                            <input type="text" id="hue-demo" name="color_menu_icon" class="form-control demo" data-control="hue" value="{{ $setting->color_menu_icon }}">
                                            <span class="form-bar">
                                                @if ($errors->get('color_menu_icon'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('color_menu_icon') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>

                                <div class="col-12">
                                    <button id="cadastrar"  type="submit" class="text-sm pl-4 pr-4 btn bg-primary b-radius-5">Salvar</button>
                                    <a href="{{ route('settings.edit', 1) }}">
                                        <button type="button" class="text-sm pl-4 pr-4 ml-2 btn bg-round b-radius-5">Cancelar</button>
                                    </a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endslot

    @slot('scripts')
        <script type="text/javascript" src="{{ asset('/files/bower_components/jquery-minicolors/js/jquery.minicolors.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/files/assets/pages/advance-elements/custom-picker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/files/bower_components/spectrum/js/spectrum.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/files/bower_components/jscolor/js/jscolor.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/files/assets/pages/advance-elements/moment-with-locales.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/files/assets/pages/advance-elements/bootstrap-datetimepicker.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('/files/bower_components/bootstrap-daterangepicker/js/daterangepicker.js') }}"></script>
        <!-- Date-dropper js -->
        <script type="text/javascript" src="{{ asset('/files/bower_components/datedropper/js/datedropper.min.js') }}"></script>
        <!-- Color picker js -->
        <script type="text/javascript" src="{{ asset('/files/bower_components/spectrum/js/spectrum.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/files/bower_components/jscolor/js/jscolor.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/files/assets/pages/advance-elements/custom-picker.js') }}"></script>

        <!-- Mini-color js -->
        <script type="text/javascript" src="{{ asset('/files/bower_components/jquery-minicolors/js/jquery.minicolors.min.js') }}"></script>
        <script>
            var loadFileLogo = function(event) {
                var output = document.getElementById('imgLogo');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
            };
            var loadFileFavicon = function(event) {
                var output = document.getElementById('imgFavicon');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
            };
        </script>
    @endslot
</x-layout>
