# Projekt pacjenci

Projekt zapisu pacjentów na operację z podziałem na grupy operacyjne.

## Spis treści

1. Wymagania
2. Instalacja
3. Uruchamianie
4. Testowanie
5. API

## Wymagania

Wymień wszystkie wymagania, które są potrzebne do uruchomienia projektu, takie jak:

- PHP 8.2
- Wersja Laravel ^10

## Instalacja

Jak zainstalować projekt na lokalnym komputerze:

1. Sklonuj repozytorium: `git clone https://github.com/BartekDalek/pacjenci.git`
2. Przejdź do katalogu projektu
3. Zainstaluj zależności: `composer install && npm install`
4. Skopiuj plik `.env.example` do `.env`: `cp .env.example .env`
5. Skopiuj plik `.env.example` do `.env.testing`: `cp .env.example .env.testing`
6. Utwórz bazę danych dla głównego projektu oraz dla testów jednostkowych np. `pacjenci` oraz `pacjenci_testing`
7. Uzupełnij dane dostępu do bazy danych w pliku `.env` oraz `.env.testing`
8. Wykonaj migrację: `php artisan migrate`
9. Wykonaj seedowanie: `php artisan db:seed` (utworzy to testowych pacjentów oraz konto dla admina z loginem `admin@admin.pl` i hasłem `admin`)
10. Wygeneruj klucz aplikacji: `php artisan key:generate`


## Uruchamianie

Aby uruchomić projekt `php artisan serve` oraz `npm run dev`.

## Testowanie

Aby przeprowadzić testy jednostkowe:

- Uruchom testy: `php artisan test`
- Uruchom testy z określonym plikiem: `php artisan test --filter nazwaTestu`

## API

W celu uzyskania tokena do autoryzacji użytkownika służy endpoint `POST /api/login`. Wymagane dane to `email` oraz `password`. W odpowiedzi otrzymamy token, który należy przekazać w nagłówku `Authorization` w formacie `Bearer <token>`.

W projekcie zostały zaimplementowane następujące endpointy:

- `POST /api/login` - logowanie użytkownika
- `GET /api/operations` - zwraca listę operacji wraz z danymi pacjenta, grupą operacji i datą operacji.
- `POST /api/logout` - wylogowanie użytkownika
