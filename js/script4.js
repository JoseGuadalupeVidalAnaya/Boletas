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
    let sem = params.get("sem");
    document.getElementById('usr').innerHTML = usr;
    document.getElementById('add').href = "addBol.html?usr=" + usr;

    fetch('../php/usr.php?usr=' + usr).then(usr => usr.json()).then(usr =>
    {
        document.getElementById('usr').innerHTML = usr.name;
    }).catch(function ()
    {
        M.toast({html: 'No se pudo conectar con el servidor'});
    });

    fetch('../php/boleta.php?usr=' + usr + "&sem=" + sem).then(bol => bol.json()).then(bol =>
    {
        console.log('../php/boleta.php?usr=' + usr + "&sem=" + sem);
        for (let b of bol)
        {
            document.getElementById('tabla').innerHTML += `
            <tr>
                <td>${b.nombre}</td>
                <td>${b.clave}</td>
                <td>${b.creditos}</td>
                <td>${b.calificacion}</td>
                <td>${b.opcion}</td>
            </tr>`;
        }
    });


    M.AutoInit();
    $(".dropdown-button").dropdown();
    $(".dropdown-button2").dropdown();
});