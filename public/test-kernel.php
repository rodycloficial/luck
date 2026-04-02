<?php
echo "Kernel exists? " . (file_exists('../app/Http/Kernel.php') ? 'YES' : 'NO');
echo "<br>";
echo "CheckRole exists? " . (file_exists('../app/Http/Middleware/CheckRole.php') ? 'YES' : 'NO');