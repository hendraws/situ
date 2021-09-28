<tr id="{{ $data->barcode_ctn }}" class="text-center">
	<input type="hidden" name="master_item_id[]" value="{{ $data->id }}">
	<td class="text-center">{{ $data->barcode_ctn }} </td>
	<td>{{ optional($data->Master)->po_no }}</td>
	<td>{{ optional($data->Master)->order_no }}</td>
	<td>{{ optional($data->Master)->customer }}</td>
</tr>