<?php
class sanPham
{
    function getBestSeller($limit=8)
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

    function getProductById()
    {
        $db = new connect();
        $select = "SELECT idsp,tensp,gia, mota FROM SanPham WHERE idsp='17';";
        $result = $db->getInstance($select);
        return $result; // lấy đc dữ liệu
    }
}
?>