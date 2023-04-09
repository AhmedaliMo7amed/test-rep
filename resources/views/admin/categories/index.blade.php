@extends('admin.layouts.master')

@section('title')
    Categories
@endsection

@push('custom-css-scripts')
  
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
        @include('admin.flash-message')
        <div class="card">
            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-md-2">
                        <h4 class="card-title">Categories</h4>
                        @if(request()->lang == 'en')
                            <x-flag-4x3-us style="width: 5rem"/>
                        @elseif(request()->lang == 'ar')
                            <x-flag-4x3-sa style="width: 5rem"/>
                        @elseif(request()->lang == 'de')
                            <x-flag-4x3-de style="width: 5rem"/>
                        @elseif(request()->lang == 'ru')
                            <x-flag-4x3-ru style="width: 5rem"/>
                        @else
                            <x-flag-4x3-fr style="width: 5rem"/>
                        @endif
                    </div>
                    <div class="col-md-8 text-center">
                        <a href="{{ route('admin_panel.categories.index', ['lang' => 'en']) }}">
                            <x-flag-4x3-us style="width: 1.5rem"/>
                        </a>
                        <a href="{{ route('admin_panel.categories.index', ['lang' => 'ar']) }}">
                            <x-flag-4x3-sa style="width: 1.5rem"/>
                        </a>
                        <a href="{{ route('admin_panel.categories.index', ['lang' => 'de']) }}">
                            <x-flag-4x3-de style="width: 1.5rem"/>
                        </a>
                        <a href="{{ route('admin_panel.categories.index', ['lang' => 'ru']) }}">
                            <x-flag-4x3-ru style="width: 1.5rem"/>
                        </a>
                        <a href="{{ route('admin_panel.categories.index', ['lang' => 'fr']) }}">
                            <x-flag-4x3-fr style="width: 1.5rem"/>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-primary btn-round" href="{{ route('admin_panel.categories.create', ['lang' => request()->lang]) }}">Add Category</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                @if(count($categories))
                <table class="table">
                <thead class=" text-primary">
                    <th>
                    ID
                    </th>
                    <th>
                    Name
                    </th>
                    <th>
                    Image
                    </th>
                    <th class="text-right">
                        Control
                    </th>
                </thead>
                @php $x = 1; @endphp
                @foreach ($categories as $category)
                <tbody>
                    <tr>
                    <td>
                        {{$x}}
                    </td>
                    <td>
                        {{$category->title}}
                    </td>
                    <td>
                        <img src="{{ asset('uploads/category_images/' . $category->image) }}" width="100px" height="100px">
                    </td>
                    <td class="td-actions text-right">
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('admin_panel.categories.edit', [$category->id, 'lang' => request()->lang]) }}"
                                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                    >
                                <form action="{{ route('admin_panel.categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input type="hidden" name="language_id" value="{{request()->lang}}">
                                    <button class="dropdown-item show_confirm" type="submit" data-toggle="tooltip" title='Delete'><i class="bx bx-trash me-1"></i> Delete</button>
                                </form>
                            </div>
                          </div>
                    </td>
                    </tr>
                </tbody>
                @php $x = $x + 1; @endphp
                @endforeach
                </table>
                    @else
                    <h3 class="text-center">No Categories Found</h3>
                @endif
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('custom-js-scripts')
    <script>
        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
@endpush