<form method="POST" action="{{ route('admin.product.update', $data->id) }}">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $data->id }}">
    
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" readonly>
        <br>
        
        @if($data->nutritionFact)
            @php $nf = $data->nutritionFact; @endphp
        @else
            @php $nf = new \App\Models\NutritionFact; @endphp
        @endif

        <label for="calories">Calories</label>
        <input type="text" class="form-control" id="calories" name="calories" value="{{ $nf->calories }}">
        <br>

        <label for="protein">Protein</label>
        <input type="text" class="form-control" id="protein" name="protein" value="{{ $nf->protein }}">
        <br>

        <label for="fat">Fat</label>
        <input type="text" class="form-control" id="fat" name="fat" value="{{ $nf->fat }}">
        <br>

        <label for="carbohydrates">Carbohydrates</label>
        <input type="text" class="form-control" id="carbohydrates" name="carbohydrates" value="{{ $nf->carbohydrates }}">
        <br>

        <label for="fiber">Fiber</label>
        <input type="text" class="form-control" id="fiber" name="fiber" value="{{ $nf->fiber }}">
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
