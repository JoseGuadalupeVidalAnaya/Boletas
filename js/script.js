/**
 * Vaidar el login
 * variables del login
 */

var $num = $('#controlA');
var $pass = $('#passA');
var $enviar =$('#enviar');
var b1=false,b2=false;
/**
 * variables del sing up
 */
var $nombre = $('#nombre');
var $num2 = $('#control');
var $pass1 = $('#pass');
var $pass2 = $('#pass2');
var $crear =$('#crear');
var b3=false,b4=false;

$( document ).ready(function()
{   
    if($num.val().length==0)
    {
        $num.removeClass('valid','invalid')
    }
    else if($num.val().length!=13)
    {
        $num.removeClass('valid').addClass('invalid');
        b1=false;
    }
    else 
    {
        $num.removeClass('invalid').addClass('valid');
        b1=true;
    }
    if(b1&&b2)
    {
        $enviar.removeClass('disabled');
    }
    else
    {
        $enviar.addClass('disabled');
    }
    $pass.val("");
});

$num.on("keyup click ready",function(event)
{
    if($num.val().length!=13)
    {
        $num.removeClass('valid').addClass('invalid');
        b1=false;
    }
    else
    {
        $num.removeClass('invalid').addClass('valid');
        b1=true;
    }
    if(b1&&b2)
    {
        $enviar.removeClass('disabled');
    }
    else
    {
        $enviar.addClass('disabled');
    }
});

$pass.on("keyup click",function(event)
{
    if($pass.val().length>0)
    {
        $pass.removeClass('invalid').addClass('valid');
        b2=true;
    }
    else
    {
        $pass.removeClass('valid').addClass('invalid');
        b2=false;
    }
    if(b1 && b2)
    {
        $enviar.removeClass('disabled');
    }
    else
    {
        $enviar.addClass('disabled');
    }
});