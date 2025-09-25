 Inlogsysteem

Een compleet inlogsysteem met HTML, CSS, en PHP voor team project.

 Bestanden

- `index.php` - Hoofdpagina
- `login.php` - Inlogpagina  
- `dashboard.php` - Dashboard na inloggen
- `logout.php` - Uitloggen
- `config.php` - Database configuratie
- `style.css` - Alle styling
- `database.sql` - Database schema

 🚀 Installatie:

 1. Database instellen:
```sql
CREATE DATABASE login_system;
```
Importeer dan `database.sql`

 2. Database configuratie:
Pas `config.php` aan met jouw database gegevens:
```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'login_system');
define('DB_USER', 'root');
define('DB_PASS', '');
```

 3. Test accounts:
- Admin: admin@school.nl / password
- Student student@school.nl / password

  Functionaliteiten:

\Inloggen - Veilig met password hashing  
 Sessie beheer - Gebruiker blijft ingelogd  
 Gebruikersrollen - Admin en Student  
 Responsive design- Werkt op mobiel  
 Foutafhandeling - Duidelijke error berichten  
 Beveiliging - SQL injection en XSS preventie  

 Design:

- Modern gradient design
- Responsive layout 
- Professionele styling
- Mooie animaties
- Mobile-first approach

 Beveiliging:

- Password hashing met `password_hash()`
- SQL injection preventie met PDO
- XSS preventie met `htmlspecialchars()`
- Session management
- Input validatie

 