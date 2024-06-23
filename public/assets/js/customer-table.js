
//   $(document).ready(function() {
//     $(document).on('click', '#pagination-container a', function(event) {
//       event.preventDefault(); // Ngăn chặn hành vi mặc định khi nhấp vào liên kết

//       var pageUrl = $(this).attr('href'); // Lấy URL của trang mới
//       loadCustomers(pageUrl); // Gọi hàm loadCustomers để tải dữ liệu khách hàng mới
//     });

//     function loadCustomers(url) {
//       $.ajax({
//         url: url,
//         type: 'GET',
//         dataType: 'html',
//         success: function(response) {
//           // Cập nhật phần chứa dữ liệu khách hàng
//           $('#customer-container').html(response.view);

//           // Cập nhật phần chứa liên kết phân trang
//           $('#pagination-container').html(response.pagination);
//         },
//         error: function() {
//           console.log('Lỗi khi gửi yêu cầu Ajax.');
//         }
//       });
//     }
//   });