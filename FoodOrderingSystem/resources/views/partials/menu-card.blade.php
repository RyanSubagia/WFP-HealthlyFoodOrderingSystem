<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="card menu-card h-100" data-bs-toggle="modal" data-bs-target="#modalFood{{ $f->id }}" style="cursor: pointer;">
        <div class="menu-card-image">
            <img src="{{ asset('storage/menu_sushi/' . $f->image) }}" alt="{{ $f->name }}"
                 onerror="this.onerror=null; this.src='{{ asset('storage/menu_sushi/default.jpg') }}';" />
        </div>
        
        <div class="card-body d-flex flex-column">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <h5 class="card-title fw-bold mb-0">{{ $f->name }}</h5>
                <span class="category-badge">{{ $f->category->name }}</span>
            </div>
            
            <p class="card-text text-muted flex-grow-1 mb-3">
                {{ Str::limit($f->description ?? 'Delicious Japanese cuisine prepared with fresh ingredients.', 80) }}
            </p>
            
            <div class="d-flex justify-content-between align-items-center">
                <span class="price-badge">
                    Rp {{ number_format($f->price, 0, ',', '.') }}
                </span>
                <button class="btn btn-outline-danger btn-sm">
                    <i class="fas fa-plus me-1"></i>Add to Cart
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Modal -->
<div class="modal fade" id="modalFood{{ $f->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $f->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('customer.cart.add') }}" method="POST">
            @csrf
            <input type="hidden" name="food_id" value="{{ $f->id }}">

            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title fw-bold" id="modalLabel{{ $f->id }}">{{ $f->name }}</h5>
                        <small class="text-white-50">{{ $f->category->name }}</small>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="text-center mb-4">
                                <img src="{{ asset('storage/menu_sushi/' . $f->image) }}" alt="{{ $f->name }}"
                                     onerror="this.onerror=null; this.src='{{ asset('storage/menu_sushi/default.jpg') }}';"
                                     class="img-fluid rounded-3" style="max-height: 250px; object-fit: contain;" />
                            </div>
                        </div>
                        
                        <div class="col-md-7">
                            <div class="mb-4">
                                <h6 class="fw-bold text-danger mb-2">
                                    <i class="fas fa-info-circle me-2"></i>Description
                                </h6>
                                <p class="text-muted">{{ $f->description ?? 'Delicious Japanese cuisine prepared with fresh ingredients.' }}</p>
                            </div>

                            <div class="nutrition-facts mb-4">
                                <h6 class="fw-bold text-danger mb-2">
                                    <i class="fas fa-chart-pie me-2"></i>Nutrition Facts
                                </h6>
                                @if($f->nutritionFact)
                                    <div class="nutrition-content small">
                                        {!! nl2br(e($f->nutritionFact->formatted_nutrition)) !!}
                                    </div>
                                @else
                                    <p class="text-muted small">Nutrition information not available</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <h6 class="fw-bold text-success mb-2">
                                    <i class="fas fa-tag me-2"></i>Price
                                </h6>
                                <span class="h4 text-success fw-bold">Rp {{ number_format($f->price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- Customization Options -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="size{{ $f->id }}" class="form-label fw-bold">
                                    <i class="fas fa-expand-arrows-alt me-2 text-primary"></i>Size
                                </label>
                                <select class="form-select form-select-lg" id="size{{ $f->id }}" name="size" required>
                                    <option value="S">Small (S)</option>
                                    <option value="M" selected>Medium (M)</option>
                                    <option value="L">Large (L) <span class="text-success">+Rp 5,000</span></option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="note{{ $f->id }}" class="form-label fw-bold">
                                    <i class="fas fa-sticky-note me-2 text-warning"></i>Special Notes
                                </label>
                                <textarea class="form-control" id="note{{ $f->id }}" name="note" rows="3"
                                          placeholder="Any special requests? (e.g., no wasabi, extra ginger)"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Condiments Section -->
                    <div class="condiment-section">
                        <h6 class="fw-bold text-danger mb-3">
                            <i class="fas fa-pepper-hot me-2"></i>Condiments 
                            <span class="badge bg-danger">+Rp 2,000 each</span>
                        </h6>
                        
                        <div class="row">
                            @php 
                                $condiments = [
                                    ['value' => 'Shoyu', 'label' => 'Shoyu', 'icon' => '🍱'],
                                    ['value' => 'Wasabi', 'label' => 'Wasabi', 'icon' => '🟢'],
                                    ['value' => 'Gari', 'label' => 'Gari (Pickled Ginger)', 'icon' => '🫚'],
                                    ['value' => 'Togarashi', 'label' => 'Togarashi', 'icon' => '🌶️'],
                                    ['value' => 'Ponzu', 'label' => 'Ponzu', 'icon' => '🍋'],
                                    ['value' => 'Mayones', 'label' => 'Japanese Mayo', 'icon' => '🥄'],
                                    ['value' => 'Teriyaki', 'label' => 'Teriyaki', 'icon' => '🍯'],
                                    ['value' => 'Chili Oil', 'label' => 'Chili Oil', 'icon' => '🌶️'],
                                ];
                            @endphp
                            
                            @foreach($condiments as $condiment)
                                <div class="col-md-6 col-12 mb-2">
                                    <div class="form-check form-check-lg">
                                        <input class="form-check-input" type="checkbox" name="condiments[]" 
                                               value="{{ $condiment['value'] }}" 
                                               id="condiment-{{ Str::slug($condiment['value']) }}-{{ $f->id }}">
                                        <label class="form-check-label fw-500" for="condiment-{{ Str::slug($condiment['value']) }}-{{ $f->id }}">
                                            <span class="me-2">{{ $condiment['icon'] }}</span>
                                            {{ $condiment['label'] }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Cancel
                    </button>
                    <button type="submit" class="btn btn-danger btn-lg px-4">
                        <i class="fas fa-cart-plus me-2"></i>Add to Cart
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>