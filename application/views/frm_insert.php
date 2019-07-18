<html>
    <head>
        <title>TAMBAH STOK BARANG</title>
        
<script type="text/javascript">
function startCalculate()
{
    interval=setInterval("Calculate()",1);
}

function Calculate()
{
    var a=document.frm_in.stk.value;
    var b=document.frm_in.hrg.value;
    document.frm_in.ttl.value=(a*b);
}

function stopCalc()
{
    clearInterval(interval);
}

function validasi()
{
    var nm  = frm_in.nm.value;
    var stk = frm_in.stk.value;
    var hrg = frm_in.hrg.value;
    var pesan = '';
    
    if (hrg == '') {
        pesan = 'Harga barang belum diisi\n';
    }
    if (stk == '') {
        pesan = 'Stok barang belum diisi\n';
    }
    if (nm == '') {
        pesan = 'Nama barang belum diisi\n';
    }    
    if (pesan != '') {
        alert('KESALAHAN: \n'+pesan);
        return false;
    }
    return true
}
</script>

    </head>
        <body>
            <p><< <a href="<?php echo base_url().'index.php/data'; ?>">KEMBALI</a></p>
            <p><b>TAMBAH STOK BARANG</b></p>
            <form name="frm_in" method="POST" action="<?php echo base_url().'index.php/data/insert_stk'; ?>" onSubmit="return validasi()">
                <table>
                    <tr>
                        <td><b>Nama</b></td>
                        <td>: <input type="text" name="nm"></td>
                    </tr>
                    <tr>
                        <td><b>Stok</b></td>
                        <td>: <input type="number" name="stk" onfocus="startCalculate()" onblur="stopCalc()"></td>
                    </tr>
                    <tr>
                        <td><b>Harga</b></td>
                        <td>: <input type="number" name="hrg" onfocus="startCalculate()" onblur="stopCalc()"></td>
                    </tr>
                    <tr>
                        <td><b>Total</b></td>
                        <td>: <input style="background-color: #DCDCDC" readonly type="number" name="ttl" onfocus="startCalculate()" onblur="stopCalc()"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>&nbsp;&nbsp;<input type="submit" name="simpan" value="Simpan"></td>
                    </tr>
                </table>
            </form>
        </body>
</html>