<?php
$mysqli = new mysqli('localhost','root','','ajaxdata');
$page = isset($_GET['p'])? $_GET['p'] : '';
if($page=='del'){
    $id = $_POST['id'];
    $str = str_replace(' ', ',', $id);
    $res = $mysqli->query("delete from tabledata where id in($str) ");
    if($res){
        echo "Berhasil hapus data";
    } else{
        echo "Gagal hapus data";
    }
} else{
    $hasil = $mysqli->query("select * from tabledata");
    while($row = $hasil->fetch_assoc()){
        ?>
        <tr>
            <td class="text-center"><input type="checkbox" class="checkitem" value="<?php echo $row['id'] ?>"/></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['tgl'] ?></td>
        </tr>
        <?php
    }
}
?>