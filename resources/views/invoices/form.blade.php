<div class="mb-3">
    <label>Type</label>
    <input type="text" name="type" class="form-control" value="{{ old('type', $invoice->type ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Vehicle Name</label>
    <input type="text" name="vehicle_name" class="form-control" value="{{ old('vehicle_name', $invoice->vehicle_name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Customer Name</label>
    <input type="text" name="customer_name" class="form-control" value="{{ old('customer_name', $invoice->customer_name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Item</label>
    <select name="item_id" class="form-control" required>
        <option value="">Select Item</option>
        @foreach($items as $item)
            <option value="{{ $item->id }}" {{ (old('item_id', $invoice->item_id ?? '') == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Item Type</label>
    <input type="text" name="item_type" class="form-control" value="{{ old('item_type', $invoice->item_type ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Amount</label>
    <input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount', $invoice->amount ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Re-enter First Weight</label>
    <input type="number" step="0.01" name="re_enter_first_weight" class="form-control" value="{{ old('re_enter_first_weight', $invoice->re_enter_first_weight ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Dummy Weight One</label>
    <input type="number" step="0.01" name="dummy_weight_one" class="form-control" value="{{ old('dummy_weight_one', $invoice->dummy_weight_one ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Dummy Weight Two</label>
    <input type="number" step="0.01" name="dummy_weight_two" class="form-control" value="{{ old('dummy_weight_two', $invoice->dummy_weight_two ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Driver</label>
    <input type="text" name="driver" class="form-control" value="{{ old('driver', $invoice->driver ?? '') }}" required>
</div>
