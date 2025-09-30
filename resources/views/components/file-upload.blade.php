@props([
    'name',
    'label' => null,
    'accept' => 'image/*',
    'multiple' => false,
    'required' => false,
    'error' => null,
    'preview' => true
])

<div class="mb-4">
    @if($label)
        <label class="block text-gray-700 text-sm font-bold mb-2" for="{{ $name }}">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif
    
    <input 
        type="file" 
        name="{{ $name }}" 
        id="{{ $name }}"
        accept="{{ $accept }}"
        {{ $multiple ? 'multiple' : '' }}
        {{ $required ? 'required' : '' }}
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $error ? 'border-red-500' : '' }}"
        {{ $attributes }}
        @if($preview) onchange="previewFiles(this)" @endif
    >
    
    @if($error)
        <p class="text-red-500 text-xs italic">{{ $error }}</p>
    @endif
    
    @if($preview)
        <div id="{{ $name }}-preview" class="mt-2 grid grid-cols-2 md:grid-cols-4 gap-2"></div>
    @endif
</div>

@if($preview)
<script>
function previewFiles(input) {
    const preview = document.getElementById(input.name + '-preview');
    preview.innerHTML = '';
    
    if (input.files) {
        Array.from(input.files).forEach(file => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'w-full h-24 object-cover rounded border';
                    preview.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    }
}
</script>
@endif