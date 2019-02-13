////VALIDAR CAMPO TEXTO
function validarCampoInput(campo,regexp,obligatorioFlag)
{   
    //alert(nameCampo);
    //alert(regexp);
    var valorCampo=campo.value;
    var Jcampo = $(campo);
    var regexpAux = new RegExp(regexp,'i');
    
    if(obligatorioFlag==1 || (valorCampo!=null &&  valorCampo.length != 0))
    {    
        if( valorCampo == null || valorCampo.length == 0 || /^\s+$/.test(valorCampo) )
        {   
            //alert(valorCampo);
            //alert('debe Ingresar un caracter valido');
            $("#iconoTexto").remove();
            Jcampo.parent().parent().attr("class","form-group has-error has-feedback");
            Jcampo.parent().children("span").text("Debe Ingresar Algun Caracter").show();
            Jcampo.parent().append("<span id='iconoTexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            return false;
        }
        else if(regexpAux.test(valorCampo))
        {
            //alert("el campo esta validado");
            $("#iconoTexto").remove();
            Jcampo.parent().parent().attr("class","form-group has-success has-feedback");
            Jcampo.parent().children("span").text("").hide();
            Jcampo.parent().append("<span id='iconoTexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
            return true;
        }
        else
        {
            $("#iconoTexto").remove();
            Jcampo.parent().parent().attr("class","form-group has-error has-feedback");
            Jcampo.parent().children("span").text("No cumple con el formato").show();
            Jcampo.parent().append("<span id='iconoTexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            return false;   
        }
    }
    else
    {
        $("#iconoTexto").remove();
        Jcampo.parent().parent().attr("class","form-group has-success has-feedback");
        Jcampo.parent().children("span").text("").hide();
        Jcampo.parent().append("<span id='iconoTexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
        return true;
    }   
    
}
//VALIDAR CAMPO TIPO SELECT 
function validarCampoSelect(campo,obligatorioFlag)
{   
    //alert(campo);
    var valorCampo=campo.value;
    var Jcampo = $(campo);
    if(obligatorioFlag==1 || (valorCampo!=null &&  valorCampo.length != 0))
    {
        if( valorCampo == 0 )
        {   
            //alert('debe Ingresar un caracter valido');
            $("#iconoTexto").remove();
            Jcampo.parent().parent().attr("class","form-group has-error has-feedback");
            Jcampo.parent().children("span").text("Debe Selecionar un campo valido").show();
            Jcampo.parent().append("<span id='iconoTexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            return false;
        }
        else 
        {
            //alert("el campo esta validado");
            $("#iconoTexto").remove();
            Jcampo.parent().parent().attr("class","form-group has-success has-feedback");
            Jcampo.parent().children("span").text("").hide();
            Jcampo.parent().append("<span id='iconoTexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
            return true;
        }
    }
    else
    {
        $("#iconoTexto").remove();
        Jcampo.parent().parent().attr("class","form-group has-success has-feedback");
        Jcampo.parent().children("span").text("").hide();
        Jcampo.parent().append("<span id='iconoTexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
        return true;   
    }    
}