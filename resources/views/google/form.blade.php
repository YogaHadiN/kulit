<div class="table-responsive">
	<table class="table table-hover table-condensed table-bordered">
		<thead>
			<tr>
				<th>Nama</th>
				<th>No Telp</th>
				<th>Hp</th>
				<th>Alamat</th>
			</tr>
		</thead>
		<tbody>
			@if(count($kontak) > 0)
				@foreach($kontak as $k)
					<tr>
						<td>{{ $k['name'] }}</td>
						<td>
							<ul>
								@foreach($k['no_telps'] as $telp)	
									<li>{{ $telp }}</li>
								@endforeach
							</ul>
						</td>
						<td>
							<ul>
								@foreach($k['hp'] as $hp)	
									<li>{{ $hp }}</li>
								@endforeach
							</ul>
						</td>
						<td>
							<ul>
								@foreach($k['alamat'] as $alamat)	
									<li>{{ $alamat }}</li>
								@endforeach
							</ul>
						</td>
					</tr>
				@endforeach
			@else
				<tr>
					<td colspan="4" class="text-center">Tidak Ada Data Ditemukan :p</td>
				</tr>
			@endif
		</tbody>
	</table>
</div>
