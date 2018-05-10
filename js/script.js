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
    activarEnv();
});

$pass.on("keyup click ready", function (event)
{
    if ($pass.val().length > 0)
        $pass.addClass('valid').removeClass('invalid');
    else
        $pass.removeClass('valid').removeClass('invalid');
    activarEnv();
});

$pass.on("blur", function ()
{
    if ($pass.val().length <= 0)
        $pass.addClass('invalid').removeClass('valid');
});

function activarEnv()
{
    if ($num.hasClass('valid') && $pass.hasClass('valid'))
        $enviar.removeClass('disabled');
    else
        $enviar.addClass('disabled');
}

/**
 * Enviar datos y recibir respruesta
 */
$enviar.click(function ()
{
    var x = $pass.val(), y = $num.val();
    fetch('php/sesion.php?passA=' + x + '&controlA=' + y)
        .then(usr => usr.json()).then(usr =>
    {
        if (usr.res)
            M.toast({html: 'El Numero de Control o Contraceña Inocrrectos'});
        else
            location.href = 'php/inicio.php?control=' + y;
    })
        .catch(function ()
        {
            M.toast({html: 'No se pudo conectar con el servidor'});
        });
});

/**
 * Validar el registro
 */

var $nombre = $('#nombre');
var $apellido = $('#apellido');
var $control = $('#control');
var $pass1 = $('#pass');
var $pass2 = $('#pass2');
var $crear = $('#crear');

$nombre.on("keyup click ready", function (event)
{
    if ($nombre.val().length > 0)
        $nombre.addClass('valid').removeClass('invalid');
    else
        $nombre.removeClass('valid').removeClass('invalid');
    activarCrear();
});

$nombre.on("blur", function ()
{
    if ($nombre.val().length <= 0)
        $nombre.addClass('invalid').removeClass('valid');
});

$apellido.on("keyup click ready", function (event)
{
    if ($apellido.val().length > 0)
        $apellido.addClass('valid').removeClass('invalid');
    else
        $apellido.removeClass('valid').removeClass('invalid');
    activarCrear();
});

$apellido.on("blur", function ()
{
    if ($apellido.val().length <= 0)
        $apellido.addClass('invalid').removeClass('valid');
});

$control.on("keypress paste", function (event)
{
    if (this.value.length >= this.maxLength)
        event.preventDefault();
});

$control.on("blur", function ()
{
    if ($control.val().length != 13)
        $control.removeClass('valid').addClass('invalid');
});

$control.on("keyup click ready", function (event)
{
    if ($control.val().length == 13)
        $control.removeClass('invalid').addClass('valid');
    else
        $control.removeClass('valid').removeClass('invalid');
    activarCrear();
});

$pass1.on("keyup click ready", function (event)
{
    if ($pass1.val().length > 0)
        $pass1.addClass('valid').removeClass('invalid');
    else
        $pass1.removeClass('valid').removeClass('invalid');
    if ($pass1.val() != $pass2.val() && $pass2.val() > 0)
        $pass2.addClass('invalid').removeClass('valid');
    activarCrear();
});

$pass1.on("blur", function ()
{
    if ($pass1.val().length <= 0)
        $pass1.addClass('invalid').removeClass('valid');
});

$pass2.on("keyup click ready", function (event)
{
    if ($pass2.val().length > 0 && $pass1.val() == $pass2.val())
        $pass2.addClass('valid').removeClass('invalid');
    else
        $pass2.removeClass('valid').removeClass('invalid');
    activarCrear();
});

$pass2.on("blur", function ()
{
    if ($pass2.val().length <= 0 || $pass1.val() != $pass2.val())
        $pass2.addClass('invalid').removeClass('valid');
});

function activarCrear()
{
    if ($nombre.hasClass('valid') && $apellido.hasClass('valid') && $pass1.hasClass('valid') && $pass2.hasClass('valid') && $control.hasClass('valid'))
        $crear.removeClass('disabled');
    else
        $crear.addClass('disabled');
}

$crear.click(function ()
{
    var w = $nombre.val(), x = $apellido.val(), y = $pass1.val(), z = $control.val();
    fetch('php/crearAl.php?nombre=' + w + '&apellido=' + x + '&pass=' + y + '&num=' + z)
        .then(resp => resp.json()).then(resp =>
    {
        if (resp.res == 1)
        {
            M.toast({html: 'Usuario Creado'});
            $('.tabs').tabs('select', 'acceder');
            $num.val(z);
            $pass.val('');
        }

        else
            M.toast({html: 'El Usuario ya Existe'});
    })
        .catch(function ()
        {
            M.toast({html: 'No se pudo conectar con el servidor'});
        });
});