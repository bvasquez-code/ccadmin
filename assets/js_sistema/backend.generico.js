function GetActionJquery(p_Request = [], p_ServiceURL) {

    return $.ajax({
        type: "POST",
        url: p_ServiceURL,
        data: JSON.stringify(p_Request),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        // success: successFunc,
    });

}

function SetActionJquery(p_Request = [], p_ServiceURL) {

    return $.ajax({
        type: "POST",
        url: p_ServiceURL,
        data: JSON.stringify(p_Request),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        // success: successFunc,
    });

}

function CargarTablaGenerica_DataTable(p_Tabla = '', p_Datos = [], p_FlgResponsivo = true,p_Busqueda = false) 
{

    var tds = '';
    var colmd = 12;
    var table = $('#' + p_Tabla).DataTable();
    table.destroy();

    $('#' + p_Tabla + ' tbody').empty();

    for (var i = 0; i < p_Datos.length; i++) {

        tds += '<tr class="odd gradeX">';
        colmd = 12;
        for (var j = 0; j < p_Datos[i].length; j++) {

            if (Array.isArray(p_Datos[i][j])) {

                var ArrayOpciones = p_Datos[i][j];
                colmd = colmd / ArrayOpciones.length;

                tds += '<td align="left"><div class="col-sm-12">';
                for (var x = 0; x < ArrayOpciones.length; x++) {

                    if (ArrayOpciones[x][0] == 'ver') {
                        tds += '<div class="col-sm-' + colmd + '"><a class="btn-ver" id="' + ArrayOpciones[x][1] + '" title="VER"><i style="cursor:pointer;" class="fa fa-2x fa-search-plus"></i></a></div>';
                    }
                    if (ArrayOpciones[x][0] == 'editar') {
                        tds += '<div class="col-sm-' + colmd + '"><a class="btn-editar" id="' + ArrayOpciones[x][1] + '" title="EDITAR"><i style="cursor:pointer;" class="fa fa-2x fa-pencil"></i></a></div>';
                    }
                    if (ArrayOpciones[x][0] == 'borrar') {
                        tds += '<div class="col-sm-' + colmd + '"><a class="btn-eliminar" id="' + ArrayOpciones[x][1] + '" title="ELIMINAR"><i style="cursor:pointer;" class="fa fa-2x fa-trash-o"></i></a></div>';
                    }
                    if (ArrayOpciones[x][0] == 'accion') {
                        tds += '<div class="col-sm-' + colmd + '"><a class="btn-' + ArrayOpciones[x][2] + '" id="' + ArrayOpciones[x][1] + '" ><i style="cursor:pointer;" class="fa fa-2x fa-cogs"></i></a></div>';
                    }
                    if (ArrayOpciones[x][0] == 'actualizar') {
                        tds += '<div class="col-sm-' + colmd + '"><a class="btn-actualizar" id="' + ArrayOpciones[x][1] + '" title="ACTUALIZAR"><i style="cursor:pointer;" class="fa fa-2x fa-refresh"></i></a></div>';
                    }
                    if (ArrayOpciones[x][0] == 'aceptar') {
                        tds += '<div class="col-sm-' + colmd + '"><a class="btn-aceptar" id="' + ArrayOpciones[x][1] + '" title="ACTUALIZAR"><i style="cursor:pointer;" class="fa fa-2x fa-check"></i></a></div>';
                    }

                }
                tds += '</div></td>';

            } else {
                tds += '<td align="left">' + p_Datos[i][j] + '</td>';
            }
        }
        tds += '</tr>';
    }

    $('#' + p_Tabla).append(tds);
    if (p_FlgResponsivo) {
        $('#' + p_Tabla).DataTable({
            // 'responsive': true,
            'destroy': true,
            'lengthChange': false,
            'searching': p_Busqueda,
            'ordering': true,
            'info': false,
            // 'autoWidth': true,
            'scrollX': true,
            'paging': false

        });
    }

}

function CargarTablaGenerica(p_Tabla = '', p_Datos = [], p_FlgResponsivo = true,p_Busqueda = false) 
{

    var tds = '';
 
    $('#' + p_Tabla + ' tbody').empty();

    for (var i = 0; i < p_Datos.length; i++) {

        tds += '<tr class="odd gradeX">';

        for (var j = 0; j < p_Datos[i].length; j++) {
            tds += '<td align="left">' + p_Datos[i][j] + '</td>';
        }

        tds += '</tr>';
    }

    $('#' + p_Tabla).append(tds);

}

function CargarTablaGenericaJSON(p_Tabla = '', p_Datos = [], p_FlgResponsivo = true) {

    var tds = '';
    var colmd = 12;
    var table = $('#' + p_Tabla).DataTable();
    table.destroy();

    $('#' + p_Tabla + ' tbody').empty();

    for (var i = 0; i < p_Datos.length; i++) {

        tds += '<tr class="odd gradeX">';
        colmd = 12;
        for (var j = 0; j < p_Datos[i].length; j++) {

            if (Array.isArray(p_Datos[i][j])) {

                var ArrayOpciones = p_Datos[i][j];
                colmd = colmd / ArrayOpciones.length;

                tds += '<td align="left"><div class="col-sm-12">';
                for (var x = 0; x < ArrayOpciones.length; x++) {

                    if (ArrayOpciones[x][0] == 'ver') {
                        tds += '<div class="col-sm-' + colmd + '"><a class="btn-ver" id="' + ArrayOpciones[x][1] + '" title="VER"><i style="cursor:pointer;" class="fa fa-2x fa-search-plus"></i></a></div>';
                    }
                    if (ArrayOpciones[x][0] == 'editar') {
                        tds += '<div class="col-sm-' + colmd + '"><a class="btn-editar" id="' + ArrayOpciones[x][1] + '" title="EDITAR"><i style="cursor:pointer;" class="fa fa-2x fa-pencil"></i></a></div>';
                    }
                    if (ArrayOpciones[x][0] == 'borrar') {
                        tds += '<div class="col-sm-' + colmd + '"><a class="btn-eliminar" id="' + ArrayOpciones[x][1] + '" title="ELIMINAR"><i style="cursor:pointer;" class="fa fa-2x fa-trash-o"></i></a></div>';
                    }
                    if (ArrayOpciones[x][0] == 'accion') {
                        tds += '<div class="col-sm-' + colmd + '"><a class="btn-' + ArrayOpciones[x][2] + '" id="' + ArrayOpciones[x][1] + '" ><i style="cursor:pointer;" class="fa fa-2x fa-cogs"></i></a></div>';
                    }
                    if (ArrayOpciones[x][0] == 'actualizar') {
                        tds += '<div class="col-sm-' + colmd + '"><a class="btn-actualizar" id="' + ArrayOpciones[x][1] + '" title="ACTUALIZAR"><i style="cursor:pointer;" class="fa fa-2x fa-refresh"></i></a></div>';
                    }
                    if (ArrayOpciones[x][0] == 'aceptar') {
                        tds += '<div class="col-sm-' + colmd + '"><a class="btn-aceptar" id="' + ArrayOpciones[x][1] + '" title="ACTUALIZAR"><i style="cursor:pointer;" class="fa fa-2x fa-check"></i></a></div>';
                    }

                }
                tds += '</div></td>';

            } else {
                tds += '<td align="left">' + p_Datos[i][j] + '</td>';
            }
        }
        tds += '</tr>';
    }

    $('#' + p_Tabla).append(tds);
    if (p_FlgResponsivo) {
        $('#' + p_Tabla).DataTable({
            'responsive': true,
            'destroy': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': false,
            'autoWidth': true,
            'scrollX': true,
            'paging': false

        });
    }

}

