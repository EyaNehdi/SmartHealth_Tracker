import json
import sys
import logging
import os

# Configuration du logging détaillé
logging.basicConfig(
    level=logging.DEBUG,
    format='%(levelname)s: %(message)s',
    handlers=[logging.StreamHandler(sys.stderr)]
)
logger = logging.getLogger(__name__)

def main():
    try:
        logger.info("🎯 DÉMARRAGE IA - MODE DEBUG")
        
        # Vérifier Python et chemins
        logger.info(f"Python: {sys.version}")
        logger.info(f"Répertoire: {os.getcwd()}")
        
        if len(sys.argv) != 3:
            logger.error("❌ Arguments incorrects")
            print(json.dumps([]))
            return
        
        user_preferences = json.loads(sys.argv[1])
        activities = json.loads(sys.argv[2])
        
        logger.info(f"📋 Préférences: {user_preferences}")
        logger.info(f"📊 Activités: {len(activities)}")
        
        # TEST D'IMPORT DES MODULES
        logger.info("🔧 TEST IMPORT MODULES...")
        
        try:
            logger.info("Tentative: import sentence_transformers")
            from sentence_transformers import SentenceTransformer
            logger.info("✅ sentence_transformers IMPORTÉ")
        except ImportError as e:
            logger.error(f"❌ Erreur import sentence_transformers: {e}")
            print(json.dumps([]))
            return
            
        try:
            logger.info("Tentative: import sklearn")
            from sklearn.metrics.pairwise import cosine_similarity
            logger.info("✅ sklearn IMPORTÉ")
        except ImportError as e:
            logger.error(f"❌ Erreur import sklearn: {e}")
            print(json.dumps([]))
            return
        
        # CHARGEMENT DU MODÈLE
        logger.info("🔮 DÉBUT CHARGEMENT MODÈLE...")
        try:
            model = SentenceTransformer('distiluse-base-multilingual-cased')
            logger.info("✅ MODÈLE CHARGÉ AVEC SUCCÈS!")
        except Exception as e:
            logger.error(f"❌ ERREUR CHARGEMENT MODÈLE: {e}")
            print(json.dumps([]))
            return
        
        # PRÉPARATION DES DONNÉES
        logger.info("📝 PRÉPARATION DES TEXTES...")
        activity_texts = []
        activity_ids = []
        
        for activity in activities:
            text = f"{activity['nom']} {activity['description']} "
            activity_texts.append(text)
            activity_ids.append(activity['id'])
            logger.info(f"   Activité {activity['id']}: '{activity['nom']}' -> '{text}'")
        
        user_text = ' '.join(user_preferences)
        logger.info(f"👤 Texte utilisateur: '{user_text}'")
        
        # EMBEDDINGS
        logger.info("🧠 DÉBUT GÉNÉRATION EMBEDDINGS...")
        try:
            user_embedding = model.encode([user_text])
            logger.info(f"✅ Embedding utilisateur: {user_embedding.shape}")
            
            activity_embeddings = model.encode(activity_texts)
            logger.info(f"✅ Embeddings activités: {activity_embeddings.shape}")
        except Exception as e:
            logger.error(f"❌ ERREUR EMBEDDINGS: {e}")
            print(json.dumps([]))
            return
        
        # SIMILARITÉS
        logger.info("📊 CALCUL SIMILARITÉS...")
        try:
            similarities = cosine_similarity(user_embedding, activity_embeddings)[0]
            logger.info(f"✅ Similarités calculées: {similarities}")
        except Exception as e:
            logger.error(f"❌ ERREUR SIMILARITÉS: {e}")
            print(json.dumps([]))
            return
        
        # RÉSULTATS
        logger.info("📈 ANALYSE RÉSULTATS:")
        recommended_ids = []
        
        for i, (activity_id, similarity) in enumerate(zip(activity_ids, similarities)):
            activity_name = activities[i]['nom']
            logger.info(f"   {activity_name} (ID: {activity_id}): {similarity:.4f}")
            
            if similarity > 0.3:
                recommended_ids.append(activity_id)
                logger.info(f"   ✅ -> AJOUTÉ À LA RECOMMANDATION")
        
        logger.info(f"🏆 RÉSULTAT FINAL: {recommended_ids}")
        print(json.dumps(recommended_ids))
        
    except Exception as e:
        logger.error(f"💥 ERREUR GÉNÉRALE: {e}")
        import traceback
        logger.error(f"🔍 TRACEBACK: {traceback.format_exc()}")
        print(json.dumps([]))

if __name__ == "__main__":
    main()