<form action="/api/product/store" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" placeholder="Name" name="name">
    <input type="text" placeholder="Price" name="price">
    <input type="text" placeholder="Discount" name="discount">
    <input type="text" placeholder="Description" name="description">
    <select name="brand_id" id="">
        @foreach($brands as $key)
            <option value="{{ $key->id }}">{{ $key->name }}</option>
        @endforeach
    </select>
    <select name="category_id[]" multiple id="">
        @foreach($categories as $key)
            @if(count(\App\SubCategory::where('parent_id', $key->id)->get())<=0)
              <option value="{{ $key->id }}">{{ $key->name }}</option>
            @endif
        @endforeach
    </select>
    <input type="file" name="image">
    <input type="file" name="images[]" multiple>
    <button>Send</button>
</form>