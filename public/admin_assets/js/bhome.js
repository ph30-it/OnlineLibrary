    function updatedCategory(id){
        $('#newname').val('');
        alertify.confirm('Thay đổi tên danh mục', '<input type="text" id="newname" class="form-control" placeholder="Tên danh mục mới!">', function(){
            var newname = $('#newname').val();
            if(newname !== ''){
            	$.post(api_domain+"/admin/category/updated",{ id: id, name: newname, _token: api_atk }, function(data) {
					if(data.error == 0){
                        $('#category-'+id+' .tabledit-span').text(newname);
                        alertify.success('Thay đổi thành công!');
                    }
                    else{
                        alertify.error('Thay đổi thất bại!');
                    }
				}, "json");
            }
        }, function(){});
    }
    function trashCategory(id){
        alertify.confirm('Xác nhận xóa', 'Nếu bạn xóa, các sách cùng danh mục sẽ xóa theo!', function(){
            $.ajax({
                url: api_domain+"/admin/category/deleted",
                method: 'delete',
                data: {
                    _token: api_atk,
                    id: id
                },
                dataType: "json",
                success: function(data){
                    if(data.error == 0){
                        $('#category-'+id).hide('slow');
                    }
                }
            });
        }, function(){});
    }
	function trashUser(id){
        alertify.confirm('Xác nhận xóa', 'Nếu bạn xóa, các đơn hàng của thành viên sẽ xóa theo!', function(){
            $.ajax({
                url: api_domain+"/admin/users/deleted",
                method: "DELETE",
                data: {
                    _token: api_atk,
                    id: id
                },
                dataType: "json",
                success: function(data){
                    if(data.error == 0){
                        $('#user-'+id).hide('slow');
                    }
                }
            });
        }, function(){
        });
    }
    function trashComment(id){
        alertify.confirm('Xác nhận xóa', 'Bạn chắc chắn muốn xóa bình luận này?', function(){
            $.ajax({
                url: api_domain+"/admin/comment/deleted",
                method: "DELETE",
                data: {
                    _token: api_atk,
                    id: id
                },
                dataType: "json",
                success: function(data){
                    if(data.error == 0){
                        $('#comment-'+id).hide('slow');
                    }
                }
            });
        }, function(){
        });
    }
	function cancelOrder(id){
		alertify.confirm('Xác nhận', 'Bạn chắc chắn muốn hủy đơn đặt hàng này?', function(){
			$.post(api_domain+"/admin/order/updated",{ id: id, status: 3, _token: api_atk }, function(data) {
				if(data.error == 0){
					$('#order-'+id).hide('slow');
				}else{
					alertify.error("Lỗi hệ thống, thử lại sau!");
				}
			});
		}, function(){});
	}
	function agreeOrder(id){
		alertify.confirm('Xác nhận', 'Bạn chắc chắn muốn cho thuê đơn hàng này?', function(){
			$.post(api_domain+"/admin/order/updated",{ id: id, status: 2, _token: api_atk }, function(data) {
				if(data.error == 0){
					$('#order-'+id+' .table-status').html('<span class="btn-sm btn-warning">Chờ lấy sách</span>');
					$('#order-'+id+' .table-button').html('<a href="javascript:completedOrder('+id+');" class="btn btn-sm btn-success">Nhận sách</a> <a href="javascript:cancelOrder('+id+');" class="btn btn-sm btn-danger">Hủy</a>');
				}else{
					alertify.error("Lỗi hệ thống, thử lại sau!");
				}
			});

		}, function(){});
	}
	function completedOrder(id){
		alertify.confirm('Xác nhận', 'Bạn chắc chắn độc giả đã nhận sách?', function(){
			$.post(api_domain+"/admin/order/updated",{ id: id, status: 4, _token: api_atk }, function(data) {
				if(data.error == 0){
					$('#order-'+id+' .table-status').html('<span class="btn-sm btn-primary">Đang thuê</span>');
					$('#order-'+id+' .table-button').html('<a href="javascript:returnOrder('+id+');" class="btn btn-sm btn-success">Trã sách</a> <a href="javascript:cancelOrder('+id+');" class="btn btn-sm btn-danger">Hủy</a>');
				}else{
					alertify.error("Lỗi hệ thống, thử lại sau!");
				}
			});
		}, function(){});
	}
	function returnOrder(id){
		alertify.confirm('Xác nhận', 'Bạn chắc chắn độc giả đã trã sách?', function(){
			$.post(api_domain+"/admin/order/updated",{ id: id, status: 5, _token: api_atk }, function(data) {
				if(data.error == 0){
					$('#order-'+id+' .table-status').html('<span class="btn-sm btn-success">Đã trã</span>');
					$('#order-'+id+' .table-button').html('<a href="javascript:cancelOrder('+id+');" class="btn btn-sm btn-danger">Hủy</a>');
				}else{
					alertify.error("Lỗi hệ thống, thử lại sau!");
				}
			});
		}, function(){});
	}
	function detailOrder(id){
		var html ='';
		$.get(api_domain+"/admin/order/detail",{ orderid: id }, function(data) {
		  	html += '<p>Độc Giả: <b>'+data.readers+'</b></p>';
			html += '<p>Thời Gian Đăng Ký Thuê: <b>'+data.created_time+'</b></p>';
			html += '<p>Tổng Số Lượng Sách Thuê: <b>'+data.count+'</b></p>';
			switch(data.status) {
				case 1:
			    	html += '<p>Tình Trạng: <span class="btn-sm btn-warning">Chờ xử lý<span></p>';
			    break;
			  	case 2:
			    	html += '<p>Tình Trạng: <span class="btn-sm btn-warning">Chờ đến thư viện<span></p>';
			    break;
			  	case 3:
			    	html += '<p>Tình Trạng: <span class="btn-sm btn-danger">Đã hủy<span></p>';
			    break;
			  	case 4:
			    	html += '<p>Tình Trạng: <span class="btn-sm btn-success">Đang mượn<span></p>';
			    break;
			  	default:
			    	html += '<p>Tình Trạng: <span class="btn-sm btn-primary">đã trả<span></p>';
			}
			
			html += '<table class="table"><thead><tr><th>Tên Sách</th><th>Số Lượng</th><th>Giá Thuê</th><th>Tổng Tiền</th></tr></thead><tbody>';
			$.each(data.book, function(i, l) {
				html += '<tr>';
				html += '<td>'+l.name+'</td>';
				html += '<td>'+l.quantity+'</td>';
				html += '<td>'+l.price+'đ</td>';
				html += '<td>20,000đ</td>';
				html += '</tr>';
			});
			html += '</tbody><tfoot><tr><td colspan="4">Tổng: 20,000đ</td></tr></tfoot></table>';
			$('#detail-order .panel-body').html(html);
			$('#detail-order').modal('show');
		}, "json");
	}

	