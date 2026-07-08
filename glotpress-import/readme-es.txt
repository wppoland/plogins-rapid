=== Plogins Rapid - Quick Order for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, quick order, bulk order, b2b, wholesale
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Requiere complementos: woocommerce
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Un formulario de pedido al por mayor rápido para que los compradores B2B y mayoristas puedan añadir muchos productos a la vez.

== Description ==

Rapid añade un formulario de pedido rápido con capacidad de búsqueda a su tienda WooCommerce. Clientes
encuentre productos por <strong>nombre o SKU<strong>, establezca cantidades en una tabla compacta y añade muchos productos al carrito en un </strong>envío único</strong>, sin hacer clic en las páginas de productos.

Está diseñado para flujos de trabajo B2B, mayoristas, comerciales y de reorden, donde los compradores saben
lo que quieren y valoran la velocidad sobre la navegación.

El código se encuentra en GitHub en https://github.com/wppoland/plogins-rapid; ese es el
lugar para leer la fuente, reportar un error o enviar un parche.

= Documentation and links =

* <strong>Documentación</strong> - https://plogins.com/es/plogins-rapid/docs/
* <strong>Página de complementos</strong> - https://plogins.com/es/plogins-rapid/
* <strong>Código fuente</strong> - https://github.com/wppoland/plogins-rapid
* <strong>Informes de errores y solicitudes de funciones</strong> - https://github.com/wppoland/plogins-rapid/issues


= Features =

* Un código abreviado `[rapid_order]` que representa una tabla/formulario de producto con capacidad de búsqueda.
* Búsqueda de productos AJAX en vivo por nombre o SKU (antirrebote, sin recarga de página).
* Alcance del producto configurable: <strong>todos los productos</strong> o <strong>solo categorías seleccionadas</strong>.
* Añadir al carrito por lotes: establezca cantidades en muchos productos y agréguelos todos en un solo envío, con un aviso que resume cuántos se agregaron al carrito.
* Elija qué columnas mostrar: imagen, SKU, precio, stock.
* Resultados de búsqueda configurables por página.
* Funciona sin JavaScript: la primera página de productos se muestra como una tabla simple y el envío aún se añade al carrito.
* Marcado accesible y compatible con dispositivos móviles (la tabla se contrae en tarjetas en pantallas pequeñas), estados de enfoque visibles y etiquetas de lectores de pantalla.
* Traducción lista (POT incluida) y desinstalación limpia.
* Compatible con HPOS y bloques de carrito/pago.

= The [rapid_order] shortcode =

Cree una página (por ejemplo, "Pedido rápido") y añade el código corto:

`[rapid_order]`

== Installation ==

1. Cargue el complemento en `/wp-content/plugins/rapid`, o instálelo a través de Complementos → Añadir nuevo.
2. Actívalo. WooCommerce debe estar instalado y activo.
3. Vaya a <strong>WooCommerce → Rapid</strong> para elegir el alcance del producto y qué columnas mostrar.
4. Cree una página con el código corto `[rapid_order]` para alojar el formulario.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Sí. WooCommerce debe estar instalado y activo.

= Can I limit the form to certain categories? =

Sí. Establezca el alcance del producto en "Solo categorías seleccionadas" y marque las categorías.
quieres ofrecer. Elija "Todos los productos" para cubrir todo el catálogo.

= Does it work without JavaScript? =

Sí. Sin JavaScript, el formulario muestra la primera página de productos incluidos y el
El botón enviar aún añade las cantidades seleccionadas al lado del servidor del carrito. el
La búsqueda en vivo y el filtro de categorías son mejoras progresivas.

= How does adding to the cart work? =

Ingrese una cantidad para cada producto que desee, luego haga clic en "Añadir seleccionado al carrito".
Cada producto con una cantidad se añade en un solo envío y recibe un aviso
diciendo cuántos se agregaron (y cuántos, si es que hubo alguno, no se pudieron añadir).

= Do shoppers need an account? =

No. El formulario funciona para invitados y clientes registrados; El comportamiento del carrito sigue la configuración normal de pago como invitado de WooCommerce.


= Does this plugin work on WordPress Multisite? =

Sí. Este complemento es compatible con WordPress Multisite. Activarlo en red o activarlo en sitios individuales; Cada sitio mantiene su propia configuración y datos.

== Screenshots ==

1. El formulario de pedido rápido con búsqueda en vivo y entradas de cantidad.
2. La pantalla de configuración rápida en WooCommerce.

== External Services ==

Rapid no se conecta a ningún servicio externo. La búsqueda de productos en vivo se ejecuta en su propia tienda: el formulario se publica en `admin-ajax.php` de tu sitio y consulta sus productos WooCommerce existentes por nombre o SKU, y el complemento al carrito por lotes utiliza el propio carrito de WooCommerce. Rapid almacena solo dos opciones en tu base de datos de WordPress (`rapid_settings` y `rapid_db_version`); no crea tablas personalizadas y no envía ningún correo electrónico.

== Changelog ==

= 1.0.1 =
* Primera versión estable.

= 0.1.4 =
* Renombrado a Plogins Rapid para WooCommerce para obtener un nombre de complemento más distintivo.

= 0.1.3 =
* Filtro `rapid/order_settings` y acción `rapid/form_fields` para formularios de pedido rápido PRO por función.
* El asistente `OrderContext` expone el contexto del rol del visitante a plantillas y filtros.

= 0.1.2 =
* Añade el filtro `rapid/product_price_html` para que PRO y el código personalizado puedan anular los precios en la tabla de pedidos rápidos.

= 0.1.1 =
* Añade el filtro `rapid/bulk_paste_prefill` y las acciones `rapid/bulk_paste_form_extra` / `rapid/bulk_paste_after_form` para integraciones de pegado masivo PRO (listas de SKU guardadas).

= 0.1.0 =
* Lanzamiento inicial: shortcode `[rapid_order]` con búsqueda de productos AJAX por nombre o SKU, alcance de producto configurable (todas/categorías seleccionadas), agregado al carrito por lotes con un solo aviso, columnas seleccionables (imagen/SKU/precio/existencias) y resultados por página.
