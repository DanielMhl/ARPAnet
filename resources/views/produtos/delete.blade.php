<!-- Modal -->
<div class="modal fade" id="modal-deletar-{{ $produto->idProduto }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">ATENÇÃO!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Deseja realmente deletar o produto?</p>
        <p><strong>{{ $produto->descricaoProduto }}</strong></p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form action="{{ route('produtos.destroy', $produto->idProduto) }}" method="post">
            @csrf
            @method('DELETE')
        <button type="submit" class="btn btn-danger">Confirmar</button>
        </form>
      </div>
    </div>
  </div>
</div>
