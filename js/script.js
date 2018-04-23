/**
 * Vaidar el login
 */

var $num = $('#controlA');
var $pass = $('#passA');
var $enviar =$('#enviar');
var b1=false,b2=false;

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
    if(b1&&b2)
    {
        $enviar.removeClass('disabled');
    }
    else
    {
        $enviar.addClass('disabled');
    }
    
});