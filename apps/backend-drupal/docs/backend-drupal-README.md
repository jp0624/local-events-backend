# Local Events – Backend (Drupal Headless CMS)

This is the **headless backend** for the Local Events & Experiences platform.

It is built with **Drupal 11**, runs via **DDEV + Docker**, and exposes all content exclusively through **JSON:API** for consumption by a Next.js frontend.

This backend is intentionally treated as:
- a **content engine**
- an **editorial workflow system**
- an **API provider**

No frontend rendering is performed here.

---

## 📦 Tech Stack

- **Drupal**: 11.x
- **PHP**: 8.3
- **Database**: MariaDB (via DDEV)
- **Local Dev**: DDEV + Docker
- **Runtime OS**: WSL2 (Ubuntu 24.04)
- **API**: JSON:API (Drupal core)

---

## 📁 Project Location (Important)

This project **must live in the Linux filesystem**, NOT under `/mnt/c`.

Canonical path:
```
/home/<user>/projects/local-events/apps/backend-drupal
```

Running Drupal from `/mnt/c` causes:
- unstable installs
- file permission issues
- Composer failures
- asset aggregation errors

This is a **hard requirement**, not a preference.

---

## 🧠 Architecture Philosophy

- Drupal is **headless**
- All frontend rendering happens in Next.js
- Content is accessed only via JSON:API
- Configuration is **fully exportable and versioned**
- The backend is rebuildable from scratch

---

## 🗂 Directory Overview

```
apps/backend-drupal/
├── .ddev/                # DDEV configuration (committed)
├── composer.json         # Drupal + module dependencies
├── web/                  # Drupal docroot
│   ├── core/             # Drupal core (composer-managed)
│   ├── modules/
│   │   ├── custom/
│   │   └── contrib/
│   ├── themes/
│   └── sites/
│       └── default/
├── config/
│   └── sync/             # Exported Drupal configuration (COMMITTED)
└── README.md
```

---

## ⚙️ Local Development Setup

### Prerequisites
- Docker Desktop
- WSL2
- DDEV

### Start the backend

```bash
cd apps/backend-drupal
ddev start
```

Drupal will be available at:
```
http://local-events.ddev.site
```

---

## 🔌 JSON:API

### Base endpoint
```
/jsonapi
```

### Events
```
GET /jsonapi/node/event
```

---

## 🔄 Configuration Management

Config is stored in:
```
config/sync
```

Export:
```bash
ddev drush cex -y
```

Import:
```bash
ddev drush cim -y
```

---

## 🚫 What NOT to do

- ❌ Do not run from `/mnt/c`
- ❌ Do not commit `vendor/` or `web/core/`
- ❌ Do not treat Drupal as a frontend

---

**Drupal is the content engine.  
Next.js is the experience.**
