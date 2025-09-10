<!-- Basic Information Section -->
<div class="form-section">
    <h5 class="section-title">
        <i class="bx bx-info-circle me-2"></i>Basic Information
    </h5>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="type" class="form-label">Invoice Type <span class="text-danger">*</span></label>
                <select name="type" id="type" class="form-select" required>
                    <option value="">Select Type</option>
                    <option value="First Weight" {{ old('type', $invoice->type ?? '') == 'First Weight' ? 'selected' : '' }}>First Weight</option>
                    <option value="Second Weight" {{ old('type', $invoice->type ?? '') == 'Second Weight' ? 'selected' : '' }}>Second Weight</option>
                </select>
                @error('type')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="vehicle_name" class="form-label">Vehicle <span class="text-danger">*</span></label>
                <select name="vehicle_name" id="vehicle_name" class="form-select" required>
                    <option value="">Select Vehicle</option>
                    @foreach($trucks as $vehicle_name)
                        <option value="{{ $vehicle_name }}" {{ old('vehicle_name', $invoice->vehicle_name ?? '') == $vehicle_name ? 'selected' : '' }}>
                            {{ $vehicle_name }}
                        </option>
                    @endforeach
                </select>
                @error('vehicle_name')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>

<!-- Customer Information Section -->
<div class="form-section">
    <h5 class="section-title">
        <i class="bx bx-user me-2"></i>Customer Information
    </h5>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="user_id" class="form-label">Customer <span class="text-danger">*</span></label>
                <select name="user_id" id="user_id" class="form-select" required>
                    <option value="">Select Customer</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id', $invoice->user_id ?? '') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="driver" class="form-label">Driver Name <span class="text-danger">*</span></label>
                <input type="text" name="driver" id="driver" class="form-control" 
                       value="{{ old('driver', $invoice->driver ?? '') }}" 
                       placeholder="Enter driver name" required>
                @error('driver')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>

<!-- Item Information Section -->
<div class="form-section">
    <h5 class="section-title">
        <i class="bx bx-package me-2"></i>Item Information
    </h5>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="item_id" class="form-label">Item Type <span class="text-danger">*</span></label>
                <select name="item_id" id="item_id" class="form-select" required>
                    <option value="">Select Item</option>
                    @foreach($items as $item)
                        <option value="{{ $item->id }}" {{ old('item_id', $invoice->item_id ?? '') == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
                @error('item_id')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="item_type" class="form-label">Item Description <span class="text-danger">*</span></label>
                <input type="text" name="item_type" id="item_type" class="form-control" 
                       value="{{ old('item_type', $invoice->item_type ?? '') }}" 
                       placeholder="Enter item description" required>
                @error('item_type')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>

<!-- Weight Information Section -->
<div class="form-section">
    <h5 class="section-title">
        <i class="bx bx-dumbbell me-2"></i>Weight Information
    </h5>
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="re_enter_first_weight" class="form-label">First Weight (kg) <span class="text-danger">*</span></label>
                <input type="number" step="0.01" name="re_enter_first_weight" id="re_enter_first_weight" 
                       class="form-control" value="{{ old('re_enter_first_weight', $invoice->re_enter_first_weight ?? '') }}" 
                       placeholder="0.00" required>
                @error('re_enter_first_weight')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="dummy_weight_one" class="form-label">Dummy Weight 1 (kg) <span class="text-danger">*</span></label>
                <input type="number" step="0.01" name="dummy_weight_one" id="dummy_weight_one" 
                       class="form-control" value="{{ old('dummy_weight_one', $invoice->dummy_weight_one ?? '') }}" 
                       placeholder="0.00" required>
                @error('dummy_weight_one')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="dummy_weight_two" class="form-label">Dummy Weight 2 (kg) <span class="text-danger">*</span></label>
                <input type="number" step="0.01" name="dummy_weight_two" id="dummy_weight_two" 
                       class="form-control" value="{{ old('dummy_weight_two', $invoice->dummy_weight_two ?? '') }}" 
                       placeholder="0.00" required>
                @error('dummy_weight_two')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>

<!-- Financial Information Section -->
<div class="form-section">
    <h5 class="section-title">
        <i class="bx bx-dollar me-2"></i>Financial Information
    </h5>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="amount" class="form-label">Amount ($) <span class="text-danger">*</span></label>
                <input type="number" step="0.01" name="amount" id="amount" class="form-control" 
                       value="{{ old('amount', $invoice->amount ?? '') }}" 
                       placeholder="0.00" required>
                @error('amount')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="alert alert-info mb-0">
                    <i class="bx bx-info-circle me-2"></i>
                    <strong>Note:</strong> All fields marked with <span class="text-danger">*</span> are required.
                </div>
            </div>
        </div>
    </div>
</div>
