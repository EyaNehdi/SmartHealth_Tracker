<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $produit->nom }} - Fiche produit</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .title { font-size: 24px; font-weight: bold; margin-bottom: 10px; }
        .price { font-size: 18px; color: #333; margin-top: 10px; }
        .category { font-size: 14px; color: #666; margin-bottom: 20px; }
        img { max-width: 300px; margin-bottom: 20px; }
        p { font-size: 14px; line-height: 1.5; }
    </style>
</head>
<body>
    <div class="title">{{ $produit->nom }}</div>
    <div class="category">Catégorie: {{ $produit->categorie->nom ?? 'N/A' }}</div>
    @if($produit->image)
        <img src="{{ public_path('storage/' . $produit->image) }}" alt="{{ $produit->nom }}">
    @endif
    <p>{{ $produit->description }}</p>
    <div class="price">Prix: {{ number_format($produit->prix, 2, ',', ' ') }} DT</div>
</body>
</html>
