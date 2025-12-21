# Contributing Guide

This project uses a **headless, multi-repo architecture** with a Git submodule.

Please read carefully before contributing.

---

## 🧭 Repository Layout

- Backend repo: `local-events-backend`
- Frontend repo: `local-events-frontend`
- Frontend is included in backend via submodule

---

## 🔄 Working on the Frontend

```bash
cd apps/frontend-next
# work normally
git commit
git push
```

After pushing frontend changes, update the backend repo pointer:

```bash
cd local-events-backend
git add apps/frontend-next
git commit -m "Update frontend submodule"
git push
```

---

## 🔄 Working on the Backend

```bash
cd apps/backend-drupal
ddev start
ddev drush cex -y
```

Always export config after:
- creating fields
- editing content types
- modifying taxonomies

---

## ⚠️ Rules

- Do not commit `vendor/` or `web/core`
- Do not run Drupal from `/mnt/c`
- Always export config before pushing
- Do not modify submodule contents from backend repo

---

## 🧪 Testing

- Backend tested via JSON:API endpoints
- Frontend tested via Next.js pages

---

## 📦 Commit Guidelines

- Clear, descriptive messages
- One logical change per commit
