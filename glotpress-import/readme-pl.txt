=== Plogins Rapid - Quick Order for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, quick order, bulk order, b2b, wholesale
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Requires Plugins: woocommerce
Stable tag: 1.0.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Szybki formularz zamówienia zbiorczego, dzięki któremu kupujący B2B i hurtowi mogą dodawać wiele produktów jednocześnie.

== Description ==

Rapid dodaje do Twojego sklepu WooCommerce formularz szybkiego zamówienia z wyszukiwaniem. Klienci
znajdują produkty według <strong>nazwy lub SKU</strong>, ustawiają ilości w zwartej tabeli i dodają wiele
produktów do koszyka w <strong>jednym przesłaniu</strong>, bez klikania po stronach produktów.

Powstał z myślą o procesach B2B, hurtowych, handlowych i ponownych zamówień, w których kupujący wiedzą,
czego chcą, i cenią szybkość ponad przeglądanie.

Kod znajduje się na GitHubie pod adresem https://github.com/wppoland/plogins-rapid; to jest
miejsce, w którym możesz przejrzeć kod źródłowy, zgłosić błąd lub wysłać poprawkę.

= Documentation and links =

* <strong>Dokumentacja</strong> - https://plogins.com/pl/plogins-rapid/docs/
* <strong>Strona wtyczki</strong> - https://plogins.com/pl/plogins-rapid/
* <strong>Kod źródłowy</strong> - https://github.com/wppoland/plogins-rapid
* <strong>Zgłoszenia błędów i propozycje funkcji</strong> - https://github.com/wppoland/plogins-rapid/issues


= Features =

* Shortcode `[rapid_order]`, który renderuje przeszukiwalną tabelę/formularz produktów.
* Wyszukiwanie produktów na żywo przez AJAX według nazwy lub SKU (z opóźnieniem, bez przeładowania strony).
* Konfigurowalny zakres produktów: <strong>wszystkie produkty</strong> lub <strong>tylko wybrane kategorie</strong>.
* Zbiorcze dodawanie do koszyka: ustaw ilości dla wielu produktów i dodaj je wszystkie w jednym przesłaniu, z powiadomieniem podsumowującym, ile produktów trafiło do koszyka.
* Wybierz kolumny do wyświetlenia: obraz, SKU, cena, stan magazynowy.
* Konfigurowalna liczba wyników wyszukiwania na stronę.
* Działa bez JavaScript: pierwsza strona produktów wyświetla się jako zwykła tabela, a przesłanie nadal zbiorczo dodaje produkty do koszyka.
* Dostępne, przyjazne dla urządzeń mobilnych znaczniki (tabela zwija się do kart na małych ekranach), widoczne stany fokusu i etykiety dla czytników ekranu.
* Gotowe do tłumaczenia (dołączony plik POT) i czysta dezinstalacja.
* Zgodne z HPOS oraz blokami koszyka/kasy.

= The [rapid_order] shortcode =

Utwórz stronę (np. „Szybkie zamówienie”) i dodaj shortcode:

`[rapid_order]`

== Installation ==

1. Prześlij wtyczkę do `/wp-content/plugins/rapid` lub zainstaluj przez Wtyczki → Dodaj nową.
2. Włącz ją. WooCommerce musi być zainstalowane i aktywne.
3. Przejdź do <strong>WooCommerce → Rapid</strong>, aby wybrać zakres produktów i kolumny do wyświetlenia.
4. Utwórz stronę z shortcode’em `[rapid_order]`, na której umieścisz formularz.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Tak. WooCommerce musi być zainstalowane i aktywne.

= Can I limit the form to certain categories? =

Tak. Ustaw zakres produktów na „Tylko wybrane kategorie” i zaznacz kategorie,
które chcesz zaoferować. Wybierz „Wszystkie produkty”, aby objąć cały katalog.

= Does it work without JavaScript? =

Tak. Bez JavaScript formularz pokazuje pierwszą stronę produktów w zakresie, a
przycisk przesyłania nadal dodaje wybrane ilości do koszyka po stronie serwera.
Wyszukiwanie na żywo i filtr kategorii to progresywne udoskonalenia.

= How does adding to the cart work? =

Wpisz ilość dla każdego produktu, którego chcesz, a następnie kliknij „Dodaj wybrane do koszyka”.
Każdy produkt z podaną ilością jest dodawany w jednym przesłaniu, a Ty otrzymujesz powiadomienie
informujące, ile produktów dodano (oraz ile ewentualnie nie udało się dodać).

= Do shoppers need an account? =

Nie. Formularz działa dla gości i zalogowanych klientów; zachowanie koszyka jest zgodne z Twoimi zwykłymi ustawieniami zakupów bez rejestracji w WooCommerce.


= Does this plugin work on WordPress Multisite? =

Tak. Ta wtyczka jest zgodna z WordPress Multisite. Włącz ją w całej sieci lub na poszczególnych witrynach; każda witryna zachowuje własne ustawienia i dane.

== Screenshots ==

1. Formularz szybkiego zamówienia z wyszukiwaniem na żywo i polami ilości.
2. Ekran ustawień Rapid w sekcji WooCommerce.

== External Services ==

Rapid nie łączy się z żadnymi usługami zewnętrznymi. Wyszukiwanie produktów na żywo działa na Twoim własnym sklepie: formularz wysyła dane do pliku `admin-ajax.php` Twojej witryny i odpytuje istniejące produkty WooCommerce według nazwy lub SKU, a zbiorcze dodawanie do koszyka korzysta z własnego koszyka WooCommerce. Rapid przechowuje w bazie danych WordPress tylko dwie opcje (`rapid_settings` i `rapid_db_version`); nie tworzy niestandardowych tabel i nie wysyła wiadomości e-mail.

== Translations ==

Wtyczka Plogins Rapid zawiera polskie, niemieckie i hiszpańskie tłumaczenia interfejsu wtyczki. Domena tekstowa to `plogins-rapid`, więc pakiety językowe z WordPress.org mogą również nadpisywać lub rozszerzać te dołączone tłumaczenia.

== Changelog ==

= 1.0.2 =
* Dodano dołączone polskie, niemieckie i hiszpańskie tłumaczenia interfejsu wtyczki.

= 1.0.1 =
* Pierwsza stabilna wersja.

= 0.1.4 =
* Zmieniono nazwę na Plogins Rapid dla WooCommerce, aby uzyskać bardziej charakterystyczną nazwę wtyczki.

= 0.1.3 =
* Filtr `rapid/order_settings` i akcja `rapid/form_fields` dla formularzy szybkiego zamówienia PRO dla poszczególnych ról.
* Pomocnik `OrderContext` udostępnia szablonom i filtrom kontekst roli odwiedzającego.

= 0.1.2 =
* Dodano filtr `rapid/product_price_html`, aby PRO i kod niestandardowy mogły nadpisać ceny w tabeli szybkiego zamówienia.

= 0.1.1 =
* Dodano filtr `rapid/bulk_paste_prefill` oraz akcje `rapid/bulk_paste_form_extra` / `rapid/bulk_paste_after_form` dla integracji zbiorczego wklejania PRO (zapisane listy SKU).

= 0.1.0 =
* Pierwsza wersja: shortcode `[rapid_order]` z wyszukiwaniem produktów AJAX według nazwy lub SKU, konfigurowalny zakres produktów (wszystkie/wybrane kategorie), zbiorcze dodawanie do koszyka z pojedynczym powiadomieniem, wybieralne kolumny (obraz/SKU/cena/stan magazynowy) i liczba wyników na stronę.
