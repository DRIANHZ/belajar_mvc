<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();
$koneksi = mysqli_connect("localhost","root","","person");


for($i = 1; $i <= 20; $i++ ){

    $nama = $faker->name();
    $email = $faker->email();

    mysqli_query($koneksi,"INSERT INTO `tb_person`(`id`, `nama`, `email`) VALUES ('','$nama','$email')");
}

