<?php
    include "library.php";

    $path = "xml/myXml.xml";
    $pi = getVariable("pi", 1);
    $pi = intval($pi);
    if($pi < 1)
        $pi = 1;
    $perpage = 5;

    include "include/header.php";
?>

<div>Products</div>
<div id="shop">
    <?php
        function printProducts($dbProducts, $perpage, $currentpage) {
            $data = Array();
            foreach($dbProducts as $pr) {
                $id = $pr->getAttribute('id');
                $params = Array();
                $it = Array('id' => $id, 'params' => Array());
                foreach($pr->childNodes as $el) {
                    if($el->nodeName == "param")
                        $it['params'][] = Array('name' => $el->getAttribute('name'), value => $el->getAttribute('value'));
                    else
                        $it[$el->nodeName] = $el->nodeValue;
                }
                $data[] = $it;
            }
            $offset = $perpage * ($currentpage - 1);
            $limit = $perpage * $currentpage;
            for($i0 = $offset; $i0<$limit; $i0++)
            {
                echo '<div id="shopteeth"><div id="products_img"><img src="'.$data[$i0]['image'].'"></div>
                    <a id="name_product"> '.$data[$i0]['name'].'</a><br>
                    <span id="more" style="color:black;"></span>
                    <br><span style="color:#ff7d21;">'.$data[$i0]['price'].'</span><br><br>
                    <div class="tooltip" id="tip" onmouseenter="runReq('.$data[$i0]['id'].');">More details
                        <span class="tooltiptext" id='. $data[$i0]['id'].'></span>
                    </div></div>';
            }
        }
        if (file_exists($path)) {
            $xml = new DOMDocument();
            $xml->load($path);
            $dbProducts = $xml->getElementsByTagName("item");
            $countProducts = $dbProducts->length;
            $countPages = ceil($countProducts/$perpage);
            $arr = Array();
            if($countProducts == 0)
                echo '<p>Error! No products.</p>';
            else
                printProducts($dbProducts, $perpage, $pi);
        }
        else
            echo '<p>Error! No products.</p>';
        echo '<div class="page-links">';
        if($pi < $countPages)
            echo '<a href="index-store.php?pi='.($pi+1).'">Next</a>  ';
        if($pi > 1)
            echo '<a href="index-store.php'.($pi > 2 ? '?pi='.($pi-1) : '' ).'">Previous</a>  ';
        echo "</div>"
    ?>
</div>
<script>
    function runReq(id){
        var d = {"id" : id};
        $.ajax({
         type: "GET",
         url: "ajax.php",
         data: d,
         dataType: "text",
         success: function(data){
            var res = JSON.parse(data);
            var s = '<ul id="details">';
            for (key in res) {
                if (res.hasOwnProperty(key)) {
                    s += "<li style='color: white;'>" + key + ": " + res[key] + "</li>";
                } 
            }
            s += '</ul>';
            document.getElementById(id).innerHTML = s;
            }
        });
    }
</script>
<?php
    include "include/footer.php";
?>
