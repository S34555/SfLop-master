<?php

// src/Controller/SwipeController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Connection; // Import the Connection class if you're using DBAL

class SwipeController extends AbstractController
{
    /**
     * @Route("/swipe", name="swipe")
     */
        public function index(Connection $connection): Response
    {
        // Execute the SQL query to retrieve user data with champion names and other fields
        $sql = '
            SELECT
                u.id_user,
                u.username,
                mc.name AS main_champion_name,
                r.name AS rank_name,
                ps.name AS play_style_name,
                mr.name AS main_role_name,
                fp.name AS frequency_play_name,
                l.name AS language_name
            FROM `user` u
            LEFT JOIN main_champions mc ON u.main_champion_id = mc.id_main_champions
            LEFT JOIN ranks r ON u.rank_id = r.id_ranks
            LEFT JOIN play_styles ps ON u.play_style_id = ps.id_play_styles
            LEFT JOIN main_roles mr ON u.main_role_id = mr.id_main_roles
            LEFT JOIN frequency_play fp ON u.frequency_play_id = fp.id_frequency_play
            LEFT JOIN languages l ON u.language_id = l.id_languages;
        ';
        $usersWithDetails = $connection->executeQuery($sql)->fetchAllAssociative();

        // Render the Twig template and pass the data
        return $this->render('swipe/index.html.twig', [
            'usersWithDetails' => $usersWithDetails,
        ]);
    }
}






