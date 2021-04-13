<?php 
	session_start();
	if(!$_SESSION['ad_email']) {
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn không có quyền truy cập!');
			</script>
		";

		// Chuyển người dùng vào trang quản trị tin tức
		echo 
		"
			<script type='text/javascript'>
				window.location.href = './suno/admin/dang_nhap.php'
			</script>
		";
	}
;?>
<?php 
	// 1. Chuỗi kết nối đến CSDL
	include('../includes/ket_noi.php');

	// 2. Lẫy dữ liệu để cập nhật tin tức
	$id_loai = $_POST["txtID"];
	$ten_loai = $_POST["txtten_loai"];


// 


	// 3. Viết câu lệnh SQL để cập nhật tin tức có ID như trên
	if($filename == NULL)
	{
		$sql = "
		UPDATE `tbl_loai`
		SET
			`ten_loai` = '".$ten_loai."'
			WHERE `id_loai` = '".$id_loai."'
		";
	} else {
		$sql = "
		UPDATE `tbl_loai`
		SET
			`ten_loai` = '".$ten_loai."'
			WHERE `id_loai` = '".$id_loai."' 
		";
	}
//echo $sql; exit();
	// 4. Thực hiện truy vấn để thêm mới dữ liệu
	mysqli_query($ket_noi, $sql);

	// 5. Thông báo việc thêm mới tin tức thành công & quay trở lại trang quản lý tin tức
		// Thông báo cho người dùng biết bài viết đã được thêm mới thành công
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã cập nhật loại sản phẩm thành công.');
			</script>
		";

		// Chuyển người dùng vào trang quản trị tin tức
		echo 
		"
			<script type='text/javascript'>
				window.location.href = './danh_sach.php'
			</script>
		";
;?>