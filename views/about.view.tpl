<h1>Ficha de Desarrollo</h1>
<section>
    <h2>Cuenta: {{cuenta}}</br> 
    Nombre: {{nombre}}</h2>
    <em><b>Correo:</b> {{correo}}</em>
</section>

<section>
    <h2>Proyectos</h2>
     <table>
        <tr>
            <td>
                Codigo
            </td>
            <td>
                Proyecto    
            </td>
            <td>
                Lugar
            </td>
            <td>
                Año
            </td>
        </tr>
        {{foreach proyectos}}
        <tr>
            <td>
                {{id}}
            </td>
            <td>
                {{name}} 
            </td>
            <td>
                {{location}} 
            </td>
            <td>
                {{year}} 
            </td>
        </tr>
        {{endfor proyectos}}
     </table>
</section>
