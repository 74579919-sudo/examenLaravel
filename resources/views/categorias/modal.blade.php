<div class="modal fade" id="categoriaModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Nueva Categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formCategoria">
                    <input type="hidden" id="categoria_id">
                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" id="nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Descripción</label>
                        <input type="text" id="descripcion" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardarCategoria()">Guardar</button>
            </div>
        </div>
    </div>
</div>