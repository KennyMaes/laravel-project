@props(['disabled' => false])

<div class="w-full">
    <div class="mt-2">
        <textarea rows="3" {!! $attributes->merge(['class' => 'w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>{{ $slot }}</textarea>
    </div>
  </div>
