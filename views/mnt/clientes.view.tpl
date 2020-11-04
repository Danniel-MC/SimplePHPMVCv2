<header><h1>Mantenimiento de Cliente</h1></header>
<section>Aqui va el Formulario del Filtro</section>
<section>
    <table>
        <thead>
            <th>
                Codigo
            </th>
            <th>
                Nombre
            </th>
            <th>
                Telefono
            </th>
            <th>
                Correo
            </th>
            <th>
                Estado
            </th>
            <th>
                <a href="index.php?page=cliente&mode=INS&clienteId=0">Nuevo</a>
            </th>
            
        </thead>
        <tbody>            
            {{foreach clientes}}
                <tr>
                    <td>
                        {{clienteId}}
                    </td>
                    <td>
                        {{clienteName}}
                    </td>
                    <td>
                        {{clientePhone}}
                    </td>
                    <td>
                        {{clienteEmail}}
                    </td>
                    <td>
                        {{clientStatus}}
                    </td>
                    <td>
                        <a href="index.php?page=cliente&mode=UPD&clienteId={{clienteId}}">Editar</a><br>
                        <a href="index.php?page=cliente&mode=DSP&clienteId={{clienteId}}">Mostrar</a><br>
                    </td>
            
                </tr>
            {{endfor clientes}}
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>
</section>