<style>
    body {
        font-family: "Poppins", "Segoe UI", Roboto, sans-serif;
        background: linear-gradient(135deg, #f0f4ff, #e3f2fd);
        color: #1a237e;
        margin: 0;
        padding: 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
        transition: background 0.5s ease, color 0.5s ease;
        animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    h1 {
        text-align: center;
        margin-bottom: 25px;
        font-size: 2rem;
        letter-spacing: 0.05em;
        animation: slideDown 0.8s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .container {
        background: rgba(255, 255, 255, 0.9);
        padding: 25px 30px;
        border-radius: 16px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        max-width: 420px;
        width: 100%;
        backdrop-filter: blur(6px);
        transition: background 0.5s ease, color 0.5s ease;
        animation: fadeIn 1.4s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }


    /* Modo oscuro automático */
    @media (prefers-color-scheme: dark) {
        body {
            background: linear-gradient(135deg, #121212, #1e1e1e);
            color: #e3f2fd;
        }



        .container {
            background: rgba(30, 30, 30, 0.9);
            color: #e3f2fd;
        }

    }

    footer{
        margin-top: 50px;
        
    }
</style>

<h1>TU COMPRA</h1>
<span class="container">
    <?php
    $numero_bebidas = $_POST['numero_bebidas'];
    $bebida_seleccionada = $_POST['bebidas'];
    switch ($bebida_seleccionada) {
        case 'cocacola':
            echo '<p>' . "Pediste $numero_bebidas botellas de $bebida_seleccionada. Precio total a pagar: " . 1 * $numero_bebidas . ' Euros' . '</p>';
            echo '<img src="coca.jpeg"></img>';
            break;
        case 'pepsi':
            echo '<p>' . "Pediste $numero_bebidas botellas de $bebida_seleccionada. Precio total a pagar: " . 0.8 * $numero_bebidas . ' Euros' . '</p>';
            echo '<img src="pepsi.jpeg"></img>';
            break;
        case 'fanta':
            echo '<p>' . "Pediste $numero_bebidas botellas de $bebida_seleccionada. Precio total a pagar: " . 0.9 * $numero_bebidas . ' Euros' . '</p>';
            echo '<img src="fanta.jpeg"></img>';
            break;
        case 'trina':
            echo '<p>' . "Pediste $numero_bebidas botellas de $bebida_seleccionada. Precio total a pagar: " . 1.1 * $numero_bebidas . ' Euros' . '</p>';
            echo '<img src="trina.jpeg"></img>';
            break;
    }
    ?>
</span>
<footer>Gracias por su visita</footer>