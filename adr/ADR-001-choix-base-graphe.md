# ADR-001 – Choix de la technologie de base de données graphe pour le module de recommandations

## Context
Dans le cadre du projet **Streamify**, une plateforme de streaming vidéo, les services tels que le **Catalogue**, la **Lecture Vidéo** et la **Recommandation** manipulent des volumes de données importants et très variés.

Pour améliorer la performance et la qualité des services, il est crucial de choisir des technologies adaptées à chaque besoin.

Pour le **module de recommandations**, qui doit analyser les relations entre utilisateurs, contenus et préférences, **les bases de données orientées graphe** apparaissent comme la solution la plus adaptée pour gérer les relations complexes et effectuer des traversées efficaces.

## Options
### Amazon Neptune
- **Service managé AWS**, très intégré à l’écosystème cloud.
- **Réplication automatique**, failover en cas de panne, sauvegardes et réplication inter-région.
- **Scalabilité jusqu’à 128 To** par cluster, lecture possible sur **15 réplicas**.
- Idéal pour des graphes très **volumineux** et des analyses **complexes**.
- Facturation à l’usage : une instance puissante **24h/24** peut coûter **~19 000 €/mois**, hors stockage et requêtes.
- Limite : **difficile de changer de technologie** après mise en place.

### RedisGraph
- Module **in-memory** de **Redis**, très rapide et faible latence.
- Intégration simple avec l’écosystème **Redis** existant.
- Limitations : pas de vrai clustering distribué, **moteur de requêtes limité.**
- Idéal pour **graphes de taille modérée** et besoins **temps réel**.

### ArangoDB
- Base **multi-modèle** (graph + document) avec **clustering, réplication et sharding**.
- Flexibilité pour gérer des **graphes** et **documents** dans une seule base.
- Limitations : traversées **profondes lentes** si graphes distribués sur plusieurs shards.

### Neo4j
- Base graphe très populaire, utilisée par **de grandes enseignes** (signe de fiabilité).
- Plus de **250 mainteneurs**, mais dernière release il y a 11 mois.
- **Langage de requête très riche** et expressif (Cypher).
- **Performance élevée** si la modélisation des données est **bien conçue**.
- Bonne intégration dans **une architecture microservices** et possibilité de dockerisation.
- Prix :
    - Fully Managed : ~140 €/Go/mois
    - Self Managed : selon la grille tarifaire Neo4j

## Décision
Pour le module **Recommandation** de Streamify, **Neo4j** a été choisi comme base de données graphe principale. **Sa richesse fonctionnelle**, via le langage **Cypher**, permet de réaliser des traversées complexes et des analyses relationnelles avancées, essentielles pour proposer des recommandations sociales pertinentes.

La **performance** est élevée dès lors que la modélisation des données est optimisée, et la solution s’intègre facilement dans une architecture **microservices**, avec prise en charge de Docker et de multiples langages.

**Neo4j** bénéficie également d’une **maturité et d’une fiabilité reconnues**, avec une large communauté et des références dans de grandes entreprises. Les options de déploiement **Fully Managed** ou **Self Managed** offrent flexibilité et réduction de la charge opérationnelle.

Bien que le coût (~140 €/Go/mois pour la version Fully Managed) soit conséquent, il est justifié par la **scalabilité**, la **haute disponibilité** et la **pérennité** de l’infrastructure, garantissant ainsi des recommandations rapides et fiables pour les utilisateurs de Streamify.

## Conséquence
Le choix de **Neo4j** implique que la performance du **module de recommandations** dépend fortement d’une **modélisation correcte du graphe** et d’une planification adéquate pour la **scalabilité**.

Sur le plan opérationnel, l’option Fully Managed **réduit la charge de maintenance**, mais un suivi régulier reste nécessaire pour garantir l’optimisation des requêtes et la haute disponibilité.

Financièrement, le coût peut être élevé **(~140 €/Go/mois)**, mais il est compensé par la **fiabilité**, la **performance** et la capacité à gérer des **recommandations complexes**.

Enfin, ce choix renforce la pérennité et l’intégration dans l’écosystème Streamify **microservices**, tout en rendant une migration future vers une autre technologie **plus difficile**.
