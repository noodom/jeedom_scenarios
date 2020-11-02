## Templates des scénarios

Les templates scénarios sont disponibles ici :

- [Génération Attestation numérique Reconfinement](./templates/generation_attestation.json)

- [Lancement Attestation Reconfinement](./templates/lancement_attestation.json)

- [Lancement Attestation Reconfinement avec Discord](./templates/askCovid.json)

- [Exemples de scénarios Discord évolués](./templates/ask_covid_discord.json)

- [Exemple de scénarios avec choix du destinataire](./templates/ask_discord_complet.json)

## Installation

Je vous laisse vérifier les scénarios utiles pour votre installation dans al description des scénarios ci-dessous.
Le scénario indispensable est le scénario de génération qui crée le lien final de génération de l'attestation numérique.

- Chargement des templates (fichiers json ci-dessus)

  - Aller dans le menu des scénarios
  - Créer un nouveau scénario avec le nom "Génération Attestation numérique Reconfinement"
  - Sélectionner le bouton template (en haut à droite)
  - Depuis la fenêtre des templates des scénarios, sélectionner le bouton "Charger un template" puis sélectionner le fichier json "generation_attestation.json" récupéré ci-dessus
  - Charger les autres fichiers json de la même façon
  - Sélectionner le scénario "generation_attestation" dans la liste des Template sous le bouton
  - Dans les paramètres de scénario, sélectionner l'action correspondante à celle proposée
  - Sélectionner le bouton "Appliquer" et valider avec le bouton "Ok" => Le scénario est chargé dans le nouveau scénario créé
  - Sélectionner l'onglet "Scénario" et activer la dernière action qui apparaît grisée par défaut
  - Sélectionner "Sauvegarder" => Le scénario est créé et prêt
  
  - Créer un nouveau scénario à appeler "Lancement attestation Reconfinement" et sélectionner le template correspondant lancement_attestation (comme pour le scénario précédent)
  - Sélectionner l'onglet "Scénario" et vérifier que le scénario précédent est bien positionné dans la seule action présente, avec les paramètres nécessaires (voir la capture sur cette page).
  
  - Créer un nouveau scénario à appeler "ask covid" si vous souhaitez gérer la génération de l'attestation depuis Discord
  - Répéter les opérations précédentes pour finaliser la création de ce scénario (renseignements des actions, vérification du contenu du scénario, sauvegarde du scénario)
    

## Description des scénarios

IMPORTANT : Les scénarios génèrent un lien pour l'attestation numérique.
La date et l'heure sur l'attestation seront celles correspondant au moment du clic sur le lien !
Bien penser à cliquer sur le lien au moment où vous souhaitez l'utiliser pour générer l'attestation et non pas attendre le contrôle (sinon la date de l'attestation sera l' heure du contrôle..) !

- Le scénario "Génération Attestation numérique Reconfinement" permet d'envoyer un message par Discord (avec la possibilité de remplacer par Telegram, Mail, etc..)
  
  Il attend en paramètres :
  - les coordonnées de l'utilisateur : nom, prenom, dateNaissance, lieuNaissance, adresse, codePostal, ville
  - et le motif de l'attestation : motifAttestation (valeurs possibles : travail, achats, sante, famille, handicap, sport_animaux, convocation, missions, enfants)

- Le scénario "Lancement Attestation Reconfinement" appelle le scénario précédent "Génération Attestation numérique Reconfinement"
  
  Il suffit de passer les paramètres attendus.
  
- Le scénario "ask covid" permet de faire une demande d'attestation numérique en passant par un questionnaire (Pour qui ? Quel motif ?)
  
  Pour l'exécuter, il suffit d'écrire le mot-clé "covid" depuis le channel Discord paramétré dans le scénario, puis de sélectionner la personne concernée et ensuite le motif
  
- Le scénario "ask_covid_discord" génère le lien de l'attestation avec la nouvelle commande Send Attestation du plugin DiscordLink

  Il permet de choisir son jour et son heure de sortie.

- Le scénario "ask_discord_complet" montre l'ensemble des possibilités de la commande d'envoi du lien de l'attestation depuis Discord : choix multi-utilisateurs, choix du motif, choix de la date et heure de sortie

### Captures des scénarios

Génération Attestation numérique Reconfinement

![Onglet Général](./doc/images/generation_attestation_numerique_reconfinement.png)

Lancement attestation Reconfinement

![Onglet Scénario](./doc/images/lancement_attestation_reconfinement.png)

Lancement attestation Reconfinement par Discord

- Modifier les commandes Jeedom (cadres en rouge)
- Modifier les renseignements personnels (cadres en vert)
- Il est possible de remplacer Discord par Telegram ou autres outils (méthode Ask habituelle) pour les demandes 

![Attestation avec Discord](./doc/images/askCovid.png)

Message généré sur Discord

![Message Discord](./doc/images/message_discord.png)

## Exemple d'exécution avec Discord

![Attestation avec Discord](./doc/images/exempleDiscordAsk.jpg)

Attestation numérique générée

![Attestation numérique](./doc/images/declaration_de_deplacement_attestation.png)
