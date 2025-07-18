@extends('layouts.main')

@section('title')
    Menu
@endsection

@section('container')
    <h1>Menu</h1>
    <div class="container-fluid">
        <h2 class="mb-4">Choose Your Menu</h2>
        
        <ul class="nav nav-tabs mb-4" id="categoryTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">
                    <i class="fas fa-th-large me-2"></i>All Menu
                </button>
            </li>
            @foreach ($food->groupBy('category.name') as $categoryName => $foods)
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="{{ Str::slug($categoryName) }}-tab" data-bs-toggle="tab" data-bs-target="#{{ Str::slug($categoryName) }}" type="button" role="tab" aria-controls="{{ Str::slug($categoryName) }}" aria-selected="false">
                        <i class="fas fa-utensils me-2"></i>{{ $categoryName }}
                        <span class="badge bg-secondary ms-1">{{ $foods->count() }}</span>
                    </button>
                </li>
            @endforeach
        </ul>

        <div class="tab-content" id="categoryTabsContent">
           
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="row">
                    @foreach ($food as $f)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalFood{{ $f->id }}"
                                style="cursor: pointer; transition: transform 0.2s;">
                                <div class="position-relative">
                                    <img class="img-fluid mx-auto d-block" style="max-height: 200px; object-fit: contain;"
                                        src="{{ asset('storage/menu_sushi/' . $f->image) }}" alt="{{ $f->name }}"
                                        onerror="this.onerror=null; this.src='{{ asset('storage/menu_sushi/default.jpg') }}';" />
                                    <span class="badge bg-primary position-absolute top-0 end-0 m-2">{{ $f->category->name }}</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $f->name }}</h5>
                                    <p class="card-text">
                                        <strong>Category:</strong> {{ $f->category->name }}<br>
                                        <strong>Price:</strong> Rp. {{ number_format($f->price, 0, ',', '.') }},-
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            @foreach ($food->groupBy('category.name') as $categoryName => $foods)
                <div class="tab-pane fade" id="{{ Str::slug($categoryName) }}" role="tabpanel" aria-labelledby="{{ Str::slug($categoryName) }}-tab">
                    <div class="mb-3">
                        <h4 class="text-muted">
                            <i class="fas fa-utensils me-2"></i>{{ $categoryName }} 
                            <small class="text-secondary">({{ $foods->count() }} items)</small>
                        </h4>
                    </div>
                    <div class="row">
                        @foreach ($foods as $f)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalFood{{ $f->id }}"
                                    style="cursor: pointer; transition: transform 0.2s;">
                                    <img class="img-fluid mx-auto d-block" style="max-height: 200px; object-fit: contain;"
                                        src="{{ asset('storage/menu_sushi/' . $f->image) }}" alt="{{ $f->name }}"
                                        onerror="this.onerror=null; this.src='{{ asset('storage/menu_sushi/default.jpg') }}';" />
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $f->name }}</h5>
                                        <p class="card-text">
                                            <strong>Category:</strong> {{ $f->category->name }}<br>
                                            <strong>Price:</strong> Rp. {{ number_format($f->price, 0, ',', '.') }},-
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @foreach ($food as $f)
        <div class="modal fade" id="modalFood{{ $f->id }}" tabindex="-1"
            aria-labelledby="modalLabel{{ $f->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form action="{{ route('customer.cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="food_id" value="{{ $f->id }}">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel{{ $f->id }}">{{ $f->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <img src="{{ asset('storage/menu_sushi/' . $f->image) }}" alt="{{ $f->name }}"
                            onerror="this.onerror=null; this.src='{{ asset('storage/menu_sushi/default.jpg') }}';"
                            style="max-height: 200px; object-fit: contain;"/>

                            <p><strong>Description:</strong> {{ $f->description }}</p>
                            <div class="nutrition-facts">
                            <p><strong>Nutrition Facts:</strong>
                            @if($f->nutritionFact)
                                <div class="nutrition-content">
                                    {!! nl2br(e($f->nutritionFact->formatted_nutrition)) !!}
                                </div>
                            @else
                                <p class="text-muted">Nutrition fact not found</p>
                            @endif
                        </div></p>
                            <p><strong>Price:</strong> Rp. {{ number_format($f->price, 0, ',', '.') }},-</p>

                            <div class="mb-3">
                                <label for="size{{ $f->id }}" class="form-label"><strong>Size:</strong></label>
                                <select class="form-select" id="size{{ $f->id }}" name="size" required>
                                    <option value="S">Small (S)</option>
                                    <option value="M" selected>Medium (M)</option>
                                    <option value="L">Large (L) +5000</option>
                                </select>
                            </div>
                        
                        
                        <label class="form-label"><strong>Condiments: + 2000 each</strong></label>
                            <fieldset class="border p-3 mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="condiments[]" value="Shoyu" id="condiment-shoyu-{{ $f->id }}">
                                    <label class="form-check-label" for="condiment-shoyu-{{ $f->id }}">Shoyu</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="condiments[]" value="Wasabi" id="condiment-wasabi-{{ $f->id }}">
                                    <label class="form-check-label" for="condiment-wasabi-{{ $f->id }}">Wasabi</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="condiments[]" value="Gari" id="condiment-gari-{{ $f->id }}">
                                    <label class="form-check-label" for="condiment-gari-{{ $f->id }}">Gari</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="condiments[]" value="Togarashi" id="condiment-togarashi-{{ $f->id }}">
                                    <label class="form-check-label" for="condiment-togarashi-{{ $f->id }}">Togarashi</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="condiments[]" value="Ponzu" id="condiment-ponzu-{{ $f->id }}">
                                    <label class="form-check-label" for="condiment-ponzu-{{ $f->id }}">Ponzu</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="condiments[]" value="Mayones" id="condiment-mayones-{{ $f->id }}">
                                    <label class="form-check-label" for="condiment-mayones-{{ $f->id }}">Mayones Jepang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="condiments[]" value="Teriyaki" id="condiment-teriyaki-{{ $f->id }}">
                                    <label class="form-check-label" for="condiment-teriyaki-{{ $f->id }}">Teriyaki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="condiments[]" value="Chili Oil" id="condiment-chilioil-{{ $f->id }}">
                                    <label class="form-check-label" for="condiment-chilioil-{{ $f->id }}">Chili Oil</label>
                                </div>
                            </fieldset>


                            <div class="mb-3">
                                <label for="note{{ $f->id }}" class="form-label"><strong>Notes
                                        (Optional):</strong></label>
                                <textarea class="form-control" id="note{{ $f->id }}" name="note" rows="2"
                                    placeholder="Ex: No Wasabi, Salt."></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection