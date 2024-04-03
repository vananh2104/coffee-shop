<?php
class hoadon
{
    function insertHoaDon($makh)
    {
        $db = new connect();
        $date = new DateTime('now');
        $ngay = $date->format('Y-m-d');
        $query = "insert into hoadon (makh, ngaydat, tongtien) values ('$makh', '$ngay', 0)";
        $db->exec($query);
        // đã insert vào trong database
        $select = "select masohd from hoadon order by masohd desc limit 1";
        $masohd = $db->getInstance($select);
        return $masohd[0]; // $masohd=array(17);
    }
    // phương thức insert vào bảng cthoadon
    function insertCTHoaDon($masohd, $mahh, $soluongmua,$dongia,$thanhtien)
    {
        $db = new connect();
        $query = "INSERT INTO `cthoadon`(`masohd`, `mahh`, `soluongmua`, `dongia`, `thanhtien`) VALUES ('$masohd','$mahh','$soluongmua','$dongia','$thanhtien')";
        $db->exec($query);
    }
    // phương thức update vào bảng hoa don tổng tiền

    function updateTongTien($masohd, $makh, $tongtien)
    {
        $db = new connect();
        $query = "update hoadon set tongtien=$tongtien WHERE masohd=$masohd and makh=$makh";
        $db->exec($query);
    }
    // thực hiện lấy thông tin khách hang trên hóa đơn
    function getThongTinKHHD($masohd)
    {
        $db = new connect();
        $select = "select a.masohd, b.tenkh, a.ngaydat, b.diachi,b.sodienthoai from hoadon a, khachhang b
        WHERE a.makh=b.makh and a.masohd=$masohd";
        $reusult = $db->getInstance($select);
        return $reusult;
    }
    // lấy thông tin những món hàng trên hóa đơn
    function getThongTinCTHD($masohd)
    {
        $db = new connect();
        $select = "select DISTINCT a.masohd, d.tenhh, a.mausac,a.size,b.dongia,a.thanhtien,a.soluongmua
        from cthoadon a, cthanghoa b, hanghoa d WHERE a.mahh=b.idhanghoa and b.idhanghoa=d.mahh and a.mahh=d.mahh and a.masohd=$masohd";
        $reusult = $db->getList($select);
        return $reusult;
    }
}

?>