<?php 
$servername = "localhost";
$username = "miuprb";
$password = "miuprb";
$dbname = "Seguridad";

if (ISSET($_POST) && !EMPTY($_POST)) {


    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: ".mysqli_connect_error());
    } else {

        echo 'SID: '.$_POST['ID'];
        echo 'Data inserted';


        if (!$result) {
            echo "<tr><td>NO DATA SAVED IN DATABASE</td></tr>";
        } else {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                ECHO '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Vehicle Information</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <form action="sellos/admin.php" method="POST">
                            
    <table  frame="box" rules="none" style="border-collapse: collapse;" bordercolor="#dcdcdc" cellpadding="4" cellspacing="0">
        <tbody>
          <tr>
            <td class="frmHeader" style="border-right: 2px solid white;" background="#dcdcdc">Parameter</td>
    	      <td class="frmHeader" background="#dcdcdc">Value</td>
          </tr>

          <tr>
            <td class="frmText" style="color: #000000; font-weight: normal;">Student ID:</td>
            <td><input class="frmInput" size="50" name="StudentID" value="'.$row['ID'].'"type="text"></td>
          </tr>
        
          <tr>
            <td class="frmText" style="color: #000000; font-weight: normal;">Make:</td>
            <td><input class="frmInput" size="50" name="Make" type="text"></td>
          </tr>
        
          <tr>
            <td class="frmText" style="color: #000000; font-weight: normal;"> Model:</td>
            <td><input class="frmInput" size="50" name="Model"  type="text"></td>
          </tr>
        
          <tr>
            <td class="frmText" style="color: #000000; font-weight: normal;">Year:</td>
            <td><input class="frmInput" size="50" name="Year" type="text"></td>
          </tr>
        
          <tr>
            <td class="frmText" style="color: #000000; font-weight: normal;"> Color:</td>
            <td><input class="frmInput" size="50" name="Color" type="text"></td>
          </tr>
        
          <tr>
            <td class="frmText" style="color: #000000; font-weight: normal;">License Plate:</td>
            <td><input class="frmInput" size="50" name="LicensePlate" type="text" ></td>
          </tr>
        
          <tr>
            <td class="frmText" style="color: #000000; font-weight: normal;">Owner:</td>
            <td><input class="frmInput" size="50" name="Owner" type="text" ></td>
          </tr>
        
          <tr>
            <td class="frmText" style="color: #000000; font-weight: normal;">Relationship to Student:</td>
            <td><input class="frmInput" size="50" name="Relationship" type="text" ></td>
          </tr>
        
          <tr>
            <td class="frmText" style="color: #000000; font-weight: normal;">Seal Type:</td>
            <td><input class="frmInput" size="50" name="SealType" type="text" ></td>
          </tr>
        
          <tr>
            <td class="frmText" style="color: #000000; font-weight: normal;">Seal Number:</td>
            <td><input class="frmInput" size="50" name="Campus" type="text" ></td>
          </tr>
  
            <td></td>
            <td align="right"> <input value="Register" class="button" type="submit"></td>
          </tr>
            </tbody>
    </table>
    </form>
</body>

</html>';
            } // END RESULT > 0            
        } // END IF GOT RESULTS
    } //END IF DB CONN
} else if (ISSET($_GET) && !EMPTY($_GET) && !empty($_GET['sid'])) {
    $parametro = null;
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: ".mysqli_connect_error());
    } else {

        $query = 'SELECT *
                  FROM `Seguridad`.`students` 
                  WHERE `studentID` = "'.$_GET['sid'].'";';

        $result = $conn->query($query);

        if (!$result) {
            echo "<tr><td>NO DATA FOUND</td></tr>";
        } else {
            if ($result->num_rows == 0) {
                echo "<h1>NO DATA FOUND</h1>";
            } else if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                echo '
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Vehicle Information</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <table class="studForm">
            <tr>
                <th colspan="2">
                    Información de Estudiante
                </th>
            </tr>
            
            <tr>
                <td>Primer Nombre.......:</td>
                <td class="arg">'.$row['name'].'</td>
            </tr>
            <tr>
                <td>Inicial Seg. Nombre.:</td>
                <td class="arg">'.$row['initial'].'</td>
            </tr>
            
            <tr>
                <td>Apellido Paterno....:</td>
                <td class="arg">'.$row['lastname1'].'</td>
            </tr>
            
            <tr>
                <td>Apellido Materno....:</td>
                <td class="arg">'.$row['lastname2'].'</td>
            </tr>
            
            <tr>
                <td>Número de Estudiante:</td>
                <td class="arg">'.$row['studentID'].'</td>
            </tr>
            
            <tr>
                <td>Correo Electrónico..:</td>
                <td class="arg">'.$row['email'].'</td>
            </tr>
            
            <tr>
                <td>Departamento........:</td>
                <td class="arg">'.$row['department'].'</td>
            </tr>
            
            <tr>
                <td>Últimos 4 Seg.Soc...:</td>
                <td class="arg">'.$row['socialsec'].'</td>
            </tr>
            
            <tr>
                <td>Número de Licencia..:</td>
                <td class="arg">'.$row['licNum'].'</td>
            </tr>
            
            <tr>
                <td>Número de Teléfono 1:</td>
                <td class="arg">'.$row['phone1'].'</td>
            </tr>
            
            <tr>
                <td>Número de Teléfono 2:</td>
                <td class="arg">'.$row['phone2'].'</td>
            </tr>
            
            <tr>
                <td>Dirección...........:</td>
                <td class="arg">'.$row['address'].'</td>
            </tr>';
            }
        }

        $query2 = 'SELECT *
                  FROM `Seguridad`.`vehicles` 
                  WHERE `ID` = "'.$_GET['sid'].'";';

        $result2 = $conn->query($query2);

        if (!$result2) {
            echo "<tr><td>NO DATA FOUND</td></tr>";
        } else {
            if ($result2->num_rows == 0) {
                echo "<h1>NO DATA FOUND</h1>";
            } else if ($result2->num_rows > 0) {
                $row = $result2->fetch_assoc();

                echo '
                <tr><td><br/></td></tr>
                <tr>
                    <th colspan="2">
                        Información del Vehículo
                    </th>
                </tr>
                
                <tr>
                    <td>Marca...............:</td>
                    <td class="arg">'.$row['make'].'</td>
                </tr>
                
                <tr>
                    <td>Modelo..............:</td>
                    <td class="arg">'.$row['model'].'</td>
                </tr>
                
                <tr>
                    <td>Año.................:</td>
                    <td class="arg" class="data">'.$row['year'].'</td>
                </tr>
                
                <tr>
                    <td>Color...............:</td>
                    <td class="arg">'.$row['color'].'</td>
                </tr>
                
                <tr>
                    <td>Tablilla............:</td>
                    <td class="arg">'.$row['licensePlate'].'</td>
                </tr>
                
                <tr>
                    <td>Dueño...............:</td>
                    <td class="arg">'.$row['owner'].'</td>
                </tr>
                
                <tr>
                    <td>Relación............:</td>
                    <td class="arg">'.$row['relationship'].'</td>
                </tr>
                
                <tr>
                    <td>Tipo de Sello.......:</td>
                    <td class="arg">'.$row['sealType'].'</td>
                </tr>
                
                <tr>
                    <td>Número de Sello.....:</td>
                    <td class="arg">'.$row['sealNum'].'</td>
                </tr>';
            }
        }

        $query3 = 'SELECT *
                  FROM `Seguridad`.`sellos` 
                  WHERE `studentID` = "'.$_GET['sid'].'";';

        $result3 = $conn->query($query3);

        if (!$result3) {
            echo "<tr><td>NO DATA FOUND</td></tr>";
        } else {
            if ($result3->num_rows == 0) {
                echo "<h1>NO DATA FOUND</h1>";
            } else if ($result3->num_rows > 0) {
                $row = $result3->fetch_assoc();

                echo '
                <tr><td><br/></td></tr>
                <tr>
                    <th colspan="2">
                        Información del Sello
                    </th>
                </tr>
                
                <tr>
                    <td>Validado.......:</td>
                    <td class="arg">'.$row['validated'].'</td>
                </tr>
                
                <tr>
                    <td>Tipo de Sello:</td>
                    <td class="arg">'.$row['sealType'].'</td>
                </tr>
                
                <tr>
                    <td>Número de Sello:</td>
                    <td class="arg">'.$row['sealNum'].'</td>
                </tr>
                
                <tr>
                    <td>Fecha Expedición:</td>
                    <td class="arg">'.$row['dateBegin'].'</td>
                </tr>
                
                <tr>
                    <td>Fecha Expiración:</td>
                    <td class="arg">'.$row['dateEnd'].'</td>
                </tr>
            </table>
                ';
            }
        }
    }
} else if (ISSET($_GET) && !EMPTY($_GET) && !empty($_GET['tablilla'])) {
   
} else if (ISSET($_GET) && !EMPTY($_GET) && !empty($_GET['numSello'])) {
    
} else if (ISSET($_GET) && !EMPTY($_GET) && !empty($_GET['licencia'])) {
    $parametro = null;
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: ".mysqli_connect_error());
    } else {

        $query = 'SELECT *
                  FROM `Seguridad`.`students` 
                  WHERE `licNum` = "'.$_GET['licencia'].'";';

        $result = $conn->query($query);

        if (!$result) {
            echo "<tr><td>NO DATA FOUND</td></tr>";
        } else {
            if ($result->num_rows == 0) {
                echo "<h1>NO DATA FOUND</h1>";
            } else if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                
                $parametro = $row['studentID'];

                echo '
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Vehicle Information</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <table class="studForm">
            <tr>
                <th colspan="2">
                    Información de Estudiante
                </th>
            </tr>
            
            <tr>
                <td>Primer Nombre.......:</td>
                <td class="arg">'.$row['name'].'</td>
            </tr>
            <tr>
                <td>Inicial Seg. Nombre.:</td>
                <td class="arg">'.$row['initial'].'</td>
            </tr>
            
            <tr>
                <td>Apellido Paterno....:</td>
                <td class="arg">'.$row['lastname1'].'</td>
            </tr>
            
            <tr>
                <td>Apellido Materno....:</td>
                <td class="arg">'.$row['lastname2'].'</td>
            </tr>
            
            <tr>
                <td>Número de Estudiante:</td>
                <td class="arg">'.$row['studentID'].'</td>
            </tr>
            
            <tr>
                <td>Correo Electrónico..:</td>
                <td class="arg">'.$row['email'].'</td>
            </tr>
            
            <tr>
                <td>Departamento........:</td>
                <td class="arg">'.$row['department'].'</td>
            </tr>
            
            <tr>
                <td>Últimos 4 Seg.Soc...:</td>
                <td class="arg">'.$row['socialsec'].'</td>
            </tr>
            
            <tr>
                <td>Número de Licencia..:</td>
                <td class="arg">'.$row['licNum'].'</td>
            </tr>
            
            <tr>
                <td>Número de Teléfono 1:</td>
                <td class="arg">'.$row['phone1'].'</td>
            </tr>
            
            <tr>
                <td>Número de Teléfono 2:</td>
                <td class="arg">'.$row['phone2'].'</td>
            </tr>
            
            <tr>
                <td>Dirección...........:</td>
                <td class="arg">'.$row['address'].'</td>
            </tr>';
            }
        }

        $query2 = 'SELECT *
                  FROM `Seguridad`.`vehicles` 
                  WHERE `ID` = "'.$parametro.'";';

        $result2 = $conn->query($query2);

        if (!$result2) {
            echo "<tr><td>NO DATA FOUND</td></tr>";
        } else {
            if ($result2->num_rows == 0) {
                echo "<h1>NO DATA FOUND</h1>";
            } else if ($result2->num_rows > 0) {
                $row = $result2->fetch_assoc();

                echo '
                <tr><td><br/></td></tr>
                <tr>
                    <th colspan="2">
                        Información del Vehículo
                    </th>
                </tr>
                
                <tr>
                    <td>Marca...............:</td>
                    <td class="arg">'.$row['make'].'</td>
                </tr>
                
                <tr>
                    <td>Modelo..............:</td>
                    <td class="arg">'.$row['model'].'</td>
                </tr>
                
                <tr>
                    <td>Año.................:</td>
                    <td class="arg" class="data">'.$row['year'].'</td>
                </tr>
                
                <tr>
                    <td>Color...............:</td>
                    <td class="arg">'.$row['color'].'</td>
                </tr>
                
                <tr>
                    <td>Tablilla............:</td>
                    <td class="arg">'.$row['licensePlate'].'</td>
                </tr>
                
                <tr>
                    <td>Dueño...............:</td>
                    <td class="arg">'.$row['owner'].'</td>
                </tr>
                
                <tr>
                    <td>Relación............:</td>
                    <td class="arg">'.$row['relationship'].'</td>
                </tr>
                
                <tr>
                    <td>Tipo de Sello.......:</td>
                    <td class="arg">'.$row['sealType'].'</td>
                </tr>
                
                <tr>
                    <td>Número de Sello.....:</td>
                    <td class="arg">'.$row['sealNum'].'</td>
                </tr>';
            }
        }

        $query3 = 'SELECT *
                  FROM `Seguridad`.`sellos` 
                  WHERE `studentID` = "'.$parametro.'";';

        $result3 = $conn->query($query3);

        if (!$result3) {
            echo "<tr><td>NO DATA FOUND</td></tr>";
        } else {
            if ($result3->num_rows == 0) {
                echo "<h1>NO DATA FOUND</h1>";
            } else if ($result3->num_rows > 0) {
                $row = $result3->fetch_assoc();

                echo '
                <tr><td><br/></td></tr>
                <tr>
                    <th colspan="2">
                        Información del Sello
                    </th>
                </tr>
                
                <tr>
                    <td>Validado.......:</td>
                    <td class="arg">'.$row['validated'].'</td>
                </tr>
                
                <tr>
                    <td>Tipo de Sello:</td>
                    <td class="arg">'.$row['sealType'].'</td>
                </tr>
                
                <tr>
                    <td>Número de Sello:</td>
                    <td class="arg">'.$row['sealNum'].'</td>
                </tr>
                
                <tr>
                    <td>Fecha Expedición:</td>
                    <td class="arg">'.$row['dateBegin'].'</td>
                </tr>
                
                <tr>
                    <td>Fecha Expiración:</td>
                    <td class="arg">'.$row['dateEnd'].'</td>
                </tr>
            </table>
                ';
            }
        }
    }
} else {
    echo '
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Vehicle Information</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <table class="studForm">
            <tr>
                <th colspan="3">
                    BÚSQUEDAS
                </th>
            </tr>
            
            <tr>
                <td>NÚMERO DE ESTUDIANTE>>>></td>
                <form method="GET" action="admin.php">
                    <td>
                        <input type="text" name="sid">
                    </td>
                    <td>
                        <input type="submit" value="BUSCAR">
                    </td>
                </form>                
            </tr>
            
            <tr><td><br/></td></tr>
            
            <tr>
                <td>NÚMERO DE LICENCIA>>>>>></td>
                <form method="GET" action="admin.php">
                    <td>
                        <input type="text" name="licencia">
                    </td>
                    <td>
                        <input type="submit" value="BUSCAR">
                    </td>
                </form> 
            </tr>
            
            <tr><td><br/></td></tr>
            
            <tr>
                <td>NÚMERO DE SELLO>>>>>>>>></td>
                <form method="GET" action="admin.php">
                    <td>
                        <input type="text" name="numSello">
                    </td>
                    <td>
                        <input type="submit" value="BUSCAR">
                    </td>
                </form> 
            </tr>
            
            <tr><td><br/></td></tr>
            
            <tr>
                <td>TABLILLA DEL VEHÍCULO>>></td>
                <form method="GET" action="admin.php">
                    <td>
                        <input type="text" name="tablilla">
                    </td>
                    <td>
                        <input type="submit" value="BUSCAR">
                    </td>
                </form> 
            </tr>
        </table>
    </body>';
}
?>