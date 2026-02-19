<x-mail::layout>

{{-- Header --}}
<x-slot:header>
<x-mail::header :url="config('app.url')">
🐾 Paws Paradise Pet Hotel
</x-mail::header>
</x-slot:header>

{{-- Body --}}
{!! $slot !!}

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
© {{ date('Y') }} Paws Paradise Pet Hotel. All rights reserved.
</x-mail::footer>
</x-slot:footer>

</x-mail::layout>
