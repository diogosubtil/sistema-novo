<x-layout>
    <div class="row">
        <div class="col-xl-4 col-md-4 col-12">
            <div class="card bg-c-yellow text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col">
                            <p class="m-b-5">Usuarios</p>
                            <h4 class="m-b-0">{{ $total->count() }}</h4>
                        </div>
                        <div class="col col-auto text-right">
                            <i class="feather icon-user f-50 text-c-yellow"></i>
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
        <div class="col-xl-4 col-md-4 col-12">
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
        <div class="col-xl-2 col-md-4 col-12">
            <div class="card feed-card">
                <div class="card-header d-flex justify-content-between">
                    <div class="col-4">
                        <label class="pl-3 pr-3 label label-success">Online</label>
                    </div>
                </div>
                <div class="card-block">
                    @foreach ($online as $on)
                        @if(Cache::has('user-is-online-' . $on->id))
                            <div class="row m-b-30 d-flex align-items-center">
                                <div class="col-3">
                                    @if(Cache::has('user-is-online-' . $on->id))
                                        <div class="col-auto p-r-0">
                                            <i class="feather icon-user bg-success feed-icon"></i>
                                        </div>
                                    @elseif(Cache::has('user-is-absent-' . $on->id))
                                        <div class="col-auto p-r-0">
                                            <i class="feather icon-user bg-yellow feed-icon"></i>
                                        </div>
                                    @else
                                        <div class="col-auto p-r-0">
                                            <i class="feather icon-user bg-danger feed-icon"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <h6 class="m-b-5">{{ $on->name }}</h6>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xl-10 col-md-8 col-12">
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
                                            <i class="feather icon-user {{ Helper::online($usuario->id) }} feed-icon"></i>
                                        </div>
                                    </td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ Helper::funcao($usuario->funcao) }}</td>
                                    <td>{{ Helper::unidade($usuario->unidade) }}</td>
                                    <td><a href="{{ route('users.edit', $usuario->id) }}"><i class="icofont icofont-edit"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pr-4 pl-4">
                            @if ($usuarios->hasPages())
                                <div class="hidden d-flex justify-content-between">
                                    <div>
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
</x-layout>
