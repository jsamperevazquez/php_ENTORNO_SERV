<?php
// conectaMy: devuelve una conexión a la base de datos `pifias` mediante MySQLi orientado a objetos. [0.5]
// host db; usuario: root; contraseña: test; base de datos pifias;

function conectaMy()
{
    try {
        $conn = new mysqli('db', 'root', 'test', 'pifias');
        // Verificar la conexión
        if ($conn->connect_error) {
            throw new Exception("Error de conexión: " . $conn->connect_error);
        }
        return $conn;
    } catch (Exception $e) {
        echo "<div class='alert alert-danger' role='alert'>" . $e->getMessage() . "</div>";
        return null;
    }
}

function desconectaMy($conexion)
{
    
    $conexion->close();
}

// conectaPDO: devuelve una conexión a la base de datos `pifias` mediante PDO. [0.5]
// host db; usuario: root; contraseña: test; base de datos pifias;

function conectaPDO()
{
    $mysqlData = [
        'host' => 'db',
        'user' => 'root',
        'pass' => 'test',
        'dbname' => 'pifias',
    ];
    try {
        $connPDO = new PDO("mysql:host={$mysqlData['host']};dbname={$mysqlData['dbname']}", $mysqlData['user'], $mysqlData['pass']);
        $connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connPDO;
        if ($connPDO->connect_error) {
            throw new Exception("Error de conexión: " . $connPDO->connect_error);
        }
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger' role='alert'>" . $e->getMessage() . "</div>";
        return null;
    }
}

// listaJuegos: devuelve la lista completa de juegos de la aplicación en un array. En caso de ocurrir un error, devolverá el mensaje del error. Debe usarse una conexión mediante MySQLi orientado a objetos. [0.75]
// SELECT * FROM juegos

function listaJuegos()
{
    try {
        $conn = conectaMy();
        $juegos = [];
        if ($conn) {
            $sql = "SELECT * FROM juegos";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $juegos[] = $row;
                }
            } else {
                echo "<div class='alert alert-info' role='alert'>No se encontraron juegos</div>";
            }
        }
    } catch (Exception $e) {
        echo "<div class='alert alert-danger' role='alert'> Error en conexión" . $e->getMessage() . "</div>";
    } finally {
        desconectaMy($conn);
    }
    return $juegos;
}


// listaPartidas: devuelve la lista de partidas de la aplicación. Recibirá el id del juego opcionalmente. Si lo recibe, filtrará para devolver solo partidas de este juego y que sean a partir del día actual incluido (`CURDATE()`). En caso de ocurrir un error, devolverá el mensaje del error. Debe usarse una conexión mediante PDO. Recuerda que tendrás que recuperar información de más de una tabla. [1.25]
// SELECT <campos requeridos> FROM partidas p JOIN juegos j ON p.juego_id = j.id JOIN socios s ON p.master_id = s.id WHERE fecha >= CURDATE()

function listaPartidas($id = null)
{
    try {
        $conn = conectaPDO();
        $partidas = [];

        if ($conn) {

            // Consulta base
            $sql = "SELECT 
                        p.id, 
                        p.juego_id, 
                        j.titulo AS juego_nombre, 
                        j.num_jugadores, 
                        p.fecha, 
                        p.hora, 
                        p.master_id, 
                        s.nombre AS master_nombre 
                    FROM partidas p 
                    JOIN juegos j ON p.juego_id = j.id 
                    JOIN socios s ON p.master_id = s.id 
                    WHERE p.fecha >= CURDATE()";

            // Filtro opcional por id de juego
            if ($id !== null) {
                $sql .= " AND p.juego_id = :juego_id";
            }

            $stmt = $conn->prepare($sql);

            if ($id !== null) {
                $stmt->bindParam(':juego_id', $id, PDO::PARAM_INT);
            }

            $stmt->execute();
            $partidas = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($partidas)) {
                echo "<div class='alert alert-info' role='alert'>No se encontraron partidas</div>";
            }
        }

        return $partidas;
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}


// listaSocios: devuelve la lista completa de socios de la aplicación en un array. Recibirá un parámetro booleano indicando si se requiere que la lista sea de los elegibles para master de una partida o no. Si el parámetro no viene, lo ignorará. En caso de ocurrir un error, devolverá el mensaje del error. Debe usarse una conexión mediante PDO. [0.75]
// SELECT * FROM socios [WHERE elegible_master = 1]

function listaSocios($boolean)
{
    try {
        $conn = conectaPDO();
        $socios = [];
        if ($conn) {
            $sql = "SELECT * FROM socios";
            if ($boolean) {
                $sql .= " WHERE elegible_master = 1";
            }
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $socios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (empty($socios)) {
                echo "<div class='alert alert-info' role='alert'>No se encontraron socios</div>";
            }
        }
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger' role='alert'> Error en conexión" . $e->getMessage() . "</div>";
    } finally {
        $conn = null;
    }
    return $socios;
}

// recuperaJuego: devuelve los datos de un juego a partir de su id. En caso de ocurrir un error, devolverá el mensaje del error. Debe usarse una conexión mediante MySQLi orientado a objetos. [0.5]
// SELECT * FROM juegos WHERE id = n

function recuperaJuego($id)
{
    try {
        $conn = conectaMy();
        $juego = null;
        if ($conn) {
            $sql = "SELECT * FROM juegos WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $juego = $result->fetch_assoc();
            } else {
                echo "<div class='alert alert-info' role='alert'>No se encontró el juego</div>";
            }
        }
    } catch (Exception $e) {
        echo "<div class='alert alert-danger' role='alert'> Error en conexión" . $e->getMessage() . "</div>";
    } finally {
        desconectaMy($conn);
    }
    return $juego;
}

// nuevaPartida: recibe la información de una nueva partida y la guarda. Devuelve true o el mensaje de error en caso de fallar.
// Debe usarse una conexión mediante PDO y haciendo uso de una consulta preparada. [1.0]
// INSERT INTO partidas (juego_id, fecha, hora, master_id) VALUES (x, x, x, x)

function nuevaPartida($id_juego, $fecha, $hora, $master) {
    try {
        $conn = conectaPDO();
        if ($conn) {
            $sql = "INSERT INTO partidas (juego_id, fecha, hora, master_id) VALUES (:juego_id, :fecha, :hora, :master_id)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([     // Ya hacemos el bindparams aquí directamente
                ':juego_id' => $id_juego,
                ':fecha' => $fecha,
                ':hora' => $hora,
                ':master_id' => $master
            ]);
            echo "<div class='alert alert-success' role='alert'>Partida creada correctamente</div>";
            echo '<meta http-equiv="refresh" content="2;url=index.php">';
        }
    }catch (PDOException $e) {
        echo "<div class='alert alert-danger' role='alert'> Error en conexión" . $e->getMessage() . "</div>";
    } finally {
        $conn = null;
    }
}

// <div class='alert alert-danger' role='alert'>mensaje</div>
