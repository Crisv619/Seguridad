<?php 
if (ISSET($_POST) && !EMPTY($_POST)) {
    $servername = "localhost";
    $username = "miuprb";
    $password = "miuprb";
    $dbname = "Seguridad";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: ".mysqli_connect_error());
    } else {
        $query = 'INSERT INTO `Seguridad`.`students` (
        `name`, 
        `initial`, 
        `lastname1`,
        `lastname2`,
        `studentID`,
        `email`,
        `department`,
        `socialsec`,
        `licNum`,
        `phone1`,
        `phone2`,
        `address`)
    VALUES (
        "'.$_POST['studFisrtName'].'",
        "'.$_POST['studInitial'].'",
        "'.$_POST['studLastName1'].'",
        "'.$_POST['studLastName2'].'", 
        '.$_POST['studID'].',
        "'.$_POST['studEmail'].'", 
        "'.$_POST['studDepartment'].'",
        "'.$_POST['studLastFour'].'",
        "'.$_POST['studTelephone1'].'",
        "'.$_POST['studTelephone2'].'",
        "'.$_POST['studAddress'].'");';
        
        $result = $conn->query($query);
        
        if (!$result) {
            echo "<tr><td>NO DATA SAVED IN DATABASE</td></tr>";
        } else {
            echo 'SID: '.$_POST['studID'].'<br/>';
            echo "New record created successfully";
        }
    }
    mysqli_close($conn);
} ELSE {
    ECHO '
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>Solicitud Permiso Estacionamiento</title>
</head>

<body>
  <div>
  <form action="index.php" method="POST">                            
    <table frame="box" class="studForm" id="studentInfo">
      <thead>
        <tr>
          <td class="header" colspan="2">
            Información de Estudiante
          </td>
        </tr>
      </thead>
      
      <tbody>
        <tr>
          <td class="param">Nombre:</td>
          <td class="arg"><input name="studFisrtName" type="text"></td>
        </tr>
        
        <tr>
          <td class="param">Inicial:</td>
          <td class="arg"><input name="studInitial" type="text"></td>
        </tr>
        
        <tr>
          <td class="param">Apellido Paterno:</td>
          <td class="arg"><input name="studLastName1" type="text"></td>
        </tr>
        
        <tr>
          <td class="param">Apellido Materno:</td>
          <td class="arg"><input name="studLastName2" type="text"></td>
        </tr>
        
        <tr>
          <td class="param"># Estudiante:</td>
          <td class="arg"><input name="studID" type="text"></td>
        </tr>
        
        <tr>
          <td class="param">Correo Institucional:</td>
          <td class="arg"><input name="studEmail" type="text"></td>
        </tr>
        
        <tr>
          <td class="param">Deptartamento / Facultad:</td>
          <td class="arg"><input name="studDepartment" type="text"></td>
        </tr>
        
        <tr>
          <td class="param">Últimos 4 Seg. Social:</td>
          <td class="arg"><input name="studLastFour" type="text"></td>
        </tr>
        
        <tr>
          <td class="param"># Lic. Conducir:</td>
          <td class="arg"><input name="studDriversLic" type="text"></td>
        </tr>
        
        <tr>
          <td class="param"># Teléfono 1:</td>
          <td class="arg"><input name="studTelephone1" type="text"></td>
        </tr>
        
        <tr>
          <td class="param"># Teléfono 2:</td>
          <td class="arg"><input name="studTelephone2" type="text"></td>
        </tr>
        
        <tr>
          <td class="param">Dirección:</td>
          <td class="arg"><input name="studAddress" type="text"></td>
        </tr>
      </tbody>
    </table>
      
    <br/>
      
    <table frame="box" class="studForm" id="vehicleInfo">    
      <thead>
        <tr>
          <td class="header" colspan="2">
            Información del Vehículo
          </td>
        </tr>
      </thead>
        
      <tbody>
        <tr>
          <td class="param">Marca:</td>
          <td class="arg"><input name="vehMake" type="text"></td>
        </tr>
      
        <tr>
          <td class="param">Modelo:</td>
          <td class="arg"><input name="Model"  type="text"></td>
        </tr>
      
        <tr>
          <td class="param">Año:</td>
          <td class="arg"><input name="Year" type="text"></td>
        </tr>
      
        <tr>
          <td class="param">Color:</td>
          <td class="arg"><input name="Color" type="text"></td>
        </tr>
      
        <tr>
          <td class="param">Tablilla:</td>
          <td class="arg"><input name="LicensePlate" type="text" ></td>
        </tr>
      
        <tr>
          <td class="param">Dueño:</td>
          <td class="arg"><input name="Owner" type="text" ></td>
        </tr>
      
        <tr>
          <td class="param">Relación con Est.:</td>
          <td class="arg"><input name="Relationship" type="text" ></td>
        </tr>
      </tbody>
    </table>
    
    <br/>
    
    <table frame="box" class="studForm" id="officialUse">
      <thead>
        <tr>
          <td class="header" colspan="2">
            Uso Oficial
          </td>
        </tr>
      </thead>
        
      <tbody>
        <tr>
          <td class="param">Validado:</td>
          <td class="arg"><input name="validation" type="text" placeholder="No Hacer Cambios" readonly></td>
        </tr>
        
        <tr>
          <td class="param">Tipo de Sello:</td>
          <td class="arg"><input name="sealType" type="text" placeholder="No Hacer Cambios" readonly></td>
        </tr>
      
        <tr>
          <td class="param">Número de Sello:</td>
          <td class="arg"><input name="sealNumber" type="text" placeholder="No Hacer Cambios" readonly></td>
        </tr>
        
        <tr>
          <td class="param">Fecha de Expedición:</td>
          <td class="arg"><input name="sealIssued" type="text" placeholder="No Hacer Cambios" readonly></td>
        </tr>
        
        <tr>
          <td class="param">Fecha de Expiración:</td>
          <td class="arg"><input name="sealDue" type="text" placeholder="No Hacer Cambios" readonly></td>
        </tr>
        
        <tr>
          <td class="submit" colspan="2"><input value="Register" class="button" type="submit"></td>
        </tr>        
      </tbody>
    </table>
  </form>
  </div>
</body>

</html>';
}
?>