<?php
echo "<ul>";
for($i=1; $i<=100; $i++)
    echo "<li>" . ($i % 3 == 0 ?  'foo' : '') . ($i % 5 == 0 ? 'bar' : '') . ($i % 5 && $i % 3 ? $i : '') . "</li>";
echo "</ul>";