
    function Get_Impresion_Venta( p_BASE_URL = "",p_Id_Venta = 0 , p_Tip_VentaDoc = 0 )
    {
        var l_Request = {
            Paginacion: {
                Tip_Busqueda: 3,
                Tip_Listado: 1,
                Num_Seccion: 1
            },
            Busqueda: {
                Tip_VentaDoc: p_Tip_VentaDoc,
                Id_Venta: p_Id_Venta
            }
        };

        var l_Response = SetActionJquery(l_Request,p_BASE_URL+"public/facturacion/Get_Venta");

        l_Response.success(function(data){
            if (!data.Error.flagerror) {
                
                Crear_PDF(data.Resultado);
                window.location.href = p_BASE_URL+"public/facturacion";

            }else{
                Ejecutar_Modal_Error(data.Error.messages);
            }
        });
        l_Response.error(function(){
            alert("ERROR 500");
        });
    }

    function Crear_PDF(l_Obj_Imprimir)
    {
        var l_Num_Ancho = 100;
        var l_Num_Largo = 297;
        var l_Num_FontSize = 10;
        var l_Num_Margen_Costado = 5;
        var l_Num_Margen_Superior = 10;
        var l_Num_Salto_Linea = 4;
        var l_Num_Salto_Parrafo = 10;
        var l_Num_Grosor_Linea = 0.3;

        var doc = new jsPDF('p', 'mm', [l_Num_Ancho,l_Num_Largo]);
        var img_qr = new Image();
        var img = new Image();
        img.src = l_Obj_Imprimir.Des_Url_logo;
        doc.addImage(img, 'png',l_Num_Margen_Costado,l_Num_Margen_Costado, 20, 25)

        doc.setFontSize(l_Num_FontSize+5);
        doc.text(l_Obj_Imprimir.Des_Nom_Empresa.toUpperCase(),27,l_Num_Margen_Superior);
        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;
        doc.setFontSize(l_Num_FontSize);
        doc.text(l_Obj_Imprimir.Des_Nom_Tienda.toUpperCase(),27,l_Num_Margen_Superior);
        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;
        doc.text(l_Obj_Imprimir.Des_Dir_Tienda,27,l_Num_Margen_Superior);
        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;
        doc.text(l_Obj_Imprimir.Des_Ubig_Tienda,27,l_Num_Margen_Superior);
        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Parrafo;
        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea+2;

        doc.setLineWidth(l_Num_Grosor_Linea); 
        doc.line(l_Num_Margen_Costado, l_Num_Margen_Superior,l_Num_Ancho-l_Num_Margen_Costado, l_Num_Margen_Superior);
        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea+1;
        //NUMERO DE BOLETA
        doc.setFontSize(11);
        doc.text(l_Obj_Imprimir.Des_Doc_Venta,l_Num_Margen_Costado,l_Num_Margen_Superior);
        l_Num_Margen_Superior = l_Num_Margen_Superior + 2;
        doc.setLineWidth(l_Num_Grosor_Linea); 
        doc.line(l_Num_Margen_Costado, l_Num_Margen_Superior,l_Num_Ancho-l_Num_Margen_Costado, l_Num_Margen_Superior);
        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;

        doc.setFontSize(8);
        doc.text("CODIGO",l_Num_Margen_Costado,l_Num_Margen_Superior);
        doc.text(":",l_Num_Margen_Costado*4.3,l_Num_Margen_Superior);
        doc.text(l_Obj_Imprimir.Cod_Venta,l_Num_Margen_Costado*4.7,l_Num_Margen_Superior);

        doc.text("TERMINAL",l_Num_Margen_Costado*10,l_Num_Margen_Superior);
        doc.text(":",l_Num_Margen_Costado*13,l_Num_Margen_Superior);
        doc.text(l_Obj_Imprimir.Cod_TermVenta,l_Num_Margen_Costado*13.4,l_Num_Margen_Superior);

        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;
        
        doc.text("FECHA",l_Num_Margen_Costado,l_Num_Margen_Superior);
        doc.text(":",l_Num_Margen_Costado*4.3,l_Num_Margen_Superior);
        doc.text(l_Obj_Imprimir.Fec_DiaVenta,l_Num_Margen_Costado*4.7,l_Num_Margen_Superior);

        doc.text("HORA",l_Num_Margen_Costado*10,l_Num_Margen_Superior);
        doc.text(":",l_Num_Margen_Costado*13,l_Num_Margen_Superior);
        doc.text(l_Obj_Imprimir.Fec_HoraVenta,l_Num_Margen_Costado*13.4,l_Num_Margen_Superior);

        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;
        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;

        doc.text("VENDEDOR",l_Num_Margen_Costado,l_Num_Margen_Superior);
        doc.text(":",l_Num_Margen_Costado*4.3,l_Num_Margen_Superior);
        doc.text(l_Obj_Imprimir.Des_NomVendedor,l_Num_Margen_Costado*4.7,l_Num_Margen_Superior);

        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;

        doc.text("CAJERO",l_Num_Margen_Costado,l_Num_Margen_Superior);
        doc.text(":",l_Num_Margen_Costado*4.3,l_Num_Margen_Superior);
        doc.text(l_Obj_Imprimir.Des_NomCajero,l_Num_Margen_Costado*4.7,l_Num_Margen_Superior);

        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;

        doc.text("CLIENTE",l_Num_Margen_Costado,l_Num_Margen_Superior);
        doc.text(":",l_Num_Margen_Costado*4.3,l_Num_Margen_Superior);
        doc.text(l_Obj_Imprimir.Des_Cliente,l_Num_Margen_Costado*4.7,l_Num_Margen_Superior);

        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;

        doc.setLineWidth(l_Num_Grosor_Linea); 
        doc.line(l_Num_Margen_Costado, l_Num_Margen_Superior,l_Num_Ancho-l_Num_Margen_Costado, l_Num_Margen_Superior);

        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;

        doc.setFontSize(7);
        doc.text("PRODUCTO",l_Num_Margen_Costado,l_Num_Margen_Superior);
        doc.text("P. UNIT",l_Num_Margen_Costado*8.4,l_Num_Margen_Superior);
        doc.text("CANT.",l_Num_Margen_Costado*11.2,l_Num_Margen_Superior);
        doc.text("DSCTO.",l_Num_Margen_Costado*13.4,l_Num_Margen_Superior);
        doc.text("PRE. VENTA",l_Num_Margen_Costado*16,l_Num_Margen_Superior);
        l_Num_Margen_Superior = l_Num_Margen_Superior + 2;

        doc.setLineWidth(l_Num_Grosor_Linea); 
        doc.line(l_Num_Margen_Costado, l_Num_Margen_Superior,l_Num_Ancho-l_Num_Margen_Costado, l_Num_Margen_Superior);

        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;

        doc.setFontSize(6.5);
        for(var i=0; i < l_Obj_Imprimir.List_Item_Venta.length; i++)
        {
            var l_Obj_Producto = l_Obj_Imprimir.List_Item_Venta[i];
            doc.text(l_Obj_Producto.Des_Producto,l_Num_Margen_Costado,l_Num_Margen_Superior);
            doc.text(l_Obj_Producto.Des_PreUnitario,l_Num_Margen_Costado*8.4,l_Num_Margen_Superior);
            doc.text(l_Obj_Producto.Num_Cantidad,l_Num_Margen_Costado*11.2,l_Num_Margen_Superior);
            doc.text(l_Obj_Producto.Des_PreDescuento,l_Num_Margen_Costado*13.4,l_Num_Margen_Superior);
            doc.text(l_Obj_Producto.Des_PrecioVenta,l_Num_Margen_Costado*16,l_Num_Margen_Superior);    
            if(l_Obj_Producto.Des_Producto_SubLine.length>0)
            {
                for(var j=0; j < l_Obj_Producto.Des_Producto_SubLine.length; j++)
                {
                    var l_Item_Des = l_Obj_Producto.Des_Producto_SubLine[j];
                    l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;
                    doc.text(l_Item_Des,l_Num_Margen_Costado,l_Num_Margen_Superior);
                }                
            }
            l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;            
        }
        doc.setLineWidth(l_Num_Grosor_Linea); 
        doc.line(l_Num_Margen_Costado, l_Num_Margen_Superior,l_Num_Ancho-l_Num_Margen_Costado, l_Num_Margen_Superior);
        
        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;

        doc.setFontSize(7.5);
        doc.text("SUB-TOTAL",l_Num_Margen_Costado*8.8,l_Num_Margen_Superior);
        doc.text(":",l_Num_Margen_Costado*13.5,l_Num_Margen_Superior);
        doc.setFontSize(6);
        doc.text(l_Obj_Imprimir.Des_Num_SubTotal,l_Num_Margen_Costado*15.6,l_Num_Margen_Superior);
        
        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;
   
        for(var i=0; i < l_Obj_Imprimir.List_Impuestos.length; i++)
        {
            var l_Obj_Impuesto = l_Obj_Imprimir.List_Impuestos[i];
            doc.setFontSize(7.5);
            doc.text(l_Obj_Impuesto.Des_ImpuestaImprimir,l_Num_Margen_Costado*8.8,l_Num_Margen_Superior);
            doc.text(":",l_Num_Margen_Costado*13.5,l_Num_Margen_Superior);
            doc.setFontSize(6);
            doc.text(l_Obj_Impuesto.Des_ValImpuesto,l_Num_Margen_Costado*15.6,l_Num_Margen_Superior);

            l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;
        }

        doc.setFontSize(7.5);
        doc.text("DESCUENTO",l_Num_Margen_Costado*8.8,l_Num_Margen_Superior);
        doc.text(":",l_Num_Margen_Costado*13.5,l_Num_Margen_Superior);
        doc.setFontSize(6);
        doc.text(l_Obj_Imprimir.Des_Num_Descuento,l_Num_Margen_Costado*15.6,l_Num_Margen_Superior);

        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;

        doc.setLineWidth(l_Num_Grosor_Linea); 
        doc.line(l_Num_Margen_Costado, l_Num_Margen_Superior,l_Num_Ancho-l_Num_Margen_Costado, l_Num_Margen_Superior);

        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;

        doc.setFontSize(7.5);
        doc.text("TOTAL A PAGAR",l_Num_Margen_Costado*8.8,l_Num_Margen_Superior);
        doc.text(":",l_Num_Margen_Costado*13.5,l_Num_Margen_Superior);
        doc.setFontSize(6);
        doc.text(l_Obj_Imprimir.Des_Num_Total,l_Num_Margen_Costado*15.6,l_Num_Margen_Superior);

        l_Num_Margen_Superior = l_Num_Margen_Superior + 2;

        doc.setLineWidth(l_Num_Grosor_Linea); 
        doc.line(l_Num_Margen_Costado, l_Num_Margen_Superior,l_Num_Ancho-l_Num_Margen_Costado, l_Num_Margen_Superior);

        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;
        doc.setFontSize(6.5);
        doc.text("SON",l_Num_Margen_Costado,l_Num_Margen_Superior);
        doc.text(":",l_Num_Margen_Costado*3,l_Num_Margen_Superior);
        doc.text(l_Obj_Imprimir.Des_Pago,l_Num_Margen_Costado*3.5,l_Num_Margen_Superior);

        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;
        doc.setFontSize(6.5);
        doc.text("FORMA DE PAGO",l_Num_Margen_Costado,l_Num_Margen_Superior);
        doc.text(":",l_Num_Margen_Costado*5,l_Num_Margen_Superior);
        doc.text("EFECTIVO",l_Num_Margen_Costado*5.5,l_Num_Margen_Superior);

        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;
        doc.setFontSize(6.5);
        doc.text("VUELTO",l_Num_Margen_Costado,l_Num_Margen_Superior);
        doc.text(":",l_Num_Margen_Costado*3,l_Num_Margen_Superior);
        doc.text("PEN 0.00",l_Num_Margen_Costado*3.5,l_Num_Margen_Superior);

        l_Num_Margen_Superior = l_Num_Margen_Superior + l_Num_Salto_Linea;

        img_qr.src = update_qrcode(l_Obj_Imprimir.Cod_Tal_Venta);
        
        doc.addImage(img_qr, 'png',l_Num_Margen_Costado*5.7,l_Num_Margen_Superior, 40, 40);

        doc.autoPrint();
        doc.output('dataurlnewwindow', {filename: l_Obj_Imprimir.Cod_Venta+'.pdf'});
        doc.save(l_Obj_Imprimir.Cod_Venta+'.pdf');

    } 