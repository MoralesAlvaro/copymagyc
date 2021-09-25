@props(['errors', 'campo'])

@if ($errors->any())
    <div {{ $attributes }}>

        <ul class="text-sm text-red">
            @php
                echo $errors->first($campo);
            @endphp
        </ul>
    </div>
@endif
