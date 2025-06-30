<form>
    @csrf
    <input type="hidden" id="employee_id" value="{{ $data->id }}">

    <div class="form-group">
        <label for="name">Name (tidak bisa diubah)</label>
        <input type="text" class="form-control" id="name" value="{{ $data->name }}" readonly>
        <br>

        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" value="{{ $data->email }}">
        <br>

        <label for="no_telp">Telephone Number</label>
        <input type="text" class="form-control" id="no_telp" value="{{ $data->no_telp }}">
        <br>

        <label for="password">New Password (kosongkan jika tidak ingin ganti)</label>
        <input type="password" class="form-control" id="password">
    </div>

    <br>
    <button type="button" onclick="saveEmployeeUpdate({{ $data->id }})" class="btn btn-primary">Submit</button>
</form>
