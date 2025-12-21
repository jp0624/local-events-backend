# Local Events – Frontend (Next.js)

This is the **frontend application** for the Local Events & Experiences platform.

It is built with **Next.js (App Router)** and consumes content from a **headless Drupal backend** via JSON:API.

---

## 📦 Tech Stack

- **Next.js** (App Router)
- **React**
- **TypeScript**
- **Node.js**

---

## 📁 Project Location

This project lives on the **Windows filesystem** for best developer experience:

```
C:\Users\<user>\Projects\local-events\apps\frontend-next
```

---

## 🔌 Backend Integration

Create `.env.local`:

```env
DRUPAL_BASE_URL=http://local-events.ddev.site
```

---

## 📂 Project Structure

```
apps/frontend-next/
├── app/
│   └── events/
│       └── page.tsx
├── src/
│   └── lib/
│       └── drupal.ts
├── public/
└── README.md
```

---

## 🧪 Local Development

```bash
npm install
npm run dev
```

Open:
```
http://localhost:3000/events
```

---

## 🔮 Future Enhancements

- Event detail pages
- Filtering (date, category, neighborhood)
- SEO metadata from Drupal
- Static generation

---

**Drupal provides the data.  
Next.js provides the experience.**
