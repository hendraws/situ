<tr id="{{ $data->barcode_ctn }}" class="text-center">
	<input type="hidden" name="scan_in_id[]" value="{{ $data->id }}">
	<th class="text-center">{{ $data->barcode_ctn }} </th>
	<td>{{ optional($data->Master)->po_no }}</td>
	<td>{{ optional($data->Master)->article }}</td>
	<td>{{ $data->no_ctn }}</td>
</tr>