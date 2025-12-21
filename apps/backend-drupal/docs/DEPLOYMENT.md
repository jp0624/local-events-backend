# Deployment Overview

This document describes **typical deployment strategies** for the Local Events platform.

---

## 🧩 Backend (Drupal)

Typical options:
- Acquia
- Pantheon
- Platform.sh
- Fly.io (containerized)

Requirements:
- PHP 8.3
- MySQL/MariaDB
- JSON:API enabled
- Config import on deploy

Deployment flow:
```bash
drush cim -y
drush cr
```

---

## 🌐 Frontend (Next.js)

Typical options:
- Vercel (recommended)
- Netlify
- AWS Amplify

Environment variables:
```env
DRUPAL_BASE_URL=https://api.example.com
```

---

## 🔐 Security

- Read-only API by default
- Auth can be layered later
- Rate limiting recommended

---

## 🧠 Caching

- Drupal: internal caching + CDN
- Next.js: ISR + edge caching

---

## 📈 Scaling

- Backend scales independently of frontend
- Frontend can be globally distributed
