document.addEventListener('DOMContentLoaded', function() {
    function tinhTongTien() {
        var giaNhap = parseFloat(document.getElementById('gia-nhap').value);
        var soLuong = parseInt(document.getElementById('so_luong').value);
        var thanhTien = giaNhap * soLuong;
        document.getElementById('thanh_tien').value = thanhTien.toFixed(2);
    }
    
    document.getElementById('so_luong').addEventListener('change', function() {
        tinhTongTien(); // Tính tổng tiền khi số lượng nhập thay đổi
    });
    document.getElementById('gia_nhap').addEventListener('change', function() {
        tinhTongTien(); // Tính tổng tiền khi giá nhập nhập thay đổi
    });
});
