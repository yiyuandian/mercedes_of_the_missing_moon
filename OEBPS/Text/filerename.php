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
$pattern = "/c001 copy.(\d+)\.xhtml/";
foreach ($files as  $value) {
    if (preg_match($pattern, $value, $item_info)) {
        $item_index = $item_info[1];
        $item_index++;
        if ($item_index > 99) {
        } elseif ($item_index > 9) {
            $item_index = "0{$item_index}";
        } else {
            $item_index = "00{$item_index}";
        }
        $item_newname = "c{$item_index}.xhtml";
        rename($value, $item_newname);
        echo $item_newname, PHP_EOL;
    }
}
