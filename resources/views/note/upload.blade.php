<x-bootlayout>

    <form action="{{route('photo.upload')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="formFile" class="form-label"> file input </label>
            <input class="form-control" type="file" name="image" id="formFile">
        </div>

        <input type="submit" value="upload" class="btn btn-primary">

    </form>


    @if(session()->has('success'))


    <div class="card" style="width: 18rem;">
        <img src="{{asset('storage/uploads') . '/'. session()->get('image')}}" class="card-img-top" alt="uploaded image">
        <div class="card-body">
            <p class="card-text">{{session()->get('success')}}</p>
        </div>
    </div>
    @endif




</x-bootlayout>
