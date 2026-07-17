<div class="modal fade" id="proveedorModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Nuevo Proveedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formProveedor">
                    <input type="hidden" id="proveedor_id">
                    
                    <div class="mb-3">
                        <label>Razón Social</label>
                        <input type="text" id="razon_social" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>RUC</label>
                        <input type="text" id="ruc" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Teléfono</label>
                            <input type="text" id="telefono" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email</label>
                            <input type="email" id="email" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardarProveedor()">Guardar</button>
            </div>
        </div>
    </div>
</div>