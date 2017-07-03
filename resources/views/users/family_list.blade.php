<div class="table-responsive">
	<table class="table table-hover table-condensed table-bordered">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Hubungan</th>
				<th>Alamat</th>
				<th>No Telp</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@if($user->family->count() > 0)
				@foreach($user->family as $family)
					<tr>
						<td>{{ $family->name }}</td>
						<td>{{ $family->hubungan }}</td>
						<td>{{ $family->alamat }}</td>
						<td>
							@if($family->no_telp->count())
								<ul>
									@foreach($family->no_telp as $telp)	
										<li>{{ $telp->no_telp }}</li>
									@endforeach
								</ul>
							@else
								Tidak Ada Data Nomor Telepon
							@endif
						
						</td>
						<td>{{ $family->email }}</td>
						<td class="autofit" nowrap>
							{!! Form::open(['url' => 'families/' . $family->id , 'method' => 'delete']) !!}
							  <a class="btn btn-warning btn-sm" href="{{ url('families/' . $family->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a> 
							  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus famili bernama {{ $family->id }}-{{ $family->name }}?')"><span class="glyphicon glyphicon-remove" aria-hidden="true" )"></span> Delete</button>
							{!! Form::close() !!}
							
						</td>
					</tr>
				@endforeach
			@else
				<tr>
					<td class="text-center" colspan="6">Tidak Ada Data Untuk Ditampilkan :p</td>
				</tr>
			@endif
		</tbody>
	</table>
</div>
