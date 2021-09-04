<?php
    $PAGE_TITLE = "Файловая система";
    $PAGE_JS = Array();
    $PAGE_JS[] = 'assets/js/scriptAnimation.js';   

    $HOSTURL = "http://k503labs.ukrdomen.com/labs/535a/k.podoliak/lab5/";

    include "library.php";
    include "include/header.php";
?>
            <div>File system</div>
            <form name="form-fs" method="POST">
                <table class="table-fs">
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Size</th>
                        <th>Date</th>
                   </tr>

            <?php
            $startDir = getVariable('path', './');
            $dirArr = Array();
            $fileArr = Array();
            systemLoading($startDir);

            function systemLoading($dir) 
            {
                $d = getVariable('dir', "$dir");
                if (preg_match('/^\\.(\\/|\\\\)([a-zA-ZА-ЯЁа-яё 0-9\\-_]+(\\/|\\\\))*$/iu', $d) && (strpos($d, '/.') == false)) 
                    $directory = $d;
                else
                    $directory = './';
                $f = scandir($directory);
                for ($i = 1; $i < count($f); $i++) 
                {
                    $fItem = Array('name'=>$f[$i], 'type'=>filetype($directory.$f[$i]),'date'=>date("Y-m-d H:i:s",filemtime($directory.$f[$i])), 'size'=>0);
                    if(is_dir($directory.$f[$i]))
                    {
                        if($fItem['name'] != '..')
                            $fItem['size'] = getFolderSize($directory.$f[$i]);
                        $dirArr[] = $fItem;
                    }
                    else
                    {
                        $fItem['size'] = filesize($directory.$f[$i]);
                        $fileArr[] = $fItem;
                    }
                }
                printFS($dirArr, $fileArr, $directory);                
                return $directory;
            }

            function printFS($dirArr, $fileArr, $dir) 
            {
                if(is_array($fileArr))
                    $f = array_merge($dirArr, $fileArr); 
                else
                    $f = $dirArr;
                if(isset($_POST['sort-size'])) 
                    usort($f, "cmpSize");
                else if(isset($_POST['sort-date']))
                    usort($f, "cmpDate");
                else 
                    usort($f, "cmpName");
                for ($i = 0; $i < count($f); $i++) 
                {
                    $f[$i]['size'] = formatSize($f[$i]['size']);
                    if($f[$i]['type'] == 'dir')
                    {
                        if ($f[$i]['name'] == '..') 
                        {
                            if ($dir == './') 
                                $nextdir = $dir;
                            else 
                            {
                                $pos = strrpos($dir, '/', -2);
                                $nextdir = substr_replace($dir, " ", $pos + 1);
                            }
                        } 
                        else 
                            $nextdir = $dir.$f[$i]['name'].'/';
                        echo "<tr><td><a href=\"".$HOSTURL."index-filesystem.php?dir=$nextdir\" style=\"color: #20207e; text-decoration: underline;\">".$f[$i]['name']."</a></td><td>".$f[$i]['type']."</td><td>".$f[$i]['size']."</td><td>".$f[$i]['date']."</td></tr>";
                    }
                    else
                    {
                        echo "<tr><td>".$f[$i]['name']." </td><td> ".$f[$i]['type']."</td><td>".$f[$i]['size']."</td><td>".$f[$i]['date']."</td></tr>";
                    }
                }
            }

            function getFolderSize($dir) 
            {
                $curDir = opendir($dir);
                $size = 0;
                while (($f = readdir($curDir)) !== false) 
                {
                    if ($f != "." && $f != "..") {
                        $p = $dir."/".$f;
                        if (is_dir($p))
                            $size += getFolderSize($p);
                        else
                            $size += filesize($p);
                    }
                }
                closedir($curDir);
                return $size;
            }

            function formatSize($size)
            {
                if ($size >= 1024*1024*1024)
                    $size = number_format($size / (1024*1024*1024), 3) . ' GB';
                elseif ($size >= 1024*1024)
                    $size = number_format($size / (1024*1024), 3) . ' МB';
                elseif ($size >= 1024)
                    $size = number_format($size / 1024, 3) . ' КB';
                elseif($size > 1)
                    $size = $size. ' B';
                else
                    $size = '0 B';
                return $size;
            }

        ?>       
             <tr class="buttons">
                <td><input type="submit" name="sort-name" value="Sort"></td>
                <td></td>
                <td><input type="submit" name="sort-size" value="Sort"></td>
                <td><input type="submit" name="sort-date" value="Sort"></td>
            </tr>
        </table>
        </form>

<?php
    include "include/footer.php";
?>