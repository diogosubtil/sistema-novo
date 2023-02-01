<x-layout>
    <div class="row">
        <div class="col-xl-4 col-md-6 col-12">
            <div class="card bg-c-yellow text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col">
                            <p class="m-b-5">Usuarios</p>
                            <h4 class="m-b-0">{{ $total }}</h4>
                        </div>
                        <div class="col col-auto text-right">
                            <i class="feather icon-user f-50 text-c-yellow"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 col-12">
            <div class="card bg-c-green text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col">
                            <p class="m-b-5">Usuarios Ativos</p>
                            <h4 class="m-b-0">{{ $ativos }}</h4>
                        </div>
                        <div class="col col-auto text-right">
                            <i class="feather icon-user f-50 text-c-green"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 col-12">
            <div class="card bg-c-orenge text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col">
                            <p class="m-b-5">Usuarios Desativados</p>
                            <h4 class="m-b-0">{{ $desativados }}</h4>
                        </div>
                        <div class="col col-auto text-right">
                            <i class="feather icon-user f-50 text-c-orenge"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-12">
            <div class="small-box table-responsive bg-light">
                <table id="list" class="table table-hover table-styling table-light">
                    <thead>
                    <tr>
                        <th class="text-center" >Status</th>
                        <th>Nome</th>
                        <th>Informações</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>
                                @if(Cache::has('user-is-online-' . $usuario->id))
                                    <div class="card user-widget-card mt-4">
                                        <i class="bg-success feather icon-user card1-icon"></i>
                                    </div>
                                @elseif(Cache::has('user-is-absent-' . $usuario->id))
                                    <div class="card user-widget-card mt-4">
                                        <i class="bg-yellow feather icon-user card1-icon"></i>
                                    </div>
                                @else
                                    <div class="card user-widget-card mt-4">
                                        <i class="bg-danger feather icon-user card1-icon"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $usuario->name }}</td>
                            <td>{!!
                                    'Email: ' . $usuario->email . '<br>' .
                                    'Função: ' . $usuario->funcao . '<br>' .
                                    'Unidades: ' . $usuario->unidade . '<br>'
                                !!}
                            </td>

                            <td>
                                <div class="d-flex">
                                    <a class="ml-2" href="{{ route('users.edit', $usuario->id) }}">
                                        <button type="button" class="btn btn-primary b-radius-5">Editar</button>
                                    </a>
                                    @if($usuario->ativo == 's')
                                        <form id="deactivateUser{{$usuario->id}}" class="ml-2" action="{{ route('users.deactivate', $usuario->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <button onclick="deactivateUser({{$usuario->id}})" class="btn btn-danger b-radius-5">
                                                Desativar
                                            </button>
                                        </form>
                                    @else
                                        <form id="activateUser{{$usuario->id}}" class="ml-2" action="{{ route('users.activate', $usuario->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <button onclick="activateUser({{$usuario->id}})" class="btn btn-success b-radius-5">
                                                Ativar
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @if (empty($usuarios))
                        <tr>
                            <td colspan="5" class="text-center">
                                Nenhum usuário encontrado
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                @if ($usuarios->hasPages())
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700 text-white leading-5">
                                Mostrando
                                <span class="font-medium">{{ $usuarios->firstItem() }}</span>
                                até
                                <span class="font-medium">{{ $usuarios->lastItem() }}</span>
                                de
                                <span class="font-medium">{{ $usuarios->total() }}</span>
                                resultados
                            </p>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                @if ($usuarios->onFirstPage())
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">
                                            Anterior
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $usuarios->previousPageUrl() }}">
                                            Anterior
                                        </a>
                                    </li>
                                @endif

                                @foreach ($usuarios->links()->elements[0] as $key => $usuario)
                                    @if ($key == $usuarios->currentPage())

                                        <li class="page-item active">
                                            <a class="page-link">{{ $key }}</a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link"
                                               href="{{ $usuario }}">{{ $key }}</a>
                                        </li>
                                    @endif
                                @endforeach

                                @if ($usuarios->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link"
                                           href="{{ $usuarios->nextPageUrl() }}"
                                           rel="next"> Proxima </a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#"> Proxima </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
