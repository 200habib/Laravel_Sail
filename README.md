# 🍽 Relazioni tra Utenti e Piatti in Laravel

## 1. Associare un Piatto al Creatore (User) - Relazione One To Many

Un utente può creare più piatti, e ogni piatto ha un solo creatore.

### 📌 Migrazione `plats` (piatti):

```php
Schema::create('plats', function (Blueprint $table) {
    $table->id();
    $table->string('nom');
    $table->foreignId('user_id')->constrained()->onDelete('cascade'); // creatore
    $table->timestamps();
});

📌 Modello Plat.php:

class Plat extends Model
{
    use HasFactory;

    // Relazione inversa: un piatto ha un solo creatore (utente)
    public function createur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

📌 Modello User.php:

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Relazione: un utente può creare più piatti
    public function platsCrees()
    {
        return $this->hasMany(Plat::class, 'user_id');
    }
}

✅ Uso:

// Recupera il creatore di un piatto
$plat = Plat::find(1);
echo $plat->createur->name;  // Mostra il nome del creatore

// Recupera tutti i piatti creati da un utente
$user = User::find(1);
foreach ($user->platsCrees as $plat) {
    echo $plat->nom;  // Mostra il nome del piatto
}

2. Favoriti (Many-to-Many tra User e Plat)

Un utente può avere più piatti nei preferiti, e un piatto può essere nei preferiti di più utenti.
📌 Tabella pivot favoris:

Schema::create('favoris', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('plat_id')->constrained()->onDelete('cascade');
    $table->timestamps();
});

📌 Modello User.php:

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Relazione Many-to-Many: un utente può avere molti piatti nei preferiti
    public function favoris()
    {
        return $this->belongsToMany(Plat::class, 'favoris')->withTimestamps();
    }
}

📌 Modello Plat.php:

class Plat extends Model
{
    use HasFactory;

    // Relazione Many-to-Many: un piatto può essere nei preferiti di molti utenti
    public function favorisPar()
    {
        return $this->belongsToMany(User::class, 'favoris')->withTimestamps();
    }
}