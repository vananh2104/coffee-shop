<?php
class sanPham
{
    function getBestSeller($limit = 8)
    {
        $db = new connect();
        $select = "SELECT idsp,tensp,gia FROM SanPham where banchay = 1 order by ngaytao desc limit $limit;";
        $result = $db->getList($select);
        return $result; // lấy đc dữ liệu
    }

    function getImage($productId)
    {
        $db = new connect();
        $select = "SELECT S.idsp, S.idhinh, H.tenhinh
                    FROM HinhSanPham S 
                    JOIN HinhAnh H ON S.idhinh = H.idhinh
                    WHERE S.idsp = $productId
                    LIMIT 1;";
        $result = $db->getInstance($select);
        return $result;
    }
    function getImages($productId, $limit)
    {
        $db = new connect();
        $select = "SELECT S.idsp, S.idhinh, H.tenhinh
                    FROM HinhSanPham S 
                    JOIN HinhAnh H ON S.idhinh = H.idhinh
                    WHERE S.idsp = $productId
                    LIMIT $limit;";
        $result = $db->getList($select);
        return $result;
    }
    function getProductById($idsp)
    {
        $db = new connect();
        $select = "SELECT idsp,tensp,gia, mota FROM SanPham WHERE idsp=$idsp;";
        $result = $db->getInstance($select);
        return $result; // lấy đc dữ liệu
    }
    //menu cà phê
    public function getProductsByMenu($idmenu, $perPage, $page)
    {
        $db = new connect();
        $offset = ($page - 1) * $perPage;
       // $ids = array(54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65);
        //$idsString = implode(',', $ids);
        $select = "SELECT idsp, tensp, gia FROM SanPham 
        WHERE idmenu = $idmenu
        LIMIT $offset, $perPage;";
        $result = $db->getList($select);
        return $result;
    }

    function getTotalPages($idmenu, $perPage)
    {
        $db = new connect();
        // $ids = array(54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65);
        // $idsString = implode(',', $ids);
        $select = "SELECT COUNT(*) as total FROM SanPham WHERE idmenu = $idmenu;";
        $result = $db->getInstance($select);
        if ($result) {
            $totalItems = $result['total'];
            return ceil($totalItems / $perPage);
        }
        return 0;
    }

    // menu trà
    // public function getPhanTrangTea($perPage, $page)
    // {
    //     $db = new connect();
    //     $offset = ($page - 1) * $perPage;
    //     $ids = array(78,79,80,81,82,83,84,85);
    //     $idsString = implode(',', $ids);
    //     $select = "SELECT idsp, tensp, gia FROM SanPham WHERE idsp IN ($idsString) LIMIT $offset, $perPage;";
    //     $result = $db->getList($select);
    //     return $result;
    // }
    // function getTotalPagesTea($perPage)
    // {
    //     $db = new connect();
    //     $ids = array(78,79,80,81,82,83,84,85);
    //     $idsString = implode(',', $ids);
    //     $select = "SELECT COUNT(*) as total FROM SanPham WHERE idsp IN ($idsString);";
    //     $result = $db->getInstance($select);
    //     if ($result) {
    //         $totalItems = $result['total'];
    //         return ceil($totalItems / $perPage);
    //     }
    //     return 0;
    // }
}
?>