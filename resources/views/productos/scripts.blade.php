<script>
    const apiUrlProductos = '/api/productos';
    const apiUrlCategorias = '/api/categorias';
    let modalProducto;

    document.addEventListener('DOMContentLoaded', function() {
        modalProducto = new bootstrap.Modal(document.getElementById('productoModal'));
        cargarProductos();
        cargarCategoriasSelect();
    });

    function cargarProductos() {
        fetch(apiUrlProductos)
            .then(res => res.json())
            .then(data => {
                let html = '';
                data.forEach(prod => {
                    // Accedemos al nombre de la categoría gracias a la relación en tu modelo
                    let nombreCategoria = prod.categoria ? prod.categoria.nombre : 'Sin categoría';
                    html += `
                        <tr>
                            <td>${prod.id}</td>
                            <td><span class="badge bg-info text-dark">${nombreCategoria}</span></td>
                            <td>${prod.nombre}</td>
                            <td>$${parseFloat(prod.precio).toFixed(2)}</td>
                            <td>${prod.stock}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" onclick="editarProducto(${prod.id})">Editar</button>
                                <button class="btn btn-sm btn-danger" onclick="eliminarProducto(${prod.id})">Eliminar</button>
                            </td>
                        </tr>
                    `;
                });
                document.getElementById('tablaProductos').innerHTML = html;
            });
    }

    function cargarCategoriasSelect() {
        fetch(apiUrlCategorias)
            .then(res => res.json())
            .then(data => {
                let html = '<option value="">Seleccione una categoría...</option>';
                data.forEach(cat => {
                    html += `<option value="${cat.id}">${cat.nombre}</option>`;
                });
                document.getElementById('categoria_id').innerHTML = html;
            });
    }

    function abrirModal() {
        document.getElementById('formProducto').reset();
        document.getElementById('producto_id').value = '';
        document.getElementById('modalTitle').innerText = 'Nuevo Producto';
        modalProducto.show();
    }

    function guardarProducto() {
        const id = document.getElementById('producto_id').value;
        const data = {
            categoria_id: document.getElementById('categoria_id').value,
            nombre: document.getElementById('nombre').value,
            precio: document.getElementById('precio').value,
            stock: document.getElementById('stock').value
        };

        const method = id ? 'PUT' : 'POST';
        const url = id ? `${apiUrlProductos}/${id}` : apiUrlProductos;

        fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(res => {
            if(!res.ok) throw new Error('Error en la validación');
            return res.json();
        })
        .then(() => {
            modalProducto.hide();
            cargarProductos();
        })
        .catch(error => alert('Revisa que todos los campos estén completos correctamente.'));
    }

    function editarProducto(id) {
        fetch(`${apiUrlProductos}/${id}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('producto_id').value = data.id;
                document.getElementById('categoria_id').value = data.categoria_id;
                document.getElementById('nombre').value = data.nombre;
                document.getElementById('precio').value = data.precio;
                document.getElementById('stock').value = data.stock;
                
                document.getElementById('modalTitle').innerText = 'Editar Producto';
                modalProducto.show();
            });
    }

    function eliminarProducto(id) {
        if(confirm('¿Estás seguro de eliminar este producto?')) {
            fetch(`${apiUrlProductos}/${id}`, { method: 'DELETE' })
            .then(() => cargarProductos());
        }
    }
</script>