function CargarInfoTabla(p_Id_divInfo="",p_Num_RegistroIni=0,p_Num_RegistroFin=0,p_Num_TotalBus=0)
{
    $("#"+p_Id_divInfo).html("Mostrando del "+Number(p_Num_RegistroIni+1)+" al "+p_Num_RegistroFin+" de "+p_Num_TotalBus+" registros");
}

function Object_ToLista(p_Cabaceras=[],p_DataJason=[])
{
    var l_Lista = []; //Lista Tabla
    var l_Row = []; // Fila
    var l_OptionRow = [];
    var l_Btn = [];

    $.each(p_DataJason, function (i, value) {
        
        for(var i = 0 ; i<p_Cabaceras.length;i++)
        {
            if(Array.isArray(p_Cabaceras[i]) || (typeof p_Cabaceras[i] === 'object'))
            {
                var l_Opciones = p_Cabaceras[i];
                
                l_Row.push(l_Opciones.BtnOpciones);
            }
            else
            {
                l_Row.push(value[p_Cabaceras[i]]); 
            }
            
        }
        l_Lista.push(l_Row);
        l_Row = [];

    });

    return l_Lista;
}

function CargarComboBoxGenerico(p_NomSelect = '', p_ValueSelectDefecto = '', p_Datos = [], p_IdSelected = null) {

    $('#' + p_NomSelect).empty();

    if(p_ValueSelectDefecto!="") $('#' + p_NomSelect).append("<option value='0'>" + p_ValueSelectDefecto + "</option>");

    for (var i = 0; i < p_Datos.length; i++) {        

        $('#' + p_NomSelect).append("<option value=" + p_Datos[i][0] + ">" + p_Datos[i][1] + "</option>");

    }
    if(p_IdSelected!=null) $('#' + p_NomSelect).val(p_IdSelected);

}

function CrearComboBoxGenerico(p_Datos=[],p_class="lst-opciones",p_Id1="0",p_Id2="0",p_Name="0")
{
    l_ComboBoxHtml = "";

    l_ComboBoxHtml = '<select style="width: 100%;" class="form-control '+p_class+'" id="'+p_Id1+'" id2="'+p_Id2+'" name="'+p_Name+'" data-style="btn-primary" data-live-search="true">';
    for (var i = 0; i < p_Datos.length; i++) {
        l_ComboBoxHtml += '<option value="'+p_Datos[i][0]+'">'+p_Datos[i][1]+'</option>';
    }

    l_ComboBoxHtml += '</select>';

    return l_ComboBoxHtml;

}


