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