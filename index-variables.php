<?php
    $PAGE_TITLE = "Проверка содержимого переменных";
    $PAGE_JS = Array();
    $PAGE_JS[] = 'assets/js/scriptAnimation.js';   
    include "include/header.php";
?>
            <div>Server variable values</div>
            <div>
                	<?php
                	if(!empty($_GET))
                	{
                		echo "<br><b>Variable \$_GET:</b><br>";
						foreach ($_GET as $index => $value) {
                            echo "$index = $value<br>";
                        }
                	}
 					echo "<br><b>Variable \$_SERVER:</b><br>";
					foreach ($_SERVER as $index => $value) {
						echo "$index = $value<br>";
					}
					?>
            </div>
<?php
    include "include/footer.php";
?>