# TODO - Home Services Icon Update

- [x] Update `resources/views/home.blade.php` in `@php $services = [...] @endphp`:
- [x] Add `img` for `Cuci Kering Reguler` => `icon-cuci-reguler.svg`
- [x] Add `img` for `Cuci Kering Express` => `icon-cuci-express.svg`
- [x] Add `img` for `Dry Cleaning` => `icon-dry-cleaning.svg`
- [x] Add `img` for `Cuci Sepatu` => `icon-cuci-sepatu.svg`

  - [x] Ensure other services remain unchanged.


- [x] Update service card icon rendering block inside the `@foreach($services as $service)` loop:
  - [x] Replace existing `@if($service['name'] === 'Cuci Sepatu') ... @else ... @endif` with the requested logic using `!empty($service['img'])`.
  - [x] Keep all other parts of the file unchanged.


- [x] Run a quick grep/search to confirm only intended changes exist.


