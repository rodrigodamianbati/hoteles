var checked = []
$("input[name='fotos_borrar']:checked").each(function ()
{
    checked.push(parseInt($(this).val()));
});