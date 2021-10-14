# Scénarios de mise à jour de plugins par menus Discord ou Telegram

Ces scénarios permettent d'effectuer la mise à jour de plugins à partir de menus Discord ou Telegram.

## Template des scénarios

Les templates JSon du scénario sont disponibles ici :

- [update_plugins](./templates/update_plugins.json)

- [update_plugins_telegram](./templates/update_plugins_telegram.json)

## Description des scénarios de mise à jour des plugins par Discord ou Telegram

- Le scénario "update plugins" permet d'effectuer des mises à jours des plugins Jeedom depuis un menu Discord.
  Il permet de récupérer la liste des plugins disponibles pour une mise à jour et de choisir les plugins à mettre à jour

  Il est exécuté :
    - toutes les heures (aucune action si aucun nouveau plugin disponible)
    - en le déclenchant depuis Discord avec le mot-clé "plugins"

- Le scénario "update plugins telegram" permet d'effectuer des mises à jours des plugins Jeedom depuis un menu Telegram.
  Il permet de récupérer la liste des plugins disponibles pour une mise à jour et de choisir les plugins à mettre à jour

  Il est exécuté :
    - toutes les heures (aucune action si aucun nouveau plugin disponible)

## Installation du template de scénario

- Télécharger le template JSon souhaité : 
  - [update_plugins Discord](./templates/update_plugins.json)
  - [update_plugins Telegram](./templates/update_plugins_telegram.json)

- Créer un nouveau scénario

![Création du scénario](./doc/images/createScenario.png)

- Charger le template téléchargé pour le scénario créé

![Mise à jour plugin](./doc/images/loadTemplate.png)

- Adaptation des paramètres à son propre Jeedom (commandes d'un équipement du plugin DiscordLink ou Telegram et renommage éventuel des variables utilisées)

![Mise à jour plugin](./doc/images/applyTemplate.png)

## Déroulement du scénario

### Mise à jour d'un plugin

![Mise à jour plugin](./doc/images/updatePlugin.png)

### Annulations de la mise à jour

![Annulation 1](./doc/images/updateCancelled.png)

![Annulation 2](./doc/images/UpdateCanceledFromList.png)
