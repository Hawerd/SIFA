<!DOCTYPE html>
<html>
    <title>Sifa</title>
    <head>
        <script src="codebase/dhtmlx.js" type="text/javascript"></script> 
        <link rel="STYLESHEET" type="text/css" href="codebase/dhtmlx.css"> 
        <meta charset="UTF-8">
        <script type="text/javascript">

            dhtmlxEvent(window, "load", function () {
                portalInit();
            });//Fin function dhtmlxEvent
            
            function portalInit() {

                
                sidebarXML = "Sidebar.xml"; 
                
                icons = "resources/";       
                //Cells
                sidebarCell         = "a";
                applicationsCell    = "b";
                messageCell         = "c";

                //setup size
                siderbarWidth = 200;
                template_menu = "templates/list.html";
                moduloFacturacion = "modulos/facturacion/Facturacion.php";
                moduloDemo = "modulos/demo/demo.php";

                pattern = "3W";
                mainLayout = new dhtmlXLayoutObject("portalLayoutDiv", "1C");
                portalLayout   = mainLayout.cells("a").attachLayout( pattern );

                toolbar = portalLayout.attachToolbar();
                //toolbar_1.setIconsPath('./codebase/imgs/');
                //toolbar_1.loadStruct('./data/toolbar.xml', function() {});

                sidebarContainer = portalLayout.cells( sidebarCell );
                sidebar = sidebarContainer.attachSidebar({
                    icons_path: icons
                });
                sidebarContainer.hideHeader();
                sidebarContainer.setWidth( siderbarWidth );

                appsContainer = portalLayout.cells( applicationsCell );
                appsContainer.attachURL( template_menu );
                appsContainer.hideHeader();

                msgContainer = portalLayout.cells(messageCell);
                msgContainer.attachHTMLString('<div><b><br><center>Bienvenido a S.I.F.A</center></b></div>');
                msgContainer.hideHeader();
                msgContainer.setWidth( siderbarWidth );
               
                // EVENTOS
                sidebar.attachEvent("onSelect", function (id, lastId) {

                    switch (id) {
                        case "configuracion":
                             alert(id);
                            break;
                        case "facturacion":
                            mostrarFacturacion();
                            break;
                        case "inventario":
                             alert(id);
                            break;
                        case "agenda":
                            alert(id);
                            break;
                    }// Fin switch
                });// Fin onSelect

                // FIN EVENTOS

                // LOADS
                sidebar.loadStruct(sidebarXML);
                // END LOADS

                // FUNCIONES
                function mostrarFacturacion() {
                    appsContainer.attachURL(moduloFacturacion);
                }// mostrarFacturacion
                    
                alertar = function(){
                    alert("Ir a otro moduulo");
                }
                // FIN FUNCIONES

            };//fin funcion init


        </script>

    </head>
    <body>
        <div id="portalLayoutDiv" style="position: fixed; height: 100%; width: 100%;"></div>
    </body>
</html>
