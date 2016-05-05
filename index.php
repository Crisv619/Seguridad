<?php 

session_start();
if (isset($_SESSION['sessionName'])) {
    if (isset($_SESSION['name']) && isset($_SESSION['inst']) && isset($_SESSION['email'])) {
        $sessionName = $_SESSION['sessionName'];
        $inst = $_SESSION['inst'];
        $email = $_SESSION['email'];
        $name = $_SESSION['name'];
        $sid = $_SESSION['sid'];
        if (!empty($_SESSION['term'])) {
            $term = $_SESSION['term'];
            echo 'TERM: '.$term.'<br/>';
      }


        echo 'SESSION: '.$sessionName.'<br/>';
        echo 'INST: '.$inst.'<br/>';
        echo 'NAME: '.$name.'<br/>';
        echo 'SID: '.$sid.'<br/>';
        echo 'EMAIL: '.$email.'<br/>';


        echo '';
        echo '<p><h1>Welcome,  '.strtoupper($name).'!</h1></p>';
        echo '<hr>';

//         echo '
// <!DOCTYPE html>
// <html>

// <head>
//     <title>Portal - MiUPRB</title>
//     <link rel="stylesheet" type="text/css" href="css/style.css">

//     <form method="POST" action="/index.php?reset=1">
//         <input type="submit" value="Salir">
//     </form>
// </head>

// <body>
//     <hr>';
    }
}

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
        "'.$_POST['studFirstName'].'",
        "'.$_POST['studInitial'].'",
        "'.$_POST['studLastName1'].'",
        "'.$_POST['studLastName2'].'",
        '.$_POST['studID'].',
        "'.$_POST['studEmail'].'",
        "'.$_POST['studDepartment'].'",
        "'.$_POST['studLastFour'].'", 
        "'.$_POST['studDriversLic'].'", 
        "'.$_POST['studTelephone1'].'",
        "'.$_POST['studTelephone2'].'",
        "'.$_POST['studAddress'].'");';
        
        $result = $conn->query($query);
        
        
         $query2 = 'INSERT INTO `Seguridad`.`vehicles` (
        `ID`, 
        `make`, 
        `model`,
        `year`,
        `color`,
        `licensePlate`,
        `owner`,
        `relationship`)
    VALUES (
        '.$_POST['studID'].',
        "'.$_POST['vehMake'].'",
        "'.$_POST['Model'].'",
        "'.$_POST['Year'].'", 
        "'.$_POST['Color'].'", 
        "'.$_POST['LicensePlate'].'",
        "'.$_POST['Owner'].'",
        "'.$_POST['Relationship'].'");';
        
        $result2 = $conn->query($query2);
    
        if (!$result or !$result2) {
            echo "<tr><td>NO DATA SAVED IN DATABASE</td></tr>";
            
        } else {
            echo 'SID: '.$_POST['studID'].'<br/>';
            echo "New record created successfully";
            echo "<tr><td>Favor de pasar por la oficina de seguridad con sus documentos para recoger su sello.</td></tr>";
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
          <td class="arg"><input name="studFirstName" type="text" value="'.$name.'" class="mytext" readonly></td>
        </tr>
        
        <tr>
          <td class="param"># Estudiante:</td>
          <td class="arg"><input name="studID" type="text" value="'.$sid.'" class="mytext" readonly></td>
        </tr>
        
        <tr>
          <td class="param">Correo Institucional:</td>
          <td class="arg"><input name="studEmail" type="text" value="'.$email.'" class="mytext" readonly></td>
        </tr>
        
        <tr>
          <td class="param">Deptartamento / Facultad:</td>
          <td class="arg"><input name="studDepartment" type="text" class="mytext"></td>
        </tr>
        
        <tr>
          <td class="param">Últimos 4 Seg. Social:</td>
          <td class="arg"><input name="studLastFour" type="text" class="mytext"></td>
        </tr>
        
        <tr>
          <td class="param"># Lic. Conducir:</td>
          <td class="arg"><input name="studDriversLic" type="text" class="mytext"></td>
        </tr>
        
        <tr>
          <td class="param"># Teléfono 1:</td>
          <td class="arg"><input name="studTelephone1" type="text" class="mytext"></td>
        </tr>
        
        <tr>
          <td class="param"># Teléfono 2:</td>
          <td class="arg"><input name="studTelephone2" type="text" class="mytext"></td>
        </tr>
        
        <tr>
          <td class="param">Dirección:</td>
          <td class="arg"><input name="studAddress" type="text" class="mytext"></td>
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
          <td class="arg"><input name="vehMake" type="text" class="mytext"></td>
        </tr>
      
        <tr>
          <td class="param">Modelo:</td>
          <td class="arg"><input name="Model"  type="text" class="mytext"></td>
        </tr>
      
        <tr>
          <td class="param">Año:</td>
          <td class="arg"><input name="Year" type="text" class="mytext"></td>
        </tr>
      
        <tr>
          <td class="param">Color:</td>
          <td class="arg"><input name="Color" type="text" class="mytext"></td>
        </tr>
      
        <tr>
          <td class="param">Tablilla:</td>
          <td class="arg"><input name="LicensePlate" type="text" class="mytext"></td>
        </tr>
      
        <tr>
          <td class="param">Dueño:</td>
          <td class="arg"><input name="Owner" type="text" class="mytext"></td>
        </tr>
      
        <tr>
          <td class="param">Relación con Est.:</td>
          <td class="arg"><input name="Relationship" type="text" class="mytext" ></td>
        </tr>
      </tbody>
    </table>
    
    <br/>
    <div align = "center">
      
     </div >
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
          <td class="arg"><input name="validation" type="text" class="mytext" placeholder="Uso Oficial" readonly></td>
        </tr>
        
        <tr>
          <td class="param">Tipo de Sello:</td>
          <td class="arg"><input name="sealType" type="text"  class="mytext" placeholder="Uso Oficial" readonly></td>
        </tr>
      
        <tr>
          <td class="param">Número de Sello:</td>
          <td class="arg"><input name="sealNumber" type="text" class="mytext" placeholder="Uso Oficial" readonly></td>
        </tr>
        
        <tr>
          <td class="param">Fecha de Expedición:</td>
          <td class="arg"><input name="sealIssued" type="text" class="mytext" placeholder="Uso Oficial" readonly></td>
        </tr>
        
        <tr>
          <td class="param">Fecha de Expiración:</td>
          <td class="arg"><input name="sealDue" type="text" class="mytext" placeholder="Uso Oficial" readonly></td>
        </tr>
        
        <tr>
         <td class="submit"><input value="Register" class="button" type="submit"></td>
     
             <td class="arg" colspan="2">Al registrarse esta aceptando los <a href="terms.html" target="_blank">Términos y Condiciones</a></td>

        </tr>        
      </tbody>
    </table>
  </form>
  </div>
</body>

</html>';

          
        }
   

?>