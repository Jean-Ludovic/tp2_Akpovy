<?php

function displayNumAddressesForm() {
    include 'num_addresses_form.php';
}

function displayAddressForm($num_addresses) {
    for ($i = 1; $i <= $num_addresses; $i++) {
        include 'address_fields.php';
    }
}

function displayConfirmedAddresses() {
    for ($i = 1; $i <= $_SESSION['num_addresses']; $i++) {
        include 'confirmed_address.php';
    }
}

function saveFormDataToSession() {
    $_SESSION['form_data'] = $_POST;
}
function saveConfirmedDataToDatabase() {
    // Inclure le fichier de connexion à la base de données
    include 'connexion.php';

    // Récupération des données confirmées à partir de la session
    $form_data = $_SESSION['form_data'];

    // Boucle pour insérer chaque adresse dans la base de données
    for ($i = 1; $i <= $_SESSION['num_addresses']; $i++) {
        $street = mysqli_real_escape_string($conn, $form_data['street' . $i]);
        $street_nb = (int)$form_data['street_nb' . $i];
        $type = mysqli_real_escape_string($conn, $form_data['type' . $i]);
        $city = mysqli_real_escape_string($conn, $form_data['city' . $i]);
        $zipcode = mysqli_real_escape_string($conn, $form_data['zipcode' . $i]);

        // Requête SQL pour insérer les données dans la table 'addresses'
        $sql = "INSERT INTO addresses (street, street_nb, type, city, zipcode) 
                VALUES ('$street', $street_nb, '$type', '$city', '$zipcode')";

        // Exécution de la requête
        if (!mysqli_query($conn, $sql)) {
            die("Erreur lors de l'insertion des données : " . mysqli_error($conn));
        }
    }

    // Fermeture de la connexion
    mysqli_close($conn);
}
