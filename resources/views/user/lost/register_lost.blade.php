@extends('layouts.system')

@section('content')
    <div class="row justify-content-center">
        <col-md-8 class="col-sm-12 col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('user.present.lost') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-sm-10 col-md-10">
                                <label class="col-form-label">Tittle</label>
                                <input type="text" class="form-control" name="title" />
                                <div class="text-danger">
                                    @error('title')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <label class="col-form-label">Describe</label>
                                <textarea rows="5" cols="5" class="form-control" placeholder="Default textarea" name="description"></textarea>
                                <div class="text-danger">
                                    @error('description')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-10">
                                <label class="col-form-label">Lost Category</label>
                                <select class="form-control" name="lost_category">
                                    <option value="">Select One Value Only</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger">
                                    @error('lost_category')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <label class="col-form-label">Audio Embend</label>
                                <input name="audio" type="file" class="form-control" ref="audio" />
                                <div class="text-danger">
                                    @error('audio')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <label class="col-form-label">Picture Embend</label>
                                <input ref="photo" @change="initImage" type="file" name="photo" class="form-control" />
                                <div class="text-danger">
                                    @error('audio')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-10 mt-2">
                                <button type="submit" class="btn btn-success">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </col-md-8>
    </div>
@endsection
