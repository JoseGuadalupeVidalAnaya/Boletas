/**
 * Elementos de Materialize.css
 */
M.AutoInit();
$(".dropdown-button").dropdown();
$(".dropdown-button2").dropdown();

$(document).ready(function ()
{
    $('.sidenav').sidenav();
    $('input#controlA, input#control').characterCounter();
});

/**
 * Validaciones
 * @type {*|jQuery|HTMLElement}
 */
var $num = $('#controlA');
var $pass = $('#passA');
var $enviar = $('#enviar');

$num.on("keypress paste", function (event)
{
    if (this.value.length >= this.maxLength)
        event.preventDefault();
});

$num.on("blur", function ()
{
    if ($num.val().length != 13)
        $num.removeClass('valid').addClass('invalid');
});

$num.on("keyup click ready", function (event)
{
    if ($num.val().length == 13)
        $num.removeClass('invalid').addClass('valid');
    else
        $num.removeClass('valid').removeClass('invalid');
    if ($num.hasClass('valid') && $pass.hasClass('valid'))
        $enviar.removeClass('disabled');
    else
        $enviar.addClass('disabled');
});

$pass.on("keyup click ready", function (event)
{
    if ($pass.val().length > 0)
        $pass.addClass('valid').removeClass('invalid');
    else
        $pass.removeClass('valid').removeClass('invalid');
    if ($num.hasClass('valid') && $pass.hasClass('valid'))
        $enviar.removeClass('disabled');
    else
        $enviar.addClass('disabled');
});

$pass.on("blur", function ()
{
    if ($pass.val().length <= 0)
        $pass.addClass('invalid').removeClass('valid');
});

$enviar.click(function ()
{
    var x = $pass.val(), y = $num.val();
    console.log('php/conexion.php?passA=' + x + '&controlA=' + y);
    fetch('php/conexion.php?passA=' + x + '&controlA=' + y)
        .then(usr => usr.json()).then(usr =>
    {
        console.log(usr.res);
        if (usr.res)
        {
            M.toast({html: 'El Numero de Control o Contraceña Inocrrectos'});
        }
        else
            location.href = 'php/carrera.html';
    });
});