<html>
    <title>Sifa</title>
    <head>
        <link href="../../codebase/dhtmlx.css" rel="stylesheet" type="text/css"/>
        <script src="../../codebase/dhtmlx.js" type="text/javascript"></script>
        <meta charset="UTF-8">
        <script type="text/javascript">

            dhtmlxEvent(window, "load", function () {
                portalInit();
            });//end function dhtmlxEvent

            function portalInit() {

                pattern = "2E";
                formCell = "a";
                gridCell = "b";
                
                facturacionGridXML  = "Facturacion-Grid.xml";
                facturacionGridLoad = "FacturacionDATA.xml";

                layoutFacturacion = new dhtmlXLayoutObject("facturacionLayoutDiv", pattern);
                layoutFacturacion.cells(formCell).hideHeader()
                layoutFacturacion.cells(gridCell).hideHeader()

                facturacionForm = layoutFacturacion.cells(formCell).attachForm();
                facturacionForm.loadStruct("Facturacion-form.xml");

                facturacionGrid = layoutFacturacion.cells(gridCell).attachGrid();
                facturacionGrid.load( facturacionGridXML, facturacionGridCallback );

                function facturacionGridCallback() {
                    facturacionGrid.load(facturacionGridLoad);
                }//fin de la funcion clientsGridCallback
                        
                facturacionForm.bind(facturacionGrid);         
            }// fin portal init
        </script>
    </head>
    <body>
        <div id="facturacionLayoutDiv" style="position: fixed; height: 100%; width: 100%;"></div>
    </body>
</html>