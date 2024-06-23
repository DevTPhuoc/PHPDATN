
//Lắng nghe sự kiện
var dsSanPhamThem = [];
document.addEventListener('DOMContentLoaded', function() {

    var phieuNhapID = document.getElementById('phieuNhapID');
    var sanPhamSelect = document.getElementById('sanPhamSelect');
    
    sanPhamSelect.addEventListener('change',function(){
        var sanPham_id = this.value;
        // console.log(sanPham_id);
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
          };
          
          fetch("http://127.0.0.1:8000/api/thong-tin-san-pham/" + sanPham_id, requestOptions)
            .then(response => response.json())
            .then(data => {
              
              document.getElementById('id').innerHTML = data.data.id;
              document.getElementById('gia_nhap').value = data.data.gia_nhap;
              document.getElementById('gia_ban').value = data.data.gia_ban;
              document.getElementById('loai_id').value = data.data.loai_id;
              document.getElementById('khuyen_mai').value = data.data.khuyen_mai_id;
            })
            .catch(error => console.log('error', error));
        
    });

    var dsCTPhieuNhap;
    console.log(phieuNhapID.value);
    $.ajax({
      url: '/receipts/get-CTPN/' + phieuNhapID.value, // lấy danh sách chi tiết phiếu nhập
      type: 'GET',
      success: function(response) {
          dsCTPhieuNhap = response.dsCTPhieuNhap;
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });

//Tính tiền cho sản phẩm nhập
    function tinhTongTien() {
        var giaNhap = parseFloat(document.getElementById('gia_nhap').value);
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





document.getElementById('btn-themSP').addEventListener('click', function() {

    

    tinhTongTien();
    var sanPham_id = document.getElementById('id').innerHTML;
    var sanPham = document.getElementById('sanPhamSelect').selectedOptions[0].textContent;
    var giaNhap = document.getElementById('gia_nhap').value;
    var giaBan = document.getElementById('gia_ban').value;
    var loai_id = document.getElementById('loai_id').value;
    var loai = document.getElementById('loai_id').selectedOptions[0].textContent;
    var size_id = document.getElementById('size').value;
    var size = document.getElementById('size').selectedOptions[0].textContent;
    var color_id = document.getElementById('color').value;
    var color = document.getElementById('color').selectedOptions[0].textContent;
    var soLuong = document.getElementById('so_luong').value;
    var thanhTien = document.getElementById('thanh_tien').value;
    var khuyen_mai_id = document.getElementById('khuyen_mai').value;
    
    if ( sanPham === '' || giaNhap === '' || giaBan === '' || loai === '' || size === '' || color === '' || soLuong === '') {
        
        alert('Vui lòng điền đầy đủ thông tin');
        return;
      }
    console.log(dsCTPhieuNhap);
    var tonTai = false;
    dsCTPhieuNhap.forEach(function(ctPhieuNhap){
        if( ctPhieuNhap.size_id == size_id && ctPhieuNhap.color_id == color_id && ctPhieuNhap.san_pham_id == sanPham_id ){
          tonTai=true;
          return;
        } 
    });
    if(tonTai){
      alert('Sản này đã có trong danh sách thêm ');
    }
    else{
      //kiểm tra sản phẩm tồn tại trong danh sách thêm
    var sanPhamDaCo = false;
    var index = -1; 
    
    //console.log(dsSanPhamThem);
    for (var i = 0; i < dsSanPhamThem.length; i++) {
        var item = dsSanPhamThem[i];
            if (item.size_id === size_id && item.color_id === color_id && item.san_pham_id === sanPham_id) {
                sanPhamDaCo = true;
                index = i;
                break;
            }
      } 
      
    
      if (sanPhamDaCo) {
        var xacNhan = confirm("Sản phẩm đã có trong danh sách. Bạn có muốn thay thế?");
        if (xacNhan) {
          // Thực hiện thay thế sản phẩm đã có
          var sanPhamMoi = {
            san_pham_id: sanPham_id,
            san_pham: sanPham,
            size_id: size_id,
            size: size,
            color_id: color_id,    
            color: color,
            gia_nhap: giaNhap,
            gia_ban: giaBan,
            loai_id: loai_id,
            loai: loai,
            so_luong: soLuong,
            thanh_tien: thanhTien,
            khuyen_mai_id: khuyen_mai_id
          };
    
          dsSanPhamThem[index] = sanPhamMoi;
        } else {
          // Không thực hiện thay thế sản phẩm
          console.log("Bạn đã hủy thay thế sản phẩm.");
        }
      } else {
        // Sản phẩm chưa có trong danh sách, thực hiện thêm sản phẩm
        var sanPhamThem = {
            san_pham_id: sanPham_id,
            san_pham: sanPham,
            size_id: size_id,
            size: size,
            color_id: color_id,    
            color: color,
            gia_nhap: giaNhap,
            gia_ban: giaBan,
            loai_id: loai_id,
            loai: loai,
            so_luong: soLuong,
            thanh_tien: thanhTien,
            khuyen_mai_id : khuyen_mai_id
            
        };
        dsSanPhamThem.push(sanPhamThem);
        var jsonSanPhamThem = JSON.stringify(dsSanPhamThem);//chuyển dsSanPhamThem thành json 
      }  
    
    document.getElementById('id').innerHTML='';
    document.getElementById('sanPhamSelect').value = '';
    document.getElementById('gia_nhap').value = '';
    document.getElementById('gia_ban').value = '';
    document.getElementById('loai_id').value = '';
    document.getElementById('so_luong').value = '';
    document.getElementById('thanh_tien').value = '';
    
    // console.log(jsonSanPhamThem)
    document.getElementById('jsonSanPhamThem').value = jsonSanPhamThem;//lấy json
    renderTable();
    }
    
});
function tongTienTable(){
    
    
        var tongPhieu = 0;
        dsSanPhamThem.forEach(function(sanPhamThem){
            tongPhieu += parseFloat(sanPhamThem.thanh_tien);
        });
        document.getElementById('tong_tien').textContent=tongPhieu.toFixed(2);
        document.getElementById('tong_tien_input').value=tongPhieu.toFixed(2);
      
    
}


function renderTable() {
    var tableBody = document.querySelector('.table.table-striped.table-sm tbody');
    
    // Xóa các dòng cũ trong bảng
    if(tableBody != null){
        while (tableBody.firstChild) {
            tableBody.removeChild(tableBody.firstChild);
        }
    }
    
    if (dsSanPhamThem.length == 0) {
        //console.log(dsSanPhamThem.length);
        document.getElementById('tong_tien').textContent= 0 ;};
    // Tạo các dòng mới trong bảng từ mảng danhSachThongTin
    dsSanPhamThem.forEach(function(sanPhamThem, index) {
        var row = document.createElement('tr');
        
        var sttCell = document.createElement('td');
        sttCell.textContent = index + 1;
        row.appendChild(sttCell);
        
        var idCell = document.createElement('td');
        idCell.textContent = sanPhamThem.san_pham_id;
        row.appendChild(idCell);
        
        var tenSanPhamCell = document.createElement('td');
        tenSanPhamCell.textContent = sanPhamThem.san_pham;
        row.appendChild(tenSanPhamCell);
        
        var giaNhapCell = document.createElement('td');
        giaNhapCell.textContent = sanPhamThem.gia_nhap;
        row.appendChild(giaNhapCell);
        
        var giaBanCell = document.createElement('td');
        giaBanCell.textContent = sanPhamThem.gia_ban;
        row.appendChild(giaBanCell);
        
        var loaiCell = document.createElement('td');
        loaiCell.textContent = sanPhamThem.loai;
        row.appendChild(loaiCell);

        var sizeCell = document.createElement('td');
        sizeCell.textContent = sanPhamThem.size;
        row.appendChild(sizeCell);

        var colorCell = document.createElement('td');
        colorCell.textContent = sanPhamThem.color;
        row.appendChild(colorCell);
        
        var soLuongNhapCell = document.createElement('td');
        soLuongNhapCell.textContent = sanPhamThem.so_luong;
        row.appendChild(soLuongNhapCell);
        
        var thanhTienCell = document.createElement('td');
        thanhTienCell.textContent = sanPhamThem.thanh_tien;
        row.appendChild(thanhTienCell);
        
        var actionCell = document.createElement('td');
        // Tạo nút Xóa để xóa thông tin
        var deleteButton = document.createElement('button');
        deleteButton.textContent = "Xóa";
        deleteButton.classList.add("btn", "btn-danger", "btn-sm");
        deleteButton.addEventListener('click', function() {
            dsSanPhamThem.splice(index, 1);
            var jsonSanPhamThem = JSON.stringify(dsSanPhamThem); // Xóa phần tử tương ứng khỏi mảng   
            //console.log(jsonSanPhamThem)  
            document.getElementById('jsonSanPhamThem').value = jsonSanPhamThem;
            renderTable(); // Cập nhật bảng
        });
        actionCell.appendChild(deleteButton);
        row.appendChild(actionCell);
        tableBody.appendChild(row);
        tongTienTable();       
    });


  }

  document.getElementById('btn-xac-nhan').addEventListener('click', function() {   
    document.getElementById('nhaCungCapSelect').disabled = false;
    if (confirm('Bạn có chắc chắn muốn thêm?')){
      document.getElementById('myForm').submit();
    }
    console.log("khong on roi");
  });

});


