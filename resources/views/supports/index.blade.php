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
                                <p class="m-b-5">Suportes</p>
                                <h4 class="m-b-0">{{ $supports->count() }}</h4>
                            </div>
                            <div class="col col-auto text-right">
                                <i class="feather icon-help-circle f-50 text-c-blue"></i>
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
                                <p class="m-b-5">Concluidos</p>
                                <h4 class="m-b-0">{{ $concluidos }}</h4>
                            </div>
                            <div class="col col-auto text-right">
                                <i class="feather icon-help-circle f-50 text-c-green"></i>
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
                                <p class="m-b-5">Pendentes</p>
                                <h4 class="m-b-0">{{ $pendentes }}</h4>
                            </div>
                            <div class="col col-auto text-right">
                                <i class="feather icon-help-circle f-50 text-c-orenge"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Filtros</h5>
                    </div>
                    <div class="card-block">
                        <form method="GET" class="row" action="{{ route('supports.index') }}">
                            <div class="col-xl-3 col-md-6 col-12">
                                <label for="funcao">Usuarios</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-primary" id="basic-addon1">
                                        <i class="icofont icofont-user"></i>
                                    </span>
                                    <select id="user" name="user" class="form-control">
                                        <option selected disabled value="">Selecione</option>
                                        @foreach($users as $user)
                                            <option {{ (isset($_GET['user']) && $_GET['user'] == $user->id ? "selected":"") }} value="{{$user->id}}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12">
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
                            <div class="col-xl-3 col-md-6 col-12">
                                <label for="status">Status</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-primary" id="basic-addon1">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <select id="status" name="status" class="form-control">
                                        <option selected disabled value="">Selecione</option>
                                        <option {{ (isset($_GET['status']) && $_GET['status'] == '1' ? "selected":"") }} value="1">Novo</option>
                                        <option {{ (isset($_GET['status']) && $_GET['status'] == '2' ? "selected":"") }} value="2">Usuario Respondeu</option>
                                        <option {{ (isset($_GET['status']) && $_GET['status'] == '3' ? "selected":"") }} value="3">Suporte Respondeu</option>
                                        <option {{ (isset($_GET['status']) && $_GET['status'] == '4' ? "selected":"") }} value="4">Concluidos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12">
                                <label for="created_at">Data</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-primary">
                                        <i class="icofont icofont-calendar"></i>
                                    </span>
                                    <input type="date" class="form-control" name="created_at" id="created_at" value="{{ isset($_GET['created_at']) ? $_GET['created_at'] : null }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary b-radius-5">Filtrar</button>
                                <a href="{{ route('supports.index') }}">
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
                        <h5>Tickets</h5>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless">
                                <thead>
                                <tr>
                                    <th># ID</th>
                                    <th class="text-center">Status</th>
                                    <th>Assunto</th>
                                    <th>Usuario</th>
                                    <th>Unidade</th>
                                    <th class="text-center">Data</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if ($supports->count())
                                    @foreach ($supports as $support)
                                    <tr style="cursor: pointer" onclick="window.location.href = '{{ route('supports.show', $support->id) }}'">
                                        <td class="col-1">#{{ $support->id }}</td>
                                        <td class="col-2 text-center text"><label class="label {{ Helper::getColorSupport($support->status) }}">{{ Helper::getStatusSupport($support->status) }}</label></td>
                                        <td>{{ $support->subject }}</td>
                                        <td class="col-2">{{ Helper::getUserTittle($support->user) }}</td>
                                        <td class="col-2">{{ Helper::getUnidadeTittle($support->unidade_id) }}</td>
                                        <td class="col-1 text-center">{{ date('d/m/Y - H:i', strtotime($support->updated_at)) }}</td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr class="text-center">
                                        <td colspan="10">Nenhum Suporte cadastrado.</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="pr-4 pl-4">
                                @if ($supports->hasPages())
                                    <div class="d-flex justify-content-between">
                                        <div id="mostrarPaginas">
                                            <p class="text-sm text-gray leading-5">
                                                Mostrando
                                                <span class="font-medium">{{ $supports->firstItem() }}</span>
                                                até
                                                <span class="font-medium">{{ $supports->lastItem() }}</span>
                                                de
                                                <span class="font-medium">{{ $supports->total() }}</span>
                                                resultados
                                            </p>
                                        </div>
                                        {{ $supports->links() }}
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
    @endslot
</x-layout>
