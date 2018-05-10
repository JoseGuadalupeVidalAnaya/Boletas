M.AutoInit();
$(".dropdown-button").dropdown();
$(".dropdown-button2").dropdown();

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
});