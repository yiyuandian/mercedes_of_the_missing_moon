<?php
$dir = __DIR__;
// 获取某目录下所有文件、目录名(不包括子目录下文件、目录名)
$handler = opendir($dir);
while (($filename = readdir($handler)) !== false) {
    // 务必使用!==，防止目录下出现类似文件名“0”等情况
    if ($filename !== "." && $filename !== "..") {
        $files[] = $filename;
    }
}
closedir($handler);
// 打印所有文件名
foreach ($files as  $value) {
    if (preg_match("/c(\d{1,2})\.xhtml/", $value, $item_info)) {
        if ($item_info[1] > 10) {
            $newname = preg_replace("/c(\d{1,2})\.xhtml/", "c0\\1.xhtml", $value);
        } else {
            $newname = preg_replace("/c(\d{1,2})\.xhtml/", "c00\\1.xhtml", $value);
        }
        rename($value, $newname);
        echo $value, PHP_EOL;
    }
}
