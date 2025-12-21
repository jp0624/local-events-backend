# Local Events Platform

This repository represents the **Local Events & Experiences Platform**, built using a **headless architecture**.

The system is intentionally split into **two applications**:
- A **backend CMS/API** (Drupal, headless)
- A **frontend UX layer** (Next.js)

The two applications are developed independently but composed together via **Git submodules** to preserve a monorepo-style structure without filesystem or performance issues.

---

## 🧱 Architecture Overview

```
local-events-backend/        (Git repo)
├── apps/
│   ├── backend-drupal/     # Drupal 11 + DDEV (WSL)
│   └── frontend-next/      # Git submodule → Next.js repo
├── config/
│   └── sync/               # Drupal config (committed)
└── docs/
```

```
local-events-frontend/       (Git repo)
└── apps/
    └── frontend-next/      # Next.js App Router
```

---

## 🔗 Repository Strategy

- **Backend repo** is canonical and lives in WSL (Linux FS)
- **Frontend repo** is canonical and lives on Windows
- Backend repo references frontend via a **Git submodule**

This avoids:
- `/mnt/c` performance issues with Drupal
- duplicate repo drift
- symlink/junction fragility

---

## 🚀 Getting Started (New Machine)

```bash
git clone <backend-repo-url>
cd local-events-backend
git submodule update --init --recursive
```

Start backend:
```bash
cd apps/backend-drupal
ddev start
```

Frontend is developed from its own repo (Windows).

---

## 🎯 Goals

- Clean separation of concerns
- Headless, API-first design
- Replaceable backend
- Frontend independence

---

## 🔮 Future Directions

- Swap Drupal backend for Node/Nest/Strapi
- Add auth layer (JWT/OAuth)
- Multi-city expansion
- Caching/CDN layer