function Crear_Modal_Generico(NomForm = '', ArrayTxt = []) {

    var html = '';
    var html = "";
    var btn = "";
    var contador = 0;
    var id = "";
    var Stringhtml = "";

    Stringhtml += '<div class="panel-body panel-form">';
    Stringhtml += '<form id="' + NomForm + '" class="form-horizontal form-bordered">';
    Stringhtml += '<div class="panel-body">';

    Stringhtml += '<div id="div-Id"></div>';

    for (var i = 0; i < ArrayTxt.length; i++) {

        var colums = ArrayTxt[i].length;
        var colmd = 12 / colums;

        Stringhtml += '<div class="row" id="div-' + NomForm + '-' + i + '">';

        for (var j = 0; j < ArrayTxt[i].length; j++) {

            if (ArrayTxt[i][j].length == 0) {
                Stringhtml += '<div class="col-md-' + colmd + '">';
                Stringhtml += '</div>';
            }
            if (ArrayTxt[i][j][1] == 'number') {

                Stringhtml += '<div class="col-md-' + colmd + '">';
                Stringhtml += '<div class="form-group">';
                Stringhtml += '<label class="control-label col-md-4">' + ArrayTxt[i][j][0] + ' :</label>';
                Stringhtml += '<div class="col-md-8">';
                Stringhtml += '<div class="col-md-12">';
                Stringhtml += '<input type="number" class="form-control class-text trc-text"  name="txt-' + ArrayTxt[i][j][2] + '" id="txt-' + ArrayTxt[i][j][2] + '"/>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';

            }
            if (ArrayTxt[i][j][1] == 'text') {

                Stringhtml += '<div class="col-md-' + colmd + '">';
                Stringhtml += '<div class="form-group">';
                Stringhtml += '<label class="control-label col-md-4">' + ArrayTxt[i][j][0] + ' :</label>';
                Stringhtml += '<div class="col-md-8">';
                Stringhtml += '<div class="col-md-12">';
                Stringhtml += '<input type="text" class="form-control class-text trc-text"  name="txt-' + ArrayTxt[i][j][2] + '" id="txt-' + ArrayTxt[i][j][2] + '"/>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';

            }
            if (ArrayTxt[i][j][1] == 'file') {

                Stringhtml += '<div class="col-md-' + colmd + '">';
                Stringhtml += '<div class="form-group">';
                Stringhtml += '<label class="control-label col-md-4">' + ArrayTxt[i][j][0] + ' :</label>';
                Stringhtml += '<div class="col-md-8">';
                Stringhtml += '<div class="col-md-12">';
                Stringhtml += '<input type="file" class="form-control class-text"  name="file-' + ArrayTxt[i][j][2] + '" id="file-' + ArrayTxt[i][j][2] + '"/>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';

            }

            if (ArrayTxt[i][j][1] == 'password') {

                Stringhtml += '<div class="col-md-' + colmd + '">';
                Stringhtml += '<div class="form-group">';
                Stringhtml += '<label class="control-label col-md-4">' + ArrayTxt[i][j][0] + ' :</label>';
                Stringhtml += '<div class="col-md-8">';
                Stringhtml += '<div class="col-md-12">';
                Stringhtml += '<input type="password" class="form-control"  name="txt-' + ArrayTxt[i][j][2] + '" id="txt-' + ArrayTxt[i][j][2] + '"/>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';

            }

            if (ArrayTxt[i][j][1] == 'select') {

                Stringhtml += '<div class="col-md-' + colmd + '">';
                Stringhtml += '<div class="form-group">';
                Stringhtml += '<label class="control-label col-md-4">' + ArrayTxt[i][j][0] + ' :</label>';
                Stringhtml += '<div class="col-md-8">';
                Stringhtml += '<div class="col-md-12">';
                Stringhtml += '<select class="form-control selectpicker trc-select" id="lst-' + ArrayTxt[i][j][2] + '" name="lst-' + ArrayTxt[i][j][2] + '" data-size="10" data-style="btn-primary" data-live-search="true">';
                Stringhtml += '</select>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
            }

            if (ArrayTxt[i][j][1] == 'checkbox') {

                Stringhtml += '<div class="col-md-' + colmd + '">';
                Stringhtml += '<div class="form-group">';
                Stringhtml += '<label class="control-label col-md-4">' + ArrayTxt[i][j][0] + ' :</label>';
                Stringhtml += '<div class="col-md-8">';
                Stringhtml += '<div class="col-md-12">';
                Stringhtml += '<input class="class-chk" type="checkbox" value="' + ArrayTxt[i][j][2] + '" name="chk-' + ArrayTxt[i][j][2] + '" id="chk-' + ArrayTxt[i][j][2] + '"/>';
                Stringhtml += '</select>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
            }
            if (ArrayTxt[i][j][1] == 'panel') {

                contador = contador + 1;

                if (ArrayTxt[i][j][5]) {

                    if (ArrayTxt[i][j][4] == 'radio') {

                        html += '<div class="col-md-' + colmd + '">';
                        html += '<div class="form-group">';
                        html += '<label class="control-label col-md-4">INVENTARIADO :</label>';
                        html += '<div class="col-md-8">';
                        html += '<div class="col-md-12">';
                        html += '<label class="radio-inline"><input type="radio" value="' + ArrayTxt[i][j][0] + '" name="radio-' + ArrayTxt[i][j][3] + "SI" + '" id="radio-' + ArrayTxt[i][j][3] + '" />' + ' &nbsp; ' + ArrayTxt[i][j][0] + '</label >';
                        html += ' &nbsp; &nbsp; &nbsp;';
                        html += '<label class="radio-inline"><input type="radio" value="' + ArrayTxt[i][j][2] + '" name="radio-' + ArrayTxt[i][j][3] + "NO" + '" id="radio-' + ArrayTxt[i][j][3] + '" />' + ' &nbsp; ' + ArrayTxt[i][j][2] + '</label >';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';

                    }

                    if (ArrayTxt[i][j][3] == 'time') {

                        html += '<div class="col-md-' + colmd + '">';
                        html += '<div class="form-group">';
                        html += '<label class="control-label col-md-4">' + ArrayTxt[i][j][0] + ' :</label>';
                        html += '<div class="col-md-8">';
                        html += '<div class="col-md-12">';
                        html += '<input type="time" class="form-control class-text trc-text"  name="txt-' + ArrayTxt[i][j][2] + '" id="txt-' + ArrayTxt[i][j][2] + '"/>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';

                    }

                    if (ArrayTxt[i][j][3] == 'number') {

                        html += '<div class="col-md-' + colmd + '">';
                        html += '<div class="form-group">';
                        html += '<label class="control-label col-md-4">' + ArrayTxt[i][j][0] + ' :</label>';
                        html += '<div class="col-md-8">';
                        html += '<div class="col-md-12">';
                        html += '<input type="number" class="form-control class-text trc-text"  name="txt-' + ArrayTxt[i][j][2] + '" id="txt-' + ArrayTxt[i][j][2] + '"/>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';

                    }

                    if (ArrayTxt[i][j][3] == 'select1') {

                        html += '<div class="col-md-' + colmd + '">';
                        html += '<div class="form-group">';
                        html += '<label class="control-label col-md-4">' + ArrayTxt[i][j][0] + ' :</label>';
                        html += '<div class="col-md-8">';
                        html += '<div class="col-md-12">';
                        html += '<select class="form-control selectpicker trc-select" id="lst-' + ArrayTxt[i][j][2] + '" name="lst-' + ArrayTxt[i][j][2] + '" data-size="10" data-style="btn-primary" data-live-search="true">';
                        html += '</select>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';

                    }

                    if (ArrayTxt[i][j][3] == 'text') {

                        html += '<div class="col-md-' + colmd + '">';
                        html += '<div class="form-group">';
                        html += '<label class="control-label col-md-4">' + ArrayTxt[i][j][0] + ' :</label>';
                        html += '<div class="col-md-8">';
                        html += '<div class="col-md-12">';
                        html += '<input type="text" class="form-control class-text trc-text"  name="txt-' + ArrayTxt[i][j][2] + '" id="txt-' + ArrayTxt[i][j][2] + '"/>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';

                    }

                    if (ArrayTxt[i][j][3] == 'text1') {

                        html += '<div class="col-md-12">';
                        html += '<div class="form-group">';
                        html += '<label class="control-label col-md-2">' + ArrayTxt[i][j][0] + ' :</label>';
                        html += '<div class="col-md-9">';
                        html += '<div class="col-md-12">';
                        html += '<input type="text" class="form-control class-text trc-text"  name="txt-' + ArrayTxt[i][j][2] + '" id="txt-' + ArrayTxt[i][j][2] + '"/>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';

                    }

                    if (ArrayTxt[i][j][3] == 'textarea') {

                        html += '<div class="col-md- 12">';
                        html += '<div class="form-group">';
                        html += '<label class="control-label col-md-2">' + ArrayTxt[i][j][0] + ' :</label>';
                        html += '<div class="col-md-9" style="padding-left: 25px !important;">';
                        html += '<div class="col-md-12">';
                        html += '<textarea rows="4" cols="50" class="form-control class-text trc-text"  name="txtarea-' + ArrayTxt[i][j][2] + '" id="txtarea-' + ArrayTxt[i][j][2] + '" style="width: 98%"/></textarea>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';

                    }

                    if (ArrayTxt[i][j][3] == 'textarea1') {

                        html += '<div class="col-md- 12">';
                        html += '<div class="form-group">';
                        html += '<label class="control-label col-md-2">' + ArrayTxt[i][j][0] + ' :</label>';
                        html += '<div class="col-md-10" style="padding-left: 25px !important;">';
                        html += '<div class="col-md-12">';
                        html += '<textarea rows="4" cols="50" class="form-control class-text trc-text"  name="txtarea-' + ArrayTxt[i][j][2] + '" id="txtarea-' + ArrayTxt[i][j][2] + '" style="width: 98%"/></textarea>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';

                    }

                    if (ArrayTxt[i][j][3] == 'text2') {

                        html += '<div class="col-md-' + colmd + '  div-' + ArrayTxt[i][j][1] + '"  style="display:none">';
                        html += '<div class="form-group">';
                        html += '<label class="control-label col-md-3">' + ArrayTxt[i][j][0] + ' :</label>';
                        html += '<div class="col-md-6">';
                        html += '<div class="col-md-12">';
                        html += '<input type="text" class="form-control class-text trc-text"  name="txt-' + ArrayTxt[i][j][2] + '" id="txt-' + ArrayTxt[i][j][2] + '"/>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';

                    }

                    if (ArrayTxt[i][j][4] == 'button2') {

                        html += '<div class="col-md-' + colmd + '" style="text-align: right;">';
                        html += '<div class="form-group">';
                        if (ArrayTxt[i][j][0] == "") {
                            html += '<label class="control-label col-md-4"></label>';
                        } else {
                            html += '<label class="control-label col-md-4">' + ArrayTxt[i][j][0] + ' :</label>';
                        }
                        html += '<div class="col-md-8">';
                        html += '<div class="col-md-12">';
                        html += '<a class="btn btn-block btn-info btn-sm" id="btn-' + ArrayTxt[i][j][2] + '">';
                        html += '+ ' + ArrayTxt[i][j][3] + '';
                        html += '</a>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    }

                    if (ArrayTxt[i][j][3] == 'span') {

                        html += '<div class="col-md-' + colmd + '">';
                        html += '<div class="form-group">';
                        html += '<span class="badge badge-pill badge-light">' + ArrayTxt[i][j][0] + ' :</span>';
                        html += '</div>';
                        html += '</div>';

                    }

                    if (ArrayTxt[i][j][3] == 'checkbox') {

                        html += '<div class="col-md-' + colmd + '">';
                        html += '<div class="form-group">';
                        html += '<label class="control-label col-md-4">' + ArrayTxt[i][j][0] + ' :</label>';
                        html += '<div class="col-md-8">';
                        html += '<div class="col-md-12">';
                        html += '<input class="class-chk-' + ArrayTxt[i][j][0] + '" type="checkbox" value="' + ArrayTxt[i][j][2] + '" name="chk-' + ArrayTxt[i][j][2] + '" id="chk-' + ArrayTxt[i][j][2] + '"/>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    }

                    if (ArrayTxt[i][j][3] == 'table') {

                        html += '<div class="col-md-' + colmd + '">';
                        html += '<div class="form-group">';
                        html += '<table id="tbl-' + ArrayTxt[i][j][2] + '" class="table table-bordered table-striped"></table>'
                        html += '</div>';
                        html += '</div>';
                    }

                    if (ArrayTxt[i][j][3] == 'button') {

                        html += '<div class="col-md-' + colmd + '" style="text-align: right;">';
                        html += '<div class="form-group">';
                        html += '<div class="col-md-12">';
                        html += '<div class="col-md-12">';
                        html += '<button data-bb-handler="ok" type="button" class="btn btn-primary" id="btn-' + ArrayTxt[i][j][2] + '"><i class="ace-icon fa fa-pencil"></i> ' + ArrayTxt[i][j][0] + '</button>'
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    }

                    if (ArrayTxt[i][j][3] == 'date') {

                        html += '<div class="col-md-' + colmd + '">';
                        html += '<div class="form-group">';
                        html += '<label class="control-label col-md-4">' + ArrayTxt[i][j][0] + ' :</label>';
                        html += '<div class="col-md-8">';
                        html += '<div class="col-md-12">';
                        html += '<input type="date" class="form-control class-text"  name="txt-' + ArrayTxt[i][j][2] + '" id="txt-' + ArrayTxt[i][j][2] + '"/>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    }


                    if (ArrayTxt[i][j][3] == 'select') {

                        html += '<div class="col-md-' + colmd + '" style="padding:0px">';
                        html += '<div class="form-group">';
                        html += '<label class="control-label col-md-3">' + ArrayTxt[i][j][0] + ' :</label>';
                        html += '<div class="col-md-8">';
                        html += '<div class="col-md-12">';
                        html += '<select class="form-control selectpicker trc-select" id="lst-' + ArrayTxt[i][j][2] + '" name="lst-' + ArrayTxt[i][j][2] + '" data-size="10" data-style="btn-primary" data-live-search="true">';
                        html += '</select>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';

                        html += '<div class="col-md-' + colmd + '" style="opacity:0.0">';
                        html += '<div class="form-group">';
                        html += '<label class="control-label col-md-4">' + ArrayTxt[i][j][0] + ' :</label>';
                        html += '<div class="col-md-8">';
                        html += '<div class="col-md-12">';
                        html += '<select class="form-control selectpicker trc-select" id="lst-' + ArrayTxt[i][j][2] + '" name="lst-' + ArrayTxt[i][j][2] + '" data-size="10" data-style="btn-primary" data-live-search="true">';
                        html += '</select>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';


                    }

                } else {
                    id = ArrayTxt[i][j][2];
                    btn = '<a data-toggle="collapse" data-parent="#accordion" href="#' + id + '">' + ArrayTxt[i][j][0] + '</a>';
                }

                if (contador == Number(ArrayTxt[i][j][5])) {
                    Stringhtml += '<div class="panel-group" id="accordion">';
                    Stringhtml += '<div class="panel panel-default">';
                    Stringhtml += '<div class="panel-heading">';
                    Stringhtml += '<h4 class="panel-title"></h4>';
                    Stringhtml += btn;
                    Stringhtml += '</div>';
                    Stringhtml += '<div id="' + id + '" class="panel-collapse collapse">';
                    Stringhtml += '<div class="panel-body">';
                    Stringhtml += html;
                    Stringhtml += '</div>';
                    Stringhtml += '</div>';
                    Stringhtml += '</div>';
                    Stringhtml += ' </div>';

                    contador = 0;
                    html = "";
                    btn = "";
                    id = "";
                }

            }          
            if (ArrayTxt[i][j][1] == 'radio') {

                Stringhtml += '<div class="col-md-' + colmd + '">';
                Stringhtml += '<div class="form-group">';
                Stringhtml += '<label class="control-label col-md-4">INVENTARIADO :</label>';
                Stringhtml += '<div class="col-md-8">';
                Stringhtml += '<div class="col-md-12">';
                Stringhtml += '<label class="radio-inline"><input type="radio" value="' + ArrayTxt[i][j][0] + '" name="radio-' + ArrayTxt[i][j][3] + "SI" + '" id="radio-' + ArrayTxt[i][j][3] + '" />' + ' &nbsp; ' + ArrayTxt[i][j][0] + '</label >';
                Stringhtml += ' &nbsp; &nbsp; &nbsp;';
                Stringhtml += '<label class="radio-inline"><input type="radio" value="' + ArrayTxt[i][j][2] + '" name="radio-' + ArrayTxt[i][j][3] + "NO" + '" id="radio-' + ArrayTxt[i][j][3] + '" />' + ' &nbsp; ' + ArrayTxt[i][j][2] + '</label >';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
            }
            if (ArrayTxt[i][j][1] == 'radio1') {

                Stringhtml += '<div class="col-md-' + colmd + '">';
                Stringhtml += '<div class="form-group">';
                Stringhtml += '<label class="control-label col-md-4">'+ ArrayTxt[i][j][0] +'</label>';
                Stringhtml += '<div class="col-md-8">';
                Stringhtml += '<div class="col-md-12">';
                Stringhtml += '<label class="radio-inline"><input type="radio" value="' + ArrayTxt[i][j][3] + '" name="radio-' + ArrayTxt[i][j][2] + '" id="radio-' + ArrayTxt[i][j][2] + '" />' + ' &nbsp; ' + ArrayTxt[i][j][2] + '</label >';
                Stringhtml += ' &nbsp; &nbsp; &nbsp;';
                Stringhtml += '<label class="radio-inline"><input type="radio" value="' + ArrayTxt[i][j][5] + '" name="radio-' + ArrayTxt[i][j][4] + '" id="radio-' + ArrayTxt[i][j][4] + '" />' + ' &nbsp; ' + ArrayTxt[i][j][4] + '</label >';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
            }
            if (ArrayTxt[i][j][1] == 'textarea') {

                Stringhtml += '<div class="col-md- 12">';
                Stringhtml += '<div class="form-group">';
                Stringhtml += '<label class="control-label col-md-2">' + ArrayTxt[i][j][0] + ' :</label>';
                Stringhtml += '<div class="col-md-9" style="padding-left: 25px !important;">';
                Stringhtml += '<div class="col-md-12">';
                Stringhtml += '<textarea rows="4" cols="50" class="form-control class-text trc-text"  name="txtarea-' + ArrayTxt[i][j][2] + '" id="txtarea-' + ArrayTxt[i][j][2] + '" style="width: 98%"/></textarea>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';

            }

            if (ArrayTxt[i][j][1] == 'text1') {

                Stringhtml += '<div class="col-md-12">';
                Stringhtml += '<div class="form-group">';
                Stringhtml += '<label class="control-label col-md-2">' + ArrayTxt[i][j][0] + ' :</label>';
                Stringhtml += '<div class="col-md-9">';
                Stringhtml += '<div class="col-md-12">';
                Stringhtml += '<input type="text" class="form-control class-text trc-text"  name="txt-' + ArrayTxt[i][j][2] + '" id="txt-' + ArrayTxt[i][j][2] + '"/>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';

            }

            if (ArrayTxt[i][j][1] == 'text2') {

                Stringhtml += '<div class="col-md-' + colmd + '  div-' + ArrayTxt[i][j][1] + '"  style="display:none">';
                Stringhtml += '<div class="form-group">';
                Stringhtml += '<label class="control-label col-md-3">' + ArrayTxt[i][j][0] + ' :</label>';
                Stringhtml += '<div class="col-md-6">';
                Stringhtml += '<div class="col-md-12">';
                Stringhtml += '<input type="text" class="form-control class-text trc-text"  name="txt-' + ArrayTxt[i][j][2] + '" id="txt-' + ArrayTxt[i][j][2] + '"/>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';

            }

            if (ArrayTxt[i][j][1] == 'date') {

                Stringhtml += '<div class="col-md-' + colmd + '">';
                Stringhtml += '<div class="form-group">';
                Stringhtml += '<label class="control-label col-md-4">' + ArrayTxt[i][j][0] + ' :</label>';
                Stringhtml += '<div class="col-md-8">';
                Stringhtml += '<div class="col-md-12">';
                Stringhtml += '<input type="date" class="form-control class-text"  name="txt-' + ArrayTxt[i][j][2] + '" id="txt-' + ArrayTxt[i][j][2] + '"/>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
            }

            if (ArrayTxt[i][j][1] == 'table') {

                Stringhtml += '<div class="col-md-' + colmd + '">';
                Stringhtml += '<div class="form-group">';
                Stringhtml += '<table id="tbl-' + ArrayTxt[i][j][2] + '" class="table table-bordered table-striped"></table>'
                Stringhtml += '</div>';
                Stringhtml += '</div>';
            }

            if (ArrayTxt[i][j][1] == 'button') {

                Stringhtml += '<div class="col-md-' + colmd + '" style="text-align: right;">';
                Stringhtml += '<div class="form-group">';
                Stringhtml += '<div class="col-md-12">';
                Stringhtml += '<div class="col-md-12">';
                Stringhtml += '<button data-bb-handler="ok" type="button" class="btn btn-primary" id="btn-' + ArrayTxt[i][j][2] + '"><i class="ace-icon fa fa-pencil"></i> ' + ArrayTxt[i][j][0] + '</button>'
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
            }

            if (ArrayTxt[i][j][1] == 'button2') {

                Stringhtml += '<div class="col-md-' + colmd + '" style="text-align: right;">';
                Stringhtml += '<div class="form-group">';
                if (ArrayTxt[i][j][0] == "") {
                    Stringhtml += '<label class="control-label col-md-4"></label>';
                } else {
                    Stringhtml += '<label class="control-label col-md-4">' + ArrayTxt[i][j][0] + ' :</label>';
                }
                Stringhtml += '<div class="col-md-8">';
                Stringhtml += '<div class="col-md-12">';
                Stringhtml += '<a class="btn btn-block btn-info btn-sm" id="btn-' + ArrayTxt[i][j][2] + '">';
                Stringhtml += '+ ' + ArrayTxt[i][j][3] + '';
                Stringhtml += '</a>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
            }

            if (ArrayTxt[i][j][1] == 'mensaje') {

                Stringhtml += '<div class="col-md-' + colmd + '">';
                Stringhtml += '<div class="form-group">';
                Stringhtml += '<div class="col-md-12">';
                Stringhtml += '<div class="col-md-12">';
                Stringhtml += '<label>' + ArrayTxt[i][j][0] + '</label>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';
                Stringhtml += '</div>';

            }

            if (ArrayTxt[i][j][1] == 'html') {
                Stringhtml += '<div class="col-md-' + colmd + '">';
                Stringhtml += '<div class="form-group">';
                Stringhtml += ArrayTxt[i][j][0];
                Stringhtml += '</div>';
                Stringhtml += '</div>';
            }

        }
        Stringhtml += '</div>';
    }

    Stringhtml += '</div>';
    Stringhtml += '</div>';
    Stringhtml += '</div>';
    return Stringhtml;
}

function Ejecutar_Modal_Generico(p_NomForm = '', p_ArrayTxt = [],p_titulo="",p_Tamanio = "medium",
p_funcion, p_Par_1=null,p_Par_2=null,p_Par_3=null,p_Par_4=null,p_Par_5=null)
{
    var dialog = bootbox.dialog({
        title: p_titulo,
        size: p_Tamanio,
        message: Crear_Modal_Generico(p_NomForm, p_ArrayTxt),
        buttons: {
            ok: {
                label: "<i class='ace-icon fa fa-pencil'></i> OK",
                className: 'btn-primary',
                callback: function () {
                    if (p_funcion != null) {
                        if (p_Par_1==null && p_Par_2==null && p_Par_3==null && p_Par_4==null && p_Par_5==null) {
                            p_funcion();
                        }
                        if (p_Par_1!=null && p_Par_2==null && p_Par_3==null && p_Par_4==null && p_Par_5==null) {
                            p_funcion(p_Par_1);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3==null && p_Par_4==null && p_Par_5==null) {
                            p_funcion(p_Par_1,p_Par_2);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3!=null && p_Par_4==null && p_Par_5==null) {
                            p_funcion(p_Par_1,p_Par_2,p_Par_3);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3!=null && p_Par_4!=null && p_Par_5==null) {
                            p_funcion(p_Par_1,p_Par_2,p_Par_3,p_Par_4);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3!=null && p_Par_4!=null && p_Par_5!=null) {
                            p_funcion(p_Par_1,p_Par_2,p_Par_3,p_Par_4,p_Par_5);
                        }                                                                                                                              
                    }
                }
            },
            cancel: {
                label: "<i class='ace-icon fa fa-times'></i> Cancelar",
                className: 'btn-danger',
                callback: function () {
                }
            },
        }
    });    
}

function Ejecutar_Modal_Generico_boton
    (p_NomForm = '', p_ArrayTxt = [],p_titulo="",p_Tamanio = "medium",p_Btn_Ok="OK",p_Btn_Cancelar = "Cancelar",
    p_funcion, p_Par_1=null,p_Par_2=null,p_Par_3=null,p_Par_4=null,p_Par_5=null)
{
    var dialog = bootbox.dialog({
        title: p_titulo,
        size: p_Tamanio,
        message: Crear_Modal_Generico(p_NomForm, p_ArrayTxt),
        buttons: {
            ok: {
                label: "<i class='ace-icon fa fa-pencil'></i> "+p_Btn_Ok,
                className: 'btn-primary',
                callback: function () {
                    if (p_funcion != null) {
                        if (p_Par_1==null && p_Par_2==null && p_Par_3==null && p_Par_4==null && p_Par_5==null) {
                            p_funcion();
                        }
                        if (p_Par_1!=null && p_Par_2==null && p_Par_3==null && p_Par_4==null && p_Par_5==null) {
                            p_funcion(p_Par_1);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3==null && p_Par_4==null && p_Par_5==null) {
                            p_funcion(p_Par_1,p_Par_2);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3!=null && p_Par_4==null && p_Par_5==null) {
                            p_funcion(p_Par_1,p_Par_2,p_Par_3);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3!=null && p_Par_4!=null && p_Par_5==null) {
                            p_funcion(p_Par_1,p_Par_2,p_Par_3,p_Par_4);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3!=null && p_Par_4!=null && p_Par_5!=null) {
                            p_funcion(p_Par_1,p_Par_2,p_Par_3,p_Par_4,p_Par_5);
                        }                                                                                                                              
                    }
                }
            },
            cancel: {
                label: "<i class='ace-icon fa fa-times'></i> "+p_Btn_Cancelar,
                className: 'btn-danger',
                callback: function () {
                }
            },
        }
    });    
}

function Ejecutar_Modal_Validacion(p_titulo = "", p_mensaje = "", p_Tamanio = "medium",
                                   p_funcion, p_Par_1=null,p_Par_2=null,p_Par_3=null,p_Par_4=null,p_Par_5=null) 
{
    var l_FormArray = [[[p_mensaje, "mensaje"]]];
    var dialog = bootbox.dialog({
        title: p_titulo,
        size: p_Tamanio,
        message: Crear_Modal_Generico("form-mensaje", l_FormArray),
        buttons: {
            ok: {
                label: "<i class='ace-icon fa fa-pencil'></i> OK",
                className: 'btn-primary',
                callback: function () {
                    if (p_funcion != null) {
                        if (p_Par_1==null && p_Par_2==null && p_Par_3==null && p_Par_4==null && p_Par_5==null) {
                            p_funcion();
                        }
                        if (p_Par_1!=null && p_Par_2==null && p_Par_3==null && p_Par_4==null && p_Par_5==null) {
                            p_funcion(p_Par_1);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3==null && p_Par_4==null && p_Par_5==null) {
                            p_funcion(p_Par_1,p_Par_2);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3!=null && p_Par_4==null && p_Par_5==null) {
                            p_funcion(p_Par_1,p_Par_2,p_Par_3);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3!=null && p_Par_4!=null && p_Par_5==null) {
                            p_funcion(p_Par_1,p_Par_2,p_Par_3,p_Par_4);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3!=null && p_Par_4!=null && p_Par_5!=null) {
                            p_funcion(p_Par_1,p_Par_2,p_Par_3,p_Par_4,p_Par_5);
                        }                                                                                                                              
                    }
                }
            },
            cancel: {
                label: "<i class='ace-icon fa fa-times'></i> Cancelar",
                className: 'btn-danger',
                callback: function () {
                }
            },
        }
    });

}

function Ejecutar_Modal_Validacion_2(p_titulo = "", p_mensaje = "", p_Tamanio = "medium",
                                   p_funcion,p_funcion_Cancel, p_Par_1=null,p_Par_2=null,p_Par_3=null,p_Par_4=null,p_Par_5=null) 
{
    var l_FormArray = [[[p_mensaje, "mensaje"]]];
    var dialog = bootbox.dialog({
        title: p_titulo,
        size: p_Tamanio,
        message: Crear_Modal_Generico("form-mensaje", l_FormArray),
        buttons: {
            ok: {
                label: "<i class='ace-icon fa fa-pencil'></i> OK",
                className: 'btn-primary',
                callback: function () {
                    if (p_funcion != null) {
                        if (p_Par_1==null && p_Par_2==null && p_Par_3==null && p_Par_4==null && p_Par_5==null) {
                            p_funcion();
                        }
                        if (p_Par_1!=null && p_Par_2==null && p_Par_3==null && p_Par_4==null && p_Par_5==null) {
                            p_funcion(p_Par_1);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3==null && p_Par_4==null && p_Par_5==null) {
                            p_funcion(p_Par_1,p_Par_2);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3!=null && p_Par_4==null && p_Par_5==null) {
                            p_funcion(p_Par_1,p_Par_2,p_Par_3);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3!=null && p_Par_4!=null && p_Par_5==null) {
                            p_funcion(p_Par_1,p_Par_2,p_Par_3,p_Par_4);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3!=null && p_Par_4!=null && p_Par_5!=null) {
                            p_funcion(p_Par_1,p_Par_2,p_Par_3,p_Par_4,p_Par_5);
                        }                                                                                                                              
                    }
                }
            },
            cancel: {
                label: "<i class='ace-icon fa fa-times'></i> Cancelar",
                className: 'btn-danger',
                callback: function () {
                    if (p_funcion_Cancel != null) {
                        if (p_Par_1==null && p_Par_2==null && p_Par_3==null && p_Par_4==null && p_Par_5==null) {
                            p_funcion_Cancel();
                        }
                        if (p_Par_1!=null && p_Par_2==null && p_Par_3==null && p_Par_4==null && p_Par_5==null) {
                            p_funcion_Cancel(p_Par_1);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3==null && p_Par_4==null && p_Par_5==null) {
                            p_funcion_Cancel(p_Par_1,p_Par_2);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3!=null && p_Par_4==null && p_Par_5==null) {
                            p_funcion_Cancel(p_Par_1,p_Par_2,p_Par_3);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3!=null && p_Par_4!=null && p_Par_5==null) {
                            p_funcion_Cancel(p_Par_1,p_Par_2,p_Par_3,p_Par_4);
                        }
                        if (p_Par_1!=null && p_Par_2!=null && p_Par_3!=null && p_Par_4!=null && p_Par_5!=null) {
                            p_funcion_Cancel(p_Par_1,p_Par_2,p_Par_3,p_Par_4,p_Par_5);
                        }                                                                                                                              
                    }                    
                }
            },
        }
    });

}

function Crear_Paginador_Tabla(p_Div_Id='',p_Num_TotalBus=0,p_Num_Seccion=0,p_Num_Intervalo=10)
{
    var l_Html = "";
    var l_disabled = 'disabled';
    var l_active = 'active';
    var l_Num_Pag = 0;
    var l_Class_Previous = '';
    var l_Class_Next = '';
    var l_Paginador = Logica_Paginador(p_Num_TotalBus,p_Num_Seccion,p_Num_Intervalo);

    if( l_Paginador.List_Btn_Ini.length > 0)
    {
        l_Html += '<div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">';
        l_Html += '<ul class="pagination">';

        l_disabled = (l_Paginador.Btn_Previous_Act) ? '' : 'disabled';
        l_Class_Previous = (l_Paginador.Btn_Previous_Act) ? 'paginate_button_a' : '';

        l_Html += '<li class="paginate_button previous '+l_disabled+'" aria-controls="dynamic-table" tabindex="0" style="cursor:pointer;" id="dynamic-table_previous">';
        l_Html += '    <a class="'+l_Class_Previous+'" id="dynamic-table_previous" '+l_disabled+'>Previous</a>';
        l_Html += '</li>';

        l_disabled = '';

        for( var i=0;i<l_Paginador.List_Btn_Ini.length;i++ )
        {
            l_Num_Pag = l_Paginador.List_Btn_Ini[i];
            l_active = ( l_Num_Pag == l_Paginador.Num_SeccionActual ) ? 'active' : '';
            l_Html += '<li class="paginate_button '+l_active+'" id="pag-'+l_Num_Pag+'" aria-controls="dynamic-table" tabindex="0" style="cursor:pointer;">';
            l_Html += '    <a class="paginate_button_a" id="pag-'+l_Num_Pag+'">'+l_Num_Pag+'</a>';
            l_Html += '</li>';
        }

        if( l_Paginador.Btn_Continuo_Izq)
        {
            l_Num_Pag = ' ... ';
            l_Html += '<li class="paginate_button" aria-controls="dynamic-table" tabindex="0" style="cursor:pointer;">';
            l_Html += '    <a class="paginate_button_a" id="pag-'+l_Num_Pag+'">'+l_Num_Pag+'</a>';
            l_Html += '</li>';
        }
        if( l_Paginador.Btn_Continuo_Cen)
        {
            l_Num_Pag = ' ... ';
            l_Html += '<li class="paginate_button" aria-controls="dynamic-table" tabindex="0" style="cursor:pointer;">';
            l_Html += '    <a class="paginate_button_a" id="pag-'+l_Num_Pag+'">'+l_Num_Pag+'</a>';
            l_Html += '</li>';
        }

        for( var i=0;i<l_Paginador.List_Btn_Cen.length;i++ )
        {
            l_Num_Pag = l_Paginador.List_Btn_Cen[i];
            l_active = ( l_Num_Pag == l_Paginador.Num_SeccionActual ) ? 'active' : '';
            l_Html += '<li class="paginate_button '+l_active+'" id="pag-'+l_Num_Pag+'" aria-controls="dynamic-table" tabindex="0" style="cursor:pointer;">';
            l_Html += '    <a class="paginate_button_a" id="pag-'+l_Num_Pag+'">'+l_Num_Pag+'</a>';
            l_Html += '</li>';
        }

        if( l_Paginador.Btn_Continuo_Der)
        {
            l_Num_Pag = ' ... ';
            l_Html += '<li class="paginate_button" aria-controls="dynamic-table" tabindex="0" style="cursor:pointer;">';
            l_Html += '    <a class="paginate_button_a" id="pag-'+l_Num_Pag+'">'+l_Num_Pag+'</a>';
            l_Html += '</li>';
        }

        for( var i=0;i<l_Paginador.List_Btn_Fin.length;i++ )
        {
            l_Num_Pag = l_Paginador.List_Btn_Fin[i];
            l_active = ( l_Num_Pag == l_Paginador.Num_SeccionActual ) ? 'active' : '';
            l_Html += '<li class="paginate_button '+l_active+'" id="pag-'+l_Num_Pag+'" aria-controls="dynamic-table" tabindex="0" style="cursor:pointer;">';
            l_Html += '    <a class="paginate_button_a" id="pag-'+l_Num_Pag+'">'+l_Num_Pag+'</a>';
            l_Html += '</li>';
        }

        l_disabled = (l_Paginador.Btn_Next_Act) ? '' : 'disabled';
        l_Class_Next = (l_Paginador.Btn_Next_Act) ? 'paginate_button_a' : '';
        l_Html += '<li class="paginate_button next '+l_disabled+'" aria-controls="dynamic-table" tabindex="0" style="cursor:pointer;" id="dynamic-table_next">';
        l_Html += '     <a class="'+l_Class_Next+'" id="dynamic-table_next" '+l_disabled+'>Next</a>';
        l_Html += '</li>';

        l_disabled = '';        

        l_Html += '</ul>';
        l_Html += '</div>';

        $("#"+p_Div_Id).html(l_Html);
    }
}

function Logica_Paginador(p_Num_TotalBus=0,p_Num_Seccion=0,p_Num_Intervalo=10)
{
    var l_Num_TotalSecciones = 0;
    var l_Num_Btn_Fin = 0;
    var l_Num_Secciones_Bonotes_bandas = 2;
    var l_Num_Secciones_Bonotes_Centro = 5;
    var l_Num_Iniciar_Centro = 0;
    var l_Num_Resta_Iniciar_Centro = 2;

    var l_Paginador = 
    {
        Num_SeccionActual : 1,
        Btn_Previous_Act : false,
        Btn_Next_Act : false,
        List_Btn_Ini : [],
        List_Btn_Fin : [],
        List_Btn_Cen : [],
        Btn_Continuo_Der : false,
        Btn_Continuo_Izq : false,
        Btn_Continuo_Cen : false       
    }

    l_Num_TotalSecciones = Math.floor(p_Num_TotalBus / p_Num_Intervalo);

    if( (p_Num_TotalBus % p_Num_Intervalo) > 0 )
    {
        l_Num_TotalSecciones = l_Num_TotalSecciones + 1;
    }

    if( l_Num_TotalSecciones > 10 )
    {
        l_Num_Btn_Fin = l_Num_TotalSecciones - l_Num_Secciones_Bonotes_bandas;
        l_Num_Iniciar_Centro = p_Num_Seccion - l_Num_Resta_Iniciar_Centro;

        for(var i=0;i<l_Num_Secciones_Bonotes_bandas;i++)
        {
            l_Paginador.List_Btn_Ini.push(i+1);
        }
        for(var i=0;i<l_Num_Secciones_Bonotes_bandas;i++)
        {
            l_Paginador.List_Btn_Fin.push(l_Num_Btn_Fin+i+1);
        }

        l_Num_Centro_Inicia_En = l_Num_Iniciar_Centro;
        l_Num_Centro_Termina_En = p_Num_Seccion + l_Num_Resta_Iniciar_Centro;
        for(var i=0;i<l_Num_Secciones_Bonotes_Centro;i++)
        {
            if ( (l_Num_Iniciar_Centro+i) < l_Num_TotalSecciones && 0<(l_Num_Iniciar_Centro+i))
            {
                l_Paginador.List_Btn_Cen.push(l_Num_Iniciar_Centro+i);
            }            
        }
        
        l_Paginador.Btn_Continuo_Izq = true;
        l_Paginador.Btn_Continuo_Der = true;
        l_Paginador.Btn_Continuo_Izq = Comparar_Elementos_Continuos(l_Paginador.List_Btn_Ini[1],l_Paginador.List_Btn_Cen[0]);
        l_Paginador.Btn_Continuo_Der = Comparar_Elementos_Continuos(l_Paginador.List_Btn_Cen[4],l_Paginador.List_Btn_Fin[0]);

        if ( Comparar_Array_Repetido(l_Paginador.List_Btn_Ini,l_Paginador.List_Btn_Cen) )
        {
            l_Paginador.List_Btn_Ini = Fucionar_Array(l_Paginador.List_Btn_Cen,l_Paginador.List_Btn_Ini);
            l_Paginador.List_Btn_Cen = [];
            l_Paginador.Btn_Continuo_Der = false;
            l_Paginador.Btn_Continuo_Izq = false;
        }

        if ( Comparar_Array_Repetido(l_Paginador.List_Btn_Cen,l_Paginador.List_Btn_Fin) )
        {
            l_Paginador.List_Btn_Fin = Fucionar_Array(l_Paginador.List_Btn_Fin,l_Paginador.List_Btn_Cen);
            l_Paginador.List_Btn_Cen = [];
            l_Paginador.Btn_Continuo_Der = false;
            l_Paginador.Btn_Continuo_Izq = false;
        }

        if( l_Paginador.List_Btn_Cen.length == 0 )
        {
            l_Paginador.Btn_Continuo_Cen = true;
        }

    }
    else
    {
        for(var i=0;i<l_Num_TotalSecciones;i++)
        {
            l_Paginador.List_Btn_Ini.push(i+1);
        }
    }
    l_Paginador.Btn_Previous_Act = (p_Num_Seccion == 1) ? false : true;
    l_Paginador.Btn_Next_Act = (p_Num_Seccion == l_Num_TotalSecciones) ? false : true;
    l_Paginador.Num_SeccionActual = p_Num_Seccion;
    
    return l_Paginador;
}

function Comparar_Array_Repetido(p_Array_1=[],p_Array_2=[])
{
    for(var i=0;i<p_Array_1.length;i++)
    {
        if( p_Array_2.includes( p_Array_1[i] ) )
        {
            return true;
        } 
    }
    return false;
}

function Comparar_Elementos_Continuos(p_Elemento_1=0,p_Elemento_2=0)
{
    if( (p_Elemento_1 + 1) == p_Elemento_2 )
    {
        return false;
    }
    else
    {
        return true;
    }
}

function Fucionar_Array(p_Array_1=[],p_Array_2=[])
{
    for(var i=0;i<p_Array_1.length;i++)
    {
        if( !p_Array_2.includes( p_Array_1[i] ) )
        {
            p_Array_2.push(p_Array_1[i]);
        } 
    }
    return p_Array_2;
}

function Get_Num_Pagina_Seleccionada(p_Id_Paginador='',p_Num_Seccion_Actual=0)
{
    var l_Num_Seccion_Actual = 0;

    if(p_Id_Paginador == 'dynamic-table_previous')
    {
        l_Num_Seccion_Actual = p_Num_Seccion_Actual - 1;
    }
    else if(p_Id_Paginador == 'dynamic-table_next')
    {
        l_Num_Seccion_Actual = p_Num_Seccion_Actual + 1;
    }
    else if(p_Id_Paginador == '')
    {
        l_Num_Seccion_Actual = p_Num_Seccion_Actual;
    }
    else
    {
        l_Num_Seccion_Actual = Number(p_Id_Paginador.split('-')[1]);
    }

    return l_Num_Seccion_Actual;
}

function Crete_Excel(NombreExcel = "excel_ccadmin_example", NombreHoja = "Hoja1", ArrayCabecera = ['Cabecera 1','Cabecera 2'], ArrayDatos = [['hello', 'world']]) //para que est funcion se pueda utilizar se debe agregar primero los js = assets/js/FileSaver.js y assets/js/JavaScriptHelp.js
{
    var wb = XLSX.utils.book_new();
    var ws_data = [];

    wb.Props = {
        Title: "Capacitacion Excel",
        Subject: "Test",
        Author: "Red Stapler",
        CreatedDate: new Date(2017, 12, 19)
    };

    wb.SheetNames.push(NombreHoja);

    if (ArrayDatos) {
        ArrayDatos = ArrayDatos.reverse();
        if (ArrayCabecera) {
            ArrayDatos.push(ArrayCabecera);
        }

        ws_data = ArrayDatos.reverse();

    } else {
        if (ArrayCabecera) {
            ws_data = [ArrayCabecera];
        }
    }

    var ws = XLSX.utils.aoa_to_sheet(ws_data);
    wb.Sheets[NombreHoja] = ws;
    var wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'binary' });

    var buf = new ArrayBuffer(wbout.length);
    var view = new Uint8Array(buf);
    for (var i = 0; i < wbout.length; i++) view[i] = wbout.charCodeAt(i) & 0xFF;

    saveAs(new Blob([buf], { type: "application/octet-stream" }), NombreExcel + '.xlsx');

    ws = null;
    wb = null;
    wbout = null;
    buf = null;
    view = null;

}

function Ejecutar_Modal_Error(p_Des_Message = "")
{
    var dialog = bootbox.dialog({
        title: '<h4 style="color: #d30f0f;">¡ ERROR !</h4>',
        message: "<p>"+p_Des_Message+"</p>",
        size: 'medium',
        buttons: {
            noclose: {
                label: "REGISTRAR ERROR",
                className: 'btn-danger',
                callback: function(){
                    console.log('AQUI EJECUTAR FUNCION DE REGISTRO DE ERROR');
                    return false;
                }
            },
            ok: {
                label: "OK",
                className: 'btn-info',
                callback: function(){
                    console.log('Custom OK clicked');
                }
            }
        }
    });
}

function Ejecutar_Modal_Error_Accion(p_Des_Message = "",p_funcion = null,p_funcion_Cancel = null ,p_Parametros = null)
{
    var dialog = bootbox.dialog({
        title: '<h4 style="color: #d30f0f;">¡ ERROR !</h4>',
        message: "<p>"+p_Des_Message+"</p>",
        size: 'medium',
        buttons: {
            noclose: {
                label: "CANCELAR",
                className: 'btn-danger',
                callback: function(){
                    if( p_funcion_Cancel != null )
                    {
                        if( p_Parametros == null )
                        {
                            p_funcion_Cancel();

                        }else
                        {
                            p_funcion_Cancel(p_Parametros);
                        }
                    }
                }
            },
            ok: {
                label: "OK",
                className: 'btn-info',
                callback: function(){
                    if( p_funcion != null )
                    {
                        if( p_Parametros == null )
                        {
                            p_funcion();

                        }else
                        {
                            p_funcion(p_Parametros);
                        }
                    }
                }
            }
        }
    });
}

function Abrir_Dialogo_Carga() {
    $('#modal-cargando').modal('show');
    $('.close').hide();
}
function Cerrar_Dialogo_Carga_Simple() {
    $('#modal-cargando').modal('hide');
}

function Cerrar_Dialogo_Carga_Proceso(FlagExisteError = false) {
    $('#modal-cargando').modal('hide');
    if (!FlagExisteError) Abrir_Dialogo_Confirmar();
}

function Abrir_Dialogo_Confirmar()
{
    $('#modal-ok').modal('show');
    $('.close').hide();
    setTimeout(Cerrar_Dialogo_Confirmar,1800);
}
function Cerrar_Dialogo_Confirmar() {
    $('#modal-ok').modal('hide');
    $('.close').hide();
}