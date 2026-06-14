/**
 * Rapid — admin settings progressive enhancement.
 *
 * Shows or hides the category picker based on the selected product scope, and
 * provides a small fallback for the inline-help popovers in browsers without the
 * native Popover API. No dependencies.
 */
(function () {
	'use strict';

	var scope = document.querySelector('.rapid-scope-select');
	var row = document.querySelector('.rapid-categories-row');

	if (scope && row) {
		var sync = function () {
			if (scope.value === 'categories') {
				row.removeAttribute('data-hidden');
			} else {
				row.setAttribute('data-hidden', '1');
			}
		};
		scope.addEventListener('change', sync);
		sync();
	}

	// Popover fallback for browsers without the native Popover API.
	var supportsPopover =
		typeof HTMLElement !== 'undefined' &&
		HTMLElement.prototype &&
		'popover' in HTMLElement.prototype;

	if (!supportsPopover) {
		var buttons = document.querySelectorAll('.rapid-help');
		Array.prototype.forEach.call(buttons, function (button) {
			var tipId = button.getAttribute('popovertarget');
			var tip = tipId ? document.getElementById(tipId) : null;
			if (!tip) {
				return;
			}
			tip.removeAttribute('hidden');
			tip.style.display = 'none';
			tip.style.position = 'absolute';
			tip.style.zIndex = '100';

			button.addEventListener('click', function () {
				var open = tip.style.display === 'block';
				tip.style.display = open ? 'none' : 'block';
				button.setAttribute('aria-expanded', open ? 'false' : 'true');
			});
		});
	}
})();
