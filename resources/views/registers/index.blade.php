<x-layout>

    @slot('stylesheet')
    @endslot

    @slot('slot')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Filtros</h5>
                    </div>
                    <div class="card-block">
                        <form method="GET" class="row" action=" {{ route('registers.index') }}">
                            <div class="col-xl-3 col-md-6 col-12">
                                <label for="funcao">Função</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-primary" id="basic-addon1">
                                        <i class="icofont icofont-user"></i>
                                    </span>
                                    <select id="user" name="user" class="form-control">
                                        <option value="">Selecione</option>
                                        @foreach($users as $user)
                                            <option {{ (isset($_GET['user']) && $_GET['user'] == $user->id ? "selected":"") }} value="{{$user->id}}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12">
                                <label for="action">Ação</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-primary" id="basic-addon1">
                                        <i class="icofont icofont-user"></i>
                                    </span>
                                    <select id="action" name="action" class="form-control">
                                        <option value="">Selecione</option>
                                        <option {{ (isset($_GET['action']) && $_GET['action'] == 'c' ? "selected":"") }} value="c">Cadastro</option>
                                        <option {{ (isset($_GET['action']) && $_GET['action'] == 'e' ? "selected":"") }} value="e">Edição</option>
                                        <option {{ (isset($_GET['action']) && $_GET['action'] == 'ex' ? "selected":"") }} value="ex">Exclusão</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12">
                                <label for="model">Tipo</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-primary" id="basic-addon1">
                                        <i class="icofont icofont-user"></i>
                                    </span>
                                    <select id="model" name="model" class="form-control">
                                        <option value="">Selecione</option>
                                        <option {{ (isset($_GET['model']) && $_GET['model'] == 'User' ? "selected":"") }} value="User">User</option>
                                        <option {{ (isset($_GET['model']) && $_GET['model'] == 'Unidade' ? "selected":"") }} value="Unidade">Unidade</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12">
                                <label for="created_at">Tipo</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <span class="input-group-addon bg-primary">
                                            <i class="icofont icofont-calendar"></i>
                                        </span>
                                        <input type="date" class="form-control" name="created_at" id="created_at" value="{{ isset($_GET['created_at']) ? $_GET['created_at'] : null }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary b-radius-5">Filtrar</button>
                                <a href="{{ route('registers.index') }}">
                                    <button type="button" class="btn btn-round b-radius-5">Limpar</button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5>Registros</h5>
                        <span style="font-size: 20PX;float: right">{{ isset($_GET['created_at']) ? 'Filtrando' : date('d/m/Y') }}</span>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless">
                                <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Unidade</th>
                                    <th>Ação</th>
                                    <th>Tipo</th>
                                    <th>Data</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($registers as $register)
                                    <tr id="register-{{$register->id}}" style="cursor: pointer" >
                                        <td><span id="icon-{{$register->id}}"  class="fa fa-plus mr-3 text-success"></span>{{ Helper::getUserTittle($register->user) }}</td>
                                        <td>{{ Helper::getUnidadeTittle($register->unidade) }}</td>
                                        <td>{{ Helper::getRegisterTipo($register->action) }}</td>
                                        <td>{{ $register->model }}</td>
                                        <td>{{ date('d/m/Y H:i:s', strtotime($register->created_at)) }}</td>
                                    </tr>
                                    <tr hidden  id="register-data-{{$register->id}}">
                                        <td colspan="6" class="bg-c-yellow text-white" >
                                            @if($register->action === 'c')
                                                @if($register->model === 'User')
                                                    <p><b>Novo usuario: </b></p>
                                                    <a href="{{ route('users.edit', $register->id_model) }}">
                                                        <button class="btn btn-primary b-radius-5">{{ Helper::getUserTittle($register->id_model) }}</button>
                                                    </a>
                                                @endif
                                            @endif
                                            @if($register->action === 'e')
                                                <div class="row col-12">
                                                    <p class="col-12" style="font-size: 16px"><b>Dados Alterados</b></p>
                                                    @foreach(json_decode($register->data) as $key => $data)
                                                        <div class="col-4">
                                                            <b>{{ $key === 'novo' ? '- Novos' : '- Antigo' }}</b><br>
                                                            @foreach($data as $key => $dat)
                                                                <span>{{ ucfirst($key) . ': ' . $dat }}</span><br>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                            @if($register->action === 'ex')
                                                @if($register->model === 'User')
                                                    <p><b>Usuario desativado: </b></p>
                                                    <a href="{{ route('users.edit', $register->id_model) }}">
                                                        <button class="btn btn-primary b-radius-5">{{ Helper::getUserTittle($register->id_model) }}</button>
                                                    </a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pr-4 pl-4">
                                @if ($registers->hasPages())
                                    <div class="d-flex justify-content-between">
                                        <div id="mostrarPaginas">
                                            <p class="text-sm text-gray leading-5">
                                                Mostrando
                                                <span class="font-medium">{{ $registers->firstItem() }}</span>
                                                até
                                                <span class="font-medium">{{ $registers->lastItem() }}</span>
                                                de
                                                <span class="font-medium">{{ $registers->total() }}</span>
                                                resultados
                                            </p>
                                        </div>
                                        {{ $registers->links() }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endslot

    @slot('scripts')
        <script>
            @foreach ($registers as $register)
                let register{{$register->id}} = document.getElementById('register-{{$register->id}}')
                let icon{{$register->id}} = document.getElementById('icon-{{$register->id}}')
                let data{{$register->id}} = document.getElementById('register-data-{{$register->id}}')
                register{{$register->id}}.addEventListener('click', function (){
                    if(data{{$register->id}}.hidden === false){
                        data{{$register->id}}.hidden = true
                        icon{{$register->id}}.classList.add('fa-plus')
                        icon{{$register->id}}.classList.add('text-success')
                        icon{{$register->id}}.classList.remove('fa-minus')
                        icon{{$register->id}}.classList.remove('text-danger')
                    }else {
                        data{{$register->id}}.hidden = false
                        icon{{$register->id}}.classList.add('fa-minus')
                        icon{{$register->id}}.classList.add('text-danger')
                        icon{{$register->id}}.classList.remove('fa-plus')
                        icon{{$register->id}}.classList.remove('text-success')
                    }
                })
            @endforeach
        </script>
    @endslot

</x-layout>
