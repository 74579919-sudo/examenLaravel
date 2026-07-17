<script>
    const apiUrl = '/api/categorias';
    let modal;

    document.addEventListener('DOMContentLoaded', function() {
        modal = new bootstrap.Modal(document.getElementById('categoriaModal'));
        cargarCategorias();
    });

    // Leer (GET)
    function cargarCategorias() {
        fetch(apiUrl)
            .then(res => res.json())
            .then(data => {
                let html = '';
                data.forEach(cat => {
                    html += `
                        <tr>
                            <td>${cat.id}</td>
                            <td>${cat.nombre}</td>
                            <td>${cat.descripcion || ''}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" onclick="editarCategoria(${cat.id})">Editar</button>
                                <button class="btn btn-sm btn-danger" onclick="eliminarCategoria(${cat.id})">Eliminar</button>
                            </td>
                        </tr>
                    `;
                });
                document.getElementById('tablaCategorias').innerHTML = html;
            });
    }

    // Preparar Modal
    function abrirModal() {
        document.getElementById('formCategoria').reset();
        document.getElementById('categoria_id').value = '';
        document.getElementById('modalTitle').innerText = 'Nueva Categoría';
        modal.show();
    }

    // Crear y Actualizar (POST / PUT)
    function guardarCategoria() {
        const id = document.getElementById('categoria_id').value;
        const data = {
            nombre: document.getElementById('nombre').value,
            descripcion: document.getElementById('descripcion').value
        };

        const method = id ? 'PUT' : 'POST';
        const url = id ? `${apiUrl}/${id}` : apiUrl;

        fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(res => res.json())
        .then(() => {
            modal.hide();
            cargarCategorias();
        });
    }

    // Eliminar (DELETE)
    function eliminarCategoria(id) {
        if(confirm('¿Estás seguro de eliminar esta categoría?')) {
            fetch(`${apiUrl}/${id}`, { method: 'DELETE' })
            .then(() => cargarCategorias());
        }
    }
</script>