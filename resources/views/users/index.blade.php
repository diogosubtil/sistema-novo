<x-layout>
    @slot('stylesheet')
    @endslot
    @slot('slot')
        <div class="row">
            <div class="col-xl-4 col-md-4 col-12">
                <div class="card bg-c-blue text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col">
                                <p class="m-b-5">Usuarios</p>
                                <h4 class="m-b-0">{{ $total->count() }}</h4>
                            </div>
                            <div class="col col-auto text-right">
                                <i class="feather icon-user f-50 text-c-blue"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-12">
                <div class="card bg-c-green text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col">
                                <p class="m-b-5">Ativos</p>
                                <h4 class="m-b-0">{{ $ativos }}</h4>
                            </div>
                            <div class="col col-auto text-right">
                                <i class="feather icon-user f-50 text-c-green"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-12">
                <div class="card bg-c-orenge text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col">
                                <p class="m-b-5">Desativados</p>
                                <h4 class="m-b-0">{{ $desativados }}</h4>
                            </div>
                            <div class="col col-auto text-right">
                                <i class="feather icon-user f-50 text-c-orenge"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden-mobile col-xl-3 col-md-12 col-12">
                <div class="card feed-card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="col-4">
                            <label class="pl-3 pr-3 label label-success">Online</label>
                        </div>
                    </div>
                    <div class="card-block">
                        @foreach ($total as $on)
                            @if(Cache::has('user-is-online-' . $on->id))
                                <div class="row m-b-30 d-flex align-items-center">
                                    <div class="col-12 d-flex">
                                        <div class="col-auto p-r-0 d-flex align-items-center">
                                            <i class="feather icon-user text-success f-20"></i>
                                        </div>
                                        <h6 class="ml-3 m-b-5">{{ $on->name }}</h6>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Filtros</h5>
                    </div>
                    <div class="card-block">
                        <form method="GET" class="row" data-loading="true" action=" {{ route('users.index') }}">
                            <div class="col-sm-4 col-12">
                                <label for="name" class="col-form-label">Nome</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-primary" id="basic-addon1">
                                        <i class="icofont icofont-user"></i>
                                    </span>
                                    <input id="name" name="name" type="text" class="form-control" value="{{ isset($_GET['name']) ? $_GET['name'] : null }}" placeholder="Nome">
                                </div>
                            </div>
                            <div class="col-sm-4 col-12">
                                <label for="funcao">Função</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-primary" id="basic-addon1">
                                        <i class="icofont icofont-book-mark"></i>
                                    </span>
                                    <select id="funcao" name="funcao" class="form-control">
                                        <option selected disabled value="">Selecione</option>
                                        <option {{ (isset($_GET['funcao']) && $_GET['funcao'] == '1' ? "selected":"") }} value="1">Master</option>
                                        <option {{ (isset($_GET['funcao']) && $_GET['funcao'] == '2' ? "selected":"") }} value="2">Gerente</option>
                                        <option {{ (isset($_GET['funcao']) && $_GET['funcao'] == '3' ? "selected":"") }} value="3">Aplicadora</option>
                                        <option {{ (isset($_GET['funcao']) && $_GET['funcao'] == '4' ? "selected":"") }} value="4">Recepção/Vendedor</option>
                                        <option {{ (isset($_GET['funcao']) && $_GET['funcao'] == '10' ? "selected":"") }} value="10">Cliente</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-12">
                                <label for="unidade_id">Unidade</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-primary" id="basic-addon1">
                                        <i class="fa fa-building"></i>
                                    </span>
                                    <select id="unidade_id" name="unidade_id" class="form-control">
                                        <option selected disabled value="">Selecione</option>
                                        @foreach($unidades as $unidade)
                                            <option {{ (isset($_GET['unidade_id']) && $_GET['unidade_id'] == $unidade->id ? "selected":"") }} value="{{ $unidade->id }}">{{ $unidade->bairro }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-12">
                                <button type="submit" class="btn btn-primary b-radius-5">Filtrar</button>
                                <a href="{{ route('users.index') }}">
                                    <button class="btn btn-round b-radius-5" type="button" >Limpar</button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card table-card">
                    <div class="card-header">
                        <h5>Usuarios</h5>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless">
                                <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Função</th>
                                    <th>Unidade</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td class="feed-card">
                                            <div class="col-auto p-r-0">
                                                <i class="feather icon-user {{ Helper::online($usuario->id) }} f-20"></i>
                                            </div>
                                        </td>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ Helper::getTitleFuncao($usuario->funcao) }}</td>
                                        <td>{{ Helper::getUnidadeTitle($usuario->unidade_id) }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('users.edit', $usuario->id) }}"  class="waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Editar">
                                                <i style="font-size: 20px" class="fa fa-edit m-0 text-black"></i>
                                            </a>
                                            <form class="ml-3" method="POST" action="{{ $usuario->ativo == 's' ? route('users.disable', $usuario->id) : route('users.enable', $usuario->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <button style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;" type="submit"  class="waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="{{ $usuario->ativo == 's' ? 'Desativar' : 'Ativar' }}">
                                                    <i style="font-size: 18px" class="fa fa-power-off m-0 {{ $usuario->ativo == 's' ? 'text-warning' : 'text-success' }}"></i>
                                                </button>
                                            </form>
                                            <form id="user-delete-{{ $usuario->id }}" class="ml-3" method="POST" action="{{ route('users.destroy', $usuario->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;" type="submit"  class="waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Excluir">
                                                    <i style="font-size: 18px" class="fa fa-trash m-0 text-danger"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pr-4 pl-4">
                                @if ($usuarios->hasPages())
                                    <div class="d-flex justify-content-between">
                                        <div id="mostrarPaginas">
                                            <p class="text-sm text-gray leading-5">
                                                Mostrando
                                                <span class="font-medium">{{ $usuarios->firstItem() }}</span>
                                                até
                                                <span class="font-medium">{{ $usuarios->lastItem() }}</span>
                                                de
                                                <span class="font-medium">{{ $usuarios->total() }}</span>
                                                resultados
                                            </p>
                                        </div>
                                        {{ $usuarios->links() }}
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
            @foreach ($usuarios as $usuario)
                let form{{ $usuario->id }} = document.getElementById("user-delete-{{ $usuario->id }}")
                form{{ $usuario->id }}.addEventListener("submit", function(event){
                    event.preventDefault()
                    formDelet(this)
                });
            @endforeach
        </script>
    @endslot
</x-layout>
