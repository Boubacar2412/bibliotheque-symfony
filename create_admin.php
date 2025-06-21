<?php
// create_admin.php

use App\Entity\User;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

require __DIR__.'/vendor/autoload.php';

// Charge les variables d'environnement
if (file_exists(__DIR__.'/.env')) {
    (new Dotenv())->loadEnv(__DIR__.'/.env');
}

$kernel = new \App\Kernel('dev', true);
$kernel->boot();

$container = $kernel->getContainer();

// Récupère EntityManager via la méthode get('doctrine')->getManager()
$entityManager = $container->get('doctrine')->getManager();

/** @var UserPasswordHasherInterface $passwordHasher */
$passwordHasher = $container->get(UserPasswordHasherInterface::class);

// Configure ton admin ici
$email = 'admin@example.com';
$password = 'motdepasse123';

$user = new User();
$user->setEmail($email);
$user->setRoles(['ROLE_ADMIN']);
$hashedPassword = $passwordHasher->hashPassword($user, $password);
$user->setPassword($hashedPassword);

$entityManager->persist($user);
$entityManager->flush();

echo "Admin créé avec succès : $email\n";
