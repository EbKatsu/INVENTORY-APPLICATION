<style>
body{
	font-family: Times New Roman;
}
table {
    border-collapse: collapse;
	margin: 0 auto;
}

table, td, th {
    border: 1px solid black;
}
th {
	background-color: #f0f0f0;
	padding: 13px 5px;
}
td{
	padding: 3px;
}
h1{
	text-align: center;
}
p{
	text-align: center;
}
.ttl{
	width:75%;
}
.ttd{
	width: 25%;
	text-align:center;
	float: right;
}
</style>
<p>
<b>Toko Makeup Sejahtera</b>
</p>
<p>Jl. Lunjuk Jaya <br/> Kota Palembang</p>
<hr/>
<p>
Laporan Penjualan Bulanan <br/> Bulan : <?=$nm_bulan?>,Tahun : <?=date("Y")?>
</p>
		<table>
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Total</th>
				
			</tr>

        <?php
		$no=1;
		$total=0;
	foreach ($transaksi as $a ) {
		echo" 
		<tr>
			<td>$no</td>
			<td>$a->tgl_pembelian</td>		
			<td>Rp ".number_format($a->total,2,',','.')."</td>	
		</tr>
		";
		$no++;
		$total += $a->total;
	}
	?>
	<tr>
		<td colspan=2 style="text-align:right;">Total</td>
		<td><?="Rp ".number_format($total,2,',','.')?></td>
	</tr>
		</table>
<br/>
<div class="ttd">
<p>Solok, <?=date("d-m-Y")?></p><br/>
<br/>
<p>Pimpinan
</p>
</div>
