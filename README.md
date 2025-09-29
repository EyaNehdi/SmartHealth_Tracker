# 🌿 ENERGIX

ENERGIX est une plateforme dédiée à la promotion des bonnes pratiques de santé et de bien-être au quotidien. Elle aide les **étudiants** et les **enseignants** à mieux comprendre leurs habitudes de vie et à suivre leurs progrès dans une démarche de **prévention** et d’**amélioration de la qualité de vie**.

## 🎯 Objectifs du projet

- Encourager un mode de vie sain à travers des activités quotidiennes.
- Suivre l’évolution des habitudes personnelles (alimentation, activité physique, sommeil, etc.).
- Sensibiliser la communauté éducative au bien-être.
- Proposer des défis motivants et collectifs.
- Promouvoir l’accompagnement et l’auto-évaluation.

## ✅ Fonctionnalités principales

- 👤 Gestion des utilisateurs (étudiants, enseignants)
- 🏆 Challenges de bien-être
- 🍽️ Suivi alimentaire
- 🏃 Activités physiques
- 🧘 Équipements et outils utilisés
- 📊 Suivi des participants et de leurs progrès

## 🗂️ Modèles / Tables principales

Le système repose sur les tables suivantes :

### 1. `challenges`
Contient les défis proposés aux participants.

Exemples :
- Marcher 10 000 pas par jour
- Boire 2L d'eau
- Méditation de 10 minutes

### 2. `food`
Gère les habitudes alimentaires.

Exemples de champs :
- Nom de l’aliment / repas
- Nombre de calories
- Date / heure de consommation

### 3. `activity`
Enregistre les activités physiques.

Exemples :
- Type d’activité (marche, course, yoga…)
- Durée
- Intensité

### 4. `equipements`
Liste et gestion des équipements utilisés dans les activités.

Exemples :
- Tapis de yoga
- Haltères
- Vélo d’appartement
- Montre connectée

### 5. `participants`
Associe les utilisateurs aux défis ou activités.

Exemples de champs :
- Utilisateur
- Challenge/activité
- Progression
- Statut

## 🏗️ Technologies (à adapter selon ton stack)

Exemple si ton projet utilise Laravel :

- **Backend** : Laravel 10 / PHP 8+
- **Base de données** : MySQL ou SQLite
- **Frontend** : Blade / Vue.js / React (selon ton projet)
- **Authentification** : Laravel Breeze / Jetstream / Sanctum
- **Style** : TailwindCSS / Bootstrap (selon ton choix)

## ⚙️ Installation (exemple Laravel)

```bash
# 1. Cloner le projet
git clone <url-du-repo>
cd energix

# 2. Installer les dépendances
composer install
npm install
npm run dev

# 3. Configurer l'environnement
cp .env.example .env
php artisan key:generate

# 4. Configurer la base de données dans .env puis lancer les migrations
php artisan migrate --seed

# 5. Démarrer le serveur
php artisan serve
