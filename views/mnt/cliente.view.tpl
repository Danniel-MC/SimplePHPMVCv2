<h1>{{modedsc}}</h1>
<section>
    <form method="POST" action="index.php?page=cliente&mode={{mode}}&clienteId={{clienteId}}">
        <input type="hidden" name="mode" value="{{mode}}">
        <input type="hidden" name="clienteId" value="{{clienteId}}">
        <input type="hidden" name="xsstoken" value="{{xsstoken}}">
        <div>
            <label for="clienteName">Nombre del Cliente</label>
            <input {{readonly}} type="text" name="clienteName" id="clienteName" value="{{clienteName}}" placeholder="Nombre del cliente">       
        </div>

        <div>
            <label for="clienteGenero">Genero</label>
            <select   name="clienteGenero" id="clienteGenero" {{readonly}} >   
                <option value="FEM" {{clienteGenero_FEM}}>Femenino</option>
                <option value="MAS" {{clienteGenero_MAS}}>Masculino</option>
            </select>    
        </div>
        <div>
            <label for="clientePhone">Telefono</label>
            <input {{readonly}} type="text" name="clientePhone" id="clientePhone" value="{{clientePhone}}" placeholder="Telefono">       
        </div>

        <div>
            <label for="clienteEmail">Correo Electronico</label>
            <input {{readOnly}} type="text" name="clienteEmail" id="clienteEmail" value="{{clienteEmail}}" placeholder="Correo">       
        </div>

        <div>
            <label for="clienteIdNumber">Numero Identificacion</label>
            <input {{readonly}} type="text" name="clienteIdNumber" id="clienteIdNumber" value="{{clienteIdNumber}}" placeholder="Numero Identificacion">       
        </div>

        <div>
            <label for="clienteBio">Biografia</label>
            <input {{readonly}} type="text"  name="clienteBio" id="clienteBio" value="{{clienteBio}}" placeholder="Biografia resumen">       
        </div>

        <div>
            <label for="clientStatus">Estado</label>
            <select name="clientStatus" id="clientStatus" {{readonly}} >
                <option value="ACT" {{clienteStatus_ACT}}>Activo</option>
                <option value="INA" {{clienteStatus_INA}}>Inactivo</option>
            </select>         
        </div>
        <div>
            <label for="catecod">Categoria</label>
            <select name="catecod" id="catecod" {{readonly}}>
                {{foreach catecod_cmb}}
                    <option value="{{catecod}}" {{selected}}>{{catenom}}</option>
                {{endfor catecod_cmb}}
            </select>                  
        </div>
        <button id="btnsubmit" type="submit" name="btnsubmit">Enviar</button>
        <button id="btncancel">Cancelar</button>
    </form>
</section>
<script>
    $().ready(function(){
        $("#btncancel").click(function(e){
            e.preventDefault();
            e.stopPropagation();
            location.assign("index.php?page=clientes");
        });

    });
</script>