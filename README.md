# Arcitect - Laravel with HTMX Starter Project

Un projet starter moderne combinant Laravel 12, HTMX et Tailwind CSS pour créer des applications web interactives sans écrire de JavaScript complexe.

## 📋 À propos du projet

**Arcitect** est une application de planification et d'organisation de romans. Elle permet aux auteurs de structurer leurs histoires en gérant des chapitres et un codex contenant personnages, objets et lieux.

### Fonctionnalités principales

- **Gestion de chapitres** : Création, modification et organisation de chapitres avec titre, description et ordre
- **Codex** : Base de données des éléments de l'univers fictif (personnages, objets, lieux)
- **Interface moderne** : UI responsive avec Tailwind CSS 4.0
- **Interactivité HTMX** : Chargement dynamique sans rechargement de page

## 🛠️ Stack technique

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![HTMX](https://img.shields.io/badge/HTMX-3D72D7?style=for-the-badge&logo=htmx&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white)

</div>

- **Backend** : Laravel 12 (PHP 8.2+)
- **Frontend** : HTMX 1.9.10 + Tailwind CSS 4.0
- **Base de données** : WampServer + MySQL (ou SQLite)
- **Build** : Vite 6.2
- **Testing** : PHPUnit 11.5

## 📎 Prérequis

- PHP 8.2 ou supérieur
- Composer
- Node.js et npm
- **WampServer** (recommandé) ou MySQL installé séparément
- SQLite (optionnel, comme alternative)

## 🚀 Installation

1. **Cloner le projet**
```bash
git clone <repository-url>
cd laravel-with-htmx-starter-project
```

2. **Installer les dépendances PHP**
```bash
composer install
```

3. **Installer les dépendances Node**
```bash
npm install
```

4. **Configurer l'environnement**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Configurer la base de données**

**Option A : Avec WampServer et MySQL (recommandé)**

- Démarrer WampServer
- Créer une base de données via phpMyAdmin (ex: `arcitect`)
- Configurer le fichier `.env` :
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=arcitect
DB_USERNAME=root
DB_PASSWORD=
```

**Option B : Avec SQLite**
```bash
touch database/database.sqlite
```
Configurer le fichier `.env` :
```env
DB_CONNECTION=sqlite
```

6. **Exécuter les migrations**
```bash
php artisan migrate
```

7. **Installer HTMX**

HTMX est inclus via CDN dans le layout principal (`resources/views/layouts/app.blade.php`). Aucune installation supplémentaire n'est requise.

Pour vérifier ou modifier la version utilisée, consultez la balise `<script>` dans le fichier layout :
```html
<script src="https://unpkg.com/htmx.org@1.9.10"></script>
```

Si vous souhaitez installer HTMX localement via npm :
```bash
npm install htmx.org
```
Puis importez-le dans `resources/js/app.js` :
```javascript
import 'htmx.org';
```

## 🎯 Utilisation

### Démarrage en développement

Le projet inclut un script Composer qui démarre simultanément le serveur Laravel, la queue et Vite :

```bash
composer dev
```

Ou démarrer chaque service individuellement :

```bash
# Terminal 1 : Serveur Laravel
php artisan serve

# Terminal 2 : Vite (assets)
npm run dev

# Terminal 3 : Queue worker (optionnel)
php artisan queue:listen --tries=1
```

Accéder à l'application : `http://localhost:8000`

### Tests

```bash
composer test
# ou
php artisan test
```

### Build de production

```bash
npm run build
```

## 📂 Structure du projet

```
.
├── app/
│   ├── Http/Controllers/
│   │   ├── ChapterController.php    # CRUD des chapitres
│   │   └── CodexController.php      # CRUD du codex
│   └── Models/
│       ├── Chapter.php               # Modèle Chapter
│       └── Codex.php                 # Modèle Codex
├── database/
│   └── migrations/
│       ├── 2025_05_20_110517_create_chapters_table.php
│       └── 2025_05_23_100715_create_codexes_table.php
├── resources/
│   ├── css/
│   │   └── app.css                  # Styles Tailwind personnalisés
│   ├── js/
│   │   ├── app.js
│   │   └── bootstrap.js             # Configuration Axios
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php        # Layout principal avec HTMX
│       ├── outline/
│       │   ├── chapters/            # Vues des chapitres
│       │   ├── codex/               # Vues du codex
│       │   └── index.blade.php
│       └── welcome.blade.php
└── routes/
    └── web.php                       # Routes de l'application
```

## 🎨 Modèles de données

### Chapter
- `id` : Identifiant unique
- `title` : Titre du chapitre
- `description` : Description/contenu
- `order` : Ordre dans la chronologie
- `timestamps` : Dates de création/modification

### Codex
- `id` : Identifiant unique
- `name` : Nom de l'entrée
- `type` : Type (character, item, location)
- `description` : Description détaillée
- `timestamps` : Dates de création/modification

## 🛣️ Routes principales

- `GET /` : Page d'accueil
- `GET /outline` : Dashboard des outlines
- `GET /outline/chapters` : Liste des chapitres
- `GET /outline/codex` : Liste des entrées du codex
- Routes resourceful pour `chapters` et `codex` (CRUD complet)

## 🎨 Personnalisation

### Tailwind CSS

Le projet utilise Tailwind CSS 4.0 avec des polices personnalisées :
- **Font Sans** : Rubik
- **Font Display** : Pacifico

Modifier les styles dans `resources/css/app.css`.

### HTMX

HTMX est chargé via CDN dans `resources/views/layouts/app.blade.php`. Pour ajouter des interactions dynamiques, utiliser les attributs HTMX directement dans les templates Blade.

## 🔧 Scripts disponibles

```bash
composer dev      # Démarre tous les services en parallèle
composer test     # Exécute les tests PHPUnit
npm run dev       # Démarre Vite en mode développement
npm run build     # Build de production des assets
```

## 📝 Licence

Ce projet est distribué sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

## 🤝 Contribution

Les contributions sont les bienvenues ! N'hésitez pas à ouvrir une issue ou une pull request.

---

**Note** : Ce projet est un starter kit. Adaptez-le selon vos besoins spécifiques !
