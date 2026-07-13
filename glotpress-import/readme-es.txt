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

Un formulario rápido de pedido masivo para que los compradores B2B y mayoristas puedan añadir muchos productos a la vez.

== Description ==

Rapid añade a tu tienda WooCommerce un formulario de pedido rápido con búsqueda. Los clientes
encuentran productos por <strong>nombre o SKU</strong>, fijan cantidades en una tabla compacta y añaden muchos
productos al carrito en un <strong>solo envío</strong>, sin ir haciendo clic por las páginas de producto.

Está pensado para flujos de trabajo B2B, mayoristas, comerciales y de repetición de pedidos, donde los compradores saben
lo que quieren y valoran la velocidad por encima de la navegación.

El código está en GitHub en https://github.com/wppoland/plogins-rapid; ese es el
lugar para leer el código fuente, informar de un error o enviar un parche.

= Documentation and links =

* <strong>Documentación</strong> - https://plogins.com/es/plogins-rapid/docs/
* <strong>Página del plugin</strong> - https://plogins.com/es/plogins-rapid/
* <strong>Código fuente</strong> - https://github.com/wppoland/plogins-rapid
* <strong>Informes de errores y peticiones de funciones</strong> - https://github.com/wppoland/plogins-rapid/issues


= Features =

* Un shortcode `[rapid_order]` que renderiza una tabla/formulario de productos con búsqueda.
* Búsqueda de productos AJAX en directo por nombre o SKU (con antirrebote, sin recargar la página).
* Ámbito de productos configurable: <strong>todos los productos</strong> o <strong>solo categorías seleccionadas</strong>.
* Añadir al carrito por lotes: fija cantidades en muchos productos y añádelos todos en un solo envío, con un aviso que resume cuántos se añadieron al carrito.
* Elige qué columnas mostrar: imagen, SKU, precio, stock.
* Resultados de búsqueda por página configurables.
* Funciona sin JavaScript: la primera página de productos se muestra como una tabla sencilla y el envío sigue añadiéndolos por lotes al carrito.
* Marcado accesible y adaptado a móviles (la tabla se pliega en tarjetas en pantallas pequeñas), estados de foco visibles y etiquetas para lectores de pantalla.
* Listo para traducir (POT incluido) y desinstalación limpia.
* Compatible con HPOS y bloques de carrito/pago.

= The [rapid_order] shortcode =

Crea una página (por ejemplo, «Pedido rápido») y añade el shortcode:

`[rapid_order]`

== Installation ==

1. Sube el plugin a `/wp-content/plugins/rapid` o instálalo desde Plugins → Añadir nuevo.
2. Actívalo. WooCommerce debe estar instalado y activo.
3. Ve a <strong>WooCommerce → Rapid</strong> para elegir el ámbito de productos y qué columnas mostrar.
4. Crea una página con el shortcode `[rapid_order]` para alojar el formulario.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Sí. WooCommerce debe estar instalado y activo.

= Can I limit the form to certain categories? =

Sí. Ajusta el ámbito de productos a «Solo categorías seleccionadas» y marca las categorías
que quieras ofrecer. Elige «Todos los productos» para cubrir todo el catálogo.

= Does it work without JavaScript? =

Sí. Sin JavaScript, el formulario muestra la primera página de productos dentro del ámbito y el
botón de envío sigue añadiendo las cantidades seleccionadas al carrito en el servidor.
La búsqueda en directo y el filtro de categorías son mejoras progresivas.

= How does adding to the cart work? =

Introduce una cantidad para cada producto que quieras y luego haz clic en «Añadir seleccionados al carrito».
Cada producto con una cantidad se añade en un solo envío y recibes un aviso
que indica cuántos se añadieron (y cuántos, si los hubiera, no se pudieron añadir).

= Do shoppers need an account? =

No. El formulario funciona para invitados y clientes registrados; el comportamiento del carrito sigue tus ajustes habituales de compra como invitado de WooCommerce.


= Does this plugin work on WordPress Multisite? =

Sí. Este plugin es compatible con WordPress Multisite. Actívalo en toda la red o en sitios concretos; cada sitio conserva sus propios ajustes y datos.

== Screenshots ==

1. El formulario de pedido rápido con búsqueda en directo y campos de cantidad.
2. La pantalla de ajustes de Rapid en WooCommerce.

== External Services ==

Rapid no se conecta a ningún servicio externo. La búsqueda de productos en directo se ejecuta contra tu propia tienda: el formulario se envía a `admin-ajax.php` de tu sitio y consulta tus productos WooCommerce existentes por nombre o SKU, y el añadido al carrito por lotes usa el propio carrito de WooCommerce. Rapid guarda solo dos opciones en tu base de datos de WordPress (`rapid_settings` y `rapid_db_version`); no crea tablas personalizadas ni envía ningún correo electrónico.

== Translations ==

Plogins Rapid incluye traducciones al polaco, al alemán y al español para la interfaz del plugin. El dominio de texto es `plogins-rapid`, por lo que los paquetes de idioma de WordPress.org también pueden sobrescribir o ampliar estas traducciones incluidas.

== Changelog ==

= 1.0.2 =
* Se añadieron traducciones incluidas al polaco, al alemán y al español para la interfaz del plugin.

= 1.0.1 =
* Primera versión estable.

= 0.1.4 =
* Renombrado a Plogins Rapid para WooCommerce para conseguir un nombre de plugin más distintivo.

= 0.1.3 =
* Filtro `rapid/order_settings` y acción `rapid/form_fields` para formularios de pedido rápido PRO por rol.
* El asistente `OrderContext` expone a plantillas y filtros el contexto del rol del visitante.

= 0.1.2 =
* Se añade el filtro `rapid/product_price_html` para que PRO y el código personalizado puedan anular los precios en la tabla de pedido rápido.

= 0.1.1 =
* Se añade el filtro `rapid/bulk_paste_prefill` y las acciones `rapid/bulk_paste_form_extra` / `rapid/bulk_paste_after_form` para integraciones de pegado masivo PRO (listas de SKU guardadas).

= 0.1.0 =
* Versión inicial: shortcode `[rapid_order]` con búsqueda de productos AJAX por nombre o SKU, ámbito de productos configurable (todos / categorías seleccionadas), añadido al carrito por lotes con un solo aviso, columnas seleccionables (imagen / SKU / precio / stock) y resultados por página.
