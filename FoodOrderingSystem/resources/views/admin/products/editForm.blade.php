<form method="POST" action="{{ route('admin.product.update', $data->id) }}">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $data->id }}">
    
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" readonly>
        <br>
        
        <label for="nutrition_fact">Nutrition Fact</label>
        <textarea class="form-control" id="nutrition_fact" name="nutrition_fact">{{ $data->nutrition_fact }}</textarea>
        <br>

        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description">{{ $data->description }}</textarea>
        <br>

        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $data->price }}">
        <br>

        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control">
            @foreach ($category as $c)
                <option value="{{ $c->id }}" @if($data->category_id == $c->id) selected @endif>{{ $c->name }}</option>
            @endforeach
        </select>
    </div>

    <br>
    <button type="button" onClick="saveDataUpdate({{ $data->id }})" class="btn btn-primary">Submit</button>
</form>
