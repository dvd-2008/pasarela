<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            margin-bottom: 20px;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Productos</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img src="fotos/producto1.jpg" class="card-img-top" alt="Producto 1">
                    <div class="card-body">
                        <h5 class="card-title">Producto 1</h5>
                        <p class="card-text">Precio: $10</p>
                        <label for="cantidad1">Cantidad:</label>
                        <input type="number" id="cantidad1" class="form-control" value="0">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="fotos/producto2.jpg" class="card-img-top" alt="Producto 2">
                    <div class="card-body">
                        <h5 class="card-title">Producto 2</h5>
                        <p class="card-text">Precio: $15</p>
                        <label for="cantidad2">Cantidad:</label>
                        <input type="number" id="cantidad2" class="form-control" value="0">
                    </div>
                </div>
            </div>
            <!-- Agregar más tarjetas para otros productos -->
        </div>
        <hr>
        <h4>Total: <span id="total">$0</span></h4>
        <button id="confirmarCompra" class="btn btn-primary">Confirmar Compra</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalPago" tabindex="-1" role="dialog" aria-labelledby="modalPagoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPagoLabel">Pasarela de Pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí colocas tu formulario de pasarela de pago con estilos de Bootstrap -->
                    <form action="procesar_pago.php" method="post">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required><br>
                        <label for="tarjeta">Número de tarjeta:</label>
                        <input type="text" id="tarjeta" name="tarjeta" class="form-control" required><br>
                        <label for="fecha">Fecha de expiración (MM/AA):</label>
                        <input type="text" id="fecha" name="fecha" class="form-control" required><br>
                        <label for="cvv">CVV:</label>
                        <input type="text" id="cvv" name="cvv" class="form-control" required><br>
                        <label for="monto">Monto a pagar:</label>
                        <input type="text" id="monto" name="monto" class="form-control" required><br>
                        <button type="submit" class="btn btn-success btn-block">Pagar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Ventana emergente de confirmación de compra -->
    <div id="ventanaEmergente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ventanaEmergenteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ventanaEmergenteLabel">¡Felicidades por su compra!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Su compra se ha realizado correctamente.
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            // Función para actualizar el total cuando cambia la cantidad de un producto
            function actualizarTotal() {
                var total = 0;
                total += parseInt($('#cantidad1').val()) * 10;
                total += parseInt($('#cantidad2').val()) * 15;
                // Agregar más líneas para otros productos

                $('#total').text('$' + total);
            }

            // Agregar event listeners para cada input de cantidad
            $('#cantidad1').on('input', actualizarTotal);
            $('#cantidad2').on('input', actualizarTotal);
            // Agregar más event listeners para otros productos

            // Event listener para abrir el modal de pago
            $('#confirmarCompra').click(function() {
                $('#modalPago').modal('show');
            });

            // Event listener para mostrar la ventana emergente de confirmación de compra
            $('#modalPago form').submit(function(event) {
                event.preventDefault(); // Evitar el envío del formulario por defecto
                $('#modalPago').modal('hide'); // Ocultar el modal de pago
                $('#ventanaEmergente').modal('show'); // Mostrar la ventana emergente de confirmación de compra
            });
        });
    </script>
</body>
</html>
