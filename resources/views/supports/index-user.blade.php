<x-layout>
    @slot('stylesheet')
    @endslot
    @slot('slot')
        <div class="row">
            <div class="col-xl-3 col-md-12 col-12">
                <div class="row">
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="card table-card">
                            <div class="card-header">
                                <h6><p>Olá , <b class="text-primary">{{ Auth::user()->name }}</b>!</p> Estamos diponíveis para responder seus tickets!</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="card table-card">
                            <div class="card-header">
                                <h6 class="text-primary"><p><b>Ultímo Ticket</b></p></h6>
                                <hr>
                                @if($ultimoSuporte)
                                    <div style="cursor: pointer" onclick="window.location.href = '{{ route('supports.showuser', $ultimoSuporte->id) }}'">
                                        <h5>#{{ $ultimoSuporte->id }} - {{ $ultimoSuporte->subject }}</h5>
                                        <span><i class="fa fa-circle"></i> <label class="label {{ Helper::getColorSupport($ultimoSuporte->status) }}">{{ Helper::getStatusSupport($ultimoSuporte->status) }}</label></span>
                                        <span><i class="fa fa-calendar"></i> {{ date('d/m/Y H:i', strtotime($ultimoSuporte->created_at))}}</span>
                                    </div>
                                @else
                                    <h5>Nenhum Ticket Registrado</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card table-card">
                            <div class="card-header">
                                <h6 class="text-primary"><p><b>Suporte</b></p></h6>
                                <hr>
                                <ul>
                                    <li>
                                        <a href="{{ route('supports.indexuser') }}"><i class="fa fa-list"></i> Meus Tickets de Suporte</a>
                                    </li>
                                    <li class="mt-2">
                                        <a href="{{ route('supports.create') }}"><i class="fa fa-ticket"></i> Abrir Ticket</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-md-12 col-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5 class="text-primary">Tickets</h5>
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
                                @if($supports->count())
                                    @foreach ($supports as $support)
                                        <tr style="cursor: pointer" onclick="window.location.href = '{{ route('supports.showuser', $support->id) }}'">
                                            <td class="col-1">#{{ $support->id }}</td>
                                            <td class="col-2 text-center text"><label class="label {{ Helper::getColorSupport($support->status) }}">{{ Helper::getStatusSupport($support->status) }}</label></td>
                                            <td>{{ $support->subject }}</td>
                                            <td class="col-2">{{ Helper::getUserTitle($support->user) }}</td>
                                            <td class="col-2">{{ Helper::getUnidadeTitle($support->unidade_id) }}</td>
                                            <td class="col-1 text-center">{{ date('d/m/Y - H:i', strtotime($support->updated_at)) }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="text-center">
                                        <td colspan="10">Nenhum ticket registrado.</td>
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
