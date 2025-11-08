<div class="p-6 rounded-lg"
     style="background-color: {{ $page->styling['background_color'] ?? '#fff' }};
            color: {{ $page->styling['text_color'] ?? '#000' }};
            font-size: {{ $page->styling['font_size'] ?? '16px' }};
            margin: {{ $page->styling['margin'] ?? '0' }};
            padding: {{ $page->styling['padding'] ?? '0' }};
            border-radius: {{ $page->styling['border_radius'] ?? '0' }};
            font-family: {{ $page->styling['font_family'] ?? 'inherit' }};">
    {{!! $page->content !!}}

    
</div>
