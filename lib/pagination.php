<?php
function getTableData($koneksi, $tableName, $page = 1, $limit = 20)
{
	$dataTable = array();
	$startRow = ($page - 1) * $limit;
	$query = mysqli_query($koneksi, "SELECT * FROM " . $tableName . " LIMIT " . $startRow . ", " . $limit);

	while ($data = mysqli_fetch_assoc($query))
		array_push($dataTable, $data);

	return $dataTable;
}

function getViewData($koneksi, $viewName, $idName, $page = 1, $limit = 20)
{
	$dataTable = array();
	$startRow = ($page - 1) * $limit;
	$query = mysqli_query($koneksi, "SELECT * FROM " . $viewName . " group by " . $idName . " LIMIT " . $startRow . ", " . $limit);

	while ($data = mysqli_fetch_assoc($query))
		array_push($dataTable, $data);

	return $dataTable;
}

function getById($koneksi, $viewName, $id, $idName, $page = 1, $limit = 20)
{
	$dataTable = array();
	$startRow = ($page - 1) * $limit;
	$query = mysqli_query($koneksi, "SELECT * FROM " . $viewName . " WHERE " . $idName . " = " . $id . " LIMIT " . $startRow . ", " . $limit);
	while ($data = mysqli_fetch_assoc($query))
		array_push($dataTable, $data);

	return $dataTable;
}

function findByValue($koneksi, $tableName, $column1, $value)
{
	$q = "SELECT * FROM " . $tableName . " WHERE " . $column1 . " = '" . $value . "'";
	$query = mysqli_query($koneksi, $q);
	$data = mysqli_fetch_assoc($query);

	return $data;
}

function updateStatus($koneksi, $id , $value)
{
	$query = mysqli_query($koneksi,"UPDATE transaksi SET status_bayar =" . $value .  " where id_transaksi = " . $id );
	if ($query) {
		return "Status transaksi Berhasil Diubah." ;
	} else {
		return "Status transaksi Gagal Diubah.";
	}

	
}

function showPagination($koneksi, $tableName, $limit = 20)
{
	$countTotalRow = mysqli_query($koneksi, 'SELECT COUNT(*) AS total FROM `' . $tableName . '`');
	$queryResult = mysqli_fetch_assoc($countTotalRow);
	$totalRow = $queryResult['total'];

	$totalPage = ceil($totalRow / $limit);

	$page = 1;
	while ($page <= $totalPage) {
		echo '<li><a href="?page=' . $page . '&perPage=' . $limit . '">' . $page . '</a></li>';
		if ($page < $totalPage)
			echo "&nbsp";
		$page++;
	}
}
