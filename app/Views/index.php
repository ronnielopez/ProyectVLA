<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Proyect VLA!</title>
</head>

<body>


    <div class="jumbotron container">
        <h1 class="display-4">Proyecto VLA</h1>
        <hr class="my-4">
        <div class="row">
            <div class="col input-group mb-3">
                <select class="custom-select" id="curso" style="width:400px;">
                    <option selected value="null">Escoge un curso...</option>
                </select>
                <div class="input-group-append">
                    <label class="input-group-text" for="curso">Cursos</label>
                </div>
            </div>

            <div class="col input-group mb-3">
                <input type="button" id="graficar" class="btn btn-primary" value="Graficar" />
            </div>

        </div>
    </div>

    <div class="container" id="container">
        <canvas id="myChart" width="300" height="100"></canvas>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!--Grafico-->
    <script>
        //Funcion que inicia cuando carga la pagina
        $(document).ready(function() {
            //metodo post para obtener los cursos para el select con el id "#curso"
            $.post("IndexController/getCursos", (data) => {
                //variables
                let obj = JSON.parse(data);
                let select = $("#curso");

                //foreach para cargar los datos al select
                $.each(obj, (i, item) => {
                    let opt = item.nombreCurso;
                    let el = document.createElement("option");
                    el.textContent = opt;
                    el.value = item.idCurso;
                    select.append(el);
                })

            })
        });
        //fin de la funcion


        //Funcion Click al boton graficar
        $("#graficar").click(() => {
            //variable del select
            let curso = $("#curso").val();

            //metodo post para obtener los datos de los paises para la grafica
            $.post("IndexController/getsPaises",{curso: curso}, (data) => {
                
                //variables
                let paramPaises = [];
                let paramDatos = [];
                let bgColor = [];
                let bgBorder = [];
                let obj = JSON.parse(data);

                //foreach para cargar los datos a las variables de arriba
                $.each(obj, function(i, item) {
                    //metodos random para los colores del grafico
                    let r = Math.random() * 255;
                    r = Math.round(r);

                    let g = Math.random() * 255;
                    g = Math.round(g);

                    let b = Math.random() * 255;
                    b = Math.round(b);

                    paramPaises.push(item.pais);
                    paramDatos.push(item.Cantidad);

                    bgColor.push('rgba(' + r + ',' + g + ',' + b + ', 0.3)');
                    bgBorder.push('rgba(' + r + ',' + g + ',' + b + ', 1)');
                })

                //limpia el grafico y lo vuelve a generar para evitar que se repitan los datos
                $('#myChart').remove();
                $('#container').append("<canvas id='myChart' width='400' height='150'></canvas>");

                //Inicio del grafico
                var ctx = $("#myChart");
                //opcion del grafico
                let myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: paramPaises,
                        datasets: [{
                            label: 'Cursos',
                            data: paramDatos,
                            backgroundColor: bgColor,
                            borderColor: bgBorder,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
        })
        //FIn de la funcion del grafico
    </script>

</body>

</html>