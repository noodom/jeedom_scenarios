# Scénario de mise à jour de plugins par menus Discord

Ce scénario permet d'effectuer la mise à jour de plugins à partir de menus Discord.

## Template du scénario

Le template JSon du scénario est disponible ici :

- [update_plugins](./templates/update_plugins.json)

## Description du scénario de mise à jour des plugins par Discord

- Le scénario "update plugins" permet d'effectuer des mises à jours des plugins Jeedom depuis un menu Discord.
  Il permet de récupérer la liste des plugins disponibles pour une mise à jour et de choisir les plugins à mettre à jour

  Il est exécuté :
    - toutes les heures (aucune action si aucun nouveau plugin disponible)
    - en le déclenchant depuis Discord avec le mot-clé "plugins"

## Installation du template de scénario

- Télécharger le template JSon ici : [update_plugins](./templates/update_plugins.json)

- Créer un nouveau scénario

![Création du scénario](./doc/images/createScenario.png)

- Charger le template téléchargé pour le scénario créé

![Mise à jour plugin](./doc/images/loadTemplate.png)

- Adaptation des paramètres à son propre Jeedom (commandes d'un équipement du plugin DiscordLink et renommage éventuel des variables utilisées)

![Mise à jour plugin](./doc/images/applyTemplate.png)

## Déroulement du scénario

### Mise à jour d'un plugin

![Mise à jour plugin](./doc/images/updatePlugin.png)

### Annulations de la mise à jour

![Annulation 1](./doc/images/updateCancelled.png)

![Annulation 2](./doc/images/UpdateCanceledFromList.png)
