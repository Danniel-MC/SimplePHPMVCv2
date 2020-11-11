<section><h1>Mantenimiento de Clientes</h1></section>
<hr/>
<form action="index.php?page=clientes" method="post">
<section class="row">
<h2>Filtrar por</h2>
<div class="col-sm-12 col-md-10">
    <label class="col-sm-12 col-md-3" for="cln_txtfilter">Identidad | Nombre</label>
    <input type="text" name="cln_txtfilter" id="cln_txtfilter" value="{{cln_txtfilter}}"
        placeholder="Identidad | Nombre" class="col-sm-12 col-md-9"/>
</div>
<div class="col-sm-12 col-md-2">
    <button type="submit" name="btnFiltrar">Actualizar</button>
</div>
</section>
</form>
<hr/>
<section class="row">
<table class="col-sm-12">
    <thead class="zebra">
    <tr>
        <th>
            Código
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
            <a class="btn depth-1 s-margin" href="index.php?page=cliente&mode=INS&clientid=0"><span class="ion-plus-circled"></span></a>
        </th>
    </tr>
    </thead>
    <tbody>
    {{foreach clientes}}
        <tr>
        <td class="center">
            {{clienteId}}
        </td>
        <td class="center">
            {{clienteName}}
        </td>
        <td class="center">
            {{clientePhone}} 
        </td>
        <td class="center"> 
            {{clienteEmail}}
        </td>
        <td class="center">
            <a class="btn depth-1 s-margin" href="index.php?page=cliente&mode=UPD&clientid={{clienteId}}"><span class="ion-edit"></a> &nbsp;
            <a class="btn depth-1 s-margin" href="index.php?page=cliente&mode=DSP&clientid={{clienteId}}"><span class="ion-eye"></a>&nbsp;
            
        </td>
        </tr>
        {{endfor clientes}}
    </tbody>
    <tfoot>

    </tfoot>
</table>
</section>