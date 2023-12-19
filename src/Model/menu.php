<?php
class menu
{
    // thuộc tính
    // hàm tạo
    //phương thức lấy về 8 sản phẩm mới nhất
    function getMenu($parenId)
    {
        //b1: kết nối được với dữ liệu
        $db = new connect();
        // b2: viết câu truy vấn
        if ($parenId == null) {
            $select = "SELECT id,name,path,parentId FROM menu where parentId is null;";

        } else {
            $select = "SELECT id,name,path,parentId FROM menu where parentId = $parenId;";
        }
        // b3: ai thực thi câu truy vấn này?
        $result = $db->getList($select);
        return $result; // lấy đc dữ liệu
    }

}

?>