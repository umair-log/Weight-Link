<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $order->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $order->phone ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $order->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Material for Transport</label>
    <select name="material_for_transport" class="form-control" required>
        <option value="">Select Material</option>
        <option value="Cement" {{ old('material_for_transport', $order->material_for_transport ?? '') == 'Cement' ? 'selected' : '' }}>Cement</option>
        <option value="Bricks" {{ old('material_for_transport', $order->material_for_transport ?? '') == 'Bricks' ? 'selected' : '' }}>Bricks</option>
        <option value="Sand" {{ old('material_for_transport', $order->material_for_transport ?? '') == 'Sand' ? 'selected' : '' }}>Sand</option>
        <option value="Iron Rods" {{ old('material_for_transport', $order->material_for_transport ?? '') == 'Iron Rods' ? 'selected' : '' }}>Iron Rods</option>
    </select>
</div>

<div class="mb-3">
    <label>Transportation Company</label>
    <select name="transportation_company" class="form-control" required>
        <option value="">Select Company</option>
        @foreach($transportCompanies as $company)
            <option value="{{ $company }}" {{ old('transportation_company', $order->transportation_company ?? '') == $company ? 'selected' : '' }}>{{ $company }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Truck</label>
    <select name="truck" class="form-control" required>
        <option value="">Select Truck</option>
        @foreach($trucks as $truck)
            <option value="{{ $truck }}" {{ old('truck', $order->truck ?? '') == $truck ? 'selected' : '' }}>{{ $truck }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Weight Details</label>
    <input type="text" name="weight_details" class="form-control" value="{{ old('weight_details', $order->weight_details ?? '') }}" required>
</div>

{{-- <div class="mb-3">
    <label>Extra</label>
    <input type="text" name="extra" class="form-control" value="{{ old('extra', $order->extra ?? '') }}">
</div>

<div class="mb-3">
    <label>Extra2</label>
    <input type="text" name="extra2" class="form-control" value="{{ old('extra2', $order->extra2 ?? '') }}">
</div> --}}

<input type="hidden"  name="extra2" class="form-control" value="{{ old('extra2', $order->extra2 ?? '') }}">
<input type="hidden"name="extra" class="form-control" value="{{ old('extra', $order->extra ?? '') }}">
