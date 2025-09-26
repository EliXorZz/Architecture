# 📌 Architecture du projet

Le projet suit une architecture **Controller → Service → Repository → Model** pour séparer clairement les responsabilités.

## 🗂 Structure

- **app/**
  - **Enums/**
  - **Models/** → Entités & relations DB *(Eloquent)*
  - **DTO/** → Data transfert object*
  - **Repositories/** → Accès aux données *(requêtes DB)*
  - **Services/** → Logique métier
  - **Http/**
      - **Controllers/** → Gère les requêtes HTTP

## 🔄 Flux d'une requête
1. **Controller** → reçoit la requête.
2. **Service** → applique la logique métier.
3. **Repository** → interagit avec le **Model**.
4. **Model** → représente la base de données via Eloquent. 

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
