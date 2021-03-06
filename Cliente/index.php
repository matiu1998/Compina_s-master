<?php
    session_start();
    include ("../Conexion/conexion.php");
    if (!isset($_SESSION['id'])) {
        header("Location:../Login/index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Inicio del Navegador Vertical-->
    <div class="vertical-nav bg-white" id="sidebar">
        <div class="py-4 px-3 mb-4 bg-light">
            <div class="media d-flex align-items-center">
                <img src="" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                <div class="media-body">
                    <h4 class="m-0" id="userName"></h4>
                    <p class="font-weight-normal text-mutd mb-0" id="userType"></p>
                    <a  class = "btn-link btnPerfil rounded-pill" data-toggle="modal" data-target="#myModalPerfil"> Editar Perfil  </a>
                </div>
            </div>
            <hr>
            <a class="btnCerrarSession" >Cerrar Session</a>
        </div>
        <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="../Cliente/" class="nav-link text-dark bg-light">
                    <i class="fas fa-users mr-3 text-primary"></i>
                    Clientes
                </a>
            </li>
            <li class="nav-item">
                <a href="../Requerimientos/" class="nav-link text-dark">
                    <i class="fas fa-tasks mr-3 text-primary"></i>
                    Requerimientos
                </a>
            </li>
            <li class="nav-item">
                <a href="../Atencion/" class="nav-link text-dark">
                    <i class="fas fa-headset mr-3 text-primary"></i>
                    Atenci??n
                </a>
            </li>
            <li class="nav-item">
                <a href="../Atencion/" class="nav-link text-dark">
                    <i class="fas fa-people-carry mr-3 text-primary"></i>
                    Proveedores
                </a>
            </li>
        </ul>
    </div>
        <!-- Fin del Navegador Vertical-->

        <!-- Inicio del Contenido-->
        <div class="page-content p-5" id="content">
            <button id="sidebarCollapse" type="button" class="btn btn-ligth bg-white rounded-pill shadow-sm px-4 mb-4">
                <small class="text-uppercase font-weight-bold">Men??</small>

            </button>
            <h2 class="display-4 text-dark">Clientes</h2>
            <p class="lead text-muted mb-0">
                Datos obtenidos en tiempo real
            </p>
            <hr>
            <div class="row">
                <div class="col-auto">
                    <button type="button" class="btn btn-warning btn-sm rounded-pill shadow" data-toggle="modal" data-target="#myModalRegisterEmpresa">
                        <i class="far fa-building mr-3 text-light" title="Agregar Empresa"></i>
                        Agregar Empresa
                    </button>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-warning btn-sm rounded-pill shadow" data-toggle="modal" data-target="#myModalRegisterCliente">
                        <i class="fas fa-user-plus mr-3 text-light" title="Agregar Cliente"></i>
                        Agregar Cliente
                    </button>
                </div>
            </div>
            <hr>
            <div class="row text-dark">
                <div class="col">
                    <div class="form-group">
                        <label for="">Busqueda</label>
                        <input type="text" class="form-control" id="searchCliente" aria-describedby="helpId" placeholder="Busqueda por ...">
                        <small id="helpId" class="form-text text-muted">Busqueda por Cliente, Empresa, Telefono, Email, Distrito, Puesto Administrativo.</small>
                      </div>
                </div>
            </div>
            <div class="row text-dar">
                <div class="col-auto">
                    <div class="form-group">
                      <label for="mostrar">Mostrar</label>
                      <select class="form-control" id="mostrarDatos">
                        <option value="25" select>25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="all">Todos</option>
                      </select>
                    </div>
                </div>
            </div>
        <!-- <div class="separator"></div> -->
            <div class="row text-dark">
                <div class="col-auto table-responsive">
                    <table class="table table-hover table-md">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Acciones</th>
                                <th scope="col">ID</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Empresa</th>
                                <th scope="col">Posicion</th>
                                <th scope="col">Direcci??n</th>
                                <th scope="col">Distrito</th>
                                <th scope="col">Provincia</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                            </tr>
                        </thead>
                        <tbody id="cotenidoCliente">
                        </tbody>
                    </table>
                </div>
            </div>
        <!-- Fin del Contenido-->

        <!-- Inicio Modal's -->
        <!-- Modal Atender-->
        <div class="modal fade" id="myModalAtender">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Atender</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-2">
                            <div class="col">
                                <h6>Personal</h6>
                                <p class="lead" id="userNameTwo"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-2">
                            <div class="col">
                                <h6>Cliente</h6>
                                <p class="lead" id="clienteName"></p>
                            </div>
                            <div class="col">
                                <h6>Empresa</h6>
                                <p class="lead" id="empresaName"></p>
                            </div>
                        </div>
                        <hr>
                        <form id="form-atencion">
                        <input type="hidden" id="idAtender">
                        <div class="row mb-2">
                            <div class="col">
                                <div class="form-group">
                                    <label for="selectType">Tipo de Cliente</label>
                                    <select class="custom-select" id="selectType">
                                        <option selected value="null">Seleccione ...</option>
                                        <option value="Potencial">Potencial</option>
                                        <option value="Frecuente">Frecuente</option>
                                        <option value="Ocasional">Ocasional</option>
                                        <option value="Tercerizadores">Tercerizadores</option>
                                        <option value="Prospecto">Prospecto</option>
                                        <option value="No Potencial">No potencial</option>
                                        <option value="Mal Cliente">Mal Cliente</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="selectOrigin">Origen</label>
                                    <select class="custom-select" id="selectOrigin">
                                        <option selected value="null">Seleccione ...</option>
                                        <option value="Mailing">Mailing</option>
                                        <option value="Pagina Web">Pagina Web</option>
                                        <option value="Facebook">Facebook</option>
                                        <option value="Chat">Chat</option>
                                        <option value="Llamadas">Llamadas</option>
                                        <option value="Referidos">Referidos</option>
                                        <option value="Otros">Otros</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <div class="form-group">
                                    <label for="selectStatus">Estatus Atenci??n </label>
                                    <select class="custom-select" id="selectStatus">
                                        <option selected value="null">Seleccione ...</option>
                                        <option value="Contacto Inicial">Contacto Inicial</option>
                                        <option value="Retomar Contacto">Retomar Contacto</option>
                                        <option value="Pendiente por Cotizar">Pendiente por Cotizar</option>
                                        <option value="Cotizado">Cotizado</option>
                                        <option value="Venta Realizada">Venta Realizada</option>
                                        <option value="Venta No Realizada">Venta No Realizada</option>
                                        <option value="Prod. Entrgado">Prod. Entrgado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success rounded-pill">Atender</button>
                </form>
                    <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Salir</button>
              </div>
            </div>
          </div>
          </div>
          <!-- Fin Modal Atender -->
        <!-- Modal Register Empresa-->
        <div class="modal fade" id="myModalRegisterEmpresa">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Agregar Empresa</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <form id="register-form-empresa">
                        <div class="row mb-2">
                            <div class="col">
                                <div class="form-group">
                                    <label for="RazonSocial">Raz??n Social</label>
                                    <input type="text" class="form-control" id="razonSocialRegister" aria-describedby="helpId" placeholder="Raz??n Social">
                                    <small id="helpId" class="form-text text-muted"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <div class="form-group">
                                    <label for="RazonSocial">RUC</label>
                                    <input type="text" class="form-control" id="rucRegister" aria-describedby="helpId" placeholder="RUC">
                                    <small id="helpId" class="form-text text-muted">Recuerda que son 11 Digitos</small>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="RazonSocial">Rubro</label>
                                    <input type="text" class="form-control" id="rubroRegister" aria-describedby="helpId" placeholder="Rubro">
                                    <small id="helpId" class="form-text text-muted">??A que se dedica?</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="RazonSocial">Sitio Web</label>
                                    <input type="text" class="form-control" id="websiteRegister" aria-describedby="helpId" placeholder="Web">
                                    <small id="helpId" class="form-text text-muted">??Tiene pagina Web?</small>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <div class="form-group">
                                    <label for="RazonSocial">Direcci??n</label>
                                    <input type="text" class="form-control" id="direccionRegisterEmpresa" aria-describedby="helpId" placeholder="Direcci??n">
                                    <small id="helpId" class="form-text text-muted"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="RazonSocial">Referencia</label>
                                    <input type="text" class="form-control" id="referenciaRegister" aria-describedby="helpId" placeholder="Referencia">
                                    <small id="helpId" class="form-text text-muted">??Cu??l es la forma m??s rapida de llegar?</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="RazonSocial">Aniversario</label>
                                    <input type="date" class="form-control" id="dateRegister" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted">??Cu??ndo se creo?</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success rounded-pill">Guardar</button>
                </form>
                    <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Salir</button>
              </div>
            </div>
          </div>
          </div>
          <!-- Fin Modal Register Empresa -->

        <!-- Modal Register Cliente-->
        <div class="modal fade" id="myModalRegisterCliente">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Agregar Cliente</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <form id="register-form-cliente">
                            <div class="row mb-2">
                                <div class="col-6">
                        <div class="row mb-2">
                            <div class="col">
                                <label for="name" class="form-label">Nombres Completos</label>
                                <input type="text" class="form-control" id="nameRegister" placeholder="Nombres y Apellidos" aria-describedby="helpId">
                                <small id="helpId" class="form-text text-muted">Recuerda ingresar un Nombre y un apellido</small>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="emailRegister" placeholder="Email" aria-describedby="helpId">
                                <small id="helpId" class="form-text text-muted">Recuerda ingresar Gmail o Hotmail</small>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="text" class="form-control" id="telefonoRegister" placeholder="Telefono" aria-describedby="helpId">
                                <small id="helpId" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="direccion" class="form-label">Direcci??n</label>
                                <input type="text" class="form-control" id="direccionRegister" placeholder="Direccion" aria-describedby="helpId">
                                <small id="helpId" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="posicion" class="form-label">Posici??n</label>
                                <input type="text" class="form-control" id="posicionRegister" placeholder="Cargo" aria-describedby="helpId">
                                <small id="helpId" class="form-text text-muted">Escriba el Cargo que esta actualmente</small>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <div class="form-group">
                                    <label for="distrito">Distrito</label>
                                    <select class="custom-select" id="distritoRegister">
                                        <option selected>Seleccione ...</option>
                                        <option value="Anc??n">Anc??n</option>
                                        <option value="Ate Vitarte">Ate Vitarte</option>
                                        <option value="Barranco">Barranco</option>
                                        <option value="Bre??a">Bre??a</option>
                                        <option value="Carabayllo">Carabayllo</option>
                                        <option value="Chorrillos">Chorrillos</option>
                                        <option value="Cieneguilla">Cieneguilla</option>
                                        <option value="Comas">Comas</option>
                                        <option value="El Agustino">El Agustino</option>
                                        <option value="Independencia">Independencia</option>
                                        <option value="Jes??s Mar??a">Jes??s Mar??a</option>
                                        <option value="La Molina">La Molina</option>
                                        <option value="Lima">Lima</option>
                                        <option value="Los Olivos">Los Olivos</option>
                                        <option value="Lurigancho">Lurigancho</option>
                                        <option value="Lur??n">Lur??n</option>
                                        <option value="Magdalena del Mar">Magdalena del Mar</option>
                                        <option value="Miraflores">Miraflores</option>
                                        <option value="Pachacamac">Pachacamac</option>
                                        <option value="Pucusana">Pucusana</option>
                                        <option value="Pueblo Libre">Pueblo Libre</option>
                                        <option value="Puente Piedra">Puente Piedra</option>
                                        <option value="Punta Hermosa">Punta Hermosa</option>
                                        <option value="Punta Negra">Punta Negra</option>
                                        <option value="Rimac">Rimac</option>
                                        <option value="San Bartolo">San Bartolo</option>
                                        <option value="San Borja">San Borja</option>
                                        <option value="San Isidro">San Isidro</option>
                                        <option value="San Juan de Lurigancho">San Juan de Lurigancho</option>
                                        <option value="San Juan de Miraflores">San Juan de Miraflores</option>
                                        <option value="San Luis">San Luis</option>
                                        <option value="San Mart??n de Porres">San Mart??n de Porres</option>
                                        <option value="San Miguel">San Miguel</option>
                                        <option value="Santa Anita">Santa Anita</option>
                                        <option value="Santa Mar??a del Mar">Santa Mar??a del Mar</option>
                                        <option value="Santa Rosa">Santa Rosa</option>
                                        <option value="Santiago de Surco">Santiago de Surco</option>
                                        <option value="Surquillo">Surquillo</option>
                                        <option value="Villa El Salvador">Villa El Salvador</option>
                                        <option value="Vila Mar??a del Triunfo">Vila Mar??a del Triunfo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <label for="provincia" class="form-label">Provincia</label>
                                <input type="text" class="form-control" id="provinciaRegister" placeholder="Provincia" aria-describedby="helpId">
                                <small id="helpId" class="form-text text-muted"></small>
                            </div>
                        </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="distrito">Empresa</label>
                                        <select class="custom-select" id="datoEmpresaRegister">
                                        </select>
                                    </div>
                                </div>
                            </div>
                                </div>
                                <div class="col-6">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <h5>Perfil Cliente</h5>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="textTipoCliente">Tipo Cliente</label>
                                                <textarea id="textTipoCliente" class="form-control" rows="3" aria-describedby="helpId"></textarea>
                                                <small class="form-text text-muted">??A que tipo de cliente pertenece?</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="textPoliticaCliente">Politica de Pago</label>
                                                <textarea id="textPoliticaCliente" class="form-control" rows="3" aria-describedby="helpId"></textarea>
                                                <small class="form-text text-muted">??C??mo realizan sus pagos?</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <div class="custom-control custom-checkbox">
                                                <input id="checkJob" class="custom-control-input" type="checkbox" value="1">
                                                <label for="checkJob" class="custom-control-label">Trabaja con Proveedores</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="textFacturacionCliente">Procedimiento de Facturaci??n y Despacho</label>
                                                <textarea id="textFacturacionCliente" class="form-control" rows="3" aria-describedby="helpId"></textarea>
                                                <small class="form-text text-muted">??C??mo realizan sus procedimientos?</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="textPagosCliente">Frecuencia de Pago</label>
                                                <textarea id="textPagosCliente" class="form-control" rows="3" aria-describedby="helpId"></textarea>
                                                <small class="form-text text-muted">??C??mo realizan sus metodos de pagos?</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="textDatosAdicionales">Datos Adicionales</label>
                                                <textarea id="textDatosAdicionales" class="form-control" rows="3" aria-describedby="helpId"></textarea>
                                                <small class="form-text text-muted">Datos extras</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                    
                </div>
                
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success rounded-pill" >Guardar</button>
                </form>
                    <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Cerrar</button>
                </div>
                
              </div>
            </div>
          </div>
          <!-- Fin Modal Register Cliente -->
            <!-- Modal Ver Datos -->
            <div class="modal fade" id="myModalVer">
                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Detalles</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col">
                                    <h5>Cliente <span id="clienteView" class="badge badge-secondary"></span></h5>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-auto">
                                    <div class="row mb-2">
                                <div class="col">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="emailView" readonly>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <label for="telefono" class="form-label">Telefono</label>
                                    <input type="text" class="form-control" id="telefonoView" readonly>
                                </div>
                                <div class="col-6">
                                    <label for="celular" class="form-label">Celular</label>
                                    <input type="text" class="form-control" id="celularView" readonly>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="direccion" class="form-label">Direcci??n</label>
                                    <input type="text" class="form-control" id="direccionView" readonly>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="posicion" class="form-label">Posici??n</label>
                                    <input type="text" class="form-control" id="posicionView" readonly>
                                </div>
                                <div class="col">
                                    <label for="provincia" class="form-label">Distrito</label>
                                    <input type="text" class="form-control" id="distritoView" readonly>
                                </div>
                                <div class="col">
                                    <label for="provincia" class="form-label">Provincia</label>
                                    <input type="text" class="form-control" id="provinciaView" readonly>
                                </div>
                            </div>
                                </div>
                                 <div class="col-auto">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <h5>Perfil Cliente</h5>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="dataTipoCliente">Tipo Cliente</label>
                                                <textarea id="dataTipoCliente" class="form-control" rows="3" readonly></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="dataPoliticaCliente">Politica de Pago</label>
                                                <textarea id="dataPoliticaCliente" class="form-control" rows="3" readonly></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="datacheckJob" class="form-label">Trabaja con Proveedores</label>
                                                <input class="form-control" type="text" id="datacheckJob" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="dataFacturacionCliente">Procedimiento de Facturaci??n y Despacho</label>
                                                <textarea id="dataFacturacionCliente" class="form-control" rows="3" readonly></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="dataPagosCliente">Frecuencia de Pago</label>
                                                <textarea id="dataPagosCliente" class="form-control" rows="3" readonly></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="datosAdicionales">Datos Adicionales</label>
                                                <textarea id="datosAdicionales" class="form-control" rows="3" readonly></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <hr>
                            <div class="row mb-2">
                                <div class="col">
                                    <h5>Empresa <span id="razonSocialView" class="badge badge-secondary"></span></h5>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="RazonSocial">RUC</label>
                                        <input type="text" class="form-control" id="rucView" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="RazonSocial">Rubro</label>
                                        <input type="text" class="form-control" id="rubroView" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="RazonSocial">Sitio Web</label>
                                        <input type="text" class="form-control" id="websiteView" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="RazonSocial">Direcci??n</label>
                                        <input type="text" class="form-control" id="direccionEmpresaView" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="RazonSocial">Referencia</label>
                                        <input type="text" class="form-control" id="referenciaView" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="RazonSocial">Aniversario</label>
                                        <input type="date" class="form-control" id="dateView" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
            <!-- Fin Modal Ver Datos-->
            <!-- Modal Editar Datos -->
            <div class="modal fade" id="myModalEditar">
                <div class="modal-dialog modal-xl">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Editar Datos</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container">
                            <form id="edit-form">
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="email" class="form-label">Cliente</label>
                                    <input type="text" class="form-control" id="clienteEdit">
                                    <input type="hidden" id="idClienteEdit">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="emailEdit">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="telefono" class="form-label">Telefono</label>
                                    <input type="text" class="form-control" id="telefonoEdit">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="direccion" class="form-label">Direcci??n</label>
                                    <input type="text" class="form-control" id="direccionEdit">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="posicion" class="form-label">Posici??n</label>
                                    <input type="text" class="form-control" id="posicionEdit">
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="distrito">Distrito</label>
                                        <select class="custom-select" id="distritoEdit">
                                            <option selected>Seleccione ...</option>
                                            <option value="Anc??n">Anc??n</option>
                                            <option value="Ate Vitarte">Ate Vitarte</option>
                                            <option value="Barranco">Barranco</option>
                                            <option value="Bre??a">Bre??a</option>
                                            <option value="Carabayllo">Carabayllo</option>
                                            <option value="Chorrillos">Chorrillos</option>
                                            <option value="Cieneguilla">Cieneguilla</option>
                                            <option value="Comas">Comas</option>
                                            <option value="El Agustino">El Agustino</option>
                                            <option value="Independencia">Independencia</option>
                                            <option value="Jes??s Mar??a">Jes??s Mar??a</option>
                                            <option value="La Molina">La Molina</option>
                                            <option value="Lima">Lima</option>
                                            <option value="Los Olivos">Los Olivos</option>
                                            <option value="Lurigancho">Lurigancho</option>
                                            <option value="Lur??n">Lur??n</option>
                                            <option value="Magdalena del Mar">Magdalena del Mar</option>
                                            <option value="Miraflores">Miraflores</option>
                                            <option value="Pachacamac">Pachacamac</option>
                                            <option value="Pucusana">Pucusana</option>
                                            <option value="Pueblo Libre">Pueblo Libre</option>
                                            <option value="Puente Piedra">Puente Piedra</option>
                                            <option value="Punta Hermosa">Punta Hermosa</option>
                                            <option value="Punta Negra">Punta Negra</option>
                                            <option value="Rimac">Rimac</option>
                                            <option value="San Bartolo">San Bartolo</option>
                                            <option value="San Borja">San Borja</option>
                                            <option value="San Isidro">San Isidro</option>
                                            <option value="San Juan de Lurigancho">San Juan de Lurigancho</option>
                                            <option value="San Juan de Miraflores">San Juan de Miraflores</option>
                                            <option value="San Luis">San Luis</option>
                                            <option value="San Mart??n de Porres">San Mart??n de Porres</option>
                                            <option value="San Miguel">San Miguel</option>
                                            <option value="Santa Anita">Santa Anita</option>
                                            <option value="Santa Mar??a del Mar">Santa Mar??a del Mar</option>
                                            <option value="Santa Rosa">Santa Rosa</option>
                                            <option value="Santiago de Surco">Santiago de Surco</option>
                                            <option value="Surquillo">Surquillo</option>
                                            <option value="Villa El Salvador">Villa El Salvador</option>
                                            <option value="Vila Mar??a del Triunfo">Vila Mar??a del Triunfo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="provincia" class="form-label">Provincia</label>
                                    <input type="text" class="form-control" id="provinciaEdit">
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-2">
                                <div class="col">
                                    <input type="hidden" id="empresaIdEdit">
                                    <div class="form-group">
                                        <label for="business">Empresa</label>
                                        <select class="custom-select" id="datoEmpresaAll">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success rounded-pill">Guardar</button>
                </form>
                        <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Salir</button>
                    </div>
                    
                </div>
                </div>
            </div>
            <!-- Fin Modal Editar Datos-->
            <!-- Modal Perfil Datos -->
            <div class="modal fade" id="myModalPerfil">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Editar Perfil</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col">
                                    <form id="form-editPerfil">
                                    <div class="form-group">
                                        <label for="nombrePerfil">Nombre</label>
                                        <input type="text" class="form-control" id="nombrePerfil" aria-describedby="helpId">
                                        <small id="helpId" class="form-text text-muted">Primer nombre</small>
                                        <input type="hidden" id="idEditProfile">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="apellidoPerfil">Apellido</label>
                                        <input type="text" class="form-control" id="apellidoPerfil" aria-describedby="helpId">
                                        <small id="helpId" class="form-text text-muted">Primer apellido</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-group">
                                      <label for="cumplea??osPerfil">Cumplea??os</label>
                                      <input type="date" class="form-control" id="cumplea??osPerfil" aria-describedby="helpId">
                                      <small id="helpId" class="form-text text-muted">??C??ando Nacio?</small>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                      <label for="telefonoPerfil">Telefono</label>
                                      <input type="text" class="form-control" id="telefonoPerfil" aria-describedby="helpId">
                                      <small id="helpId" class="form-text text-muted">Numero de telefono</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="emailPerfil">Email</label>
                                        <input type="email" class="form-control" id="emailPerfil" aria-describedby="helpId">
                                        <small id="helpId" class="form-text text-muted">Correo m??s usado</small>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success rounded-pill">Editar</button>
                    </form>
                        <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Salir</button>
                    </div>
                    
                </div>
                </div>
            </div>
            <!-- Fin Modal Perfil Datos-->

        <!-- Fin Modal's-->

        <!-- Alert (Toast) -->

        <!-- Fin Alert (Toast)-->
        
</body>
<script src="https://kit.fontawesome.com/45bbe53cd7.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script src="js/cliente.js"></script>
<script src="js/empresa.js"></script>
</html>