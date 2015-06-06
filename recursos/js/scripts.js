window.onload = function(e)
                {
                    $("#wrapper").toggleClass("toggled");
                 }

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    if ($("#btn-toggle").text() == 'MOSTRAR') 
    {
        $("#btn-toggle").text("OCULTAR");
        $("#btn-toggle").toggleClass("glyphicon glyphicon-triangle-right"," ");
        $("#btn-toggle").addClass('glyphicon glyphicon-triangle-left');
    }
    else
    {
        $("#btn-toggle").text("MOSTRAR");
        $("#btn-toggle").toggleClass("glyphicon glyphicon-triangle-left", " ");
        $("#btn-toggle").addClass('glyphicon glyphicon-triangle-right');
    };
});

$("#menu-toggle_usuario").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    if ($("#btn-toggle").text() == 'MOSTRAR') 
    {
        $("#btn-toggle").toggleClass("glyphicon glyphicon-triangle-right"," ");
        $("#btn-toggle").addClass('glyphicon glyphicon-triangle-left');
    }
    else
    {
        $("#btn-toggle").toggleClass("glyphicon glyphicon-triangle-left", " ");
        $("#btn-toggle").addClass('glyphicon glyphicon-triangle-right');
    };
});


function verConvocatorias()
{
	$.ajax
            ({
                type: "POST",
                url: "verConvocatorias",
                success: function(jso)
                        {
                            try
                            {     
                                $("#wrapper").toggleClass("toggled");
                                $("#btn-toggle").text("MOSTRAR");
                                $("#btn-toggle").toggleClass("glyphicon glyphicon-triangle-left", " ");
                                $("#btn-toggle").addClass('glyphicon glyphicon-triangle-right');
                                $("#page-content-wrapper").html(jso);                                 
                            }catch(e)
                            {
                                alert('Exception while resquest...');
                            }                       
                        },
                error:  function()
                        {
                            alert('Error while resquest..');
                        }
            });
}

function verConvInfor()
{
    $.ajax
            ({
                type: "POST",
                url: "verConvInfo",
                success: function(jso)
                        {
                            try
                            {     
                                $("#wrapper").toggleClass("toggled");
                                $("#btn-toggle").text("MOSTRAR");
                                $("#btn-toggle").toggleClass("glyphicon glyphicon-triangle-left", " ");
                                $("#btn-toggle").addClass('glyphicon glyphicon-triangle-right');
                                $("#page-content-wrapper").html(jso);
                            }catch(e)
                            {
                                alert('Exception while resquest...');
                            }                       
                        },
                error:  function()
                        {
                            alert('Error while resquest..');
                        }
            });
}

function verMisConv()
{
    $.ajax
            ({
                type: "POST",
                url: "verMisConv",
                success: function(jso)
                        {
                            try
                            {     
                                $("#wrapper").toggleClass("toggled");
                                $("#btn-toggle").text("MOSTRAR");
                                $("#btn-toggle").toggleClass("glyphicon glyphicon-triangle-left", " ");
                                $("#btn-toggle").addClass('glyphicon glyphicon-triangle-right');
                                $("#page-content-wrapper").html(jso);
                            }catch(e)
                            {
                                alert('Exception while resquest...');
                            }                       
                        },
                error:  function()
                        {
                            alert('Error while resquest..');
                        }
            });
}

function verMiHistorico()
{
    $.ajax
            ({
                type: "POST",
                url: "verMiHistorico",
                success: function(jso)
                        {
                            try
                            {     
                                $("#wrapper").toggleClass("toggled");
                                $("#btn-toggle").text("MOSTRAR");
                                $("#btn-toggle").toggleClass("glyphicon glyphicon-triangle-left", " ");
                                $("#btn-toggle").addClass('glyphicon glyphicon-triangle-right');
                                $("#page-content-wrapper").html(jso);
                            }catch(e)
                            {
                                alert('Exception while resquest...');
                            }                       
                        },
                error:  function()
                        {
                            alert('Error while resquest..');
                        }
            });
}

function verSeguimiento()
{
    $.ajax
            ({
                type: "POST",
                url: "verSeguimiento",
                success: function(jso)
                        {
                            try
                            {     
                                $("#wrapper").toggleClass("toggled");
                                $("#btn-toggle").text("MOSTRAR");
                                $("#btn-toggle").toggleClass("glyphicon glyphicon-triangle-left", " ");
                                $("#btn-toggle").addClass('glyphicon glyphicon-triangle-right');
                                $("#page-content-wrapper").html(jso);
                            }catch(e)
                            {
                                alert('Exception while resquest...');
                            }                       
                        },
                error:  function()
                        {
                            alert('Error while resquest..');
                        }
            });
}

function verDetalleCov()
{
    $.ajax
            ({
                type: "POST",
                url: "verDetalleConv",
                success: function(jso)
                        {
                            try
                            {     
                                $("#page-content-wrapper").html(jso);
                            }catch(e)
                            {
                                alert('Exception while resquest...');
                            }                       
                        },
                error:  function()
                        {
                            alert('Error while resquest..');
                        }
            });
}
