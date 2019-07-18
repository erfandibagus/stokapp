<html>
    <head>
        <title>DATA STOK BARANG</title>
    </head>
        <body>
<a href="<?php echo base_url().'index.php/data/frm_insert'?>">TAMBAH BARANG</a> | <a href="<?php echo base_url().'index.php/data/logout'?>">LOGOUT</a>
<?php
    $query = $this->db->query('SELECT ttl, SUM(ttl) FROM brg');    
    foreach($query->result_array() as $tt) 
    {  
        $numtt = $tt['SUM(ttl)'];
        $destt ="0";
        $pdestt =",";
        $prtt =".";

        echo "<h3>Total <b>Rp ".number_format($numtt, $destt, $pdestt, $prtt)."</b></h3>"; 
    }
?>
        <table cellpadding="7" border="1" style="border-collapse: collapse; width: auto;">
            <tr style="background: black; border-color: white; ">
                <td align="center"><font color="white"><b>NO</b></font></td>
                <td align="center"><font color="white"><b>NAMA</b></font></td>
                <td align="center"><font color="white"><b>STOK</b></font></td>
                <td align="center"><font color="white"><b>HARGA</b></font></td>
                <td align="center"><font color="white"><b>TOTAL</b></font></td>
                <td align="center"><font color="white"><b>AKSI</b></font></td>
            </tr>
            <?php 
                $no=1; 
                foreach($databrg as $dt) { 
            ?>
            <tr>
                <td style="background: #DCDCDC;" align="center"><?php echo $no++; ?></td>
                <td><?php echo $dt['nm']; ?></td>
                <td align="center"><?php echo $dt['stk']; ?></td>
                <td><?php 
                $numh = $dt['hrg'];
                $desh ="0";
                $pdesh =",";
                $prh =".";
                echo number_format($numh, $desh, $pdesh, $prh);
                ?>
                </td>
                <td><?php 
                $numttl = $dt['ttl'];
                $desttl ="0";
                $pdesttl =",";
                $prttl =".";
                echo number_format($numttl, $desttl, $pdesttl, $prttl);
                ?>
                </td>
                <td style="background: #DCDCDC;">
                    <center><b>
                        <a href="<?php echo base_url().'index.php/data/frm_edit/'.$dt['id']; ?>">EDIT</a> | <a href="<?php echo base_url().'index.php/data/deletedb/'.$dt['id']; ?>">HAPUS</a></b>
                    </center>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>