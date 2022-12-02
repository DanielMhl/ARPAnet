<!-- Modal -->
<div class="modal fade" id="modal-modpass-{{ $usuario->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Trocar Senha</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"> <!-- d-flex flex-column align-items-center -->
          {{-- <p>Deseja realmente deletar o usuário?</p> --}}
          {{-- <p><strong>{{ $usuario->name }}</strong></p> --}}
          {{-- {{ $url = route('usuarios.modifypass', ['id' => $usuario->id]); }} --}}
                <form action="{{ route( 'usuarios.modifypass' , [ 'id' => $usuario->id ]) }}" method="POST" class="g-4" name="modifypass" id="modifypass" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                   <input type="hidden" name="id" value="{{ $usuario->id }}">
                    <div class="d-flex flex-column align-items-center">
                        <div class="row pb-2">
                            <div class="col-md-12">
                                <label for="password_old" class="form-label fs-5 fs-5 ml-4">Senha Atual</label><br />
                                <input type="password" class="form-control form-control-lg bg-light" id="password_old" name="password_old" value="" placeholder="Informe a senha atual" required>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12">
                                <label for="password" class="form-label fs-5 fs-5">Nova Senha</label><br />
                                <input type="password" class="form-control form-control-lg bg-light" id="password" name="password_new" value="" placeholder="Informe a nova senha" required>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12">
                                <label for="password_check" class="form-label fs-5 fs-5">Confirmar Nova Senha</label><br />
                                <input type="password" class="form-control form-control-lg bg-light" id="password_check" name="password_check" value="" placeholder="Confirme a nova senha" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger btn-lg" form="modifypass">Trocar</button>
                    </div>
                </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="post">
              @csrf
              @method('DELETE')
          <button type="submit" class="btn btn-danger">Trocar</button>
          </form>
        </div> --}}
      </div>
    </div>
  </div>