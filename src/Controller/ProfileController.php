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
            // Récupérer les nouvelles valeurs du formulaire
            $newUsername = $request->request->get('username');
            $languageId = $request->request->get('language');
            $playstyleId = $request->request->get('playstyle');
            $mainRoleId = $request->request->get('mainrole');
            $mainChampionId = $request->request->get('mainchampion');
            $rankId = $request->request->get('rank');
            $frequencyPlayId = $request->request->get('frequencyplay');

            // Gestion de l'upload de l'avatar
            $avatarFile = $request->files->get('avatar');
            if ($avatarFile) {
                $avatarFileName = $this->generateUniqueFileName().'.'.$avatarFile->guessExtension();
                // Déplacez le fichier dans le répertoire public/img/avatar
                $avatarFile->move($this->getParameter('avatar_directory'), $avatarFileName);

                // Mettez à jour le chemin de l'avatar dans la base de données
                $updateAvatarStmt = $this->pdo->prepare('UPDATE user SET avatar = ? WHERE id_user = ?');
                $updateAvatarStmt->execute([$avatarFileName, $userId]);
            }

            // Mise à jour des informations de l'utilisateur dans la base de données
            $updateStmt = $this->pdo->prepare(
                'UPDATE user SET username = ?, language_id = ?, play_style_id = ?, main_role_id = ?, main_champion_id = ?, rank_id = ?, frequency_play_id = ? WHERE id_user = ?'
            );
            $updateStmt->execute([
                $newUsername, $languageId, $playstyleId, $mainRoleId, $mainChampionId, $rankId, $frequencyPlayId, $userId
            ]);

            $this->addFlash('success', 'Profil mis à jour avec succès');
        }

        // Récupérer les valeurs actuelles de l'utilisateur, y compris l'avatar
        $userValuesStmt = $this->pdo->prepare('SELECT language_id, play_style_id, main_role_id, main_champion_id, rank_id, frequency_play_id, username, avatar FROM user WHERE id_user = ?');
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

    private function generateUniqueFileName()
    {
        // Génération d'un nom de fichier unique
        return md5(uniqid());
    }
}
