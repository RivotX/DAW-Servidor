<!DOCTYPE html>
<html>
<head>
    <title>Mi Vista</title>
    <!-- Agrega jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<button id="miBoton">Hacer petición AJAX</button>
<div id="resultado"></div>
<script>
    $(document).ready(function() {
        $('#miBoton').on('click', function() {
            $.ajax({
                url: 'http://127.0.0.1:8000/dameAnimales', // Reemplaza 'mi.endpoint' con el nombre de tu ruta
                type: 'GET',
               
                success: function(response) {
                    console.log(response);
                    
                    $('#resultado').html('respuesta del servidor: ' + response.datos);
                },
                error: function(error) {
                    console.error(error);
                    // Maneja los errores aquí
                }
            });
        });
    });
</script>

</body>
</html>
