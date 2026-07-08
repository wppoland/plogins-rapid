=== Plogins Rapid - Quick Order for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, quick order, bulk order, b2b, wholesale
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Wymaga wtyczek: woocommerce
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Szybki formularz zamówienia zbiorczego, dzięki któremu kupujący B2B i hurtowi mogą dodawać wiele produktów jednocześnie.

== Description ==

Rapid dodaje przeszukiwalny formularz szybkiego zamówienia do Twojego sklepu WooCommerce. Klienci
znajdź produkty według <strong>nazwy lub SKU<strong>, ustaw ilości w kompaktowej tabeli i dodaj wiele produktów do koszyka za pomocą </strong>jednego przesłania</strong>, bez konieczności klikania stron produktów.

Jest przeznaczony dla przepływów pracy B2B, sprzedaży hurtowej, handlu i ponownego składania zamówień, gdzie kupujący wiedzą
czego chcą i cenią szybkość ponad przeglądanie.

Kod znajduje się na GitHubie pod adresem https://github.com/wppoland/plogins-rapid; to jest
miejsce, w którym możesz przeczytać źródło, zgłosić błąd lub wysłać łatkę.

= Documentation and links =

* <strong>Dokumentacja</strong> - https://plogins.com/pl/plogins-rapid/docs/
* <strong>Strona wtyczki</strong> - https://plogins.com/pl/plogins-rapid/
* <strong>Kod źródłowy</strong> - https://github.com/wppoland/plogins-rapid
* <strong>Raporty o błędach i prośby o nowe funkcje</strong> - https://github.com/wppoland/plogins-rapid/issues


= Features =

* Krótki kod `[rapid_order]`, który renderuje tabelę/formularz produktów z możliwością przeszukiwania.
* Wyszukiwanie produktów na żywo AJAX według nazwy lub SKU (odrzucone, bez ponownego ładowania strony).
* Konfigurowalny zakres produktów: <strong>wszystkie produkty</strong> lub <strong>tylko wybrane kategorie</strong>.
* Dodawanie seryjne do koszyka: ustaw ilości wielu produktów i dodaj je wszystkie w jednym przesłaniu, z informacją podsumowującą, ile produktów trafiło do koszyka.
* Wybierz kolumny do wyświetlenia: obraz, SKU, cena, stan magazynowy.
* Konfigurowalne wyniki wyszukiwania na stronę.
* Działa bez JavaScript: pierwsza strona produktów wyświetla się jako zwykła tabela, a przesłane produkty nadal trafiają do koszyka.
* Dostępne, przyjazne dla urządzeń mobilnych znaczniki (tabela składa się do kart na małych ekranach), widoczne stany skupienia i etykiety czytnika ekranu.
* Gotowe do tłumaczenia (w tym POT) i czystej dezinstalacji.
* Kompatybilny z HPOS i blokami koszyka/kasy.

= The [rapid_order] shortcode =

Utwórz stronę (np. „Szybkie zamówienie”) i dodaj krótki kod:

`[rapid_order]`

== Installation ==

1. Prześlij wtyczkę do `/wp-content/plugins/rapid` lub zainstaluj poprzez Wtyczki → Dodaj nową.
2. Aktywuj. WooCommerce musi być zainstalowany i aktywny.
3. Przejdź do <strong>WooCommerce → Rapid</strong>, aby wybrać zakres produktu i kolumny do wyświetlenia.
4. Utwórz stronę z krótkim kodem `[rapid_order]`, na której będzie umieszczony formularz.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Tak. WooCommerce musi być zainstalowany i aktywny.

= Can I limit the form to certain categories? =

Tak. Ustaw zakres produktu na „Tylko wybrane kategorie” i zaznacz kategorie
chcesz zaoferować. Wybierz „Wszystkie produkty”, aby wyświetlić cały katalog.

= Does it work without JavaScript? =

Tak. Bez JavaScript formularz wyświetla pierwszą stronę produktów objętych zakresem oraz
przycisk przesyłania nadal dodaje wybrane ilości do koszyka po stronie serwera. The
wyszukiwanie na żywo i filtr kategorii to progresywne udoskonalenia.

= How does adding to the cart work? =

Wprowadź ilość każdego żądanego produktu, a następnie kliknij „Dodaj wybrane do koszyka”.
Każdy produkt z określoną ilością jest dodawany w jednym przesłaniu, a Ty otrzymujesz powiadomienie
mówiąc, ile zostało dodanych (i ile, jeśli w ogóle, nie mogło być).

= Do shoppers need an account? =

Nie. Formularz działa dla gości i zalogowanych klientów; zachowanie koszyka jest zgodne z normalnymi ustawieniami kasy dla gości WooCommerce.


= Does this plugin work on WordPress Multisite? =

Tak. Ta wtyczka jest kompatybilna z WordPress Multisite. Aktywuj go w sieci lub aktywuj na poszczególnych stronach; każda witryna przechowuje własne ustawienia i dane.

== Screenshots ==

1. Formularz szybkiego zamówienia z wyszukiwaniem na żywo i wprowadzaniem ilości.
2. Ekran ustawień Rapid w obszarze WooCommerce.

== External Services ==

Rapid nie łączy się z żadnymi usługami zewnętrznymi. Wyszukiwanie produktów na żywo działa w oparciu o Twój własny sklep: formularz jest wysyłany do pliku `admin-ajax.php` Twojej witryny i wysyła zapytanie o istniejące produkty WooCommerce według nazwy lub SKU, a zbiorcze dodanie do koszyka korzysta z własnego koszyka WooCommerce. Rapid przechowuje tylko dwie opcje w bazie danych WordPress („rapid_settings” i „rapid_db_version”); nie tworzy niestandardowych tabel i nie wysyła wiadomości e-mail.

== Changelog ==

= 1.0.1 =
* Pierwsza stabilna wersja.

= 0.1.4 =
* Zmieniono nazwę na Plogins Rapid dla WooCommerce, aby uzyskać bardziej charakterystyczną nazwę wtyczki.

= 0.1.3 =
* Filtr `rapid/order_settings` i akcja `rapid/form_fields` dla formularzy szybkiego zamówienia PRO dla poszczególnych ról.
* Pomocnik `OrderContext` udostępnia szablony i filtry kontekstu roli odwiedzającego.

= 0.1.2 =
* Dodaj filtr `rapid/product_cena_html`, aby PRO i kod niestandardowy mogły zastąpić ceny w tabeli szybkiego zamówienia.

= 0.1.1 =
* Dodaj filtr `rapid/bulk_paste_prefill` i akcje `rapid/bulk_paste_form_extra` / `rapid/bulk_paste_after_form` dla integracji wklejania zbiorczego PRO (zapisane listy SKU).

= 0.1.0 =
* Pierwsza wersja: krótki kod `[rapid_order]` z wyszukiwaniem produktów AJAX według nazwy lub SKU, konfigurowalny zakres produktów (wszystkie/wybrane kategorie), grupowe dodawanie do koszyka z pojedynczym powiadomieniem, wybieralne kolumny (obraz/SKU/cena/stan magazynowy) i wyniki na stronę.
