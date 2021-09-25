@props(['errors', 'campo'])

@if ($errors->any())
    <div {{ $attributes }}>

        <ul class="mt-0 list-disc list-inside text-sm text-red">
            @php
                echo $errors->first($campo);
            @endphp
        </ul>
    </div>
@endif
