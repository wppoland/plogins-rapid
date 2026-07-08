=== Plogins Rapid - Quick Order for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, quick order, bulk order, b2b, wholesale
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Erfordert Plugins: woocommerce
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Ein schnelles Sammelbestellformular, damit B2B- und Großhandelskäufer viele Produkte gleichzeitig hinzufügen können.

== Description ==

Rapid fügt deinem WooCommerce-Shop ein durchsuchbares Schnellbestellformular hinzu. Kunden
Findest du Produkte nach <strong>Name oder SKU<strong>, lege Mengen in einer kompakten Tabelle fest und lege viele Produkte in einem einzigen </strong>Einreichen</strong> in den Warenkorb, ohne sich durch die Produktseiten klicken zu müssen.

Es ist für B2B-, Großhandels-, Handels- und Nachbestellungsabläufe konzipiert, bei denen Käufer Bescheid wissen
was sie wollen und legen Wert auf Geschwindigkeit statt Surfen.

Der Code befindet sich auf GitHub unter https://github.com/wppoland/plogins-rapid; das ist das
Hier kannst du die Quelle lesen, einen Fehler melden oder einen Patch senden.

= Documentation and links =

* <strong>Dokumentation</strong> - https://plogins.com/de/plogins-rapid/docs/
* <strong>Plugin-Seite</strong> - https://plogins.com/de/plogins-rapid/
* <strong>Quellcode</strong> – https://github.com/wppoland/plogins-rapid
* <strong>Fehlerberichte und Funktionsanfragen</strong> – https://github.com/wppoland/plogins-rapid/issues


= Features =

* Ein „[rapid_order]“-Shortcode, der eine durchsuchbare Produkttabelle/ein durchsuchbares Produktformular rendert.
* Live-AJAX-Produktsuche nach Name oder SKU (entprellt, kein Neuladen der Seite).
* Konfigurierbarer Produktumfang: <strong>alle Produkte</strong> oder <strong>nur ausgewählte Kategorien</strong>.
* Batch-Add-to-Cart: Lege Mengen für viele Produkte fest und füge sie alle in einem Übermittlungsvorgang hinzu, mit einer Benachrichtigung, die zusammenfasst, wie viele Produkte in den Warenkorb gelegt wurden.
* Wähle aus, welche Spalten angezeigt werden sollen: Bild, SKU, Preis, Lagerbestand.
* Konfigurierbare Suchergebnisse pro Seite.
* Funktioniert ohne JavaScript: Die erste Seite der Produkte wird als einfache Tabelle dargestellt und die Übermittlung erfolgt weiterhin stapelweise im Warenkorb.
* Zugängliches, mobilfreundliches Markup (die Tabelle wird auf kleinen Bildschirmen zu Karten zusammengeklappt), sichtbare Fokuszustände und Screenreader-Beschriftungen.
* Übersetzungsbereit (POT enthalten) und saubere Deinstallation.
* Kompatibel mit HPOS und Warenkorb-/Kassenblöcken.

= The [rapid_order] shortcode =

Erstelle eine Seite (z. B. „Schnellbestellung“) und füge den Shortcode hinzu:

`[rapid_order]`

== Installation ==

1. Lade das Plugin nach „/wp-content/plugins/rapid“ hoch oder installiere es über Plugins → Neu hinzufügen.
2. Aktiviere es. WooCommerce muss installiert und aktiv sein.
3. Gehe zu <strong>WooCommerce → Rapid</strong>, um den Produktumfang und die anzuzeigenden Spalten auszuwählen.
4. Erstelle eine Seite mit dem Shortcode „[rapid_order]“, um das Formular zu hosten.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Ja. WooCommerce muss installiert und aktiv sein.

= Can I limit the form to certain categories? =

Ja. Stelle den Produktumfang auf „Nur ausgewählte Kategorien“ ein und kreuze die Kategorien an
was du anbieten möchtest. Wähle „Alle Produkte“, um den gesamten Katalog abzudecken.

= Does it work without JavaScript? =

Ja. Ohne JavaScript zeigt das Formular die erste Seite der im Geltungsbereich enthaltenen Produkte und die
Wenn du auf die Schaltfläche „Senden“ klicken, werden die ausgewählten Mengen weiterhin serverseitig zum Warenkorb hinzugefügt. Die
Live-Suche und Kategoriefilter sind progressive Verbesserungen.

= How does adding to the cart work? =

Gib für jedes gewünschte Produkt eine Menge ein und klicke dann auf „Ausgewählte Produkte in den Warenkorb legen“.
Jedes Produkt mit einer bestimmten Menge wird in einem Übermittlungsvorgang hinzugefügt und Du erhältst eine Benachrichtigung
Angabe, wie viele hinzugefügt wurden (und wie viele, wenn überhaupt, nicht möglich waren).

= Do shoppers need an account? =

Nein. Das Formular funktioniert für Gäste und eingeloggte Kunden; Das Warenkorbverhalten folgt deinen normalen WooCommerce-Gast-Checkout-Einstellungen.


= Does this plugin work on WordPress Multisite? =

Ja. Dieses Plugin ist mit WordPress Multisite kompatibel. Aktiviere es im Netzwerk oder auf einzelnen Websites. Jede Site behält ihre eigenen Einstellungen und Daten.

== Screenshots ==

1. Das Schnellbestellformular mit Live-Suche und Mengeneingaben.
2. Der Rapid-Einstellungsbildschirm unter WooCommerce.

== External Services ==

Rapid stellt keine Verbindung zu externen Diensten her. Die Live-Produktsuche wird für deinen eigenen Shop ausgeführt: Das Formular sendet Beiträge an die Datei „admin-ajax.php“ deiner Website und fragt deine vorhandenen WooCommerce-Produkte nach Name oder SKU ab. Die Batch-Add-to-Cart-Funktion verwendet den eigenen Warenkorb von WooCommerce. Rapid speichert nur zwei Optionen in deiner WordPress-Datenbank („rapid_settings“ und „rapid_db_version“); Es werden keine benutzerdefinierten Tabellen erstellt und keine E-Mails gesendet.

== Changelog ==

= 1.0.1 =
* Erste stabile Version.

= 0.1.4 =
* Für einen eindeutigeren Plugin-Namen in Plogins Rapid für WooCommerce umbenannt.

= 0.1.3 =
* „rapid/order_settings“-Filter und „rapid/form_fields“-Aktion für PRO-Schnellbestellformulare pro Rolle.
* Der „OrderContext“-Helfer stellt den Besucherrollenkontext für Vorlagen und Filter bereit.

= 0.1.2 =
* Füge den Filter „rapid/product_price_html“ hinzu, damit PRO- und benutzerdefinierter Code die Preise in der Schnellbestelltabelle überschreiben können.

= 0.1.1 =
* Füge den Filter „rapid/bulk_paste_prefill“ und die Aktionen „rapid/bulk_paste_form_extra“ / „rapid/bulk_paste_after_form“ für PRO-Masseneinfügungsintegrationen (gespeicherte SKU-Listen) hinzu.

= 0.1.0 =
* Erstveröffentlichung: Shortcode „[rapid_order]“ mit AJAX-Produktsuche nach Name oder SKU, konfigurierbarem Produktumfang (alle / ausgewählte Kategorien), gestapeltes Hinzufügen zum Warenkorb mit einem einzigen Hinweis, auswählbaren Spalten (Bild / SKU / Preis / Lagerbestand) und Ergebnissen pro Seite.
