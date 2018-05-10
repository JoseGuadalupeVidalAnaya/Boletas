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

    fetch('../php/carrera.php').then(car => car.json()).then(car =>
    {
        //console.log(car);

        for (let c of car)
        {
            document.getElementById('carrera').innerHTML += `
                <option value="${c.id}">${c.nombre}</option>`;
        }
        M.AutoInit();
        $(".dropdown-button").dropdown();
        $(".dropdown-button2").dropdown();
    }).catch(function (error)
    {
        M.toast({html: 'No se pudo conectar con el servidor' + error});
    });
});