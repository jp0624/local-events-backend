# Swapping the Backend: Drupal → Node.js

This platform is designed so the **backend CMS can be replaced** without rewriting the frontend.

---

## 🎯 Contract Principle

The frontend depends only on:
- HTTP
- JSON
- Predictable resource shapes

Not on:
- Drupal internals
- PHP
- CMS-specific logic

---

## 🔁 Replaceable Backends

Drupal can be swapped for:
- **Node.js + NestJS**
- **Strapi**
- **Directus**
- **Custom Express API**

As long as the API contract is preserved.

---

## 📐 API Expectations

The frontend expects:

```
GET /events
GET /events/:id
```

With fields:
- id
- title
- startDate
- endDate
- venue
- categories
- neighborhoods

---

## 🧠 Strategy

### Option A: Adapter Layer (Recommended)

Create a Node API that **mirrors Drupal JSON:API responses**, then:
- Swap base URL
- No frontend changes

### Option B: Frontend Normalization

Normalize responses inside frontend fetch helpers:
```ts
function normalizeEvent(apiEvent) {
  return {
    id: apiEvent.id,
    title: apiEvent.title,
    startDate: apiEvent.startDate,
  };
}
```

---

## 🏗 Example Stack (Node)

- NestJS
- PostgreSQL
- Prisma
- REST or GraphQL

---

## ✅ Result

Frontend remains stable.
Backend becomes interchangeable.
Architecture stays future-proof.
