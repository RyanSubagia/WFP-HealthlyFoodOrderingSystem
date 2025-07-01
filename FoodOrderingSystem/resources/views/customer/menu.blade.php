@extends('layouts.main')

@section('title')
    Menu
@endsection

@section('container')
    <div class="menu-hero bg-gradient-to-r from-red-600 to-orange-500 text-white py-12 mb-8">
        <div class="container-fluid text-center">
            <h1 class="display-4 fw-bold mb-3">🍣 Our Sushi Menu</h1>
            <p class="lead">Discover authentic Japanese flavors crafted with precision</p>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <ul class="nav nav-pills category-tabs" id="categoryTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active px-4 py-2" id="all-tab" data-bs-toggle="pill" 
                                    data-bs-target="#all" type="button" role="tab">
                                <i class="fas fa-th-large me-2"></i>All Items
                            </button>
                        </li>
                        @php
                            $categories = $food->groupBy('category.name');
                        @endphp
                        @foreach ($categories as $categoryName => $items)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link px-4 py-2" 
                                        id="{{ Str::slug($categoryName) }}-tab" 
                                        data-bs-toggle="pill" 
                                        data-bs-target="#{{ Str::slug($categoryName) }}" 
                                        type="button" role="tab">
                                    @switch($categoryName)
                                        @case('Appetizer')
                                            <i class="fas fa-leaf me-2"></i>
                                            @break
                                        @case('Main Course')
                                            <i class="fas fa-fish me-2"></i>
                                            @break
                                        @case('Dessert')
                                            <i class="fas fa-ice-cream me-2"></i>
                                            @break
                                        @case('Drink')
                                            <i class="fas fa-cocktail me-2"></i>
                                            @break
                                        @default
                                            <i class="fas fa-utensils me-2"></i>
                                    @endswitch
                                    {{ $categoryName }}
                                    <span class="badge bg-secondary ms-2">{{ $items->count() }}</span>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Menu Content -->
        <div class="tab-content" id="categoryTabsContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel">
                @foreach ($categories as $categoryName => $items)
                    <div class="category-section mb-5">
                        <div class="category-header mb-4">
                            <h2 class="category-title d-flex align-items-center">
                                @switch($categoryName)
                                    @case('Appetizer')
                                        <i class="fas fa-leaf text-success me-3"></i>
                                        @break
                                    @case('Main Course')
                                        <i class="fas fa-fish text-primary me-3"></i>
                                        @break
                                    @case('Dessert')
                                        <i class="fas fa-ice-cream text-warning me-3"></i>
                                        @break
                                    @case('Drink')
                                        <i class="fas fa-cocktail text-info me-3"></i>
                                        @break
                                    @default
                                        <i class="fas fa-utensils text-secondary me-3"></i>
                                @endswitch
                                {{ $categoryName }}
                                <span class="badge bg-light text-dark ms-3">{{ $items->count() }} items</span>
                            </h2>
                            <hr class="category-divider">
                        </div>
                        
                        <div class="row g-4">
                            @foreach ($items as $f)
                                @include('partials.menu-card', ['f' => $f])
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            @foreach ($categories as $categoryName => $items)
                <div class="tab-pane fade" id="{{ Str::slug($categoryName) }}" role="tabpanel">
                    <div class="row g-4">
                        @foreach ($items as $f)
                            @include('partials.menu-card', ['f' => $f])
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endsection