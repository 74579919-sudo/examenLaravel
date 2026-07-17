<script>
    const apiUrlProveedores = '/api/proveedores';
    let modalProveedor;

    document.addEventListener('DOMContentLoaded', function() {
        modalProveedor = new bootstrap.Modal(document.getElementById('proveedorModal'));
        cargarProveedores();
    });

    function cargarProveedores() {
        fetch(apiUrlProveedores)
            .then(res => res.json())
            .then(data => {
                let html = '';
                data.forEach(prov => {
                    html += `
                        <tr>
                            <td>${prov.id}</td>
                            <td>${prov.razon_social}</td>
                            <td>${prov.ruc}</td>
                            <td>${prov.telefono || '-'}</td>
                            <td>${prov.email || '-'}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" onclick="editarProveedor(${prov.id})">Editar</button>
                                <button class="btn btn-sm btn-danger" onclick="eliminarProveedor(${prov.id})">Eliminar</button>
                            </td>
                        </tr>
                    `;
                });
                document.getElementById('tablaProveedores').innerHTML = html;
            });
    }

    function abrirModal() {
        document.getElementById('formProveedor').reset();
        document.getElementById('proveedor_id').value = '';
        document.getElementById('modalTitle').innerText = 'Nuevo Proveedor';
        modalProveedor.show();
    }

    function guardarProveedor() {
        const id = document.getElementById('proveedor_id').value;
        const data = {
            razon_social: document.getElementById('razon_social').value,
            ruc: document.getElementById('ruc').value,
            telefono: document.getElementById('telefono').value,
            email: document.getElementById('email').value
        };

        const method = id ? 'PUT' : 'POST';
        const url = id ? `${apiUrlProveedores}/${id}` : apiUrlProveedores;

        fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(res => {
            if(!res.ok) throw new Error('Error en la validación o el RUC ya existe');
            return res.json();
        })
        .then(() => {
            modalProveedor.hide();
            cargarProveedores();
        })
        .catch(error => alert('Verifica los datos. Es posible que el RUC ya esté registrado o falten campos obligatorios.'));
    }

    function editarProveedor(id) {
        fetch(`${apiUrlProveedores}/${id}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('proveedor_id').value = data.id;
                document.getElementById('razon_social').value = data.razon_social;
                document.getElementById('ruc').value = data.ruc;
                document.getElementById('telefono').value = data.telefono || '';
                document.getElementById('email').value = data.email || '';
                
                document.getElementById('modalTitle').innerText = 'Editar Proveedor';
                modalProveedor.show();
            });
    }

    function eliminarProveedor(id) {
        if(confirm('¿Estás seguro de eliminar este proveedor?')) {
            fetch(`${apiUrlProveedores}/${id}`, { method: 'DELETE' })
            .then(() => cargarProveedores());
        }
    }
</script>