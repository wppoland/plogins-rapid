<?php

/**
 * The order-form template must see the visitor context under $context.
 *
 * renderTemplate() took its variables as $context, and the vars carry a
 * 'context' key, so extract(EXTR_SKIP) kept the parameter: the template got
 * the whole vars array, and rapid/form_fields fired with settings, products
 * and notice as its "visitor context". Same defect swift 1.0.21 fixed.
 *
 * Run: php tests/render-template-context-check.php
 */

declare(strict_types=1);

namespace {
    define('ABSPATH', __DIR__);

    $dir = sys_get_temp_dir() . '/rapid-render-check-' . getmypid() . '/';
    @mkdir($dir . 'templates', 0777, true);
    file_put_contents($dir . 'templates/probe.php', '<?php $GLOBALS["seen"] = ["context" => $context ?? null, "template" => $template ?? null, "vars" => $vars ?? null];');
    define('RAPID_DIR', $dir);

    require __DIR__ . '/../autoload.php';

    $form   = (new ReflectionClass(\Rapid\Service\OrderForm::class))->newInstanceWithoutConstructor();
    $render = new ReflectionMethod($form, 'renderTemplate');
    $visitor = ['user_id' => 0, 'role' => 'guest', 'roles' => ['guest']];
    $render->invoke($form, 'probe', ['settings' => [], 'context' => $visitor]);

    $failures = 0;
    if ($GLOBALS['seen']['context'] !== $visitor) {
        echo 'FAIL: template saw $context = ' . json_encode($GLOBALS['seen']['context']) . ", expected the visitor context\n";
        $failures++;
    }
    if (null !== $GLOBALS['seen']['template'] || null !== $GLOBALS['seen']['vars']) {
        echo "FAIL: renderTemplate() locals leak into the template scope\n";
        $failures++;
    }

    unlink($dir . 'templates/probe.php');
    rmdir($dir . 'templates');
    rmdir($dir);

    echo 0 === $failures ? "OK: the template sees the visitor context\n" : '';
    exit($failures > 0 ? 1 : 0);
}
