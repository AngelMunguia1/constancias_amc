<?php echo $header;?>
<title>
    CONSTANCIAS - AMH - GRUPO LAHE    
</title>
<body class="g-sidenav-show  bg-gray-100">
    <?php echo $asideMenu;?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-3 text-dark" href="javascript:;">
                                <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>shop </title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-1716.000000, -439.000000)" fill="#252f40" fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(0.000000, 148.000000)">
                                                    <path d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                                                    <path d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item text-sm opacity-5 text-dark"><a href="/Principal/">Principal</a></li>
                        <li class="breadcrumb-item text-sm opacity-10 text-dark">Constancias</li>
                    </ol>
                </nav>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="container-fluid">
            <div class=" mt-7 mb-4">
                <div class="card card-body mt-n6 overflow-hidden">
                    <div class="row gx-4">
                        <div class="col-auto">
                            <div class="bg-gradient-pink avatar avatar-xl position-relative">
                                <!-- <img src="../../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm"> -->
                                <span class="fa fa-file" style="font-size: xx-large;"></span>
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    Constancias para asistentes
                                </h5>
                                <p class="mb-0 font-weight-bold text-sm">
                                </p>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                <div>
                                    <form class="form-inline my-2 my-lg-0" action="/constancias2022/Usuario" method="POST">
                                        <div class="row">
                                            <div class="col-12 col-md-12">
                                                <input class="form-control mr-sm-2" style="font-size: 35px;" autofocus type="search" id="search" name="search" placeholder="Ej. nombre_123@hotmail.com" aria-label="Search">
                                            </div>
                                            <div class="col-12 col-md-12 mt-md-2">
                                                <button class="btn max-btn-lg bg-gradient-pink-white text-white my-2 my-sm-0" type="submit">↑↑↑ ¡Ingresa tu correo para descargar tu constancia! ↑↑↑</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>


            <footer class="footer pt-3  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                © <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.grupolahe.com" class="font-weight-bold" target="_blank">Grupo LAHE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

    </main>
    <?php echo $modal;?>
</body>

<?php echo $footer; ?>

<script>
    if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
</script>

<script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />

