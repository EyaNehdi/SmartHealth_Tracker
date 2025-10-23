# test_exact.py
import json
import sys
import os

sys.path.append(os.path.dirname(__file__))

from ia_recommendations import main

# Données EXACTES de votre base
user_prefs = ["Renforcement musculaire"]
activities = [
    {
        "id": 1,
        "nom": "yoga",
        "description": "eeeeeeeeeeeeeeeeeeeeeee",
        "category": "bien-être", 
        "equipments": ""
    },
    {
        "id": 2,
        "nom": "musculation",
        "description": "eeeeeeeeeeeeeeeeeeeeeeeeeeee", 
        "category": "fitness",
        "equipments": ""
    },
    {
        "id": 3,
        "nom": "abdos",
        "description": "eeeeeeeeeeeeeeeeeeeeeee",
        "category": "fitness",
        "equipments": ""
    },
    {
        "id": 4,
        "nom": "Renforcement musculaire",  # ACTIVITÉ AVEC LE MÊME NOM QUE LA PRÉFÉRENCE
        "description": "ffffffffffffffffffffffffffffffff",
        "category": "fitness", 
        "equipments": ""
    }
]

print("=== TEST AVEC DONNÉES EXACTES ===")
sys.argv = ['test', json.dumps(user_prefs), json.dumps(activities)]
main()