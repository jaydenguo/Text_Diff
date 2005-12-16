--TEST--
Text_Diff: PEAR Bug #6251 (too much trailing context)
--FILE--
<?php
include_once 'Text/Diff.php';
include_once 'Text/Diff/Renderer.php';
include_once 'Text/Diff/Renderer/unified.php';

$oldtext = <<<EOT

Original Text



ss
ttt
EOT;

$newtext = <<< EOT

Modified Text



ss
ttt
EOT;

$oldpieces = explode ("\n", $oldtext);
$newpieces = explode ("\n", $newtext);
$diff = &new Text_Diff ($oldpieces, $newpieces);

$renderer = &new Text_Diff_Renderer_unified(array('leading_context_lines' => 3, 'trailing_context_lines' => 3));
echo $renderer->render($diff);
?>
--EXPECT--
@@ -1,5 +1,5 @@

-Original Text
+Modified Text



