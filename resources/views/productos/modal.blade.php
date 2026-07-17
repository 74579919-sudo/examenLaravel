<div class="modal fade" id="productoModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Nuevo Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formProducto">
                    <input type="hidden" id="producto_id">
                    
                    <div class="mb-3">
                        <label>Categoría</label>
                        <select id="categoria_id" class="form-select" required>
                            <!-- Se llena con JS -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Nombre del Producto</label>
                        <input type="text" id="nombre" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Precio</label>
                            <input type="number" step="0.01" id="precio" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Stock</label>
                            <input type="number" id="stock" class="form-control" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardarProducto()">Guardar</button>
            </div>
        </div>
    </div>
</div>