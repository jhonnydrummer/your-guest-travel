<!-- Botão para abrir o modal -->
<button type="button" class="btn btn-primary" id="openModalBtn">
    Abrir Modal
</button>

<!-- Link para incluir o modal externo -->
<a href="{{ route('modal.show') }}" id="externalModalLink" style="display: none;"></a>

<!-- Script para lidar com o clique do botão e abrir o modal -->
<script>
    document.getElementById('openModalBtn').addEventListener('click', function() {
        // Simula o clique no link para abrir o modal externo
        document.getElementById('externalModalLink').click();
    });
</script>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Título do Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Conteúdo do Modal...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar mudanças</button>
            </div>
        </div>
    </div>
</div>

