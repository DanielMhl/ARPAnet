<!-- Modal -->
{{-- @if (Session::get('erro'))
<div class="modal fade ls-modal ls-opened" id="modal-updatepass-{{ $usuario->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="false">
@else
<div class="modal fade" id="modal-updatepass-{{ $usuario->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
@endif --}}
<div class="modal fade" id="modal-updatepass-{{ $usuario->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Trocar Senha</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- @if(Session::get('erro'))
                    <div class="alert alert-danger text-center p-2">{{ Session::get('erro') }}</div>
                @endif --}}
                <form method="POST" action="{{ route('usuarios.updatepass', $usuario->id) }}" class="g-4"
                    name="modifypass" id="modifypass" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column align-items-center">
                        <div class="row pb-2">
                            <div class="col-md-12">
                                <label for="password_old" class="form-label fs-5 fs-5 ml-4">Senha Atual</label><br />
                                <input type="password" class="form-control form-control-lg bg-light" id="password_old"
                                    name="password_old" value="" placeholder="Informe a senha atual" required>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12">
                                <label for="password" class="form-label fs-5 fs-5">Nova Senha</label><br />
                                <input type="password" class="form-control form-control-lg bg-light" id="password"
                                    name="password" value="" placeholder="Informe a nova senha" required>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12">
                                <label for="password_check" class="form-label fs-5 fs-5">Confirmar Nova
                                    Senha</label><br />
                                <input type="password" class="form-control form-control-lg bg-light" id="password_check"
                                    name="password_check" value="" placeholder="Confirme a nova senha" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-lg"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger btn-lg" form="modifypass">Trocar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
