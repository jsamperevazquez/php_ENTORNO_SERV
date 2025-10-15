<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bebidas formulario</title>

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

    table {
      border-collapse: collapse;
      width: 80%;
      max-width: 500px;
      margin-bottom: 35px;
      background: #fff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
      animation: fadeIn 1.2s ease;
      cursor: pointer;
    }

    th {
      background: linear-gradient(135deg, #1e88e5, #1565c0);
      color: white;
      padding: 14px;
      text-transform: uppercase;
      letter-spacing: 0.08em;
    }

    td {
      padding: 12px;
      text-align: center;
      border-bottom: 1px solid #e0e0e0;
      transition: background 0.3s ease;
    }

    tr:hover td {
      background: rgba(30, 136, 229, 0.08);
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

    label {
      display: block;
      margin-top: 15px;
      margin-bottom: 6px;
      font-weight: 600;
      text-align: center;
    }

    select,
    input[type="number"] {
      width: 80%;
      padding: 10px 12px;
      border-radius: 10px;
      border: 1px solid #ccc;
      font-size: 1rem;
      background: #fafafa;
      transition: border-color 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
      text-align: center;
    }

    select:hover,
    input[type="number"]:hover {
      transform: scale(1.02);
    }

    select:focus,
    input[type="number"]:focus {
      border-color: #1e88e5;
      outline: none;
      box-shadow: 0 0 8px rgba(30, 136, 229, 0.3);
    }

    button {
      display: block;
      margin-left: 25px;;
      width: 80%;
      background: linear-gradient(135deg, #1e88e5, #1565c0);
      color: white;
      border: none;
      padding: 12px;
      border-radius: 10px;
      font-size: 1rem;
      margin-top: 20px;
      cursor: pointer;
      font-weight: 600;
      transition: background 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
    }

    button:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(30, 136, 229, 0.3);
    }

    button:active {
      transform: scale(0.98);
    }

    /*  Modo oscuro automático */
    @media (prefers-color-scheme: dark) {
      body {
        background: linear-gradient(135deg, #121212, #1e1e1e);
        color: #e3f2fd;
      }

      table {
        background: #1e1e1e;
        box-shadow: 0 4px 14px rgba(255, 255, 255, 0.1);
      }

      th {
        background: linear-gradient(135deg, #1976d2, #0d47a1);
      }

      td {
        border-bottom: 1px solid #333;
      }

      .container {
        background: rgba(30, 30, 30, 0.9);
        color: #e3f2fd;
      }

      select,
      input[type="number"] {
        background: #2a2a2a;
        border: 1px solid #444;
        color: #e3f2fd;
      }

      button {
        background: linear-gradient(135deg, #2196f3, #0d47a1);
      }

      tr:hover td {
        background: rgba(33, 150, 243, 0.1);
      }
    }
  </style>
</head>

<body>
  <h1>Selecciona tu bebida y cantidad</h1>

  <table id="tabla-bebidas">
    <tr>
      <th>Bebida</th>
      <th>PVP</th>
    </tr>
    <tr data-value="cocacola"><td>Coca Cola</td><td>1€</td></tr>
    <tr data-value="pepsi"><td>Pepsi Cola</td><td>0,80€</td></tr>
    <tr data-value="fanta"><td>Fanta Naranja</td><td>0,90€</td></tr>
    <tr data-value="trina"><td>Trina Manzana</td><td>1,10€</td></tr>
  </table>

  <div class="container">
    <form action="accion.php" method="post">
      <select name="bebidas" id="bebidas">
        <option value="cocacola">Coca cola</option>
        <option value="pepsi" selected>Pepsi</option>
        <option value="fanta">Fanta Naranja</option>
        <option value="trina">Trina Manzana</option>
      </select>

      <label for="numero_bebidas">Número de bebidas</label>
      <input type="number" name="numero_bebidas" id="numero_bebidas" placeholder="bebidas" required>

      <button id="seleccion">Comprar</button>
    </form>
  </div>

  <script>
        // Al hacer clic en una fila, cambiará el valor del <select>
    const filas = document.querySelectorAll('tr[data-value]');
    const select = document.getElementById('bebidas');

    filas.forEach(fila => {
      fila.addEventListener('click', () => {
        const valor = fila.dataset.value;
        select.value = valor;

        fila.style.backgroundColor = 'rgba(30,136,229,0.15)';
        setTimeout(() => fila.style.backgroundColor = '', 300);
      });
    });
  </script>
</body>

</html>
