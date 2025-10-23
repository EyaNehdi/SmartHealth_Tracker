<?php

namespace App\Services;

use App\Models\Activity;
use Illuminate\Support\Facades\Log;

class IARecommendationService
{
    private $preferenceMapping = [
        'relaxation' => ['yoga', 'méditation', 'respiration', 'détente', 'relaxation', 'zen', 'calme', 'relaxant', 'douce', 'souplesse'],
        'cardio' => ['cardio', 'course', 'running', 'vélo', 'endurance', 'aérobic', 'fractionné', 'intense', 'sprint', 'brûlage'],
        'renforcement musculaire' => ['musculation', 'force', 'poids', 'haltères', 'squat', 'pompes', 'abdos', 'intensif', 'crossfit', 'renforcement'],
        'flexibilité' => ['flexibilité', 'étirement', 'stretching', 'souplesse', 'yoga', 'pilates', 'postural', 'assouplissement'],
        'endurance' => ['endurance', 'cardio', 'course', 'vélo', 'natation', 'intervalle', 'résistance', 'longue durée', 'capacité']
    ];

    public function getRecommendedActivities($user)
    {
        $userPreferences = $user->preferences()->pluck('tag')->toArray();
        
        Log::info('🎯 === DÉBUT RECHERCHE RECOMMANDATIONS PHP ===');
        Log::info('👤 Utilisateur: ' . $user->id);
        Log::info('📋 Préférences: ' . json_encode($userPreferences));
        
        if (empty($userPreferences)) {
            Log::info('❌ Aucune préférence utilisateur');
            return collect();
        }

        $preference = strtolower($userPreferences[0]);
        
        Log::info('🔍 Recherche pour: ' . $preference);
        
        // Afficher TOUTES les activités pour debug
        $allActivities = Activity::all();
        Log::info('📊 TOTAL activités en base: ' . $allActivities->count());
        
        foreach ($allActivities as $activity) {
            Log::info("   📋 ID: {$activity->id} | Nom: '{$activity->nom}' | Desc: '{$activity->description}'");
        }
        
        // RECHERCHE SIMPLE ET EFFICACE
        $activities = $this->simpleSearch($preference);
        
        Log::info('✅ === RÉSULTATS FILTRÉS ===');
        Log::info('🎯 Activités correspondant à "' . $preference . '": ' . $activities->count());
        
        foreach ($activities as $activity) {
            Log::info("   🟢 ID {$activity->id}: {$activity->nom}");
        }
        
        // Afficher les activités EXCLUES
        $excludedIds = $allActivities->pluck('id')->diff($activities->pluck('id'));
        $excludedActivities = Activity::whereIn('id', $excludedIds)->get();
        
        Log::info('❌ Activités EXCLUES: ' . $excludedActivities->count());
        foreach ($excludedActivities as $activity) {
            Log::info("   🔴 ID {$activity->id}: {$activity->nom}");
        }
        
        Log::info('=== FIN RECHERCHE PHP ===');
        
        return $activities;
    }

    private function simpleSearch($preference)
    {
        $preference = strtolower(trim($preference));
        
        Log::info("🔎 Recherche simple pour: '{$preference}'");
        
        // RECHERCHE TRÈS SIMPLE ET EXPLICITE
        if ($preference === 'relaxation') {
            Log::info('🔍 Recherche RELAXATION activée');
            return Activity::where('nom', 'like', '%yoga%')
                         ->orWhere('nom', 'like', '%méditation%')
                         ->orWhere('nom', 'like', '%relax%')
                         ->orWhere('nom', 'like', '%détente%')
                         ->orWhere('nom', 'like', '%zen%')
                         ->orWhere('nom', 'like', '%calme%')
                         ->orWhere('description', 'like', '%yoga%')
                         ->orWhere('description', 'like', '%méditation%')
                         ->orWhere('description', 'like', '%relax%')
                         ->get();
        } 
        elseif ($preference === 'cardio') {
            Log::info('🔍 Recherche CARDIO activée');
            return Activity::where('nom', 'like', '%cardio%')
                         ->orWhere('nom', 'like', '%course%')
                         ->orWhere('nom', 'like', '%running%')
                         ->orWhere('nom', 'like', '%vélo%')
                         ->orWhere('nom', 'like', '%endurance%')
                         ->orWhere('nom', 'like', '%aérobic%')
                         ->orWhere('description', 'like', '%cardio%')
                         ->orWhere('description', 'like', '%course%')
                         ->get();
        }
        elseif ($preference === 'renforcement musculaire' || $preference === 'musculation') {
            Log::info('🔍 Recherche MUSCULATION activée');
          return Activity::where('nom', 'like', '%musculation%')
                     ->orWhere('nom', 'like', '%abdos%')
                     ->orWhere('nom', 'like', '%pompes%')
                     ->orWhere('nom', 'like', '%squat%')
                     ->orWhere('nom', 'like', '%haltères%')
                     ->orWhere('nom', 'like', '%crossfit%')
                     ->orWhere('nom', 'like', '%poids%') // AJOUTÉ
                     ->orWhere('nom', 'like', '%lever%') // AJOUTÉ
                     ->orWhere('nom', 'like', '%force%') // AJOUTÉ
                     ->orWhere('nom', 'like', '%développé%') // AJOUTÉ
                     ->orWhere('nom', 'like', '%traction%') // AJOUTÉ
                     ->orWhere('description', 'like', '%musculation%')
                     ->orWhere('description', 'like', '%force%')
                     ->orWhere('description', 'like', '%poids%') // AJOUTÉ
                     ->orWhere('description', 'like', '%renforcement%') // AJOUTÉ
                     ->get();
        }
        
        elseif ($preference === 'flexibilité') {
            Log::info('🔍 Recherche FLEXIBILITÉ activée');
            return Activity::where('nom', 'like', '%stretching%')
                         ->orWhere('nom', 'like', '%étirement%')
                         ->orWhere('nom', 'like', '%souplesse%')
                         ->orWhere('nom', 'like', '%pilates%')
                         ->orWhere('description', 'like', '%stretching%')
                         ->orWhere('description', 'like', '%souplesse%')
                         ->get();
        }
        else {
            Log::info('🔍 Recherche GÉNÉRIQUE activée');
            // Fallback général
            return Activity::where('nom', 'like', '%' . $preference . '%')
                         ->orWhere('description', 'like', '%' . $preference . '%')
                         ->get();
        }
    }
}