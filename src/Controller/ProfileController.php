<?php

namespace App\Controller;

use PDO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    private $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=lop;charset=utf8';
        $username = 'root';
        $password = '';

        $this->pdo = new PDO($dsn, $username, $password);
    }

    #[Route('/profile', name: 'app_profile')]
    public function edit(Request $request): Response
    {
        // Récupérez l'utilisateur connecté
        $user = $this->getUser();

        // Assurez-vous que l'utilisateur est bien connecté
        if (!$user) {
            throw $this->createAccessDeniedException('Vous devez être connecté pour modifier votre profil.');
        }

        // Récupérez l'ID de l'utilisateur
        $userId = $user->getId_user();

        if ($request->isMethod('POST')) {
            $languageId = $request->request->get('language');
            $playstyleId = $request->request->get('playstyle');
            $mainRoleId = $request->request->get('mainrole');
            $mainChampionId = $request->request->get('mainchampion');
            $rankId = $request->request->get('rank');
            $frequencyPlayId = $request->request->get('frequencyplay');

            // Mise à jour des informations de l'utilisateur dans la base de données
            $updateStmt = $this->pdo->prepare(
                'UPDATE user SET language_id = ?, play_style_id = ?, main_role_id = ?, main_champion_id = ?, rank_id = ?, frequency_play_id = ? WHERE id_user = ?'
            );
            $updateStmt->execute([
                $languageId, $playstyleId, $mainRoleId, $mainChampionId, $rankId, $frequencyPlayId, $userId
            ]);

            $this->addFlash('success', 'Profil mis à jour avec succès');
            //return $this->redirectToRoute('app_profile');
        }

        // Récupérer les valeurs actuelles de l'utilisateur
        $userValuesStmt = $this->pdo->prepare('SELECT language_id, play_style_id, main_role_id, main_champion_id, rank_id, frequency_play_id FROM user WHERE id_user = ?');
        $userValuesStmt->execute([$userId]);
        $userValues = $userValuesStmt->fetch(PDO::FETCH_ASSOC);

        // Récupération des données pour les champs de sélection
        $languagesStmt = $this->pdo->query('SELECT id_languages, name FROM languages');
        $languages = $languagesStmt->fetchAll(PDO::FETCH_ASSOC);

        $playStylesStmt = $this->pdo->query('SELECT id_play_styles, name FROM play_styles');
        $playStyles = $playStylesStmt->fetchAll(PDO::FETCH_ASSOC);

        $mainRolesStmt = $this->pdo->query('SELECT id_main_roles, name FROM main_roles');
        $mainRoles = $mainRolesStmt->fetchAll(PDO::FETCH_ASSOC);

        $mainChampionsStmt = $this->pdo->query('SELECT id_main_champions, name FROM main_champions');
        $mainChampions = $mainChampionsStmt->fetchAll(PDO::FETCH_ASSOC);

        $frequencyPlaysStmt = $this->pdo->query('SELECT id_frequency_play, name FROM frequency_play');
        $frequencyPlays = $frequencyPlaysStmt->fetchAll(PDO::FETCH_ASSOC);

        $ranksStmt = $this->pdo->query('SELECT id_ranks, name FROM ranks');
        $ranks = $ranksStmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->render('profile/index.html.twig', [
            'languages' => $languages,
            'playStyles' => $playStyles,
            'mainRoles' => $mainRoles,
            'mainChampions' => $mainChampions,
            'frequencyPlays' => $frequencyPlays,
            'ranks' => $ranks,
            'userValues' => $userValues
        ]);
    }
}


