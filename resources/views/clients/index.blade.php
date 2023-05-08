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
                                <p class="m-b-5">Clientes</p>
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
                <div class="card bg-c-pink text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col">
                                <p class="m-b-5">Femininos</p>
                                <h4 class="m-b-0">{{ $femininos }}</h4>
                            </div>
                            <div class="col col-auto text-right">
                                <i class="feather icon-user f-50 text-c-pink"></i>
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
                                <p class="m-b-5">Masculino</p>
                                <h4 class="m-b-0">{{ $masculino }}</h4>
                            </div>
                            <div class="col col-auto text-right">
                                <i class="feather icon-user f-50 text-c-orenge"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Filtros</h5>
                    </div>
                    <div class="card-block">
                        <form method="GET" class="row" action=" {{ route('clients.index') }}">
                            <div class="col-sm-4 col-12">
                                <label for="nome" class="col-form-label">Nome</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-primary" id="basic-addon1">
                                        <i class="icofont icofont-user"></i>
                                    </span>
                                    <input id="nome" name="nome" type="text" class="form-control" value="{{ isset($_GET['nome']) ? $_GET['nome'] : null }}" placeholder="Nome">
                                </div>
                            </div>
                            <div class="col-sm-4 col-12">
                                <label for="cpf" class="col-form-label">CPF</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-primary" id="basic-addon1">
                                        <i class="icofont icofont-user"></i>
                                    </span>
                                    <input id="cpf" name="cpf" type="text" class="form-control" value="{{ isset($_GET['cpf']) ? $_GET['cpf'] : null }}" placeholder="CPF">
                                </div>
                            </div>
                            <div class="col-sm-4 col-12">
                                <label for="email" class="col-form-label">E-mail</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-primary" id="basic-addon1">
                                        <i class="icofont icofont-email"></i>
                                    </span>
                                    <input id="email" name="email" type="email" class="form-control" value="{{ isset($_GET['email']) ? $_GET['email'] : null }}" placeholder="E-mail">
                                </div>
                            </div>
                            <div class="col-sm-4 col-12">
                                <button type="submit" class="btn btn-primary b-radius-5">Filtrar</button>
                                <a href="{{ route('clients.index') }}">
                                    <button class="btn btn-round b-radius-5" type="button" >Limpar</button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card table-card">
                    <div class="card-header">
                        <h5>Clientes</h5>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>CPF</th>
                                    <th>Whatsapp</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->nome }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->cpf }}</td>
                                        <td>{{ $client->whatsapp }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('clients.show', $client->id) }}" class="waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Visualizar">
                                                <i style="font-size: 18px" class="fa fa-eye m-0 text-blue"></i>
                                            </a>
                                            <a href="{{ route('clients.edit', $client->id) }}"  class="waves-effect waves-light ml-3" data-toggle="tooltip" data-placement="left" title="Editar">
                                                <i style="font-size: 20px" class="fa fa-edit m-0 text-black"></i>
                                            </a>
                                            <form id="client-delete-{{ $client->id }}" class="ml-3" method="POST" action="{{ route('clients.destroy', $client->id) }}">
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
                                @if ($clients->hasPages())
                                    <div class="d-flex justify-content-between">
                                        <div id="mostrarPaginas">
                                            <p class="text-sm text-gray leading-5">
                                                Mostrando
                                                <span class="font-medium">{{ $clients->firstItem() }}</span>
                                                até
                                                <span class="font-medium">{{ $clients->lastItem() }}</span>
                                                de
                                                <span class="font-medium">{{ $clients->total() }}</span>
                                                resultados
                                            </p>
                                        </div>
                                        {{ $clients->links() }}
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
            @foreach ($clients as $client)
                let form{{ $client->id }} = document.getElementById("client-delete-{{ $client->id }}")
                form{{ $client->id }}.addEventListener("submit", function(event){
                    event.preventDefault()
                    formDelet(this)
                });
            @endforeach
        </script>
    @endslot
</x-layout>
