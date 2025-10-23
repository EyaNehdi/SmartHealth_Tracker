<?php

namespace App\Services;

use App\Models\Activity;
use App\Models\UserPreference;
use Illuminate\Support\Facades\Log;

class IARecommendationService
{
    private $preferenceMapping = [
        'relaxation' => ['relaxation', 'détente', 'yoga', 'méditation', 'respiration', 'calme', 'zen'],
        'cardio' => ['cardio', 'course', 'running', 'vélo', 'endurance', 'aérobic', 'fractionné'],
        'renforcement musculaire' => ['musculation', 'abdos', 'force', 'poids', 'haltères', 'squat', 'pompes'],
        'flexibilité' => ['flexibilité', 'étirement', 'stretching', 'souplesse', 'yoga', 'pilates'],
        'endurance' => ['endurance', 'cardio', 'course', 'vélo', 'natation', 'intervalle', 'résistance']
    ];

    public function getRecommendedActivities($user)
    {
        $userPreferences = $user->preferences()->pluck('tag')->toArray();
        
        \Log::info('=== DÉBUT DEBUG DÉTAILLÉ ===');
        \Log::info('Préférence utilisateur: ' . json_encode($userPreferences));
        
        if (empty($userPreferences)) {
            \Log::info('AUCUNE PRÉFÉRENCE');
            return collect();
        }

        $preference = strtolower($userPreferences[0]);
        $searchTerms = $this->getSearchTerms($preference);
        
        \Log::info('Préférence: ' . $preference);
        \Log::info('Termes de recherche: ' . json_encode($searchTerms));
        
        // Afficher TOUTES les activités
        $allActivities = Activity::all();
        \Log::info('=== TOUTES LES ACTIVITÉS EN BASE ===');
        foreach ($allActivities as $activity) {
            \Log::info("ID: {$activity->id} | Nom: '{$activity->nom}'");
        }
        
        // Test de recherche pour CHAQUE terme
        \Log::info('=== TEST RECHERCHE PAR TERME ===');
        foreach ($searchTerms as $term) {
            $count = Activity::where('nom', 'like', "%{$term}%")
                           ->orWhere('description', 'like', "%{$term}%")
                           ->count();
            \Log::info("Terme '{$term}': {$count} résultat(s)");
            
            // Afficher les activités trouvées pour ce terme
            $found = Activity::where('nom', 'like', "%{$term}%")
                           ->orWhere('description', 'like', "%{$term}%")
                           ->get();
            foreach ($found as $activity) {
                \Log::info("   - Trouvé: {$activity->nom} (ID: {$activity->id})");
            }
        }
        
        // Recherche finale
        $activities = Activity::where(function($query) use ($searchTerms) {
            foreach ($searchTerms as $term) {
                $query->orWhere('nom', 'like', '%' . $term . '%')
                      ->orWhere('description', 'like', '%' . $term . '%');
            }
        })->get();

        \Log::info('=== RÉSULTATS FINAUX ===');
        \Log::info('Nombre d\'activités trouvées: ' . $activities->count());
        foreach ($activities as $activity) {
            \Log::info(" - {$activity->id}: {$activity->nom}");
        }
        \Log::info('=== FIN DEBUG ===');
        
        return $activities;
    }

    // AJOUTEZ CETTE MÉTHODE MANQUANTE
    private function getSearchTerms($preference)
    {
        $preference = strtolower($preference);
        
        // Retourner les termes associés à la préférence
        if (isset($this->preferenceMapping[$preference])) {
            return $this->preferenceMapping[$preference];
        }
        
        // Si pas de mapping, retourner la préférence elle-même
        return [$preference];
    }

    private function callIARecommendation($userPreferences, $activities)
    {
        try {
            Log::info('=== APPEL SYSTÈME IA ===');
            Log::info('Préférences envoyées à IA: ' . json_encode($userPreferences));
            Log::info('Nombre d\'activités envoyées: ' . count($activities));

            $process = new \Symfony\Component\Process\Process([
                'python3',
                base_path('scripts/ia_recommendations.py'),
                json_encode($userPreferences),
                json_encode($activities),
            ]);

            $process->setTimeout(120); // 2 minutes timeout
            $process->run();

            $output = $process->getOutput();
            $errorOutput = $process->getErrorOutput();

            Log::info('Sortie IA: ' . $output);
            Log::info('Logs IA: ' . $errorOutput);

            if (!$process->isSuccessful()) {
                Log::error('Erreur système IA : ' . $process->getErrorOutput());
                return $this->fallbackRecommendation($userPreferences, $activities);
            }

            $result = json_decode($output, true) ?? [];
            
            Log::info('Résultat IA décodé: ' . json_encode($result));
            Log::info('=== FIN APPEL IA ===');
            
            return $result;

        } catch (\Exception $e) {
            Log::error('Erreur exécution IA: ' . $e->getMessage());
            return $this->fallbackRecommendation($userPreferences, $activities);
        }
    }

    private function fallbackRecommendation($userPreferences, $activities)
    {
        Log::info('=== FALLBACK SEMANTIQUE ===');
        
        // Fallback intelligent basé sur la sémantique
        $preference = strtolower($userPreferences[0]);
        $semanticMapping = [
            'relaxation' => ['yoga', 'méditation', 'respiration', 'détente', 'relaxation', 'zen', 'calme'],
            'cardio' => ['cardio', 'course', 'running', 'vélo', 'endurance', 'aérobic', 'fractionné'],
            'renforcement musculaire' => ['musculation', 'force', 'poids', 'haltères', 'squat', 'pompes', 'abdos'],
            'flexibilité' => ['flexibilité', 'étirement', 'stretching', 'souplesse', 'yoga', 'pilates'],
            'endurance' => ['endurance', 'cardio', 'course', 'vélo', 'natation', 'intervalle', 'résistance']
        ];

        $searchTerms = $semanticMapping[$preference] ?? [$preference];
        
        Log::info('Termes de recherche fallback: ' . implode(', ', $searchTerms));
        
        $activityIds = [];
        foreach ($activities as $activity) {
            $activityText = strtolower($activity['nom'] . ' ' . $activity['description']);
            foreach ($searchTerms as $term) {
                if (strpos($activityText, $term) !== false) {
                    $activityIds[] = $activity['id'];
                    break;
                }
            }
        }

        Log::info('IDs fallback: ' . json_encode(array_slice($activityIds, 0, 5)));
        return array_slice($activityIds, 0, 5); // Max 5 recommandations
    }
}