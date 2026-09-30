@props(['active' => []])

@php
    $groups = $active instanceof \Illuminate\Support\Collection ? $active->all() : (array) $active;
    $body = new \App\Utilidad\BodyMuscles($groups);
@endphp

<div data-body-map class="flex flex-wrap items-end justify-center gap-8">
    <figure class="text-center">
        <figcaption class="mb-2 text-sm text-gray-500 dark:text-gray-300">Frente</figcaption>
        <div class="body-figure-wrap">{!! $body->front() !!}</div>
    </figure>
    <figure class="text-center">
        <figcaption class="mb-2 text-sm text-gray-500 dark:text-gray-300">Espalda</figcaption>
        <div class="body-figure-wrap">{!! $body->back() !!}</div>
    </figure>
</div>

@once
    <style>
        .body-figure-wrap svg {
            height: 280px;
            width: auto;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('[data-body-map]').forEach((map) => {
                const form = map.closest('form') || document;
                const inputs = [...form.querySelectorAll('input[name="grupos_musculares[]"]')];
                if (inputs.length === 0) {
                    return;
                }

                const paint = () => {
                    const active = new Set(
                        inputs.filter((input) => input.checked).map((input) => input.value)
                    );

                    map.querySelectorAll('[data-muscle]').forEach((path) => {
                        const groups = path.dataset.muscle.split(/\s+/);
                        const on = groups.some((group) => active.has(group));
                        path.setAttribute('fill', on ? '#ff004f' : '#9fabce');
                    });
                };

                inputs.forEach((input) => input.addEventListener('change', paint));
                paint();
            });
        });
    </script>
@endonce
