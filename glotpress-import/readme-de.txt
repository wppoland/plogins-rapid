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

Ein schnelles Sammelbestellformular, damit B2B- und Großhandelskäufer viele Produkte gleichzeitig hinzufügen können.

== Description ==

Rapid fügt deinem WooCommerce-Shop ein durchsuchbares Schnellbestellformular hinzu. Kunden
finden Produkte nach <strong>Name oder SKU</strong>, legen Mengen in einer kompakten Tabelle fest und fügen in einem
<strong>einzigen Absenden</strong> viele Produkte in den Warenkorb – ohne sich durch Produktseiten zu klicken.

Es ist für B2B-, Großhandels-, Handels- und Nachbestell-Abläufe konzipiert, bei denen Käufer wissen,
was sie wollen, und Geschwindigkeit höher schätzen als das Stöbern.

Der Code liegt auf GitHub unter https://github.com/wppoland/plogins-rapid; das ist der
Ort, um den Quellcode zu lesen, einen Fehler zu melden oder einen Patch zu senden.

= Documentation and links =

* <strong>Dokumentation</strong> - https://plogins.com/de/plogins-rapid/docs/
* <strong>Plugin-Seite</strong> - https://plogins.com/de/plogins-rapid/
* <strong>Quellcode</strong> - https://github.com/wppoland/plogins-rapid
* <strong>Fehlerberichte und Funktionswünsche</strong> - https://github.com/wppoland/plogins-rapid/issues


= Features =

* Ein `[rapid_order]`-Shortcode, der eine durchsuchbare Produkttabelle bzw. ein durchsuchbares Formular rendert.
* Live-AJAX-Produktsuche nach Name oder SKU (entprellt, kein Neuladen der Seite).
* Konfigurierbarer Produktumfang: <strong>alle Produkte</strong> oder <strong>nur ausgewählte Kategorien</strong>.
* Gebündeltes In-den-Warenkorb-Legen: Lege Mengen für viele Produkte fest und füge sie alle in einem Absenden hinzu, mit einem Hinweis, der zusammenfasst, wie viele in den Warenkorb gelegt wurden.
* Wähle, welche Spalten angezeigt werden: Bild, SKU, Preis, Lagerbestand.
* Konfigurierbare Suchergebnisse pro Seite.
* Funktioniert ohne JavaScript: Die erste Produktseite wird als einfache Tabelle dargestellt, und das Absenden legt die Produkte weiterhin gebündelt in den Warenkorb.
* Barrierefreies, mobilfreundliches Markup (die Tabelle klappt auf kleinen Bildschirmen zu Karten zusammen), sichtbare Fokuszustände und Screenreader-Beschriftungen.
* Übersetzungsbereit (POT enthalten) und saubere Deinstallation.
* Kompatibel mit HPOS und Warenkorb-/Kassen-Blöcken.

= The [rapid_order] shortcode =

Erstelle eine Seite (z. B. „Schnellbestellung“) und füge den Shortcode hinzu:

`[rapid_order]`

== Installation ==

1. Lade das Plugin nach `/wp-content/plugins/rapid` hoch oder installiere es über Plugins → Neu hinzufügen.
2. Aktiviere es. WooCommerce muss installiert und aktiv sein.
3. Gehe zu <strong>WooCommerce → Rapid</strong>, um den Produktumfang und die anzuzeigenden Spalten auszuwählen.
4. Erstelle eine Seite mit dem `[rapid_order]`-Shortcode, um das Formular bereitzustellen.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Ja. WooCommerce muss installiert und aktiv sein.

= Can I limit the form to certain categories? =

Ja. Stelle den Produktumfang auf „Nur ausgewählte Kategorien“ und kreuze die Kategorien an,
die du anbieten möchtest. Wähle „Alle Produkte“, um den gesamten Katalog abzudecken.

= Does it work without JavaScript? =

Ja. Ohne JavaScript zeigt das Formular die erste Seite der Produkte im Umfang, und der
Absende-Button legt die ausgewählten Mengen weiterhin serverseitig in den Warenkorb.
Die Live-Suche und der Kategoriefilter sind progressive Erweiterungen.

= How does adding to the cart work? =

Gib für jedes gewünschte Produkt eine Menge ein und klicke dann auf „Ausgewählte in den Warenkorb legen“.
Jedes Produkt mit einer Menge wird in einem Absenden hinzugefügt, und du erhältst einen Hinweis,
der angibt, wie viele hinzugefügt wurden (und wie viele, falls überhaupt, nicht möglich waren).

= Do shoppers need an account? =

Nein. Das Formular funktioniert für Gäste und eingeloggte Kunden; das Warenkorb-Verhalten folgt deinen normalen WooCommerce-Einstellungen für den Gast-Checkout.


= Does this plugin work on WordPress Multisite? =

Ja. Dieses Plugin ist mit WordPress Multisite kompatibel. Aktiviere es netzwerkweit oder auf einzelnen Websites; jede Website behält ihre eigenen Einstellungen und Daten.

== Screenshots ==

1. Das Schnellbestellformular mit Live-Suche und Mengeneingaben.
2. Der Rapid-Einstellungsbildschirm unter WooCommerce.

== External Services ==

Rapid stellt keine Verbindung zu externen Diensten her. Die Live-Produktsuche läuft gegen deinen eigenen Shop: Das Formular sendet an die Datei `admin-ajax.php` deiner Website und fragt deine vorhandenen WooCommerce-Produkte nach Name oder SKU ab, und das gebündelte In-den-Warenkorb-Legen nutzt den eigenen Warenkorb von WooCommerce. Rapid speichert nur zwei Optionen in deiner WordPress-Datenbank (`rapid_settings` und `rapid_db_version`); es erstellt keine eigenen Tabellen und sendet keine E-Mails.

== Translations ==

Plogins Rapid enthält deutsche, polnische und spanische Übersetzungen für die Plugin-Oberfläche. Die Textdomain ist `plogins-rapid`, sodass Sprachpakete von WordPress.org diese mitgelieferten Übersetzungen ebenfalls überschreiben oder erweitern können.

== Changelog ==

= 1.0.2 =
* Mitgelieferte deutsche, polnische und spanische Übersetzungen für die Plugin-Oberfläche hinzugefügt.

= 1.0.1 =
* Erste stabile Version.

= 0.1.4 =
* Für einen eindeutigeren Plugin-Namen in Plogins Rapid für WooCommerce umbenannt.

= 0.1.3 =
* `rapid/order_settings`-Filter und `rapid/form_fields`-Aktion für PRO-Schnellbestellformulare pro Rolle.
* Der `OrderContext`-Helfer stellt Vorlagen und Filtern den Rollenkontext des Besuchers bereit.

= 0.1.2 =
* `rapid/product_price_html`-Filter hinzugefügt, damit PRO und eigener Code die Preise in der Schnellbestelltabelle überschreiben können.

= 0.1.1 =
* `rapid/bulk_paste_prefill`-Filter und die Aktionen `rapid/bulk_paste_form_extra` / `rapid/bulk_paste_after_form` für PRO-Masseneinfüge-Integrationen (gespeicherte SKU-Listen) hinzugefügt.

= 0.1.0 =
* Erstveröffentlichung: `[rapid_order]`-Shortcode mit AJAX-Produktsuche nach Name oder SKU, konfigurierbarem Produktumfang (alle / ausgewählte Kategorien), gebündeltes In-den-Warenkorb-Legen mit einem einzigen Hinweis, auswählbare Spalten (Bild / SKU / Preis / Lagerbestand) und Ergebnisse pro Seite.
