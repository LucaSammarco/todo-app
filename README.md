# ✅ Todo App – Laravel + Livewire

🔗 **Demo online**: [https://todo.lucasammarco.it](https://todo.lucasammarco.it)

> Applicazione Single Page (SPA) per la gestione dei task, con ruoli e autorizzazioni.

---

## 🛠️ Tecnologie

- Laravel 12
- Livewire 3
- Tailwind CSS
- Spatie Laravel Permission

---

## ⚙️ Installazione

### 1. Clona il repository

```bash
git clone https://github.com/LucaSammarco/todo-app.git
cd todo-app
```

### 2. Installa le dipendenze

```bash
composer install
npm install
```

### 3. Configura l'ambiente

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Imposta il database

Modifica il file `.env` con le tue credenziali MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_db
DB_USERNAME=luca
DB_PASSWORD=unaPasswordSicura
```

### 5. Esegui le migrazioni e i seeder

```bash
php artisan migrate
php artisan db:seed
```

### 6. Compila gli asset

```bash
npm run build
```

### 7. Avvia l'applicazione

```bash
php artisan serve
```

Vai su: **http://localhost:8000**

---

## 👤 Utenti di test

### 👨‍💼 Manager
- **Email**: `manager@example.com`
- **Password**: `password`

### 👷 Employees
- `mario.rossi@example.com`
- `giulia.bianchi@example.com`
- `luca.verdi@example.com`
- `sara.neri@example.com`
- `andrea.ferrari@example.com`

**Password** (tutti): `password`


