<?php
include_once "db.php"; // 包含資料庫連接檔案

// 獲取從表單提交的表名
$table = $_POST['table'];

// 動態創建與表名對應的 DB 類的實例
$DB = ${ucfirst($table)};

// 從 $_POST 數組中移除 'table' 鍵，因為它不是要保存到資料庫的數據
unset($_POST['table']);

// 遍歷提交的 'text' 數組
foreach ($_POST['text'] as $id => $text) {
    // 檢查是否有任何項目被標記為刪除
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        // 如果是，則刪除該項目
        $DB->del($id);
    } else {
        // 否則，獲取資料庫中對應 ID 的行
        $row = $DB->find($id);

        // 更新該行的 'text' 值
        $row['text'] = $text;

        // 如果表名為 'title'，則單選按鈕的處理方式不同
        if ($table == 'title') {
            // 對於 'title' 表，檢查 'sh' 是否設置為當前 ID
            $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id) ? 1 : 0;
        } else {
            // 對於其他表，檢查 'sh' 數組是否包含當前 ID
            $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
        }
        // 保存更新後的行到資料庫
        $DB->save($row);
    }
}

// 完成操作後，重定向到指定的頁面
to("../back.php?do=$table");