<script>
    $(document).ready(function() {

        // $("#categoria").on("change",function(){
        //     alert($(this).attr('data-costo'));
        //     alert($(this).val());
        // })

        $("#form_etiquetas").on("click", function(event) {
            event.preventDefault();
            var formData = new FormData(document.getElementById("form_etiquetas"));

            no_habitacion = $("#no_habitacion").val();
            clave_ra = $("#clave_ra").val();
            no_etiquetas = $("#no_etiquetas").val();

            console.log(no_habitacion);
            console.log(clave_ra);
            console.log(no_etiquetas);

            $("#a_abrir_etiqueta").attr("href", "/Asistentes/abrirpdf/" + clave_ra + "/" + no_etiquetas + "/" + no_habitacion);
            $("#a_abrir_etiqueta")[0].click();

        });

        $('#asistentes a').addClass('active');
        $('#asistentes .fa-users').addClass('text-white');


        $('#user_list_table').DataTable({
            "drawCallback": function(settings) {
                $('.current').addClass("btn bg-gradient-pink text-white btn-rounded").removeClass("paginate_button");
                $('.paginate_button').addClass("btn").removeClass("paginate_button");
                $('.dataTables_length').addClass("m-4");
                $('.dataTables_info').addClass("mx-4");
                $('.dataTables_filter').addClass("m-4");
                $('input').addClass("form-control");
                $('select').addClass("form-control");
                $('.previous.disabled').addClass("btn-outline-info opacity-5 btn-rounded mx-2");
                $('.next.disabled').addClass("btn-outline-info opacity-5 btn-rounded mx-2");
                $('.previous').addClass("btn-outline-info btn-rounded mx-2");
                $('.next').addClass("btn-outline-info btn-rounded mx-2");
                $('a.bg-gradiente-musa').addClass("btn-rounded");
            },
            "language": {

                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }

            }
        });

        $('#user_list_table_faltante').DataTable({
            "drawCallback": function(settings) {
                $('.current').addClass("btn bg-gradient-pink text-white btn-rounded").removeClass("paginate_button");
                $('.paginate_button').addClass("btn").removeClass("paginate_button");
                $('.dataTables_length').addClass("m-4");
                $('.dataTables_info').addClass("mx-4");
                $('.dataTables_filter').addClass("m-4");
                $('input').addClass("form-control");
                $('select').addClass("form-control");
                $('.previous.disabled').addClass("btn-outline-info opacity-5 btn-rounded mx-2");
                $('.next.disabled').addClass("btn-outline-info opacity-5 btn-rounded mx-2");
                $('.previous').addClass("btn-outline-info btn-rounded mx-2");
                $('.next').addClass("btn-outline-info btn-rounded mx-2");
                $('a.btn').addClass("btn-rounded");
            },
            "language": {

                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }

            }
        });

        $(".btn_download").on("click", function(event) {
            event.preventDefault();
            var valueButton = $(this).attr('id');
            var code = $(this).attr('data-value');
            var id_constancia = $(this).attr('data-id');

            document.getElementById('a-download' + id_constancia).click();


            $.ajax({
                url: "/Home/enviarEmail",
                type: "POST",
                data: {
                    code: code
                },
                cache: false,
                dataType: "json",
                // contentType: false,
                // processData: false,
                beforeSend: function() {
                    console.log("Procesando....");

                },
                success: function(respuesta) {
                    console.log(respuesta);

                    Swal.fire(
                        'OK',
                        'Your certificate has been sent !!!',
                        'Success'
                    );

                },
                error: function(respuesta) {
                    console.log(respuesta);
                }

            });

        });


        $('table#user_list_table').on("click", "button.btn_qr", function(event) {
            event.preventDefault();

            var valueButton = $(this).val();
            $(this).hide();

            $.ajax({
                url: "/Asistentes/generaterQr",
                type: "POST",
                data: {
                    id_ticket_virtual: valueButton
                },
                cache: false,
                dataType: "json",
                // contentType: false,
                // processData: false,
                beforeSend: function() {
                    console.log("Procesando....");

                },
                success: function(respuesta) {
                    //console.log(respuesta);

                    //boton descargar
                    $("#btn-download" + valueButton).attr("data-id", respuesta.id_constancia);
                    $("#btn-download" + valueButton).attr("data-value", respuesta.code);
                    $("#btn-download" + valueButton).removeClass("d-none");
                    $("#btn-download" + valueButton).attr("href", respuesta.ruta_constancia);
                    //$("#btn-download"+valueButton).attr("target", "_blank");

                    // a de descargar pdf
                    $("#a-download" + valueButton).attr("href", respuesta.ruta_constancia);
                    $("#a-download" + valueButton).attr("download", "");

                },
                error: function(respuesta) {
                    console.log(respuesta);
                }

            });
        });
        
        $("#pais").on("change", function() {
            var pais = $(this).val();
            $.ajax({
                url: "/Asistentes/getEstadoPais",
                type: "POST",
                data: {
                    pais
                },
                dataType: "json",
                beforeSend: function() {
                    console.log("Procesando....");
                    $('#estado')
                        .find('option')
                        .remove()
                        .end();

                },
                success: function(respuesta) {
                    console.log(respuesta);

                    $('#estado').removeAttr('disabled');

                    $('#estado')
                        .append($('<option>', {
                                value: ''
                            })
                            .text('Selecciona una opción'));

                    $.each(respuesta, function(key, value) {
                        //console.log(key);
                        console.log(value);
                        $('#estado')
                            .append($('<option>', {
                                    value: value.id_estado
                                })
                                .text(value.estado));
                    });

                },
                error: function(respuesta) {
                    console.log(respuesta);
                }

            });
        });

        $("#form_datos").on("submit", function(event) {
            event.preventDefault();
            var formData = new FormData(document.getElementById("form_datos"));

            // for (var value of formData.values()) {
            //     console.log(value);
            // }
            $.ajax({
                url: "/Asistentes/saveData",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    console.log("Procesando....");
                    // alert('Se está borrando');

                },
                success: function(respuesta) {
                    console.log(respuesta);

                    if (respuesta == 'success') {
                        Swal.fire("¡Se creo el usuario correctamente!", "", "success").
                        then((value) => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire("¡Hubo un error al crear el usuario!", "", "warning").
                        then((value) => {
                            window.location.reload();
                        });
                    }
                },
                error: function(respuesta) {
                    console.log(respuesta);
                    // alert('Error');
                    Swal.fire("¡Hubo un error al crear el usuario!", "", "warning").
                    then((value) => {
                        window.location.reload();
                    });
                }
            });
        });

    });

    $("#usuario").on("keyup", function() {
            console.log($(this).val());
            $.ajax({
                type: "POST",
                async: false,
                url: "/Asistentes/isUserValidate",
                data: {
                    usuario: $(this).val()
                },
                success: function(data) {
                    console.log(data)
                    if (data == "true") {
                        //el usuario ya existe
                        $("#btn_upload").css('display', 'none');
                        $("#msg_email").css('color', 'red');
                        $("#msg_email").html('Este correo ya se ha registrado');

                    } else {
                        $("#btn_upload").css('display', 'inline-block');
                        $("#msg_email").css('color', 'red');
                        $("#msg_email").html('');
                    }
                }
            });
        });

    
</script>

