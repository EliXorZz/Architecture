# 📌 Architecture du projet

Le projet suit une clean architecture (horizontale) pour séparer clairement les responsabilités.

## 🗂 Structure

- **app/**
  - **Presentation/**
  - **Application/**
  - **Domain/**
  - **Persistence/**

## 🔄 Flux d'une requête
1.	**Presentation / Controller** → reçoit la requête HTTP, transforme les données en DTO.
2.	**Application / Service** → reçoit le DTO, crée une Entity et applique la logique métier.
3.	**Persistence / Repository** → persiste l’Entity ou récupère des données depuis la base.
4.	**Domain / Entity** → contient toute la logique métier et les règles du domaine.
5.	**Presentation / Controller** → transforme la réponse en DTO pour l’API ou la vue.

## API
- POST /api/users -> Création
- GET /api/users/{id} -> Récupération
- UPDATE /api/users/{id} -> Modification
- DELETE /api/users/{id} -> Suppression

### Exemple de payload
```json
{
    "first_name": "Dylan",
    "last_name": "Battig",
    "email": "dylan.battig@compagny.com",
    "phone": "0615489180"
}
```
