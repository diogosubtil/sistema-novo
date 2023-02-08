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
                                <p class="m-b-5">Unidades</p>
                                <h4 class="m-b-0">{{ $unidades->count() }}</h4>
                            </div>
                            <div class="col col-auto text-right">
                                <i class="feather icon-home f-50 text-c-blue"></i>
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
                                <p class="m-b-5">Ativas</p>
                                <h4 class="m-b-0">{{ $ativos }}</h4>
                            </div>
                            <div class="col col-auto text-right">
                                <i class="feather icon-home f-50 text-c-green"></i>
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
                                <p class="m-b-5">Desativadas</p>
                                <h4 class="m-b-0">{{ $desativados }}</h4>
                            </div>
                            <div class="col col-auto text-right">
                                <i class="feather icon-home f-50 text-c-orenge"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5>Unidades</h5>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless">
                                <thead>
                                <tr>
                                    <th>Gerente</th>
                                    <th>Bairro</th>
                                    <th>Cidade</th>
                                    <th>UF</th>
                                    <th>Endereço</th>
                                    <th>Número</th>
                                    <th>Whatsapp</th>
                                    <th>Meta</th>
                                    <th>Abertura</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($unidades as $unidade)
                                    <tr>
                                        <td>{{ Helper::getUserTittle($unidade->gerente) }}</td>
                                        <td>{{ $unidade->bairro }}</td>
                                        <td>{{ $unidade->cidade }}</td>
                                        <td>{{ $unidade->estado }}</td>
                                        <td>{{ $unidade->endereco }}</td>
                                        <td>{{ $unidade->numero }}</td>
                                        <td>{{ $unidade->whatsapp }}</td>
                                        <td>{{ $unidade->meta }}</td>
                                        <td>{{ $unidade->dataAbertura }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('unidades.edit', $unidade->id) }}"  class="waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Editar">
                                                <i style="font-size: 20px" class="fa fa-edit m-0 text-primary"></i>
                                            </a>
                                            <form class="ml-2" method="POST" action="{{ $unidade->ativo == 's' ? route('unidades.disable', $unidade->id) : route('unidades.enable', $unidade->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <button style="background: none;color: inherit;border: none;padding: 0;" type="submit"  class="waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="{{ $unidade->ativo == 's' ? 'Desativar' : 'Ativar' }}">
                                                    <i style="font-size: 18px" class="fa fa-power-off m-0 {{ $unidade->ativo == 's' ? 'text-danger' : 'text-success' }}"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pr-4 pl-4">
                                @if ($unidades->hasPages())
                                    <div class="d-flex justify-content-between">
                                        <div id="mostrarPaginas">
                                            <p class="text-sm text-gray leading-5">
                                                Mostrando
                                                <span class="font-medium">{{ $unidades->firstItem() }}</span>
                                                até
                                                <span class="font-medium">{{ $unidades->lastItem() }}</span>
                                                de
                                                <span class="font-medium">{{ $unidades->total() }}</span>
                                                resultados
                                            </p>
                                        </div>
                                        {{ $unidades->links() }}
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
