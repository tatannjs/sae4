<?php

namespace App\DataFixtures;

use App\Entity\Administrateur;
use App\Entity\Commande;
use App\Entity\Contenu;
use App\Entity\Message;
use App\Entity\Producteur;
use App\Entity\Produit;
use App\Entity\Statut;
use App\Entity\TypeDeProduit;
use App\Entity\Unite;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
// Création des unités (Unite)
        $unites = [];
        foreach (['Kilogramme', 'Pièce', 'Litre', 'Grammes'] as $nomUnite) {
            $unite = new Unite();
            $unite->setNomUnite($nomUnite);
            $manager->persist($unite);
            $unites[] = $unite;
        }

// Création des types de produits (TypeDeProduit)
        $typesDeProduits = [];
        foreach (['Fruit', 'Légume', 'Produit laitier', 'Viande', 'Boulangerie'] as $descType) {
            $type = new TypeDeProduit();
            $type->setDescTypeProduit($descType);
            $manager->persist($type);
            $typesDeProduits[] = $type;
        }

// Création des statuts (Statut)
        $statuts = [];
        foreach (['En cours', 'Livrée', 'Annulée'] as $descStatut) {
            $statut = new Statut();
            $statut->setDescStatut($descStatut);
            $manager->persist($statut);
            $statuts[] = $statut;
        }

// Création des utilisateurs (Utilisateur)
        $utilisateurs = [];
        for ($i = 0; $i < 10; $i++) {
            $utilisateur = new Utilisateur();
            $utilisateur->setPrenomUti('Prenom' . $i)
                ->setNomUti('Nom' . $i)
                ->setMailUti('user' . $i . '@example.com')
                ->setAdrUti('Adresse ' . $i . ', Rue Exemple, Ville, France')
                ->setPwdUti('password' . $i); // Faux mot de passe pour chaque utilisateur
            $manager->persist($utilisateur);
            $utilisateurs[] = $utilisateur;
        }

// Création des producteurs (Producteur)
        $producteurs = [];
        $professions = ['Agriculteur', 'Fermier', 'Céréalier', 'Vigneron', 'Apiculteur'];
        for ($i = 0; $i < 5; $i++) {
            $producteur = new Producteur();
            $producteur->setProfProd($professions[$i])
                ->setIdUti($utilisateurs[$i]); // Lier un utilisateur à un Producteur
            $manager->persist($producteur);
            $producteurs[] = $producteur;
        }

// Création des administrateurs (Administrateur)
        for ($i = 5; $i < 7; $i++) {
            $administrateur = new Administrateur();
            $administrateur->setIdUti($utilisateurs[$i]); // Lier un utilisateur à un Administrateur
            $manager->persist($administrateur);
        }

// Création des produits (Produit)
        $produits = [];
        foreach (['Pommes', 'Carottes', 'Lait', 'Poulet', 'Pain'] as $index => $nomProduit) {
            $produit = new Produit();
            $produit->setNomProduit($nomProduit)
                ->setQteProduit(random_int(10, 100)) // Quantité entre 10 et 100
                ->setPrixProduitUnitaire(random_int(50, 1000) / 100) // Prix entre 0.5 et 10
                ->setIdUniteStock($unites[$index % count($unites)]) // Assigner une unité
                ->setIdUnitePrix($unites[($index + 1) % count($unites)]) // Assigner une autre unité
                ->setIdTypeProduit($typesDeProduits[$index % count($typesDeProduits)]) // Assigner un type
                ->setIdProd($producteurs[$index % count($producteurs)]); // Assigner un producteur
            $manager->persist($produit);
            $produits[] = $produit;
        }

// Création des commandes (Commande)
        $commandes = [];
        for ($i = 0; $i < 15; $i++) {
            $commande = new Commande();
            $commande->setIdStatut($statuts[$i % count($statuts)]) // Associer un statut
            ->setIdProd($producteurs[$i % count($producteurs)]) // Associer un producteur
            ->setIdUti($utilisateurs[$i % count($utilisateurs)]); // Associer un utilisateur
            $manager->persist($commande);
            $commandes[] = $commande;
        }

// Création du contenu des commandes (Contenu)
        foreach ($commandes as $commande) {
            for ($i = 0; $i < random_int(1, 5); $i++) { // Contenu de 1 à 5 produits par commande
                $contenu = new Contenu();
                $produit = $produits[random_int(0, count($produits) - 1)];
                $contenu->setQteProduitCommande(random_int(1, 10)) // Quantité aléatoire
                ->setNumProduitCommande(random_int(1, 5)) // Numéro aléatoire
                ->setIdProduit($produit)
                    ->setIdCommande($commande);
                $manager->persist($contenu);
            }
        }

// Création des messages (Message)
        for ($i = 0; $i < 10; $i++) {
            $message = new Message();
            $emetteur = $utilisateurs[random_int(0, count($utilisateurs) - 1)];
            $destinataire = $utilisateurs[random_int(0, count($utilisateurs) - 1)];
            while ($emetteur === $destinataire) { // Empêcher de s'envoyer un message à soi-même
                $destinataire = $utilisateurs[random_int(0, count($utilisateurs) - 1)];
            }
            $message->setEmetteur($emetteur)
                ->setDestinataire($destinataire)
                ->setDateMsg((new \DateTime())->modify('-' . random_int(0, 30) . ' days')) // Date aléatoire dans les 30 derniers jours
                ->setDateExpiMsg((new \DateTime())->modify('+' . random_int(1, 30) . ' days')) // Date d'expiration dans les 30 prochains jours
                ->setContenuMsg('Message aléatoire n°' . ($i + 1)); // Message type
            $manager->persist($message);
        }

// Envoi des données dans la base
        $manager->flush();
    }
}
