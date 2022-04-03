@props([
"disabled" => $disabled ?? false,
"name","label","id","type","placeholder",'value' => ''
])
<div class="form-group">
  <label for="{{$id ?? $name}}" class="text-primary">{{$label ?? ""}}
  </label>
  <input type="{{$type??'text'}}" name="{{$name}}" id="{{$name}}" value="{{old($name) ?? $value }}" placeholder="{{$placeholder??''}}" class="form-control @error($name) is-invalid @enderror" {{$disabled? 'disabled' :''}}>
  <x-form.message-validation :name=$name />
</div>
