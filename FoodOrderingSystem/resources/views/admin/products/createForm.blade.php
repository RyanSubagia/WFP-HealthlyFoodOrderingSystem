    <form method="POST" action="{{ route('listmakanan.store') }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <h1>ADD NEW MENU</h1><br>
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                placeholder="Enter Meals Name">
            <br>
            <label for="name">Nutrition Fact</label>
            <textarea class="form-control" id="nutrition_fact" name="nutrition_fact" aria-describedby="name"
                placeholder="Enter Nutrition Facts"></textarea>
            <br>
            <label for="name">Description</label>
            <textarea class="form-control" id="description" name="description" aria-describedby="name"
                placeholder="Enter Description"></textarea>
            <br>
            <label for="name">Price</label>
            <input type="number" class="form-control" id="price" name="price" aria-describedby="name"
                placeholder="Enter Price">
            <br>
            <label for="name">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">-- Select Category --</option>
                @foreach ($category as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>

            <br>
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection