@props(['disabled' => false, 'rows'=>'4', 'cols'=>'50'])

<textarea {{ $disabled ? 'disabled' : '' }} rows="{{ $rows }}" cols="{{ $cols }}" {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}></textarea>
