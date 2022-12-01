<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Ejercicio 30</title>
</head>

<body>
    <?php
    /* 30. Guardar y recuperar preferencias del usuario con cookies
     *
      Se creará un formulario que permita seleccionar las preferencias en un vuelo. Los datos
      a introducir serán los siguientes:
      • Nombre
      • Asiento: pasillo, ventanilla o centro.
      • Menú: vegetariano, no-vegetariano, diabético o infantil.
      • Aeropuertos en los que está interesado (checkbox): Londres (LHR), París
      (CDG),  Roma  (CIA),  Ibiza  (IBZ),  Singapur  (SIN),  Hong  Kong  (HKG),
      Malta (MLA) y Bombay (BOM).
      Cuando se muestre el formulario, se incluirán los valores anteriormente seleccionados
      por el usuario, que estarán guardados en una cookie.
      Cuando el usuario envíe el formulario, se guardarán los nuevos valores en la cookie y se
      volverá a mostrar el formulario con dichos valores */

    if (isset($_POST['enviar'])) {
        $dieta = $_POST["dieta"];
        $asiento = $_POST["asiento"];
        //****************************************************************************************
        //Cookie nombre de usuario

        setcookie("usuario", $_POST['nombre'], time() + 3600);

        //****************************************************************************************
        //Cookie asiento
        switch ($asiento) {
            case 'Pasillo':
                setcookie("Pasillo", $_POST['asiento'], time() + 3600);
                break;
            case 'Ventanilla':
                setcookie("Ventanilla", $_POST['asiento'], time() + 3600);
                break;
            case 'Centro':
                setcookie("Centro", $_POST['asiento'], time() + 3600);
                break;
        }
        //****************************************************************************************
        //Cookie dieta
        if ($dieta == "Vegetariano")
            setcookie("Vegetariano", $_POST['dieta'], time() + 36000);
        if ($dieta == "NoVegetariano")
            setcookie("NoVegetariano", $_POST['dieta'], time() + 36000);
        if ($dieta == "Diabetico")
            setcookie("Diabetico", $_POST['dieta'], time() + 36000);
        if ($dieta == "Infantil")
            setcookie("Infantil", $_POST['dieta'], time() + 36000);
        //****************************************************************************************
        //Cookie aeropuerto
        if (isset($_POST['LHR'])) {
            setcookie("LHR", $_POST['LHR'], time() + 36000);
        }
        if (isset($_POST['CDG'])) {
            setcookie("CDG", $_POST['CDG'], time() + 36000);
        }
        if (isset($_POST['IBZ'])) {
            setcookie("IBZ", $_POST['IBZ'], time() + 36000);
        }
        if (isset($_POST['SIN'])) {
            setcookie("SIN", $_POST['SIN'], time() + 36000);
        }
        if (isset($_POST['HKG'])) {
            setcookie("HKG", $_POST['HKG'], time() + 36000);
        }
        if (isset($_POST['MLA'])) {
            setcookie("MLA", $_POST['MLA'], time() + 36000);
        }
        if (isset($_POST['BOM'])) {
            setcookie("BOM", $_POST['BOM'], time() + 36000);
        }
        if (isset($_POST['CIA'])) {
            setcookie("CIA", $_POST['CIA'], time() + 36000);
        }
    }
    ?>
    <form method="post" action="" name="Vuelos">
        <table align="center">
            <th colspan="2">
                ViajesPum!!
                <hr>
            </th>
            <tr>
                <td>
                    <b>Nombre Usuario:</b>
                </td>
                <td>
                    <input type="text" name="nombre" value="<?php if (isset($_COOKIE["usuario"])) {
                                                                echo $_COOKIE['usuario'];
                                                            } ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <b>Asiento:</b>
                </td>
                <td>
                    <select name="asiento">
                        <option value="Pasillo" <?php if (isset($_COOKIE["Pasillo"])) {
                                                    echo "selected";
                                                } ?>>Pasillo</option>

                        <option value="Ventanilla" <?php if (isset($_COOKIE["Ventanilla"])) {
                                                        echo "selected";
                                                    } ?>>Ventanilla</option>

                        <option value="Centro" <?php if (isset($_COOKIE["Centro"])) {
                                                    echo "selected";
                                                } ?>>Centro</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><b>Menu:</b></td>
                <td>
                    <select name="dieta">
                        <option value="NoVegetariano" <?php if (isset($_COOKIE["NoVegetariano"])) {
                                                            echo "selected";
                                                        } ?>>No vegetariano</option>

                        <option value="Vegetariano" <?php if (isset($_COOKIE["Vegetariano"])) {
                                                        echo "selected";
                                                    } ?>>Vegetariano</option>

                        <option value="Diabetico" <?php if (isset($_COOKIE["Diabetico"])) {
                                                        echo "selected";
                                                    } ?>>Diab&eacute;tico</option>

                        <option value="Infantil" <?php if (isset($_COOKIE["Infantil"])) {
                                                        echo "selected";
                                                    } ?>>Infantil</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <b>Aeropuertos<br />de interés:</b>
                </td>

                <td>
                    <input <?php if (isset($_COOKIE["LHR"])) {
                                echo " checked ";
                            } ?> type="checkbox" name="LHR" value="Londres(LHR)"><b>Londres (LHR)</b><br>
                    <input <?php if (isset($_COOKIE["CDG"])) {
                                echo " checked ";
                            } ?>type="checkbox" name="CDG" value="París(CDG)"><b>Par&iacute;s (CDG)</b><br>
                    <input <?php if (isset($_COOKIE["CIA"])) {
                                echo " checked ";
                            } ?>type="checkbox" name="CIA" value="Roma(CIA)"><b>Roma (CIA)</b><br>
                    <input <?php if (isset($_COOKIE["IBZ"])) {
                                echo " checked ";
                            } ?>type="checkbox" name="IBZ" value="Ibiza(IBZ)"><b>Ibiza (IBZ)</b><br>
                    <input <?php if (isset($_COOKIE["SIN"])) {
                                echo " checked ";
                            } ?>type="checkbox" name="SIN" value="Singapur(SIN)"><b>Singapur (SIN)</b><br>
                    <input <?php if (isset($_COOKIE["HKG"])) {
                                echo " checked ";
                            } ?>type="checkbox" name="HKG" value="Hong Kong(HKG)"><b>Hong Kong (HKG)</b><br>
                    <input <?php if (isset($_COOKIE["MLA"])) {
                                echo " checked ";
                            } ?>type="checkbox" name="MLA" value="Malta(MLA)"><b>Malta (MLA)</b><br>
                    <input <?php if (isset($_COOKIE["BOM"])) {
                                echo " checked ";
                            } ?>type="checkbox" name="BOM" value="Bombay(BOM)"><b>Bombay (BOM)</b><br>
                </td>
            </tr>

            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="enviar" value="Enviar" />
                </td>
            </tr>
        </table>
    </form>

</body>

</html>