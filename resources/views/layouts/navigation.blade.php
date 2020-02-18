
<ul class="nav metismenu" id="side-menu">

    <li class="nav-header">
        <div class="dropdown profile-element">
            <?php $imageneEmpresa= \Illuminate\Support\Facades\DB::table('empresas')->select('logo_plandesarrollo')->first(); ?>
            <a href="{{route('empresa.index')}}"><img alt="image" class="roundeds-circle" style="border-radius: 5px;width: 94px;" src="{{asset('images/'.$imageneEmpresa->logo_plandesarrollo)}}"/>
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="block m-t-xs font-bold">{{ auth()->user()->nombreCompleto }}</span>
                </a>
            </a>
        </div>
        <div class="logo-element">
            SC+
        </div>
    </li>
    <li class="">
        <a href="#"><i class="fa fa-users"></i><span class="nav-label">Terceros y Dependencias</span> <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            @can('personaNarutal.index')
                <li class="">
                    <a  href="{{route('personaNarutal.index')}}">Personas Naturales</a>
                </li>
            @endcan
            @can('personaJuridica.index')
                <li class="">
                    <a  href="{{route('personaJuridica.index')}}">Personas Juridicas</a>
                </li>
            @endcan
            @can('personaEmpleado.index')
                <li class="">
                    <a  href="{{route('personaEmpleado.index')}}">Personas Empleado</a>
                </li>
            @endcan
            @can('consorciados.index')
                <li class="">
                    <a  href="{{route('consorciados.index')}}">Consorciados</a>
                </li>
            @endcan
            @can('dependecias.index')
                <li class="">
                    <a  href="{{route('dependecias.index')}}">Dependecias</a>
                </li>
            @endcan
        </ul>
    </li>
    <li>
        <a class="nav-link" href="{{route('users.index')}}">
            <i class="fa fa-fw fa-key"></i><span>Usuarios</span></a>
    </li>
    <li>
        <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Configuraciones del Sistema</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li>
                @can('tipoDocumento.index')
                    <a  href="{{route('tipoDocumento.index')}}">Tipos de Documento</a>
                @endcan
            </li>
            <li>
                @can('clasePersona.index')
                    <a  href="{{route('clasePersona.index')}}">Clase de Persona</a>
                @endcan
            </li>
            <li>
                @can('codigoEmpleo.index')
                    <a  href="{{route('codigoEmpleo.index')}}">Códigos de Empleos</a>
                @endcan
            </li>
            <li>
                @can('nivelEmpleo.index')
                    <a  href="{{route('nivelEmpleo.index')}}">Niveles de Empleo</a>
                @endcan
            </li>
            <li>
                @can('regimenTributario.index')
                    <a  href="{{route('regimenTributario.index')}}">Régimen Tributario</a>
                @endcan
            </li>
            <li>
                @can('tipoVinculacion.index')
                    <a  href="{{route('tipoVinculacion.index')}}">Tipo de Vinculación</a>
                @endcan
            </li>
            <li>
                @can('unidadEjecutar.index')
                    <a  href="{{route('unidadEjecutar.index')}}">Unidad Ejecutorá</a>
                @endcan
            </li>
            <li>
                @can('bienes.index')
                    <a  href="{{route('bienes.index')}}">Bienes y Servicios</a>
                @endcan
            </li>
            <li>
                @can('roles.index')
                    <a  href="{{route('roles.index')}}">Roles y Permisos</a>
                @endcan
            </li>
            <li>
            @can('nivelPresupuesto.index')
                    <a  href="{{route('nivelPresupuesto.index')}}">Configuración Niveles de Presupuesto</a>
            @endcan
            </li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="fa fa-calculator"></i> <span class="nav-label">Contabilidad</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li>
                @can('transaccion.index')
                    <a class="collapse-item" href="{{route('transaccion.index')}}">Transacciónes</a>
                @endcan
            </li>
            <li>
                @can('puc.index')
                    <a class="collapse-item" href="{{route('puc.index')}}">Catalogo de Cuentas</a>
                @endcan
            </li>
            <li>
                @can('cuentasInstitucionales.index')
                    <a class="collapse-item" href="{{route('cuentasInstitucionales.index')}}">Cuentas Institucionales</a>

                @endcan
            </li>
            <li>
                @can('sede.index')
                    <a class="collapse-item" href="{{route('sede.index')}}">Centro de Costo</a>
                @endcan
            </li>
            <li>
                @can('niff.index')
                    <a class="collapse-item" href="{{route('niff.index')}}">Catalogo de Cuentas NIIF</a>
                @endcan
            </li>
            <li>
                @can('panel.index')
                    <a class="collapse-item" href="{{route('panel.index')}}">Soporte Contable</a>
                @endcan
            </li>
            <li>
                @can('cierres.index')
                    <a class="collapse-item" href="{{route('cierres.index')}}">Configurar Cierre Anual</a>
                @endcan
            </li>
            <li class="dropdown-divider"></li>
            <li>
                <a href="#" id="damian">Libros Auxiliares<span class="fa arrow"></span></a>
                <ul class="nav nav-third-level">
                    <li>
                        <a href="{{route('librosAuxiliar.getLibrosAuxiliar')}}">Libros Auxiliares</a>
                    </li>
                    <li>
                        <a href="{{route('balancePrueba.getBalancePrueba')}}">Balance de Pruebas</a>
                    </li>
                    <li>
                        <a href="{{route('libroMayor.getLibroMayor')}}">Libro Mayor de Balances</a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="fas fa-comments-dollar"></i> <span class="nav-label">Manejo de Tesorería y Gastos </span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li>
                <a href="{{route('retenciones.index')}}">Configurar Retenciones y Descuentos</a>
            </li>
            <li>
                <a href="{{route('presupuestogasto.index')}}">Presupuesto de Gastos</a>
            </li>
        </ul>
    </li>
    {{--<li>
        <a href="metrics.html"><i class="fa fa-pie-chart"></i> <span class="nav-label">Metrics</span>  </a>
    </li>
    <li>
        <a href="widgets.html"><i class="fa fa-flask"></i> <span class="nav-label">Widgets</span></a>
    </li>
    <li>
        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Forms</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li>
                @can('tipoDocumento.index')
                    <a  href="{{route('tipoDocumento.index')}}">Tipos de Documento</a>
                @endcan
            </li>
            <li>
                @can('clasePersona.index')
                    <a  href="{{route('clasePersona.index')}}">Clase de Persona</a>
                @endcan
            </li>
            <li>
                @can('codigoEmpleo.index')
                    <a  href="{{route('codigoEmpleo.index')}}">Códigos de Empleos</a>
                @endcan
            </li>
            <li>
                @can('nivelEmpleo.index')
                    <a  href="{{route('nivelEmpleo.index')}}">Niveles de Empleo</a>
                @endcan
            </li>
            <li>
                @can('regimenTributario.index')
                    <a  href="{{route('regimenTributario.index')}}">Régimen Tributario</a>
                @endcan
            </li>
            <li>
                @can('tipoVinculacion.index')
                    <a  href="{{route('tipoVinculacion.index')}}">Tipo de Vinculación</a>
                @endcan
            </li>
            <li>
                @can('unidadEjecutar.index')
                    <a  href="{{route('unidadEjecutar.index')}}">Unidad Ejecutorá</a>
                @endcan
            </li>
            <li>
                @can('bienes.index')
                    <a  href="{{route('bienes.index')}}">Bienes y Servicios</a>
                @endcan
            </li>
            <li>
                @can('roles.index')
                    <a  href="{{route('roles.index')}}">Roles y Permisos</a>
                @endcan
            </li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">App Views</span>  <span class="float-right label label-primary">SPECIAL</span></a>
        <ul class="nav nav-second-level collapse">
            <li><a href="contacts.html">Contacts</a></li>
            <li><a href="profile.html">Profile</a></li>
            <li><a href="profile_2.html">Profile v.2</a></li>
            <li><a href="contacts_2.html">Contacts v.2</a></li>
            <li><a href="projects.html">Projects</a></li>
            <li><a href="project_detail.html">Project detail</a></li>
            <li><a href="activity_stream.html">Activity stream</a></li>
            <li><a href="teams_board.html">Teams board</a></li>
            <li><a href="social_feed.html">Social feed</a></li>
            <li><a href="clients.html">Clients</a></li>
            <li><a href="full_height.html">Outlook view</a></li>
            <li><a href="vote_list.html">Vote list</a></li>
            <li><a href="file_manager.html">File manager</a></li>
            <li><a href="calendar.html">Calendar</a></li>
            <li><a href="issue_tracker.html">Issue tracker</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="article.html">Article</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="timeline.html">Timeline</a></li>
            <li><a href="pin_board.html">Pin board</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li><a href="search_results.html">Search results</a></li>
            <li><a href="lockscreen.html">Lockscreen</a></li>
            <li><a href="invoice.html">Invoice</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="login_two_columns.html">Login v.2</a></li>
            <li><a href="forgot_password.html">Forget password</a></li>
            <li><a href="register.html">Register</a></li>
            <li><a href="404.html">404 Page</a></li>
            <li><a href="500.html">500 Page</a></li>
            <li><a href="empty_page.html">Empty page</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="fa fa-globe"></i> <span class="nav-label">Miscellaneous</span><span class="label label-info float-right">NEW</span></a>
        <ul class="nav nav-second-level collapse">
            <li><a href="toastr_notifications.html">Notification</a></li>
            <li><a href="nestable_list.html">Nestable list</a></li>
            <li><a href="agile_board.html">Agile board</a></li>
            <li><a href="timeline_2.html">Timeline v.2</a></li>
            <li><a href="diff.html">Diff</a></li>
            <li><a href="pdf_viewer.html">PDF viewer</a></li>
            <li><a href="i18support.html">i18 support</a></li>
            <li><a href="sweetalert.html">Sweet alert</a></li>
            <li><a href="idle_timer.html">Idle timer</a></li>
            <li><a href="truncate.html">Truncate</a></li>
            <li><a href="password_meter.html">Password meter</a></li>
            <li><a href="spinners.html">Spinners</a></li>
            <li><a href="spinners_usage.html">Spinners usage</a></li>
            <li><a href="tinycon.html">Live favicon</a></li>
            <li><a href="google_maps.html">Google maps</a></li>
            <li><a href="datamaps.html">Datamaps</a></li>
            <li><a href="social_buttons.html">Social buttons</a></li>
            <li><a href="code_editor.html">Code editor</a></li>
            <li><a href="modal_window.html">Modal window</a></li>
            <li><a href="clipboard.html">Clipboard</a></li>
            <li><a href="text_spinners.html">Text spinners</a></li>
            <li><a href="forum_main.html">Forum view</a></li>
            <li><a href="validation.html">Validation</a></li>
            <li><a href="tree_view.html">Tree view</a></li>
            <li><a href="loading_buttons.html">Loading buttons</a></li>
            <li><a href="chat_view.html">Chat view</a></li>
            <li><a href="masonry.html">Masonry</a></li>
            <li><a href="tour.html">Tour</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">UI Elements</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li><a href="typography.html">Typography</a></li>
            <li><a href="icons.html">Icons</a></li>
            <li><a href="draggable_panels.html">Draggable Panels</a></li> <li><a href="resizeable_panels.html">Resizeable Panels</a></li>
            <li><a href="buttons.html">Buttons</a></li>
            <li><a href="video.html">Video</a></li>
            <li><a href="tabs_panels.html">Panels</a></li>
            <li><a href="tabs.html">Tabs</a></li>
            <li><a href="notifications.html">Notifications & Tooltips</a></li>
            <li><a href="helper_classes.html">Helper css classes</a></li>
            <li><a href="badges_labels.html">Badges, Labels, Progress</a></li>
        </ul>
    </li>
    <li>
        <a href="grid_options.html"><i class="fa fa-laptop"></i> <span class="nav-label">Grid options</span></a>
    </li>
    <li>
        <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Tables</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li><a href="table_basic.html">Static Tables</a></li>
            <li><a href="table_data_tables.html">Data Tables</a></li>
            <li><a href="table_foo_table.html">Foo Tables</a></li>
            <li><a href="jq_grid.html">jqGrid</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">E-commerce</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li><a href="ecommerce_products_grid.html">Products grid</a></li>
            <li><a href="ecommerce_product_list.html">Products list</a></li>
            <li><a href="ecommerce_product.html">Product edit</a></li>
            <li><a href="ecommerce_product_detail.html">Product detail</a></li>
            <li><a href="ecommerce-cart.html">Cart</a></li>
            <li><a href="ecommerce-orders.html">Orders</a></li>
            <li><a href="ecommerce_payments.html">Credit Card form</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li><a href="basic_gallery.html">Lightbox Gallery</a></li>
            <li><a href="slick_carousel.html">Slick Carousel</a></li>
            <li><a href="carousel.html">Bootstrap Carousel</a></li>

        </ul>
    </li>
    <li>
        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Menu Levels </span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li>
                <a href="#" id="damian">Third Level <span class="fa arrow"></span></a>
                <ul class="nav nav-third-level">
                    <li>
                        <a href="#">Third Level Item</a>
                    </li>
                    <li>
                        <a href="#">Third Level Item</a>
                    </li>
                    <li>
                        <a href="#">Third Level Item</a>
                    </li>

                </ul>
            </li>
            <li><a href="#">Second Level Item</a></li>
            <li>
                <a href="#">Second Level Item</a></li>
            <li>
                <a href="#">Second Level Item</a></li>
        </ul>
    </li>
    <li>
        <a href="css_animation.html"><i class="fa fa-magic"></i> <span class="nav-label">CSS Animations </span><span class="label label-info float-right">62</span></a>
    </li>
    <li class="landing_link">
        <a target="_blank" href="landing.html"><i class="fa fa-star"></i> <span class="nav-label">Landing Page</span> <span class="label label-warning float-right">NEW</span></a>
    </li>
    <li class="special_link">
        <a href="package.html"><i class="fa fa-database"></i> <span class="nav-label">Package</span></a>
    </li>--}}
</ul>
