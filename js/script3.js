/**
 * Elementos de Materialize.css
 */
$(document).ready(function ()
{
    $('.sidenav').sidenav();
    $('input#controlA, input#control').characterCounter();
});

$(document).ready(function ()
{
    let params = (new URL(document.location)).searchParams;
    let usr = params.get("usr");
    document.getElementById('usr').innerHTML = usr;

    fetch('../php/usr.php?usr=' + usr).then(usr => usr.json()).then(usr =>
    {
        document.getElementById('usr').innerHTML = usr.name;
    }).catch(function ()
    {
        M.toast({html: 'No se pudo conectar con el servidor'});
    });

    fetch('../php/boletas.php?usr=' + usr).then(boletas => boletas.json()).then(boletas =>
    {
        if (boletas.length === 0)
        {
            document.getElementById('info').innerHTML = "No hay Boletas";
            document.getElementById('boletas').innerHTML = `
                <div class="input-field col s12">
                    <button id="crear"
                        class="waves-effect waves-light btn blue-grey darken-4"
                        type="submit" name="crear">Agregar Boleta<i class="material-icons left">add</i>
                    </button>
                </div>
            `;
        }
        for (let b of boletas)
        {
            document.getElementById('boletas').innerHTML += `
                <div class="col s12 m6 l4">
                    <div class="card z-depth-5 blue-grey darken-4" id="${b.semestre}">
                        <div class="card-content white-text">
                            <span class="card-title">${b.semestre}</span>
                        </div>
                        <div class="card-action">
                            <a href="#">Ver</a>
                            <a href="#">Editar</a>
                            <a href="#">Imprimir</a>
                        </div>
                    </div>
                </div>`;
        }
    }).catch(function ()
    {
        M.toast({html: 'No se pudo conectar con el servidor'});
    });

    M.AutoInit();
    $(".dropdown-button").dropdown();
    $(".dropdown-button2").dropdown();
});