<section><h1 for="clienteName" id="clienteName" name="clienteName"> Comunicaciones Cliente: {{clienteName}}</h1>
</section>
<form action="index.php?page=comunicaciones&clienteId={{clienteId}}&clienteName={{clienteName}}" method="post">
<section class="row">
<h2>Filtrar por</h2>
<div class="col-sm-12 col-md-10">
    <label class="col-sm-12 col-md-3" for="cln_txtfilter">Id | Usuario</label>
    <input type="text" name="cln_txtfilter" id="cln_txtfilter" value="{{cmn_txtfilter}}"
        placeholder="Id | Usuario" class="col-sm-12 col-md-9"/>
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
            Fecha comunicacion
        </th>
        <th>
            Usuario
        </th>
        <th>
            Tipo
        </th>
        <th>
            <a class="btn depth-1 s-margin" href="index.php?page=comunicacion&mode=INS&cmnid=0"><span class="ion-plus-circled"></span></a>
        </th>
        
    </tr>
    </thead>
    <tbody>
        {{foreach comunicaciones}}
        <tr>
        <td class="center">
            {{cmnid}}
        </td>
        <td class="center">
            {{cmnfechaing}}
        </td>
        <td class="center">
            {{clienteId}} 
        </td>
        <td class="center"> 
            {{cmntipo}}
        </td>
        <td class="center">
            
            <a class="btn depth-1 s-margin" href="index.php?page=comunicacion&mode=DSP&ccmnid={{cmnid}}"><span class="ion-eye"></a>&nbsp;
            
        </td>
        </tr>
        {{endfor comunicaciones}}
    </tbody>
    <tfoot>

     

    </tfoot>
</table>
</section>