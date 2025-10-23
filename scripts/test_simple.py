# test_simple.py
import json
import sys

print("DEBUG: Python fonctionne!")
print("DEBUG: Arguments reçus:", len(sys.argv))

if len(sys.argv) >= 3:
    try:
        prefs = json.loads(sys.argv[1])
        activities = json.loads(sys.argv[2])
        print("DEBUG: Préférences:", prefs)
        print("DEBUG: Nombre d'activités:", len(activities))
        
        # Retourner simplement tous les IDs
        result = [activity['id'] for activity in activities]
        print(json.dumps(result))
    except Exception as e:
        print("DEBUG: Erreur:", str(e))
        print(json.dumps([1, 2, 3]))  # Résultat de test
else:
    print("DEBUG: Pas assez d'arguments")
    print(json.dumps([1, 2, 3]))  # Résultat de test